<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ForgotPasswordRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\ResetPasswordRequest;
use App\Interfaces\AuthenticationRepositoryInterface;
use App\Models\Locations\Country;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Nwidart\Modules\Facades\Module;

class AuthenticationController extends Controller
{
    private $loginRepository;

    public function __construct(AuthenticationRepositoryInterface $loginRepository)
    {
        if (!Schema::hasTable('settings') && !Schema::hasTable('users')) {

            Artisan::call('migrate:fresh', ['--force' => true]);
            Artisan::call('db:seed', ['--force' => true]);
        }
        $this->loginRepository = $loginRepository;
    }

    public function lockScreenPage()
    {
        $data['title'] = "Lock Screen";
        return view('backend.auth.lock-screen', compact('data'));
    }

    public function loginPage()
    {
        $data['title'] = 'Login';
        if (isModuleEnabled('Marsland')) {
            return view('marsland::auth.login');
        }
        return view('backend.auth.login')->with($data);
    }

    public function login(LoginRequest $request)
    {
        $email = $request->safe()->only(['email']);
        $password = $request->safe()['password'];

        $user = User::where('email', '=', $email)->first();

        if (!$user) {
            return back()->withErrors([
                'email' => 'The provided email do not match our records.',
            ]);
        }


        if (!Hash::check($password, $user->password)) {
            return back()->withErrors([
                'password' => 'The provided password does not match our records.',
            ]);
        }

        // if($user->email_verified_at == null){
        //     return back()->with('danger', 'Account not verified yet!');
        // }

        if (env('EMAIL_VERIFIED')) {
            if ($user->email_verified_at == null) {
                return back()->with('danger', 'Account not verified yet!');
            }
        }


        if (@$user->status == 0) {
            return back()->with('danger', 'You are inactive!');
        }
        if ($user->role->status == 0) {
            return back()->with('danger', 'This user role is inactive!');
        }

        if ($this->loginRepository->login($request->all())) {

            if ($user->isCustomer()) {
                return redirect()->route('customer.dashboard');
            } else {
                return redirect()->route('dashboard');
            }
        }

        return back()->with('danger', 'Something went wrong, please try again.');
    }

    public function registerPage(Request $request)
    {
        $data['type'] = $request->input('type', 'Tenant');
        $data['title'] = 'Registration';
        $data['role_id'] = 5;
        $data['countries'] = Country::select('id', 'name')->get();
        $view = '';

        if (isModuleEnabled('BilnetPropertyOwnerForm')) {
            $view = 'bilnetpropertyownerform::auth.owner_registration_form';
        } else {
            if (isModuleEnabled('Marsland')) {
                if ($data['type'] == 'Landlord') {
                    $data['role_id'] = 4;
                    $view = 'marsland::auth.landlord_register';
                } else {
                    $data['role_id'] = 5;
                    $view = 'marsland::auth.landlord_register';
                }
            } else {
                if ($data['type'] == 'Tenant') {
                    $data['role_id'] = 5;
                }
                if ($data['type'] == 'Landlord') {
                    $data['role_id'] = 4;
                }
                $view = 'backend.auth.register';
            }
        }

        return view($view, compact('data'));
    }

    public function register(RegisterRequest $request)
    {
        $user = $this->loginRepository->register($request);

        if ($user) {
            return redirect()->route('login')->with('success', 'We have send you an email, please verify your email address.');
        }

        return back()->with('danger', 'Something went wrong, please try again.');
    }

    public function verifyEmail($email, $token)
    {
        $result = $this->loginRepository->verifyEmail($email, $token);

        if ($result == 'success') {
            return redirect()->route('login')->with('success', 'Your email has been verified, please login.');
        } elseif ($result == 'already_verified') {
            return redirect()->route('login')->with('success', 'Your email has already been verified, please login.');
        } elseif ($result == 'invalid_email') {
            return redirect()->route('login')->with('danger', 'Invalid email address.');
        } elseif ($result == 'invalid_token') {
            return redirect()->route('login')->with('danger', 'Invalid token.');
        } else {
            return redirect()->route('login')->with('danger', 'Something went wrong, please try again.');
        }
    }

    public function logout(Request $request)
    {
        $this->loginRepository->logout();
        return redirect()->route('home');
    }

    public function forgotPasswordPage()
    {
        $data['title'] = "Forgot Password";
        if (env('HUBOFHOMES_THEME')) {
            return view('backend.auth.forgot-password', compact('data'));
        }
        return view('marsland::auth.forgot-password', compact('data'));
    }

    public function forgotPassword(ForgotPasswordRequest $request)
    {
        $result = $this->loginRepository->forgotPassword($request);
        if ($result == 'success') {
            return back()->with('success', 'We have sent an reset password link to your email address.');
        } elseif ($result == 'invalid_email') {
            return back()->with('danger', 'Invalid email address.');
        } else {
            return back()->with('danger', 'Something went wrong, please try again.');
        }
    }

    public function resetPasswordPage($email, $token)
    {
        $result = $this->loginRepository->resetPasswordPage($email, $token);

        if ($result == 'success') {

            $data['title'] = "Reset Password";
            $data['email'] = $email;
            $data['token'] = $token;

            return view('backend.auth.reset-password', compact('data'));
        } elseif ($result == 'invalid_email') {
            return redirect()->route('login')->with('danger', 'Invalid email address.');
        } elseif ($result == 'invalid_token') {
            return redirect()->route('login')->with('danger', 'Invalid token.');
        } else {
            return redirect()->route('login')->with('danger', 'Something went wrong, please try again.');
        }
    }

    public function resetPassword(ResetPasswordRequest $request)
    {
        $result = $this->loginRepository->resetPassword($request);

        if ($result == 'success') {
            return redirect()->route('login')->with('success', 'Your password has been reset, please login.');
        } elseif ($result == 'invalid_email') {
            return back()->with('danger', 'Invalid email address.');
        } elseif ($result == 'invalid_token') {
            return back()->with('danger', 'Invalid token.');
        } else {
            return back()->with('danger', 'Something went wrong, please try again.');
        }
    }
}
