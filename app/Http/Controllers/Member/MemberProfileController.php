<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserProfile;
use Illuminate\Support\Str;
use App\Models\CompanyLink;
use App\Models\MemberCompanyContact;

class MemberProfileController extends Controller
{
    public function contact_details_store(Request $request){
        try {
            $user_id = auth()->id();
            $data = $request->all();

            foreach ($data as $key => $value) {
       
            if (strpos($key, 'extra_address_') === 0) {
                $id = str_replace('extra_address_', '', $key);

                MemberCompanyContact::create([
                    'user_id'         => $user_id,
                    'main_address'    => $value, // The address string
                    'google_map_link' => $data["extra_map_{$id}"] ?? null,
                    'country'         => $data["extra_country_{$id}"] ?? null,
                    'is_active'       => 1,
                ]);
            }
            }

            return response()->json([
                'success' => true, 
                'message' => 'Contact details updated successfully'
            ]);

        
        } catch (\Exception $e) {
            \Log::error("Contact Details Update Error: " . $e->getMessage());

            return response()->json([
                'success' => false, 
                'message' => 'An error occurred while updating contact details'
            ], 500);
        }
    }
    public function product_category_store(Request $request)
    {
        // 1. Validation
        $request->validate([
            'trade' => 'required|array|min:1',
            'product_category' => 'required|array|min:1',
            'temperature' => 'required|array|min:1',
            'brands' => 'required|array|min:1',
        ]);

        try {
            
            $user = auth()->user(); 

            $user->tradeSectors()->sync($request->trade);
            $user->productCategories()->sync($request->product_category);
            $user->temperatures()->sync($request->temperature);
            $user->brands()->sync($request->brands);

            // 3. Handle the Brands (comma separated string)
            $user->update([
                'highlight_brands' => $request->brands 
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Data saved successfully!'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }
   public function company_detail_update(Request $request) {
    try {
        $validated = $request->validate([
            'company_name'       => 'required|string|max:255',
            'slogan'             => 'nullable|string|max:255',
            'organization_type'  => 'required|string|max:255',
            'employee_count' => 'required|integer',
            'company_description'=> 'nullable|string',
        ]);

        $user = Auth::user();

        // Using updateOrCreate to find the record or create it if it doesn't exist
        $user->userprofile()->updateOrCreate(
            ['user_id' => $user->id], 
            [
                'company_name'        => $validated['company_name'],
                'slug'                => \Str::slug($validated['company_name']) . '-' . uniqid(),
                'slogan'              => $validated['slogan'],
                'company_type'        => $validated['organization_type'],
                'number_of_employees' => $validated['employee_count'],
                'company_description' => $validated['company_description'],
            ]
        );

        return response()->json([
            'success' => true, 
            'message' => 'Company details updated successfully'
        ]);

    } catch (\Exception $e) {
        // Log the error so you can actually debug it!
        \Log::error("Company Update Error: " . $e->getMessage());

        return response()->json([
            'success' => false, 
            'message' => 'An error occurred while updating company details'
        ], 500);
    }
   }
   public function social_links_store(Request $request){
    try {
        $validated = $request->validate([
            'twitter_urls' => 'nullable|url',
            'instagram_url' => 'nullable|url',
            'youtube_url' => 'nullable|url',
            'pinterest_url' => 'nullable|url',
            'linkedin_url' => 'nullable|url',
            'facebook_url' => 'nullable|url',
            'website_url' => 'nullable|url',
            'whatsapp_url_or_number' => 'nullable|string|max:255',
        ]);

        $user = Auth::user();

        CompanyLink::updateOrCreate(
            ['user_id' => $user->id], 
            [
                'website_url'=> $validated['website_url'] ?? null,
                'twitter_url' => $validated['twitter_urls'] ?? null,
                'instagram_url' => $validated['instagram_url'] ?? null,
                'youtube_url' => $validated['youtube_url'] ?? null,
                'pinterest_url' => $validated['pinterest_url'] ?? null,
                'linkedin_url' => $validated['linkedin_url'] ?? null,
                'facebook_url' => $validated['facebook_url'] ?? null,
                'whatsapp_url_or_number' => $validated['whatsapp_url_or_number'] ?? null,
            ]
        );

        return response()->json([
            'success' => true, 
            'message' => 'Social links updated successfully'
        ]);

    } catch (\Exception $e) {
        // Log the error so you can actually debug it!
        \Log::error("Social Links Update Error: " . $e->getMessage());

        return response()->json([
            'success' => false, 
            'message' => 'An error occurred while updating social links'
        ], 500);
    }
   }
}
