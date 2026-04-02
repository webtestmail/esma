<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscribers;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewsletterWelcome;

class NewsletterController extends Controller
{
    public function subscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:subscribers,email'
        ]);

        // Save using model
        $subscriber = Subscribers::create([
            'email' => $request->email
        ]);

        // Send email
        Mail::to($subscriber->email)->send(new NewsletterWelcome($subscriber->email));

        return response()->json([
            'message' => '🎉 Subscribed successfully! Check your email.'
        ]);
    }
}
