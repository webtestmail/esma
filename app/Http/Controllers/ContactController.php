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