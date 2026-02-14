<?php

namespace Modules\BilnetPropertyOwnerForm\Services;

use Twilio\Rest\Client;
use Illuminate\Support\Facades\Mail;
use Modules\BilnetPropertyOwnerForm\Entities\OtpVerification;

class OTPService
{
    protected $twilio;

    public function __construct()
    {
        $this->twilio = new Client(env('TWILIO_SID'), env('TWILIO_AUTH_TOKEN'));
    }

    public function sendSMS($phoneNumber, $body)
    {
        return $this->twilio->messages->create($phoneNumber, [
            'from' => env('TWILIO_PHONE_NUMBER'),
            'body' => $body,
        ]);
    }

    public function sendEmail($email, $otp)
    {
        $subject = 'Your OTP Code';
        $body = "Your OTP is: $otp";

        Mail::raw($body, function ($message) use ($email, $subject) {
            $message->to($email)
                ->subject($subject)
                ->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
        });
    }


    public function validateOtp($identifier, $otp, $field)
    {
        $errors = new \Illuminate\Support\MessageBag();
        $statusCode = 422; // Default status code for validation errors

        // Check if identifier is verified
        $identifierRecord = OtpVerification::where('identifier', $identifier)->first();

        if (!$identifierRecord) {
            $errors->add($field, ucfirst($field) . ' identifier does not exist.');
        } elseif ($identifierRecord->verified_at) {
            $errors->add($field, ucfirst($field) . ' identifier already verified.');
            $statusCode = 409; // Conflict status code if already verified
        } else {
            // Check if OTP is empty
            if (!$otp) {
                $errors->add($field, ucfirst($field) . ' OTP is required.');
            } else {
                // Check if OTP exists for the identifier
                $otpRecord = OtpVerification::where('identifier', $identifier)->where('otp', $otp)->first();

                if (!$otpRecord) {
                    $errors->add($field, ucfirst($field) . ' OTP does not match.');
                } elseif ($otpRecord->verified_at) {
                    $errors->add($field, ucfirst($field) . ' OTP already verified.');
                    $statusCode = 409; // Conflict status code if OTP is already verified
                } else {
                    // If OTP is valid, mark it as verified
                    $otpRecord->otp = null;
                    $otpRecord->verified_at = now();
                    $otpRecord->save(); // Save OTP verification
                }
            }
        }

        // If there are no errors, return null, otherwise return errors with status code
        return $errors->isEmpty() || $statusCode === 409 ? null : ['statusCode' => $statusCode, 'errors' => $errors];
    }
}
