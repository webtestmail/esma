<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserProfile;
use Illuminate\Support\Str;

class MemberProfileController extends Controller
{
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
}
