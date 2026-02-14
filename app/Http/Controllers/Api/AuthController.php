<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\EmailVerification;
use App\Mail\SendEmail;
use App\Models\User;
use App\Traits\ApiReturnFormatTrait;
use App\Traits\CommonHelperTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Throwable;

class AuthController extends Controller
{
    use ApiReturnFormatTrait, CommonHelperTrait;

    public function notLogined()
    {
        return response()->json([
            'result' => false,
            'api_end_point' => \request()->url(),
            'message' => 'Unauthenticated. Please login first',
            'error' => 'Token invalid or expired',
        ], 401);
    }

    public function register(Request $request)
    {
        $data = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:8',
            'type' => 'required',
        ]);

        if ($data->fails()) {
            return response()->json([
                'errors' => $data->errors(),
            ], 422);
        }


        $user = User::create([
            'role_id' => $request->type == "landlord" ? 4 : 5,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;
        $user->token = $token;
        $user->save();

        try {
            if (env('EMAIL_VERIFIED')) {
                $user->email_verified_at = now();
                $user->save();
            } else {
                Mail::to($user->email)->send(new EmailVerification($user));
                Log::info("mail send to user " . $user->email);
            }
        } catch (\Throwable$th) {
            Log::error($th);
        }

        $verified = false;
        if ($user->email_verified_at != null) {
            $verified = true;
        }

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'phone' => $user->phone,
            "occupation" => $user->occupation,
            "designation" => @$user->designation->title,
            "institution" => $user->institution,
            "nid" => $user->nid,
            "date_of_birth" => $user->date_of_birth,
            "passport" => $user->passport,
            "gender" => $user->gender,
            'role_id' => $user->role_id,
            'avatar' => @apiAssetPath($user->image->path),
            'is_verified' => $verified
        ], 200);
    }

    public function login(Request $request)
    {
        $data = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ]);

        if ($data->fails()) {
            return response()->json([
                'errors' => $data->errors(),
            ], 422);
        }

        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'message' => 'Invalid login details',
            ], 401);
        }

        $user = User::where('email', $request['email'])->firstOrFail();
        $token = $user->createToken('auth_token')->plainTextToken;

        $verified = false;

        if ($user->email_verified_at != null) {
            $verified = true;
        }

        if(!env('EMAIL_VERIFIED')){
            $verified = true;
        }

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'phone' => $user->phone,
            "occupation" => $user->occupation,
            "designation" => @$user->designation->title,
            "institution" => $user->institution,
            "nid" => $user->nid,
            "date_of_birth" => $user->date_of_birth,
            "passport" => $user->passport,
            "gender" => $user->gender,
            'role_id' => $user->role_id,
            'avatar' => @apiAssetPath($user->image->path),
            'is_verified' => $verified
        ], 200);
    }

    public function user(Request $request)
    {
        try {
            $user = User::where('id', Auth::user()->id)->first();
            $data['profile_info'] = [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'phone' => $user->phone,
                "occupation" => $user->occupation,
                "designation" => @$user->designation->title,
                "institution" => $user->institution,
                "nid" => $user->nid,
                "date_of_birth" => $user->date_of_birth,
                "passport" => $user->passport,
                "gender" => $user->gender,
                'role_id' => $user->role_id,
                'avatar' => @apiAssetPath($user->image->path),
            ];

            return $this->successResponse('Profile Details', $data, 200);
        } catch (\Exception $th) {
            return $this->errorResponse($th->getMessage(), true, 200);
        }
    }


    public function requestOtp(Request $request)
    {
        $data = Validator::make($request->all(), [
            'email' => 'required|max:255',
        ]);

        if ($data->fails()) {
            return $this->responseWithError('Request validation failed', $data->errors(), 422);
        }

        try {
            $otp = rand(100000, 999999);

            Log::info("otp = " . $otp);

            $user = User::where('email', $request->email)->firstOrFail();

            if (!$user) {
                return $this->responseWithError('Invalid request. Please check the provided information and try again.');
            }

            $user->otp = $otp;
            $mail_details = [
                'subject' => 'Forget Password OTP',
                'body' => 'Your OTP is : ' . $otp,
                'otp' => $otp,
            ];

            $user->save();

            try {
                Mail::to($request->email)->send(new SendEmail($mail_details));
            } catch (Throwable $e) {
                Log::error($e->getMessage());
            }
            return $this->responseWithSuccess('The OTP has been sent to your email successfully.');

        } catch (\Exception $e) {
            return $this->responseWithError($e->getMessage(), [], 500);
        }
    }

    public function forgetPassword(Request $request)
    {
        $data = Validator::make($request->all(), [
            'email' => 'required|max:255|exists:users,email',
        ], [
            'email.exists' => 'The provided email address does not exist in our records.'
        ]);

        if ($data->fails()) {
            return $this->responseWithError('Request validation failed', $data->errors(), 422);
        }

        try {
            $otp = rand(100000, 999999);
            Log::info("otp = " . $otp);
            $user = User::where('email', $request->email)->first();

            if (!$user) {
                return $this->responseWithError('Invalid request. Please check the provided information and try again.');
            }

            $user->otp = $otp;
            $mail_details = [
                'subject' => 'Forget Password OTP',
                'body' => 'Your OTP is : ' . $otp,
                'otp' => $otp,
            ];

            $user->save();
            try {
                Mail::to($request->email)->send(new SendEmail($mail_details));
            } catch (Throwable $e) {
                Log::error($e->getMessage());
            }
            return $this->responseWithSuccess('The OTP has been sent to your email successfully.');

        } catch (\Exception $e) {
            return $this->responseWithError($e->getMessage(), [], 500);
        }
    }

    public function verifyOtp(Request $request)
    {
        try {
            $data = Validator::make($request->all(), [
                'otp' => 'required|numeric',
            ]);
            if ($data->fails()) {
                return $this->responseWithError('Request validation failed', $data->errors(), 422);
            }

            $user = User::where('otp', $request->otp)->first();

            if (!$user) {
                return $this->responseWithError('The OTP you entered is invalid or has expired.', [], 400);
            }

            auth()->login($user, true);
            $user->otp = null;
            $user->save();

            return $this->responseWithSuccess('Your OTP has been verified successfully');

        } catch (\Exception $e) {
            return $this->responseWithError($e->getMessage(), [], 500);
        }
    }

    public function resetPassword(Request $request)
    {
        $data = Validator::make($request->all(), [
            'email' => 'required|email',
            'current_password' => 'required',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|same:password',
        ]);

        if ($data->fails()) {
            return $this->responseWithError('Request validation failed', $data->errors(), 422);
        }

        try {
            // Check if the email exists and OTP matches
            $user = User::where([
                ['email', '=', $request->email],
            ])->first();

            if (!$user) {
                return $this->responseWithError('Invalid OTP or email address. Please check and try again.', [], 400);
            }

            // Check if current password matches
            if (!Hash::check($request->current_password, $user->password)) {
                return $this->responseWithError('The current password is incorrect. Please try again.', [], 400);
            }

            // Update the user's password and clear OTP
            $user->password = Hash::make($request->password);
            $user->otp = null;
            $user->save();

            return $this->responseWithSuccess('Your password has been reset successfully.');

        } catch (\Exception $e) {
            return $this->responseWithError($e->getMessage(), [], 500);
        }
    }

    public function profileUpdate(Request $request)
    {
        $user = Auth::user();
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        if ($request->has('name') && $request->get('name') != null) {
            $user->name = $request->input('name');
        }
        if ($request->has('email') && $request->get('email') != null) {
            $user->email = $request->input('email');
        }
        if ($request->has('phone') && $request->get('phone') != null) {
            $user->phone = $request->input('phone');
        }
        if ($request->has('date_of_birth') && $request->get('date_of_birth') != null) {
            $user->date_of_birth = $request->input('date_of_birth');
        }
        if ($request->has('nid') && $request->get('nid') != null) {
            $user->nid = $request->input('nid');
        }
        if ($request->has('designation_id') && $request->get('designation_id') != null) {
            $user->designation_id = $request->input('designation_id');
        }
        if ($request->has('occupation') && $request->get('occupation') != null) {
            $user->occupation = $request->input('occupation');
        }
        if ($request->has('join_date') && $request->get('join_date') != null) {
            $user->join_date = $request->input('join_date');
        }
        if ($request->has('passport') && $request->get('passport') != null) {
            $user->passport = $request->input('passport');
        }
        if ($request->has('institution') && $request->get('institution') != null) {
            $user->institution = $request->input('institution');
        }
        if ($request->has('gender') && $request->get('gender') != null) {
            $user->gender = $request->input('gender');
        }
        if ($request->has('image')) {
            $user->image_id = $this->UploadImageUpdate($request->image, 'backend/uploads/profile', $user->image_id);
        }
        $user->save();
        // $token = $user->createToken('auth_token')->plainTextToken;
        $data['messages'] = 'Profile update successfully';
        $response = $this->responseWithSuccess($data['messages'], $data, 200);
        return $response;
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|min:6|confirmed',
        ],
            [
                'password.confirmed' => 'New password and confirm password do not match'
            ]);
        try {
            $user = Auth::user();
            if (!$user) {
                throw new \Exception('User not found', 404);
            }

            $currentPassword = $request->input('current_password');
            $newPassword = $request->input('password');

            if (!Hash::check($currentPassword, $user->password)) {
                throw new \Exception('Current password is incorrect', 200);
            }
            $user->password = Hash::make($newPassword);
            $user->save();
            return $this->responseWithSuccess('Password changed successfully', 200);
        } catch (\Exception $e) {
            return $this->responseWithError($e->getMessage(), $e->getCode());
        }
    }


    public function logout()
    {
        try {
            Auth::user()->tokens()->delete();
            Auth::guard('web')->logout();
            return $this->responseWithSuccess('Logged out successfully', 200);
        } catch (\Exception $e) {
            return $this->responseWithError($e->getMessage(), $e->getCode());
        }
    }
}
