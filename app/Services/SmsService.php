<?php

namespace App\Services;

use Twilio\Rest\Client;
use Illuminate\Support\Facades\Cache;

class SmsService
{
    protected $twilio;
    protected $fromNumber;

    public function __construct()
    {
        $sid = env('TWILIO_SID');
        $token = env('TWILIO_AUTH_TOKEN');
        $this->fromNumber = env('TWILIO_PHONE_NUMBER');

        // Check credentials before initializing Twilio client
        if ($sid && $token) {
            $this->twilio = new Client($sid, $token);
        }
    }

    /**
     * Generates a code, stores it, and sends it via SMS.
     * @param string $to The recipient phone number.
     * @param \App\Models\User $user The user model instance.
     * @return bool
     */
    public function sendCode(string $to, $user): bool
    {
        // Generate a 6-digit code
        $otp = random_int(100000, 999999);
        
        // Use the user's ID as the cache key to store the code for 10 minutes
        Cache::put('otp_' . $user->id, $otp, now()->addMinutes(10));

        $message = "Your verification code is: {$otp}. It expires in 10 minutes.";

        try {
            if ($this->twilio) {
                $this->twilio->messages->create(
                    $to,
                    ['from' => $this->fromNumber, 'body' => $message]
                );
                return true;
            }
            // If Twilio client isn't configured, log a message (e.g., for local testing)
            \Log::warning("SMS service not configured. Code [{$otp}] for user ID [{$user->id}] was not sent.");
            return false;
        } catch (\Exception $e) {
            \Log::error("Twilio SMS failed: " . $e->getMessage());
            return false;
        }
    }

    /**
     * Checks if the provided code matches the stored code.
     * @param \App\Models\User $user The user model instance.
     * @param string $code The code submitted by the user.
     * @return bool
     */
    public function checkCode($user, string $code): bool
    {
        $storedCode = Cache::get('otp_' . $user->id);
        
        return $storedCode && $storedCode == $code;
    }

    /**
     * Removes the stored code after successful verification.
     * @param \App\Models\User $user The user model instance.
     */
    public function clearCode($user): void
    {
        Cache::forget('otp_' . $user->id);
    }
}