<?php

namespace Modules\BilnetPropertyOwnerForm\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Modules\BilnetPropertyOwnerForm\Entities\OtpVerification;
use Modules\BilnetPropertyOwnerForm\Services\OTPService;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\DB;

class OTPController extends Controller
{
    protected $otpService;

    public function __construct(OTPService $otpService)
    {
        $this->otpService = $otpService;
    }

    public function sendOTP(Request $request)
    {
        // Validate the request and ensure JSON response for validation errors
        $request->validate([
            'identifier' => 'required',
            'type' => 'required|in:phone,email',
        ]);

        $otp = rand(100000, 999999); // Generate a 6-digit OTP

        try {
            // Check if the record exists
            $otpRecord = OtpVerification::where('identifier', $request->identifier)
                ->where('type', $request->type)
                ->first();

            if ($otpRecord) {
                // If verified_at is not null, return a message indicating already verified
                if ($otpRecord->verified_at !== null) {
                    return response()->json([
                        'success' => false,
                        'message' => ucfirst($request->type) . ' has already been verified.',
                    ], 400);
                }

                // Update the existing record with a new OTP and reset verified_at
                $otpRecord->update([
                    'otp' => $otp,
                    'verified_at' => null,
                ]);
            } else {
                // Create a new OTP record
                OtpVerification::create([
                    'identifier' => $request->identifier,
                    'type' => $request->type,
                    'otp' => $otp,
                ]);
            }

            // Send OTP based on the type (phone or email)
            if (App::environment('production')) {
                if ($request->type === 'phone') {
                    $body = trim(setting('default_reply_for_request') . ' ' . $otp . ' ' . setting('otp_request_default_content_start'));
                    $this->otpService->sendSMS($request->identifier, $body);
                } elseif ($request->type === 'email') {
                    $this->otpService->sendEmail($request->identifier, $otp);
                }
            }

            return response()->json([
                'success' => true,
                'message' => 'OTP sent successfully!',
                // Remove 'otp' from response in production for security reasons
                'otp' => $otp, // Include this only for testing or debugging
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to send OTP.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function verifyOTP(Request $request)
    {
        DB::beginTransaction();

        try {
            // Get identifier, otp, and field from the request
            $identifier = $request->input('identifier');
            $otp = $request->input('otp');
            $field = $request->input('field');


            $validationResult = $this->otpService->validateOtp($identifier, $otp, $field);

            // If validation fails, return the errors with status code
            if ($validationResult) {
                return Response::json([
                    'success' => false,
                    'message' => 'OTP verification failed.',
                    'errors' => $validationResult['errors'],
                ], $validationResult['statusCode']);
            }

            DB::commit();

            return Response::json([
                'success' => true,
                'message' => 'OTP verified successfully.',
                'data' => [
                    'identifier' => $identifier,
                ],
            ], 202);
        } catch (\Exception $e) {
            DB::rollBack();

            return Response::json([
                'success' => false,
                'message' => 'An error occurred while verifying the OTP.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
