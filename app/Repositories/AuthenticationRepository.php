<?php

namespace App\Repositories;

use App\Models\Role;
use App\Models\User;
use App\Models\Image;
use App\Mail\ResetPassword;
use Illuminate\Support\Str;
use App\Mail\EmailVerification;
use App\Traits\CommonHelperTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Interfaces\AuthenticationRepositoryInterface;
use App\Models\Organization;

class AuthenticationRepository implements AuthenticationRepositoryInterface
{
    use CommonHelperTrait;

    public function login($request)
    {
        $authenticate = Auth::attempt([
            'email' => data_get($request, 'email'),
            'password' => data_get($request, 'password'),
        ], data_get($request, 'rememberMe') ? true : false);

        if ($authenticate) {
            return true;
        }
        return false;
    }

    public function logout()
    {
        Auth::logout();
        Auth::guard('customer')->logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();
    }

    public function register($request)
    {
        DB::beginTransaction();
        try {
            $user                         = new User();
            $user->name                   = $request->name;
            $user->email                  = $request->email;
            $user->phone                  = $request->phone;
            $user->date_of_birth          = $request->date_of_birth;
            $user->property_owner         = $request->property_owner;
            $user->religion               = $request->religion;
            $user->gender                 = $request->gender;
            $user->marital_status         = $request->marital_status;
            $user->occupation             = $request->occupation;
            $user->present_address        = $request->present_address;
            $user->passport               = $request->passport;
            $user->tin_number             = $request->tin_number;
            $user->social_security_number = $request->social_security_number;
            $user->password               = Hash::make($request->password);
            $user->token                  = Str::random(30);
            $user->role_id                = $request->role_id ? $request->role_id : 5;
            $user->permissions            = [];
            if ($request->has('image')) {
                $user->image_id = $this->UploadImageCreate($request->image, 'backend/uploads/users');
            } else {
                $image =Image::create(['path' => 'frontend/img/default-image.jpeg']);
                $user->image_id = $image->id;
            }

            if ($request->has('idcard_front')) {
                $user->idcard_front  = $this->UploadImageCreate($request->idcard_front, 'backend/uploads/users');
            }

            if ($request->has('idcard_back')) {
                $user->idcard_back  = $this->UploadImageCreate($request->idcard_back, 'backend/uploads/users');
            }

            $user->save();
            if ($request->property_owner === "Organization") {
                $organization = new Organization();

                $organization->user_id          = $user->id;
                $organization->name             = $request->organization_name;
                $organization->tin_number       = $request->organization_tin_number;
                $organization->type             = $request->organization_type;
                $organization->director_details = $request->director_details;

                // billnet requirements
                $organization->nationality             = $request->nationality;
                $organization->gis_code             = $request->gis_code;
                $organization->ghana_card_or_id             = $request->ghana_card_or_id;
                $organization->establishment_year             = $request->establishment_year;
                $organization->organization_vat_number             = $request->organization_vat_number;
                $organization->about_company = $request->about_company;
                $organization->digital_address = $request->digital_address;
                $organization->company_certificate_name = $request->company_certificate_name;

                if ($request->has('company_certificate_attachment')){
                    $organization->company_certificate_attachment_id = $this->UploadImageCreate($request->company_certificate_attachment, 'backend/uploads/organizations');
                }

                if ($request->has('incorporation_attachment')) {
                    $organization->incorporation_attachment_id = $this->UploadImageCreate($request->incorporation_attachment, 'backend/uploads/organizations');
                }

                if ($request->has('business_attachment')) {
                    $organization->business_attachment_id = $this->UploadImageCreate($request->business_attachment, 'backend/uploads/organizations');
                }

                $organization->save();
            }

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

            DB::commit();
            return true;

        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            DB::rollBack();
            return false;
        }
    }

    public function verifyEmail($email, $token)
    {
        try {
            $user = User::query()->firstWhere('email', $email);

            if (!$user) {
                return 'invalid_email';
            }

            if ($user->email_verified_at) {
                return 'already_verified';
            }

            if ($user->token != $token) {
                return 'invalid_token';
            }

            $user->email_verified_at = now();
            $user->token = null;
            $user->save();
            return 'success';

        } catch (\Throwable$th) {
            return false;
        }

    }

    public function forgotPassword($request)
    {
        try {
            $user = User::query()->firstWhere('email', $request->email);

            if (!$user) {
                return 'invalid_email';
            }

            $user->token = Str::random(30);
            $user->save();

            Mail::to($user->email)->send(new ResetPassword($user));

            return 'success';

        } catch (\Throwable  $th) {
            Log::error($th->getMessage());
            return false;
        }
    }

    public function resetPasswordPage($email, $token)
    {
        try {
            $user = User::query()->firstWhere('email', $email);

            if (!$user) {
                return 'invalid_email';
            }

            if ($user->token != $token) {
                return 'invalid_token';
            }

            return 'success';

        } catch (\Throwable$th) {
            return false;
        }

    }
    public function resetPassword($request)
    {
        try {
            $user = User::query()->firstWhere('email', $request->email);

            if (!$user) {
                return 'invalid_email';
            }

            if ($user->token != $request->token) {
                return 'invalid_token';
            }

            $user->password = Hash::make($request->password);
            $user->token = null;
            $user->save();

            return 'success';

        } catch (\Throwable$th) {
            return false;
        }

    }

}
