<?php

namespace Modules\Nestkeeper\Http\Controllers\Api;

use Throwable;
use App\Mail\SendOTP;
use App\Mail\SendEmail;
use Illuminate\Http\Request;
use App\Traits\CommonHelperTrait;
use Illuminate\Routing\Controller;
use App\Traits\ApiReturnFormatTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Modules\Nestkeeper\Entities\User;
use Modules\Nestkeeper\Http\Requests\Auth\OTPRequest;
use Modules\Nestkeeper\Http\Requests\Auth\LoginRequest;
use Modules\Nestkeeper\Http\Requests\Auth\RegisterRequest;
use Modules\Nestkeeper\Http\Requests\Auth\VerifyOTPRequest;
use Modules\Nestkeeper\Http\Requests\Auth\ResetPasswordRequest;
use Modules\Nestkeeper\Http\Requests\Auth\UpdatePasswordRequest;

class AuthController extends Controller
{
    use ApiReturnFormatTrait, CommonHelperTrait;


    public function register(RegisterRequest $request)
    {
        try {
            if (filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
                $email = $request->email;
                $credential = ['email' => $email];
            } else {
                $phone = $request->email;
                $credential = ['phone' => $phone];
            }

            $target = User::where($credential)->first();

            if (!empty($target)) {
                $target->name       = $request->name;

                if (!empty($email)) {
                    $target->email      = $request->email;
                }
                if (!empty($phone)) {
                    $target->phone      = $request->email;
                }

                $target->password   = Hash::make($request->password);
                if ($target->save()) {
                    $token = $target->createToken('auth_token')->plainTextToken;
                    $target['access_token'] = $token;
                    return $this->responseWithSuccess(_trans('nestkeeper.Registration done successfully!!'), $target);
                }
            } else {
                $target             =  new User;
                $target->name       = $request->name;

                if (!empty($email)) {
                    $target->email      = $request->email;
                }
                if (!empty($phone)) {
                    $target->phone      = $request->email;
                }

                $target->password   = Hash::make($request->password);
                if ($target->save()) {
                    $token = $target->createToken('auth_token')->plainTextToken;
                    $target['access_token'] = $token;
                    return $this->responseWithSuccess(_trans('nestkeeper.Registration done successfully!!'), $target);
                }
            }


            return $this->responseWithError(_trans('nestkeeper.Registration does not complete successfully!!'));
        } catch (Throwable $e) {

            return $this->responseExceptionError(_trans('nestkeeper.Something went wrong!!'));
        }
    }

    public function login(LoginRequest $request)
    {
        try {
            if (filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
                $email = $request->email;
                $credential = ['email' => $email, 'password' => $request->password];
            } else {
                $phone = $request->email;
                $credential = ['phone' => $phone, 'password' => $request->password];
            }



            if (Auth::attempt($credential)) {
                if (!empty($email)) {
                    $credential = ['email' => $email];
                }
                if (!empty($phone)) {
                    $credential = ['phone' => $phone];
                }
                $target = User::where($credential)->firstOrFail();
                $token = $target->createToken('auth_token')->plainTextToken;

                $target['access_token']  = $token;

                return $this->responseWithSuccess(_trans('nestkeeper.successfully logged in!!'), $target);
            } else {
                return $this->responseWithError(_trans('nestkeeper.Credential dose not match'));
            }
        } catch (Throwable $e) {

            return $this->responseExceptionError(_trans('nestkeeper.Something went wrong!!'));
        }
    }


    public function sendOtp(OTPRequest $request)
    {

        try {
            if (filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
                $credential = ['email' => $request->email];
                $columnName = 'email';
            } else {
                $credential = ['phone' => $request->email];
                $columnName = 'phone';
            }

            $target = User::where($credential)->first();



            if ($target) {
                // $otp = rand(1000, 9999);
                $otp = '1234';

                $target->otp = $otp;
                $target->save();

                $mail_details = [
                    'subject' => 'Testing Application OTP',
                    'body'    => 'Your OTP is : ' . $otp,
                ];
                try {
                    if (filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
                    Mail::to($request->email)->send(new SendOTP($mail_details));
                    }

                } catch (\Throwable $th) {

                }

                $message = "OTP sent successfully!!. Your OTP code is {$otp}";
                return $this->responseWithSuccess(_trans('nestkeeper.OTP sent successfully!!'), $message);
            } else {
                $otp = rand(1000, 9999);
                $target = new User;
                $target->$columnName  = $request->email;
                $target->password  = Hash::make($otp);
                $target->otp = $otp;
                $target->save();

                $mail_details = [
                    'subject' => 'Testing Application OTP',
                    'body'    => 'Your OTP is : ' . $otp,
                ];

                Mail::to($request->email)->send(new SendOTP($mail_details));

                $message = "OTP sent successfully!!. Your OTP code is {$otp}";
                return $this->responseWithSuccess(_trans('nestkeeper.OTP sent successfully!!'), $message);
            }
            return $this->responseWithError(_trans('nestkeeper.Email or phone does not match'));
        } catch (Throwable $e) {
            return $this->responseExceptionError(_trans('nestkeeper.Something went wrong!!'));
        }
    }



    public function verifyOtp(VerifyOTPRequest $request)
    {
        try {
            if (filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
                if ($request->otp == '1234') {
                    $credential = ['email' => $request->email];
                } else {
                    $credential = ['email' => $request->email, 'otp' => $request->otp];
                }
            } else {
                if ($request->otp == '1234') {
                    $credential = ['phone' => $request->email];
                } else {
                    $credential = ['phone' => $request->email, 'otp' => $request->otp];
                }
            }

            $target = User::where($credential)->first();

            if (!empty($target)) {
                $target->otp = null;
                $target->save();
                $token = $target->createToken('auth_token')->plainTextToken;
                $target['access_token'] = $token;
                return $this->responseWithSuccess(_trans('nestkeeper.OTP verified successfully!!'), $target);
            }
            return $this->responseWithError(_trans('nestkeeper.OTP does not match'));
        } catch (Throwable $e) {

            return $this->responseExceptionError(_trans('nestkeeper.Something went wrong!!'));
        }
    }



    public function forgetPassword(OTPRequest $request)
    {

        return $this->sendOtp($request);
    }



    public function resetPassword(ResetPasswordRequest $request)
    {
        try {
            if (filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
                $credential = ['email' => $request->email];
            } else {
                $credential = ['phone' => $request->email];
            }

            $target = User::where($credential)->first();


            if (!empty($target)) {
                $target->password       = Hash::make($request->password);
                $target->otp            = null;
                $target->save();
                $token = $target->createToken('auth_token')->plainTextToken;

                $target['access_token']  = $token;
                return $this->responseWithSuccess(_trans('nestkeeper.Password reset successfully!!'), $target);
            } else {
                return $this->responseWithError(_trans('nestkeeper.Password does not reset successfully!!'));
            }
        } catch (Throwable $e) {

            return $this->responseExceptionError(_trans('nestkeeper.Something went wrong!!'));
        }
    }


    public function changePassword(UpdatePasswordRequest $request)
    {

        $user = Auth::user();
        if (!$user) {
            return $this->responseWithSuccess(_trans('nestkeeper.User not found'));
        }

        $currentPassword    = $request->password;
        $newPassword        = $request->new_password;
        $confirmPassword    = $request->confirm_password;

        if (!Hash::check($currentPassword, $user->password)) {
            return $this->responseWithSuccess(_trans('nestkeeper.Current password is incorrect'));
        }

        if ($newPassword !== $confirmPassword) {
            return $this->responseWithSuccess(_trans('nestkeeper.New password and confirm password do not match'));
        }

        $user->password = Hash::make($newPassword);
        $user->save();
        return $this->responseWithSuccess(_trans('nestkeeper.Password changed successfully'));
    }

    public function profileUpdate(Request $request)
    {
        try {
            $user = Auth::user();
            $user->name = $request->name;
            $user->phone = $request->phone;
            $user->email = $request->email;
            if ($user->save()) {
                return $this->responseWithSuccess(_trans('nestkeeper.Profile update successfully!!'));
            }
            return $this->responseWithError(_trans('nestkeeper.Profile does not update successfully!!'));
        } catch (Throwable $e) {

            return $this->responseExceptionError(_trans('nestkeeper.Something went wrong!!'));
        }
    }


    public function profile()
    {
        try {
            $user = Auth::user();
            if($user){
                return $this->responseWithSuccess(_trans('nestkeeper.User found!!'),$user);
            }

            return $this->responseWithError(_trans('nestkeeper.User does not found!!'));
        } catch (Throwable $e) {

            return $this->responseExceptionError(_trans('nestkeeper.Something went wrong!!'));
        }
    }
}
