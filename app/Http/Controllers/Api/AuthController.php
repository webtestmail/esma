<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function update_wallet_balance(Request $request){
        
        $request->validate([
        'balance' => 'required|numeric|min:0',
    ]);
            
        $user = auth()->user();
            
        
        $wallet  = $user->wallet;
        
         if (!$wallet) {
            return response()->json([
                'success' => false,
                'message' => 'Wallet not found for this user.'
            ], 404);
        }
        
        
        $wallet->update([
            'balance'=>$request->balance,
            ]);
            
        return response()->json([
            'success'=>true,
            'message' => 'Balance updated successfully',
            'data'=> [
                'balance'=>$wallet->balance ?? 0,
                ],],200);
        
    }
    public function get_wallet_balance()
    {
        $user = auth()->user();
    
        // Access the wallet relationship established during registration
        $wallet = $user->wallet;
    
        if (!$wallet) {
            return response()->json([
                'success' => false,
                'message' => 'Wallet not found for this user.'
            ], 404);
        }
    
        return response()->json([
            'success' => true,
            'data' => [
                'balance' => $wallet->balance ?? 0, // Default to 0 if null
                'is_active' => $wallet->is_active, // Check status set during register
            ]
        ], 200);
    }
   public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
        'user_type' => 'required|integer|in:0,2', 
        'device_name' => 'required|string', 
    ]);

    $user = User::where('email', $request->email)
                ->where('role', $request->user_type) 
                ->first();

    if (!$user || !Hash::check($request->password, $user->password)) {
        return response()->json([
            'message' => 'Invalid credentials or incorrect user type'
        ], 401);
    }

    $token = $user->createToken($request->device_name)->plainTextToken;

    return response()->json([
        'success' => true,
        'token' => $token,
        'user' => $user
    ]);
}public function register(Request $request)
{
    // 1. Initial Validation Rules
    $rules = [
        'terms'       => 'required|accepted',
        'user_type'    => 'required|integer|in:0,2',
        'device_name'  => 'required|string', // Required for Sanctum tokens
    ];
    
    $messages = [
    'user_type.required' => 'User type field must be required: 0 = Influencer, 2 = Brand',
];

    // 2. Conditional Validation based on user_type
    if ($request->user_type == 0) { // Influencer
        $rules = array_merge($rules, [
            'firstName'      => 'required|string|max:255',
            'lastName'       => 'required|string|max:255',
            'email'          => 'required|email|unique:users,email',
            'phone'          => 'required|string|max:20|unique:users,phone',
            'username'       => 'required|string|max:255|unique:users,username',
            'password'       => 'required|min:8|confirmed',
            'profilePicture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'location'=>'required',
            'instagram_url'=>'nullable',
            'youtube_url'=>'nullable',
        ]);
    } else { // Brand
        $rules = array_merge($rules, [
            'brandFirstName' => 'required|string|max:255',
            'brandLastName'  => 'required|string|max:255',
            'brandEmail'     => 'required|email|unique:users,email',
            'brandPhone'     => 'required|string|max:20|unique:users,phone',
            'brandPassword'  => 'required|min:8|confirmed',
            'username'       => 'required|string|max:255|unique:users,username',
            'company_name'   => 'required|string|max:255',
            'website'        => 'required|url|max:255',
            'companyLogo'    => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'industry'=> 'required',
            'budget'=>'required',
            'location'=>'required'
        ]);
    }

    $validatedData = $request->validate($rules, $messages);

    // 3. Execution via Database Transaction
    $user = DB::transaction(function () use ($request, $validatedData) {
        $isInfluencer = $request->user_type == 0;
        
        // Handle File Uploads
        $imagePath = null;
        if ($isInfluencer && $request->hasFile('profilePicture')) {
            $imagePath = $request->file('profilePicture')->store('profile_pictures', 'public');
        } elseif (!$isInfluencer && $request->hasFile('companyLogo')) {
            $imagePath = $request->file('companyLogo')->store('company_logos', 'public');
        }

        // Create the User record
        $user = User::create([
            'first'          => $isInfluencer ? $validatedData['firstName'] : $validatedData['brandFirstName'],
            'last'           => $isInfluencer ? $validatedData['lastName'] : $validatedData['brandLastName'],
            'email'          => $isInfluencer ? $validatedData['email'] : $validatedData['brandEmail'],
            'phone'          => $isInfluencer ? $validatedData['phone'] : $validatedData['brandPhone'],
            'username'       => $isInfluencer ? $validatedData['username'] : 'brand_' . time(),
            'password'       => Hash::make($isInfluencer ? $validatedData['password'] : $validatedData['brandPassword']),
            'role'           => $validatedData['user_type'],
            'term_box_check' => $validatedData['terms'],
            'is_active'      => false, // Usually true for API or based on your verification flow
        ]);

        // Create Profile based on type
        if ($isInfluencer) {
            $user->userprofile()->create([
                'follower_count' => $request->followerCount,
                'image'          => $imagePath ?? 'default-avatar.png',
                'niche'          => $request->niche,
                'about'          => $request->bio,
                'location'=>$request->location,
                'instagram_url'=>$request->instagram_url,
                'youtube_url'=>$request->youtube_url,
            ]);
        } else {
            $user->userprofile()->create([
                'company_name'   => $validatedData['company_name'],
                'website_url'        => $validatedData['website'],
                'image'          => $imagePath,
                'about'  => $request->campaignGoal,
                'budget'=>$request->budget,
                'industry'=>$request->industry,
                'location'=>$request->location,
            ]);
        }

        // Initialize required relations
        $user->wallet()->create(['is_active' => true]);
        $user->notification()->create(['user_id' => $user->id]);

        return $user;
    });

    // 4. Generate Sanctum Token
    $token = $user->createToken($request->device_name)->plainTextToken;

    // 5. Return JSON Response
    return response()->json([
        'success' => true,
        'message' => 'Registration successful',
        'token'   => $token,
        'user'    => $user->load('userprofile') // Load profile data in response
    ], 201);
}
}
