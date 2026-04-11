<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use App\Mail\ContactMail;
use App\Mail\ContactVerificationMail;
use Illuminate\Support\Facades\Cache;
use App\Models\Contact;

class ContactController extends Controller
{
    public function sendVerification(Request $request)
    {
     $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'subject' => 'nullable|string|max:255',
        'message' => 'required|string',
        'terms' => 'required|accepted',
        'newsletter' => 'nullable|accepted',
    ], [
        'name.required' => 'Name is required.',
        'email.required' => 'Email is required.',
        'email.email' => 'Valid email is required.',
        'message.required' => 'Message is required.',
        'terms.required' => 'Please agree to the terms and conditions.',
        'terms.accepted' => 'You must accept the terms.',
    ]);

    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 422);
    }

    $token = Str::uuid()->toString();
    $data = $request->only(['name', 'email', 'subject', 'message', 'terms', 'newsletter']);
    $data['verify_token'] = $token;

    Cache::put('contact_verify_' . $token, $data, now()->addMinutes(30));

    Mail::to($request->email)->send(new ContactVerificationMail($token));

    return response()->json(['success' => 'Verification email sent. Check your inbox.']);
    }


   
   
    public function submit(Request $request)
{
   $request->validate([
    'name' => 'required',
    'email' => 'required',
   ]);

   $data = [
    'name' => $request->name,
    'email' => $request->email,
    'subject' => $request->subject,
    'message' => $request->message,
   ];

    Contact::create($data);  // Save to DB

    // Send admin notification
   Mail::to('webtestmail736@gmail.com')  // Replace with your email
    ->send(new ContactMail($data));


    return response()->json(['success' => 'Form submitted successfully! Thank you.']);
}

}