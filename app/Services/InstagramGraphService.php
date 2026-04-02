<?php
namespace App\Services;

use Illuminate\Support\Facades\Http;
use Exception;

class InstagramGraphService
{
    private $clientId;
    private $clientSecret;
    private $redirectUri;
    private $graphUrl = 'https://graph.facebook.com/v20.0/';

    public function __construct()
    {
        $this->clientId = config('services.instagram.client_id');
        $this->clientSecret = config('services.instagram.client_secret');
        $this->redirectUri = config('services.instagram.redirect_uri');
    }
    public function exchangeCodeForToken(string $code)
    {
        return Http::get($this->graphUrl . 'oauth/access_token', [
            'client_id' => $this->clientId,
            'client_secret' => $this->clientSecret,
            'redirect_uri' => $this->redirectUri,
            'code' => $code,
        ])->json();
    }

    public function exchangeShortForLongToken(string $shortLivedToken): array
    {
        // \Log::info("Short-Lived Token to Exchange: " . $shortLivedToken);

        $cleanToken = trim($shortLivedToken);
        
       $api_version = 'v20.0'; // Check your App Dashboard for the current version
       $url = "https://graph.facebook.com/{$api_version}/oauth/access_token";
        
        $params = [
            'grant_type' => 'fb_exchange_token', //ig_exchange_token
            'client_secret' => env('INSTAGRAM_CLIENT_SECRET'),
            'client_id' => env('INSTAGRAM_CLIENT_ID'),
            'fb_exchange_token' => $cleanToken,
        ];

        try {
            // Note: The client_secret is included, so this must be a server-side call.
            $response = Http::get($url, $params);

            if ($response->failed()) {
                throw new Exception('Instagram API Error during long-lived token exchange: ' . $response->body());
            }

            // 4. Return the successful response data (includes 'access_token' and 'expires_in').
            return $response->json();

        } catch (Exception $e) {
          
            \Log::error('Instagram Token Exchange Failed: ' . $e->getMessage());
            
            throw new Exception("Token exchange failed: " . $e->getMessage());
        }
    }

    public function getAccountInfo(string $longLivedToken): array
    {
        $api_version = 'v24.0'; // Use the confirmed API version
        
        $url = "https://graph.facebook.com/{$api_version}/me/accounts";
    
        try {
            $pageResponse = Http::get($url, [
                'access_token' => $longLivedToken,
            ]);
    
            if ($pageResponse->failed()) {
                throw new Exception('Failed to get user pages: ' . $pageResponse->body());
            }
    
            $pages = $pageResponse->json()['data'] ?? [];
            if (empty($pages)) {
                throw new Exception('User does not manage any Facebook Pages, or permissions are missing (pages_show_list).');
            }
        
            // --- Step 2: Loop through Pages to find the linked Instagram Account ---
            foreach ($pages as $page) {
                $pageId = $page['id'];
                
                // Request the 'instagram_business_account' field from the Page ID.
                $ig_fields = 'instagram_business_account{id,username}';
    
                $igResponse = Http::get("https://graph.facebook.com/{$api_version}/{$pageId}", [
                    'fields' => $ig_fields,
                    'access_token' => $longLivedToken,
                ]);
                
                // Check if the page has a linked Instagram Business Account
                if ($igResponse->successful() && isset($igResponse->json()['instagram_business_account'])) {
                    $igAccount = $igResponse->json()['instagram_business_account'];
                    
                    // Success! Return the data from the first linked account found.
                    return [
                        'id' => $igAccount['id'],          // <-- THIS is the CORRECT Instagram Business Account ID
                        'username' => $igAccount['username'],
                        'page_id' => $pageId,
                    ];
                }
                // If the response failed or didn't contain the IG account, continue to the next page
            }
        
            throw new Exception('No linked Instagram Business/Creator Account found among managed pages. Ensure the IG account is correctly linked to a Facebook Page.');
            
        } catch (Exception $e) {
            \Log::error('Instagram Account Discovery Failed: ' . $e->getMessage());
            throw $e;
        }
    }
    
    
  

    // //for schedule use and cound followers
    public function getFollowerCount(string $igUserId, string $token): int
    {
        $api_version = 'v24.0'; // Use the confirmed API version
        $url = "https://graph.facebook.com/{$api_version}/{$igUserId}";
    
        $params = [
            // The follower_count field is accessible for Business/Creator accounts.
            'fields' => 'followers_count', 
            'access_token' => $token,
        ];
    
        try {
            $response = Http::get($url, $params);
    
            if ($response->failed()) {
                throw new Exception('Failed to get follower count: ' . $response->body());
            }
    
            $data = $response->json();
            return $data['followers_count'] ?? 0;
    
        } catch (Exception $e) {
            \Log::error('Follower Count Retrieval Failed: ' . $e->getMessage());
            throw $e;
        }
    }
 
    public function getMediaCount(string $igUserId, string $token): int
    {
        $api_version = 'v24.0'; // Use the confirmed version
        $url = "https://graph.facebook.com/{$api_version}/{$igUserId}";
    
        $params = [
            // The media_count field is accessible directly on the IG User node.
            'fields' => 'media_count', 
            'access_token' => $token,
        ];
    
        try {
            $response = Http::get($url, $params);
    
            if ($response->failed()) {
                throw new Exception('Failed to get media count: ' . $response->body());
            }
    
            $data = $response->json();
            return $data['media_count'] ?? 0;
    
        } catch (Exception $e) {
            \Log::error('Media Count Retrieval Failed: ' . $e->getMessage());
            throw $e;
        }
    }
    // public function getEngagementData(string $igUserId, string $token, int $followerCount): array
    // {
    //     $api_version = 'v24.0'; // Use the confirmed API version
    //     $totalInteractions = 0;
    //     $postsProcessed = 0;
    
    //     // --- Step A: Get Recent Media (Posts) ---
    //     $mediaUrl = "https://graph.facebook.com/{$api_version}/{$igUserId}/media";
    //     $mediaResponse = Http::get($mediaUrl, [
    //         'access_token' => $token,
    //         'fields' => 'id,media_type,like_count,comments_count',
    //         'limit' => 20, // Check last 20 posts
    //     ]);
    
    //     if ($mediaResponse->failed()) {
    //         throw new Exception('Failed to get recent media: ' . $mediaResponse->body());
    //     }
    
    //     $mediaData = $mediaResponse->json()['data'] ?? [];
    
    //     // --- Step B: Calculate Interactions ---
    //     foreach ($mediaData as $post) {
    //         $likes = $post['like_count'] ?? 0;
    //         $comments = $post['comments_count'] ?? 0;
            
    //         // Sum interactions (Likes + Comments)
    //         $totalInteractions += ($likes + $comments);
    //         $postsProcessed++;
    //     }
    
    //     if ($postsProcessed === 0 || $followerCount === 0) {
    //         return ['total_interactions_last_20_posts' => 0, 'engagement_rate' => 0];
    //     }
    
    //     // 1. Calculate Average Interactions per Post
    //     $averageInteractions = $totalInteractions / $postsProcessed;
        
    //     // 2. Calculate Engagement Rate
    //     $engagementRate = ($averageInteractions / $followerCount) * 100;
        
    //     return [
    //         'total_interactions_last_20_posts' => $totalInteractions, 
    //         'engagement_rate' => round($engagementRate, 2) // e.g., 4.25
    //     ];
    // }
}