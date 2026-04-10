<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserProfile;
use Illuminate\Support\Str;
use App\Models\CompanyLink;
use App\Models\PointOfContact;
use App\Models\MemberCompanyContact;
use DB;

class MemberProfileController extends Controller
{
    public function store_point_of_contact(Request $request) {
    try {
        $user_id = auth()->id();

        return \DB::transaction(function () use ($request, $user_id) {
            
            // 1. Handle Main Contact (is_primary = 1)
            $mainContact = PointOfContact::updateOrCreate(
                ['user_id' => $user_id, 'is_primary' => 1],
                [
                    'contact_name'     => $request->contact_name,
                    'contact_surname'  => $request->contact_surname,
                    'contact_position' => $request->contact_position,
                    'contact_gender'   => $request->contact_gender,
                    'contact_email'    => $request->contact_email,
                    'contact_phone'    => $request->contact_phone,
                    ''
                ]
            );

            if ($request->hasFile('main_contact_image')) {
                $path = $request->file('main_contact_image')->store('contacts', 'public');
                $mainContact->update(['image' => $path]);

            }

            PointOfContact::where('user_id', $user_id)->where('is_primary', 0)->delete();

            if ($request->has('extra_names')) {
                foreach ($request->extra_names as $key => $name) {
                    if (!empty($name)) {
                        $contact = PointOfContact::create([
                            'user_id'    => $user_id,
                            'is_primary' => 0,
                            'contact_name'       => $name,
                            'contact_surname'    => $request->extra_surnames[$key] ?? null,
                            'contact_position'   => $request->extra_positions[$key] ?? null,
                            'contact_email'      => $request->extra_emails[$key] ?? null,
                            "contact_gender"   => $request->extra_genders[$key] ?? null,
                            'contact_phone'     => $request->extra_phones[$key] ?? null,
                            'is_active'        => 1,
                        ]);

                        // Handle individual file uploads for extra contacts
                        if ($request->hasFile("extra_images.$key")) {
                            $path = $request->file("extra_images.$key")->store('contacts', 'public');
                            $contact->update(['image' => $path]);
                        }
                    }
                }
            }

            return response()->json(['success' => true]);
        });
    } catch (\Exception $e) {
        return response()->json(['success' => false, 'error' => $e->getMessage()], 500);
    }
}
   public function contact_details_store(Request $request) {
    try {
        $user_id = auth()->id();

        return \DB::transaction(function () use ($request, $user_id) {
            
            MemberCompanyContact::updateOrCreate(
                ['user_id' => $user_id, 'is_main' => 1], 
                [
                    'main_address'    => $request->main_address,
                    'google_map_link' => $request->map_url,
                    'country'         => $request->country,
                    'is_active'       => 1,
                ]
            );

            // 2. Remove old EXTRA addresses before adding new ones
            // This prevents duplicate rows every time the user saves
            MemberCompanyContact::where('user_id', $user_id)
                                ->where('is_main', 0)
                                ->delete();

            // 3. Handle Extra Addresses from the arrays
            if ($request->has('extra_addresses')) {
                foreach ($request->extra_addresses as $index => $address) {
                    if (!empty($address)) {
                        MemberCompanyContact::create([
                            'user_id'         => $user_id,
                            'main_address'    => $address,
                            'google_map_link' => $request->extra_map_urls[$index] ?? null,
                            'country'         => $request->extra_countries[$index] ?? null,
                            'is_active'       => 1,
                            'is_main'         => 0, // Mark as extra
                        ]);
                    }
                }
            }

            return response()->json([
                'success' => true, 
                'message' => 'Contact details updated successfully'
            ]);
        });

    } catch (\Exception $e) {
        \Log::error("Contact Details Update Error: " . $e->getMessage());
        return response()->json([
            'success' => false, 
            'message' => 'An error occurred: ' . $e->getMessage()
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
