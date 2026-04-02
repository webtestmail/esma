<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notifaction;
use Illuminate\Support\Facades\Auth;

class NotificationSettingsController extends Controller
{
    public function settings_notification_update(Request $request)
    {
         $request->validate([
                'key' => 'required|string',
                'value' => 'required', 
              
            ]);
    
       $attributes = [
        $request->key => $request->value
       ];
    
        Notifaction::updateOrCreate(
            ['user_id' => Auth::id()],
            $attributes                            
        );
    
        return response()->json(['message' => 'Updated!']);
    }
}
