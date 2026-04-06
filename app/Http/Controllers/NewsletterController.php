<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscribers;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewsletterWelcome;
use Illuminate\Support\Facades\Validator;

class NewsletterController extends Controller
{
  public function subscribe(Request $request)
    {
        // ✅ AJAX-friendly validation
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:subscribers,email'
        ], [
            'email.required' => 'Email is required.',
            'email.email' => 'Please enter a valid email.',
            'email.unique' => 'This email is already subscribed!',
            'email.max' => 'Email is too long.'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $subscriber = Subscribers::create([
                'email' => $request->email
            ]);

            Mail::to($subscriber->email)->send(new NewsletterWelcome($subscriber->email));

        } catch (Exception $e) {

            return response()->json([
                'message' => '🎉 Successfully subscribed!'
            ]);
        }

        return response()->json([
            'message' => '🎉 Subscribed successfully! Check your email.'
        ]);
    }
}
