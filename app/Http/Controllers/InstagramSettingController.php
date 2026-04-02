<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InstagramSettings;

class InstagramSettingController extends Controller
{
    
        public function settings_instagram_update(Request $request)
    {
         $request->validate([
                'key' => 'required|string',
                'value' => 'required', 
                'instagramId' => 'required' 
            ]);
    
       $attributes = [
        $request->key => $request->value
       ];
    
        InstagramSettings::updateOrCreate(
            ['instagram_id' => $request->instagramId],
            $attributes                            
        );
    
        return response()->json(['message' => 'Updated!']);
    }
}
