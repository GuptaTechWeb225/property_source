<?php

namespace App\Repositories;

use App\Models\Currency;
use App\Models\Setting;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use App\Interfaces\SettingInterface;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\SettingStoreRequest;
use App\Http\Requests\GeneralSetting\StorageUpdateRequest;
use App\Models\Language;
use App\Traits\CommonHelperTrait;

class SettingRepository implements SettingInterface
{
    use CommonHelperTrait;

    private $model;

    public function __construct(Setting $model)
    {
        $this->model = $model;
    }

    public function getAll()
    {
        return Setting::all();
    }

    public function getLanguage()
    {
        return Language::all();
    }


    public function getCurrencies()
    {
        return Currency::select('id', 'name', 'code', 'symbol')->get();
    }


    // General setting start
    public function updateGeneralSetting($request)
    {
        try {
            // Application name start
            if ($request->has('application_name')) {
                $setting = $this->model::where('name', 'application_name')->first();
                if ($setting) {
                    $setting->value = $request->application_name;
                } else {
                    $setting = new $this->model;
                    $setting->name = 'application_name';
                    $setting->value = $request->application_name;
                }
                $setting->save();
            }
            // Application name end

            //Footer Text start
            if ($request->has('footer_text')) {
                $setting = $this->model::where('name', 'footer_text')->first();
                if ($setting) {
                    $setting->value = $request->footer_text;
                } else {
                    $setting = new $this->model;
                    $setting->name = 'footer_text';
                    $setting->value = $request->footer_text;
                }
                $setting->save();
            }
            //Footer Text end

            //Defualt language start
            if ($request->has('default_langauge')) {
                $setting = $this->model::where('name', 'default_langauge')->first();
                if ($setting) {
                    $setting->value = $request->default_langauge;
                } else {
                    $setting = new $this->model;
                    $setting->name = 'default_langauge';
                    $setting->value = $request->default_langauge;
                }
                $setting->save();
            }
            //Defualt language end

            // White logo start
            if ($request->has('light_logo') && $request->file('light_logo')->isValid()) {
                $setting = $this->model::where('name', 'light_logo')->first();
                $path = 'backend/uploads/settings';
                if ($setting) {
                    $file_path = public_path($setting->value);
                    // if(file_exists($file_path)){
                    //     File::delete($file_path);
                    // }
                    $file = $request->file('light_logo');
                    $extension = $file->guessExtension();
                    $filename = Str::random(6) . '_' . time() . '.' . $extension;
                    if (setting('file_system') == 's3') {
                        $filePath = s3Upload($path, $file);
                        $setting->value = $filePath;
                    } else {
                        $file->move($path, $filename);
                        $setting->value = $path . '/' . $filename;
                    }
                    $setting->save();
                } else {
                    $setting = new $this->model;
                    $setting->name = 'light_logo';
                    $file = $request->file('light_logo');
                    $extension = $file->guessExtension();
                    $filename = Str::random(6) . '_' . time() . '.' . $extension;
                    if (setting('file_system') == 's3') {
                        $filePath = s3Upload($path, $file);
                        $setting->value = $filePath;
                    } else {
                        $file->move($path, $filename);
                        $setting->value = $path . '/' . $filename;
                    }
                    $setting->save();
                }
            }
            // White logo end


            if ($request->has('dark_logo') && $request->file('dark_logo')->isValid()) {
                $setting = $this->model::where('name', 'dark_logo')->first();
                $path = 'backend/uploads/settings';
                if ($setting) {
                    $file_path = public_path($setting->value);
                    // if(file_exists($file_path)){
                    //     File::delete($file_path);
                    // }
                    $file = $request->file('dark_logo');
                    $extension = $file->guessExtension();
                    $filename = Str::random(6) . '_' . time() . '.' . $extension;
                    if (setting('file_system') == 's3') {
                        $filePath = s3Upload($path, $file);
                        $setting->value = $filePath;
                    } else {
                        $file->move($path, $filename);
                        $setting->value = $path . '/' . $filename;
                    }
                    $setting->save();
                } else {

                    $setting = new $this->model;
                    $setting->name = 'dark_logo';
                    $file = $request->file('dark_logo');
                    $extension = $file->guessExtension();
                    $filename = Str::random(6) . '_' . time() . '.' . $extension;
                    if (setting('file_system') == 's3') {
                        $filePath = s3Upload($path, $file);
                        $setting->value = $filePath;
                    } else {
                        $file->move($path, $filename);
                        $setting->value = $path . '/' . $filename;
                    }
                    $setting->save();
                }
            }

            if ($request->has('favicon') && $request->file('favicon')->isValid()) {
                $setting = $this->model::where('name', 'favicon')->first();
                $path = 'backend/uploads/settings';
                if ($setting) {
                    $file_path = public_path($setting->value);
                    // if(file_exists($file_path)){
                    //     File::delete($file_path);
                    // }
                    $file = $request->file('favicon');
                    $extension = $file->guessExtension();
                    $filename = Str::random(6) . '_' . time() . '.' . $extension;
                    if (setting('file_system') == 's3') {
                        $filePath = s3Upload($path, $file);
                        $setting->value = $filePath;
                    } else {
                        $file->move($path, $filename);
                        $setting->value = $path . '/' . $filename;
                    }
                    $setting->save();
                } else {
                    $setting = new $this->model;
                    $setting->name = 'favicon';
                    $file = $request->file('favicon');
                    $extension = $file->guessExtension();
                    $filename = Str::random(6) . '_' . time() . '.' . $extension;
                    if (setting('file_system') == 's3') {
                        $filePath = s3Upload($path, $file);
                        $setting->value = $filePath;
                    } else {
                        $file->move($path, $filename);
                        $setting->value = $path . '/' . $filename;
                    }
                    $setting->save();
                }
            }


            update_settings_table($this->model, 'currency_id', $request->currency_id);
            update_settings_table($this->model, 'phone_number', $request->phone_number);
            update_settings_table($this->model, 'whatsapp_number', $request->whatsapp_number);
            update_settings_table($this->model, 'tawk_widget_code', $request->tawk_widget_code);
            update_settings_table($this->model, 'email', $request->email);
            update_settings_table($this->model, 'facebook_link', $request->facebook_link);
            update_settings_table($this->model, 'twitter_link', $request->twitter_link);
            update_settings_table($this->model, 'linkedin_link', $request->linkedin_link);
            update_settings_table($this->model, 'instagram_link', $request->instagram_link);
            update_settings_table($this->model, 'address', $request->address);

            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function updateBillSetupSetting($request)
    {
        try {
            update_settings_table($this->model, 'last_payment_day', $request->input('last_payment_day'));
            update_settings_table($this->model, 'fine_percentage', $request->input('fine_percentage'));
            update_settings_table($this->model, 'payment_due_alert_day', $request->input('payment_due_alert_day'));

            update_settings_table($this->model, 'sms_body_content', $request->input('sms_body_content'));

            return true;
        } catch (\Exception $exception) {
            throw $exception;
        }
    }


    public function updateBillCronSetupSetting($request)
    {
        try {
            update_settings_table($this->model, 'sms_body_content', $request->input('sms_body_content'));
            return true;
        } catch (\Exception $exception) {
            throw $exception;
        }
    }

    // General setting en
    public function updateRecaptchaSetting($request)
    {
        try {
            // Recaptcha site key start
            if ($request->has('recaptcha_sitekey')) {
                $setting = $this->model::where('name', 'recaptcha_sitekey')->first();
                if ($setting) {
                    $setting->value = $request->recaptcha_sitekey;
                } else {
                    $setting = new $this->model;
                    $setting->name = 'recaptcha_sitekey';
                    $setting->value = $request->recaptcha_sitekey;
                }
                $setting->save();
            }
            // Recaptcha site key end

            // Recaptcha secret start
            if ($request->has('recaptcha_secret')) {
                $setting = $this->model::where('name', 'recaptcha_secret')->first();
                if ($setting) {
                    $setting->value = $request->recaptcha_secret;
                } else {
                    $setting = new $this->model;
                    $setting->name = 'recaptcha_secret';
                    $setting->value = $request->recaptcha_secret;
                }
                $setting->save();
            }
            // Recaptcha secret end

            // Recaptcha status start
            if ($request->has('recaptcha_status')) {
                $setting = $this->model::where('name', 'recaptcha_status')->first();
                if ($setting) {
                    $setting->value = $request->recaptcha_status;
                } else {
                    $setting = new $this->model;
                    $setting->name = 'recaptcha_status';
                    $setting->value = $request->recaptcha_status;
                }
                $setting->save();
            }
            // Recaptcha status end

            // recaptcha write in env
            $this->setEnvironmentValue('NOCAPTCHA_SITEKEY', $request->recaptcha_sitekey);
            $this->setEnvironmentValue('NOCAPTCHA_SECRET', $request->recaptcha_secret);
            // recaptcha write in env
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function storageSettingUpdate($request)
    {
        try {
            // Application name start
            if ($request->has('file_system')) {
                $setting = $this->model::where('name', 'file_system')->first();
                if ($setting) {
                    $setting->value = $request->file_system;
                } else {
                    $setting = new $this->model;
                    $setting->name = 'file_system';
                    $setting->value = $request->file_system;
                }
                $setting->save();
            }
            // Application name end

            if ($request->has('aws_access_key_id') && $request->file_system == 's3') {
                // aws_access_key start
                if ($request->has('aws_access_key_id')) {
                    $setting = $this->model::where('name', 'aws_access_key_id')->first();
                    if ($setting) {
                        $setting->value = $request->aws_access_key_id;
                    } else {
                        $setting = new $this->model;
                        $setting->name = 'aws_access_key_id';
                        $setting->value = $request->aws_access_key_id;
                    }
                    $setting->save();
                }
                // aws_access_key end

                // aws_secret_key start
                if ($request->has('aws_secret_key')) {
                    $setting = $this->model::where('name', 'aws_secret_key')->first();
                    if ($setting) {
                        $setting->value = $request->aws_secret_key;
                    } else {
                        $setting = new $this->model;
                        $setting->name = 'aws_secret_key';
                        $setting->value = $request->aws_secret_key;
                    }
                    $setting->save();
                }
                // aws_secret_key end

                // aws_region start
                if ($request->has('aws_region')) {
                    $setting = $this->model::where('name', 'aws_region')->first();
                    if ($setting) {
                        $setting->value = $request->aws_region;
                    } else {
                        $setting = new $this->model;
                        $setting->name = 'aws_region';
                        $setting->value = $request->aws_region;
                    }
                    $setting->save();
                }
                // aws_region end

                // aws_bucket start
                if ($request->has('aws_bucket')) {
                    $setting = $this->model::where('name', 'aws_bucket')->first();
                    if ($setting) {
                        $setting->value = $request->aws_bucket;
                    } else {
                        $setting = new $this->model;
                        $setting->name = 'aws_bucket';
                        $setting->value = $request->aws_bucket;
                    }
                    $setting->save();
                }
                // aws_bucket end

                // aws_endpoint start
                if ($request->has('aws_endpoint')) {
                    $setting = $this->model::where('name', 'aws_endpoint')->first();
                    if ($setting) {
                        $setting->value = $request->aws_endpoint;
                    } else {
                        $setting = new $this->model;
                        $setting->name = 'aws_endpoint';
                        $setting->value = $request->aws_endpoint;
                    }
                    $setting->save();
                }
                // aws_endpoint end
            }


            // recaptcha write in env
            $this->setEnvironmentValue('AWS_ACCESS_KEY_ID', $request->aws_access_key_id);
            $this->setEnvironmentValue('AWS_SECRET_ACCESS_KEY', $request->aws_secret_key);
            $this->setEnvironmentValue('AWS_DEFAULT_REGION', $request->aws_region);
            $this->setEnvironmentValue('AWS_BUCKET', $request->aws_bucket);
            $this->setEnvironmentValue('AWS_ENDPOINT', $request->aws_endpoint);
            // recaptcha write in env


        } catch (\Throwable $th) {
            return false;
        }
    }

    public function updateMailSetting($request)
    {
        try {
            // Mail drive start
            if ($request->has('mail_drive')) {
                $setting = $this->model::where('name', 'mail_drive')->first();
                if ($setting) {
                    $setting->value = $request->mail_drive;
                } else {
                    $setting = new $this->model;
                    $setting->name = 'mail_drive';
                    $setting->value = $request->mail_drive;
                }
                $setting->save();
            }
            // Mail drive end

            // Mail Host start
            if ($request->has('mail_host')) {
                $setting = $this->model::where('name', 'mail_host')->first();
                if ($setting) {
                    $setting->value = $request->mail_host;
                } else {
                    $setting = new $this->model;
                    $setting->name = 'mail_host';
                    $setting->value = $request->mail_host;
                }
                $setting->save();
            }
            // Mail Host end

            // Mail Host start
            if ($request->has('mail_port')) {
                $setting = $this->model::where('name', 'mail_port')->first();
                if ($setting) {
                    $setting->value = $request->mail_port;
                } else {
                    $setting = new $this->model;
                    $setting->name = 'mail_port';
                    $setting->value = $request->mail_port;
                }
                $setting->save();
            }
            // Mail Host end

            // Mail Address start
            if ($request->has('mail_address')) {
                $setting = $this->model::where('name', 'mail_address')->first();
                if ($setting) {
                    $setting->value = $request->mail_address;
                } else {
                    $setting = new $this->model;
                    $setting->name = 'mail_address';
                    $setting->value = $request->mail_address;
                }
                $setting->save();
            }
            // Mail Address end

            // Form Name start
            if ($request->has('from_name')) {
                $setting = $this->model::where('name', 'from_name')->first();
                if ($setting) {
                    $setting->value = $request->from_name;
                } else {
                    $setting = new $this->model;
                    $setting->name = 'from_name';
                    $setting->value = $request->from_name;
                }
                $setting->save();
            }
            // Form Name end

            // Mail UserName start
            if ($request->has('mail_username')) {
                $setting = $this->model::where('name', 'mail_username')->first();
                if ($setting) {
                    $setting->value = $request->mail_username;
                } else {
                    $setting = new $this->model;
                    $setting->name = 'mail_username';
                    $setting->value = $request->from_name;
                }
                $setting->save();
            }
            // Mail UserName end

            // Mail UserName start
            if ($request->has('mail_password')) {
                $setting = $this->model::where('name', 'mail_password')->first();
                if ($setting) {
                    $setting->value = $request->mail_password;
                } else {
                    $setting = new $this->model;
                    $setting->name = 'mail_password';
                    $setting->value = $request->from_name;
                }
                $setting->save();
            }
            // Mail UserName end

            //Encryption start
            if ($request->has('encryption')) {
                $setting = $this->model::where('name', 'encryption')->first();
                if ($setting) {
                    $setting->value = $request->encryption;
                } else {
                    $setting = new $this->model;
                    $setting->name = 'encryption';
                    $setting->value = $request->from_name;
                }
                $setting->save();
            }
            //Encryption end
            // email write in env
            // $this->setEnvironmentValue('MAIL_MAILER',           $request->mail_drive);
            $this->setEnvironmentValue('MAIL_HOST', $request->mail_host);
            $this->setEnvironmentValue('MAIL_PORT', $request->mail_port);
            $this->setEnvironmentValue('MAIL_USERNAME', $request->mail_username);
            $this->setEnvironmentValue('MAIL_PASSWORD', $request->mail_password);
            $this->setEnvironmentValue('MAIL_ENCRYPTION', $request->encryption);
            $this->setEnvironmentValue('MAIL_FROM_ADDRESS', $request->mail_address);
            $this->setEnvironmentValue('MAIL_FROM_NAME', $request->from_name);
            // email write in env

            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }


    public function updatePaypalPaymentSetting($request)
    {
        try {
            if ($request->has('PAYPAL_CLIENT_ID')) {
                $setting = $this->model::where('name', 'PAYPAL_CLIENT_ID')->first();
                if ($setting) {
                    $setting->value = $request->PAYPAL_CLIENT_ID;
                } else {
                    $setting = new $this->model;
                    $setting->name = 'PAYPAL_CLIENT_ID';
                    $setting->value = $request->PAYPAL_CLIENT_ID;
                }
                $setting->save();
            }

            if ($request->has('PAYPAL_SECRET')) {
                $setting = $this->model::where('name', 'PAYPAL_SECRET')->first();
                if ($setting) {
                    $setting->value = $request->PAYPAL_SECRET;
                } else {
                    $setting = new $this->model;
                    $setting->name = 'PAYPAL_SECRET';
                    $setting->value = $request->PAYPAL_SECRET;
                }
                $setting->save();
            }

            if ($request->has('PAYPAL_APP_ID')) {
                $setting = $this->model::where('name', 'PAYPAL_APP_ID')->first();
                if ($setting) {
                    $setting->value = $request->PAYPAL_APP_ID;
                } else {
                    $setting = new $this->model;
                    $setting->name = 'PAYPAL_APP_ID';
                    $setting->value = $request->PAYPAL_APP_ID;
                }
                $setting->save();
            }

            if ($request->has('PAYPAL_MODE')) {
                $setting = $this->model::where('name', 'PAYPAL_MODE')->first();
                if ($setting) {
                    $setting->value = $request->PAYPAL_MODE;
                } else {
                    $setting = new $this->model;
                    $setting->name = 'PAYPAL_MODE';
                    $setting->value = $request->PAYPAL_MODE;
                }
                $setting->save();
            }

            $this->setEnvironmentValue('PAYPAL_CLIENT_ID', $request->PAYPAL_CLIENT_ID);
            $this->setEnvironmentValue('PAYPAL_SECRET', $request->PAYPAL_SECRET);
            $this->setEnvironmentValue('PAYPAL_APP_ID', $request->PAYPAL_APP_ID);
            $this->setEnvironmentValue('PAYPAL_MODE', $request->PAYPAL_MODE);
            return true;
        } catch (\Exception $exception) {
            throw $exception;
        }
    }

    public function updateSmsSetting($request)
    {
        try {
            if ($request->has('twilio_sid')) {
                $setting = $this->model::where('name', 'twilio_sid')->first();
                if ($setting) {
                    $setting->value = $request->twilio_sid;
                } else {
                    $setting = new $this->model;
                    $setting->name = 'twilio_sid';
                    $setting->value = $request->twilio_sid;
                }
                $this->setEnvironmentValue('TWILIO_SID', $request->twilio_sid);
                $setting->save();
            }

            if ($request->has('twilio_auth_token')) {
                $setting = $this->model::where('name', 'twilio_auth_token')->first();
                if ($setting) {
                    $setting->value = $request->twilio_auth_token;
                } else {
                    $setting = new $this->model;
                    $setting->name = 'twilio_auth_token';
                    $setting->value = $request->twilio_auth_token;
                }
                $this->setEnvironmentValue('TWILIO_AUTH_TOKEN', $request->twilio_auth_token);

                $setting->save();
            }

            if ($request->has('twilio_registered_phone')) {
                $setting = $this->model::where('name', 'twilio_registered_phone')->first();
                if ($setting) {
                    $setting->value = $request->twilio_registered_phone;
                } else {
                    $setting = new $this->model;
                    $setting->name = 'twilio_registered_phone';
                    $setting->value = $request->twilio_registered_phone;
                }
                $this->setEnvironmentValue('TWILIO_PHONE_NUMBER', $request->twilio_registered_phone);

                $setting->save();
            }

            if ($request->has('twilio_whatsapp_number_from')) {
                $setting = $this->model::where('name', 'twilio_whatsapp_number_from')->first();
                if ($setting) {
                    $setting->value = $request->twilio_whatsapp_number_from;
                } else {
                    $setting = new $this->model;
                    $setting->name = 'twilio_whatsapp_number_from';
                    $setting->value = $request->twilio_whatsapp_number_from;
                }
                $this->setEnvironmentValue('TWILIO_WHATSAPP_NUMBER_FROM', $request->twilio_whatsapp_number_from);

                $setting->save();
            }

            if ($request->has('twilio_whatsapp_number_to')) {
                $setting = $this->model::where('name', 'twilio_whatsapp_number_to')->first();
                if ($setting) {
                    $setting->value = $request->twilio_whatsapp_number_to;
                } else {
                    $setting = new $this->model;
                    $setting->name = 'twilio_whatsapp_number_to';
                    $setting->value = $request->twilio_whatsapp_number_to;
                }
                $this->setEnvironmentValue('TWILIO_WHATSAPP_NUMBER_to', $request->twilio_whatsapp_number_to);

                $setting->save();
            }

            if ($request->has('default_reply_for_request')) {
                $setting = $this->model::where('name', 'default_reply_for_request')->first();
                if ($setting) {
                    $setting->value = $request->default_reply_for_request;
                } else {
                    $setting = new $this->model;
                    $setting->name = 'default_reply_for_request';
                    $setting->value = $request->default_reply_for_request;
                }

                $setting->save();
            }

            if ($request->has('otp_request_default_content_start')) {
                $setting = $this->model::where('name', 'otp_request_default_content_start')->first();
                if ($setting) {
                    $setting->value = $request->otp_request_default_content_start;
                } else {
                    $setting = new $this->model;
                    $setting->name = 'otp_request_default_content_start';
                    $setting->value = $request->otp_request_default_content_start;
                }

                $setting->save();
            }

            if ($request->has('otp_request_default_content_end')) {
                $setting = $this->model::where('name', 'otp_request_default_content_end')->first();
                if ($setting) {
                    $setting->value = $request->otp_request_default_content_end;
                } else {
                    $setting = new $this->model;
                    $setting->name = 'otp_request_default_content_end';
                    $setting->value = $request->otp_request_default_content_end;
                }

                $setting->save();
            }

            return true;
        } catch (\Exception $exception) {
            return false;
        }
    }
}
