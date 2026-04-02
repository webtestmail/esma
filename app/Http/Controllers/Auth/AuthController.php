<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\Admin\Company;
use App\Models\Admin\Pages;
use App\Models\Admin\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB; 
use Illuminate\Validation\Rules\Password;
use App\Models\User;
use App\Models\UserProfile;
use App\Services\SmsService;
use App\Models\Application;

class AuthController extends Controller
{
    public function edit_profile(){
        $headerData = $this->header();
        $footerData = $this->footer();
        $user = Auth::user();
        return view('user-dashboard.edit-profile', compact('headerData', 'footerData','user'));
    }
    public function application_submit(Request $request)
    {
        // 1. Validation
        $validator = \Validator::make($request->all(), [
            'email'             => 'required|email',
            'phone'             => 'required',
            'company_name'      => 'required|string|max:255',
            'contact_name'      => 'required|string|max:255',
            'country'           => 'required',
            'address'           => 'required',
            'organization_type' => 'required',
            'website'           => 'required',
            'category'          => 'required|array|min:1', // Matches name="category[]"
        ], [
            // Custom messages to match your "Terms" error
            'category.required' => 'You must accept the terms and application rules.',
        ]);

        // 2. Check if validation fails
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->first() // Sends the first error to SweetAlert
            ], 422);
        }

        try {
            // 3. Logic to save the data
            Application::create($request->all());

            return response()->json([
                'success' => true,
                'message' => 'Your application has been submitted successfully!'
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Server Error: ' . $e->getMessage()
            ], 500);
        }
    }
    public function profile_password_update(Request $request){
        $request->validate([
        'current_password' => ['required', 'current_password'], // Built-in Laravel rule
        'new_password' => ['required', 'confirmed', Password::min(8)],
    ]);

    $user = $request->user();
    
    $user->update([
        'password' => Hash::make($request->new_password)
    ]);

    return response()->json([
        'status' => 'success',
        'message' => 'Password updated successfully!'
    ]);
    }
    
    private function header()
    {
        $company = Company::find(1);
    
        $pages = Pages::select('header_footer_name', 'client_page_urls')
            ->whereIn('visibility', ['both', 'header'])
            ->where('status', 'active')
            ->get();
    
        $services = Services::select('service_name', 'service_url')
            ->whereIn('visibility', ['both', 'header'])
            ->where('status', 'active')
            ->get();
    
        return [
            'company' => $company,
            'pages' => $pages,
            'services' => $services
        ];
    }

    private function footer()
    {
        $company = Company::find(1);
    
        $pages = Pages::select('header_footer_name', 'client_page_urls')
            ->whereIn('visibility', ['both', 'footer'])
            ->where('status', 'active')
            ->get();
    
        $services = Services::select('service_name', 'service_url')
            ->whereIn('visibility', ['both', 'footer'])
            ->where('status', 'active')
            ->get();
    
        return [
            'company' => $company,
            'pages' => $pages,
            'services' => $services
        ];
    }
public function __construct(SmsService $smsService)
    {
        $this->smsService = $smsService;
    }
public function login_auth(Request $request) {
    // Validate the input
    $request->validate([
        'email' => 'required|email|exists:users,email',
        'password' => 'required|min:6',
    ]);

    // Fetch user
    $user = User::where('email', $request->email)->first();

    if (!$user) {
        return response()->json([
            'success' => false,
            'message' => 'User not found'
        ], 404);
    }

    // Check if user is active (if needed)
    if ($user->is_active != true) {
        return response()->json([
            'success' => false,
            'message' => 'Account not activated'
        ], 403);
    }

    // Attempt authentication
    $credentials = [
        'email' => $request->email,
        'password' => $request->password
    ];

    if (auth()->attempt($credentials, $request->has('remember'))) {
        $request->session()->regenerate();
        return response()->json([
            'success' => true,
            'message' => 'Login successful',
            'redirect' => route('my-dashboard')
        ]);
    }

    return response()->json([
        'success' => false,
        'message' => 'Invalid credentials'
    ], 401);
}
    
public function verifyOtp(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'otp_code' => 'required|digits:6',
        ]);

        // FIX: The SmsService should check the code against the one stored in the DB/Cache
        if ($this->smsService->checkCode($user, $request->otp_code)) {
            
            // Mark the user as verified
            $user->update(['phone_verified' => true,'is_active'=>true]);
            
            // Clear the temporary OTP code from storage (DB/Cache)
            $this->smsService->clearCode($user); 

            return redirect('/my-dashboard')->with('success', 'Phone number verified successfully!');
        }

        return back()->withInput()->with('error', 'The code you entered is invalid or has expired.');
    }
public function otp_verify_page(){
    $headerData = $this->header();
    $footerData = $this->footer();
    $user = Auth::user();
    if ($user->phone_verified) {
            return redirect('/my-dashboard')->with('success', 'Your phone is already verified.');
        }
     $this->smsService->sendCode($user->phone, $user);
    return view('user-dashboard.otp', compact('headerData', 'footerData'))->with('info', 'Please verify your updated phone number.');
}

public function profile_update(Request $request) 
{
    $user = Auth::user();

   $validatedData = $request->validate([
        'firstName' => 'required|string|max:255',
        'lastName'  => 'required|string|max:255',
        'phone'     => 'required|string|max:14|unique:users,phone,' . $user->id,
        'dob'       => 'nullable|date',
        'about'     => 'nullable|string|max:500',
        'location'  => 'nullable|string|max:255',
        'niche'     => 'nullable|string',
    ], [
        'phone.unique' => 'Phone number already in use.'
    ]);
    
    if ($request->filled('password')) {
        $request->validate([
            'password' => 'required|min:8|confirmed', 
        ]);
    
        $password = Hash::make($request->password);
    } else {
        // Keep the existing password if the user left the field blank
        $password = $user->password;
    }
    

    DB::beginTransaction();

    try {
     
        $user->update([
          
            'first' => $validatedData['firstName'], 
            'last'  => $validatedData['lastName'],
            'phone' => $validatedData['phone'],
            'dob'   => $validatedData['dob'],
            'password'=> $password,
            // 'is_active' =>  1,
        ]);

        $user->userprofile()->update([
            'about'    => $validatedData['about'],
            'location' => $validatedData['location'],
            'niche'=> $request->niche,
            
        ]);
        
        

        DB::commit();

    } catch (\Exception $e) {
        DB::rollBack();
        // You can log the error here if needed: Log::error($e->getMessage());
        return back()->with('error', 'Profile update failed due to a server error.');
    }
    
    if ($user->wasChanged('phone')) {
       
        return redirect()->route('otp.verify.route')->with('info', 'Please verify your new phone number.');
    }

    return redirect('/my-dashboard')->with('success', 'Profile updated successfully.');
}

// public function register(Request $request)
// {
    
//     $rules = [
//         'terms'     => 'required|accepted',
//         'user_type' => 'required|integer|in:0,2',
//     ];

    
//     if ($request->user_type == 0) {
        
//         $rules = array_merge($rules, [
//             'firstName'      => 'required|string|max:255',
//             'lastName'       => 'required|string|max:255',
//             'password'  => 'required|min:8|confirmed',
//             'email'          => 'required|email|unique:users,email',
//             'phone'          => 'required|string|max:20|unique:users,phone',
//             'username'       => 'required|string|max:255|unique:users,username',
//             'profilePicture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
//         ]);
//     } elseif ($request->user_type == 2) {
       
        
//         $rules = array_merge($rules, [
//             'brandFirstName' => 'required|string|max:255',
//             'brandLastName'  => 'required|string|max:255',
//             'brandEmail'     => 'required|email|unique:users,email',
//             'brandPhone'     => 'required|string|max:20|unique:users,phone',
//             'brandPassword'  => 'required|min:8|confirmed',
//             'company_name'   => 'required|string|max:255',
//             'website'        => 'required|url|max:255',
//             'companyLogo'    => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
//         ]);
        
//     }

//     $validatedData = $request->validate($rules);
    

//     $user = DB::transaction(function () use ($request, $validatedData) {
        
//         $isInfluencer = $request->user_type == 0;
        
    
//         $imagePath = null;
//         if ($isInfluencer && $request->hasFile('profilePicture')) {
//             $imagePath = $request->file('profilePicture')->store('profile_pictures', 'public');
//         } elseif (!$isInfluencer && $request->hasFile('companyLogo')) {
//             $imagePath = $request->file('companyLogo')->store('company_logos', 'public');
//         }

        
//         $user = User::create([
//             'first'          => $isInfluencer ? $validatedData['firstName'] : $validatedData['brandFirstName'],
//             'last'           => $isInfluencer ? $validatedData['lastName'] : $validatedData['brandLastName'],
//             'email'          => $isInfluencer ? $validatedData['email'] : $validatedData['brandEmail'],
//             'phone'          => $isInfluencer ? $validatedData['phone'] : $validatedData['brandPhone'],
//             'username'       => $isInfluencer ? $validatedData['username'] : 'brand_' . time(), 
//             'password'       => Hash::make($isInfluencer ? $validatedData['password'] : $validatedData['brandPassword']),
//             'role'           => $validatedData['user_type'],
//             'term_box_check' => $validatedData['terms'],
//             'is_active'      => false,
//         ]);

    
//         if ($isInfluencer) {
//             $user->userprofile()->create([
//                 'follower_count' => $request->followerCount,
//                 'image'          => $imagePath ?? 'default-avatar.png',
//                 'niche'          => $request->niche,
//                 'about'          => $request->bio,
//                 'instagram_url'=>$request->instagram_url,
//                 'youtube_url'=>$request->youtube_url,
//             ]);
//         } else {
//             $user->userprofile()->create([
//                 'company_name'   => $validatedData['company_name'],
//                 'website_url'        => $validatedData['website'],
//                 'image'          => $imagePath,
//                 'budget'=> $request->budget,
//                 'about'  => $request->campaignGoal,
//                 'industry'=>$request->industry,
//                  'location'=>$request->location,
//             ]);
//         }

//         $user->wallet()->create(['is_active' => true]);
        
//         $user->notification()->create(['user_id'=>$user->id]);
        
//         return $user;
//     });

//     auth()->login($user);
//     return redirect('/my-dashboard')->with('success', 'Welcome!');
// }

    public function signup_view(){
        $headerData = $this->header();
        $footerData = $this->footer();
        return view('Auth.signup', compact('headerData', 'footerData'));
    }
    public function login_view(){
        $headerData = $this->header();
        $footerData = $this->footer();
        return view('auth.login', compact('headerData', 'footerData'));
    }
    public function complete_profile(){
        $headerData = $this->header();
        $footerData = $this->footer();
        $user = Auth::user();
        // if($user->is_active == 1){
        //     return redirect('/my-dashboard');
        // }
        return view('user-dashboard.settings', compact('headerData', 'footerData'));
    }
    public function my_dashboard(){
        $headerData = $this->header();
        $footerData = $this->footer();
        $user = Auth::user();
        $role = $user->role;
      
          if($role == 'member'){
            return view('user-dashboard.dashboard', compact('headerData', 'footerData','user'));
        }else{
            return 'Invalid have invalid role permission';
        }
            
    }
    public function logout(Request $request)
    {
        // 1. Log the user out
        Auth::logout();

        // 2. Invalidate the session (security measure)
        $request->session()->invalidate();

        // 3. Regenerate the session's CSRF token (security measure)
        $request->session()->regenerateToken();

        // 4. Redirect the user to the login page (or home)
        return redirect('/')->with('status', 'You have been successfully logged out.');
    }
}
