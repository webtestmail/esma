<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class GoogleController extends Controller
{
    public function redirectToGoogle(Request $request){
        
        $initialRole = $request->get('role');
        
        $validRoles = ['influencer', 'brand'];
        
        
        
        if (in_array($initialRole, $validRoles)) {
            
            Session::put('google_login_role', $initialRole);
            
        } else {
            // Set a safe default if the role is missing/invalid
            Session::put('google_login_role', 'user');
        }
        return Socialite::driver('google')->redirect();
    }
    public function handleGoogleCallback()
    {
        $role = Session::pull('google_login_role', 'user'); 
        
        
        
        if($role == 'influencer'){
            $roleToAssign = 0;
        }
        else{
            $roleToAssign = 2;
        }
        
        
        
        try {
            // 2. Get the user information from Google
            $socialUser = Socialite::driver('google')->stateless()->user();
            
            
        } catch (Throwable $e) {
            logger()->error('Google authentication failed: ' . $e->getMessage());
            return redirect('/login')->with('error', 'Google authentication failed. Please try again.');
        }

        // 3. Define default data
        //$defaultPassword = Hash::make(\Illuminate\Support\Str::random(16));
        $defaultIsActive = 0; // 0 means 'inactive/pending profile'
        
        // 4. Find existing user by Google ID
        $existingUser = User::where('email',$socialUser->email)->first();
        
        
        
        if (!$existingUser) {
            $user = User::create([
                'google_id' => $socialUser->id,
                'first' => $socialUser->name,
                'username'=>$socialUser->name,
                'email' => $socialUser->email,
                // 'password' => $defaultPassword,
                'email_verified_at' => now(),
                'role' => $roleToAssign, 
                'is_active' => $defaultIsActive, 
            ]);
            $user->userprofile()->Create([
                'user_id'=>$user->id,
                ]);
                
            $user->wallet()->create([
                'user_id'=>$user->id,
                'is_active'=>true,
                ]);
                
            $user->notification()->create([
                'user_id'=>$user->id,
                ]);
            
        } else {
            $user = $existingUser;
            $user->update([
                'first' => $socialUser->name,
                'username'=>$socialUser->name,
                'email' => $socialUser->email,
                'google_id' => $socialUser->id,
            ]);
        }
        Auth::login($user, true);
// account will active if fill profile information
        if ($user->is_active === 0 ) {
            return redirect('/settings')->with('success', 'Welcome! Please complete your profile.'); 
        }

        // Active users go to their dashboard
        return redirect('/my-dashboard');
}
}
