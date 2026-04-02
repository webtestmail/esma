<?php

namespace App\Http\Controllers;

use App\Models\InstagramCredential;
use App\Services\InstagramGraphService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Laravel\Socialite\Facades\Socialite;
use App\Models\Instagram;


class facebookController extends Controller
{
    protected $instagramService;

    // Inject the service for all methods
    public function __construct(InstagramGraphService $instagramService)
    {
        $this->InstagramGraphService = $instagramService;
    }

    /**
     * 1. Display the settings page (Connect button).
     */
    // public function settings()
    // {
    //     $user = Auth::user();
    //     $isConnected = $user->isInstagramConnected();
        
    //     return view('instagram.settings', compact('isConnected'));
    // }

    /**
     * 2. Redirect the user to the Meta/Facebook authorization page.
     */
public function redirectToInstagram()
{
    session()->forget('oauth.state');
    $redirectUri = config('services.instagram.redirect_uri') ?? env('INSTAGRAM_REDIRECT_URI');
    $state = \Illuminate\Support\Str::random(40);
    session(['oauth.state' => $state]); // Save the state to the user's session

    // Use the confirmed working API version
    $apiVersion = 'v24.0'; 
    $redirectUri = $redirectUri;
    $clientId = env('INSTAGRAM_CLIENT_ID');
    $scope = 'instagram_basic,instagram_manage_insights,pages_show_list'; 

    $url = "https://www.facebook.com/{$apiVersion}/dialog/oauth?" . http_build_query([
        'client_id' => $clientId,
        'redirect_uri' => $redirectUri,
        'scope' => $scope,
        'response_type' => 'code',
        'auth_type' => 'reauthenticate',
        'state' => $state, // CRITICAL: Add the state parameter
        'extras' => '{"setup":{"channel":"IG_API_ONBOARDING"}}',
    ]);
    
    return redirect($url);
}

    public function handleInstagramCallback(Request $request, InstagramGraphService $instagramService)
    {
        
        // 1. Check for State Mismatch
        if ($request->get('state') !== session('oauth.state')) {
            session()->forget('oauth.state'); // Clear the state
            \Log::error('CSRF State Mismatch during Instagram callback.');
            return redirect('/my-dashboard')->with('error', 'Authentication state mismatch. Please try connecting again.');
        }
        
        session()->forget('oauth.state'); // Clear the state after successful check
        
        if ($request->has('error')) {
            return redirect('/my-dashboard')->with('error', 'Instagram connection denied or failed.');
        }
    
        $code = $request->get('code');
        
  
    if (!$request->has('code')) {
        
        \Log::error('Instagram Callback URL accessed without an authorization code.');
        return redirect('/my-dashboard')->with('error', 'Instagram authorization code was missing. Please try again.');
    }
        
        $user = Auth::user(); 
    
        try {
            $response = $instagramService->exchangeCodeForToken($code);
            $shortLivedToken = trim($response['access_token']);
    
        } catch (\Exception $e) {
            \Log::error('Initial Token Exchange Failed for User ' . $user->id . ': ' . $e->getMessage());
            return redirect('/my-dashboard')->with('error', 'Failed to get initial access token.');
        }
        
        // --- 3. Exchange Short-Lived Token for Long-Lived Token (60 Days) ---
        try {
            $longLivedResponse = $instagramService->exchangeShortForLongToken($shortLivedToken);
            $longLivedToken = $longLivedResponse['access_token'];
            $expiresInSeconds = $longLivedResponse['expires_in'] ?? (60 * 24 * 60 * 60); // Default to 60 days
            $expiryTimestamp = now()->addSeconds($expiresInSeconds);
            
            \Log::info('token expiryTime :'.$expiryTimestamp);
            
            \Log::info("Long Lived Token obtained for User " . $user->id . ": " . $longLivedToken);
    
        } catch (\Exception $e) {
            \Log::error('Long-Lived Token Exchange Failed for User ' . $user->id . ': ' . $e->getMessage());
            return redirect('/my-dashboard')->with('error', 'Failed to secure long-lived token.');
        }
        
        try {
            $igAccountData = $instagramService->getAccountInfo($longLivedToken);
            $instagramUserId = $igAccountData['id'];         // <--- CORRECT Instagram Business ID
            $instagramUsername = $igAccountData['username'];
    
        } catch (\Exception $e) {
            \Log::error('Failed to retrieve IG User ID for User ' . $user->id . ': ' . $e->getMessage());
            return redirect('/my-dashboard')->with('error', 'Token secured, but failed to fetch IG account details.');
        }
        
        
    
        $instagram = Instagram::updateOrCreate(
            ['user_id' => $user->id],
            [
                'connection_status' => true,
                'instagram_user_id' => $instagramUserId,
                'instagram_account_name' => 'User-'.$instagramUserId,
                'long_lived_access_token' => $longLivedToken, 
                'instagram_token_expires_at' => $expiryTimestamp,
            ]
        );
        
        
        //creating instagram settings
        InstagramSettings::createOrNew([
            'instagram_id'=>$instagram->id,
            ]);
        
        return redirect('/my-dashboard')->with('success', 'Instagram account connected successfully!');
    }


    //   public function getFollowerCount(string $igUserId, string $token): int
    // {
    //     $api_version = 'v20.0'; 
    //     $url = "https://graph.facebook.com/{$api_version}/{$igUserId}";
    
    //     $params = [
    //         // The follower_count field is accessible for Business/Creator accounts.
    //         'fields' => 'followers_count', 
    //         'access_token' => $token,
    //     ];
    
    //     try {
    //         $response = Http::get($url, $params);
    
    //         if ($response->failed()) {
    //             throw new Exception('Failed to get follower count: ' . $response->body());
    //         }
    
    //         $data = $response->json();
    //         return $data['followers_count'] ?? 0;
    
    //     } catch (Exception $e) {
    //         \Log::error('Follower Count Retrieval Failed: ' . $e->getMessage());
    //         throw $e; // Re-throw the exception
    //     }
    // }
public function disconnect()
    {
        $user = Auth::user();

        if ($user->isInstagramConnected()) {
            $user->instagramCredential()->delete();
            return redirect()->route('instagram.settings')->with('success', 'Instagram account successfully disconnected.');
        }

        return redirect()->route('instagram.settings');
    }
}