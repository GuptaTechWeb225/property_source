<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Payment\PaypalRequest;
use App\Utils\Utils;
use Twilio\Rest\Client;
use App\Models\BackupLog;
use http\Client\Response;
use App\Models\Permission;
use App\Traits\SendMessage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interfaces\SettingInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Schema;
use App\Http\Requests\SettingStoreRequest;
use App\Http\Requests\BillCronSetupRequest;
use App\Http\Requests\Settings\EmailSettingStoreRequest;
use App\Http\Requests\GeneralSetting\StorageUpdateRequest;
use App\Http\Requests\GeneralSetting\GeneralSettingStoreRequest;

class SettingController extends Controller
{
    use SendMessage;
    private $setting;

    function __construct(SettingInterface $settingInterface)
    {

        if (!Schema::hasTable('settings') && !Schema::hasTable('users')) {
            abort(400);
        }
        $this->setting = $settingInterface;
    }

    // General setting start
    public function generalSettings()
    {
        $data['title']      = _trans('common.general settings');
        $data['data']       = $this->setting->getAll();
        $data['languages']  = $this->setting->getLanguage();
        $data['currencies']  = $this->setting->getCurrencies();
        return view('backend.settings.general-settings', compact('data'));
    }

    public function updateGeneralSetting(GeneralSettingStoreRequest $request)
    {
        $result = $this->setting->updateGeneralSetting($request);
        if ($result) {
            return redirect()->back()->with('success', _trans('alert.general_settings_updated_successfully'));
        }
        return redirect()->back()->with('danger', _trans('alert.something_went_wrong_please_try_again'));
    }
    // General setting end

    public function billSetup(Request $request)
    {
        try {
            if ($request->method() == 'POST'){
                $this->setting->updateBillSetupSetting($request);
                return redirect()->back()->with('success', _trans('alert.bill_setup_updated_successfully'));
            }
            $data['title'] = _trans('Bill Setup');
            return view('backend.settings.bill_setup')->with($data);
        }catch (\Exception $exception){
            return redirect()->back()->with('danger', $exception->getMessage());
        }
    }

    public function billCronSetup(BillCronSetupRequest $request)
    {
        try {
            if( Setting('last_payment_day') && Setting('payment_due_alert_day')){
                $this->setting->updateBillCronSetupSetting($request);
                return redirect()->back()->with('success', _trans('alert.bill_setup_updated_successfully'));
            }else{
                return redirect()->back()->with('warning', _trans('alert.You Must Setup Bill Setting For These Operation'));
            }

        }catch (\Exception $exception){
            return redirect()->back()->with('danger', $exception->getMessage());
        }
    }

    public function updateAccountSetting()
    {
        $result = $this->setting->updateGeneralSetting($request);
        if ($result) {
            return redirect()->back()->with('success', _trans('alert.general_settings_updated_successfully'));
        }
        return redirect()->back()->with('danger', _trans('alert.something_went_wrong_please_try_again'));
    }
    // Storage setting start
    public function storagesetting()
    {

        try {
            $data['title'] = _trans('common.storage_settings');
            $data['data']  = $this->setting->getAll();
            return view('backend.settings.storage_setting', compact('data'));
        } catch (\Throwable $th) {
            return redirect('/');
        }
    }

    public function storageSettingUpdate(StorageUpdateRequest $request)
    {
        try {
            $result = $this->setting->storageSettingUpdate($request);
            return back()->with('success', _trans('alert.storage_settings_updated_successfully'));
        } catch (\Throwable $th) {
            return back()->with('danger', _trans('alert.something_went_wrong_please_try_again'));
        }
    }
    // Storage setting start

    // Database Backups start
    public function databaseBackups()
    {
        $data['logs'] = BackupLog::with('user')->paginate(10);
        $data['title']      = _trans('common.Database Backup Log');
        return view('backend.settings.database-backups')->with($data);
    }

    // Create a Backup file and save the log in database
    public function databaseBackupProcess()
    {
        try {
            $fileName = 'backup_' . now()->format('Ymd_His') . '.sql';
            $filePath = storage_path('app/backups/'). $fileName;

            $command = sprintf(
                'mysqldump -u%s -p%s %s > %s',
                config('database.connections.mysql.username'),
                config('database.connections.mysql.password'),
                config('database.connections.mysql.database'),
                $filePath
            );
            // Execute the command
            exec($command);
            $fileSize = filesize($filePath);
            $log = [
                'user_id' => Auth::id(),
                'file_name' => $fileName,
                'file_size' => $fileSize,
            ];
            BackupLog::create($log);
            session('success',_trans('alert.Database_Backup_successfully'));
            return response()->download($filePath)->deleteFileAfterSend();
        } catch (\Exception $exception) {
            return back()->withError('Backup failed: ' . $exception->getMessage());
        }

    }

    // Delete Backup log
    public function databaseBackupDelete($id)
    {
        $result = BackupLog::find($id)->delete();
        if ($result) :
            $success[0] = "Deleted Successfully";
            $success[1] = "Success";
            $success[2] = "Deleted";
        else :
            $success[0] = "Something went wrong, please try again.";
            $success[1] = 'error';
            $success[2] = "oops";
        endif;
        return response()->json($success);
    }

    // Recaptcha setting start
    public function recaptchaSetting()
    {
        $data['title'] = _trans('common.recaptcha_settings');
        $data['data']  = $this->setting->getAll();
        return view('backend.settings.recaptcha-settings', compact('data'));
    }

    public function updateRecaptchaSetting(SettingStoreRequest $request)
    {
        // return $request;
        $result = $this->setting->updateRecaptchaSetting($request);
        if ($result) {
            return redirect()->back()->with('success', _trans('alert.recaptcha_settings_updated_successfully'));
        }
        return redirect()->back()->with('danger', _trans('alert.something_went_wrong_please_try_again'));
    }
    // Recaptcha setting end

    // mail settings start
    public function mailSetting()
    {
        $data['title'] = _trans('settings.email_settings');
        $data['data']  = $this->setting->getAll();
        return view('backend.settings.mail-settings', compact('data'));
    }

    public function updateMailSetting(EmailSettingStoreRequest $request)
    {
        $result = $this->setting->updateMailSetting($request);

        if ($result) {
            return redirect()->back()->with('success', _trans('alert.email_settings_updated_successfully'));
        }
        return redirect()->back()->with('danger', _trans('alert.something_went_wrong_please_try_again'));
    }
    // mail settings end


    public function paymentSetting()
    {
        $data['title'] = _trans('settings.Payment Setting');
        $data['data']  = $this->setting->getAll();
        return view('backend.settings.payment_setting', compact('data'));
    }

    public function updatePaypalPaymentSetting(PaypalRequest $request)
    {
        $result = $this->setting->updatePaypalPaymentSetting($request);

        if ($result) {
            return redirect()->back()->with('success', _trans('alert.email_settings_updated_successfully'));
        }
        return redirect()->back()->with('danger', _trans('alert.something_went_wrong_please_try_again'));
    }


    // SMS Seting

    public function smsSetting()
    {
        $data['title'] = _trans('settings.sms_settings');
        $data['data']  = [];
        return view('backend.settings.sms-settings')->with($data);
    }

    public function messageSender(Request $request)
    {
        if ($request->isMethod('post')){
            try {
               return $this->sendMessage($request->input('message'),$request->input('number'));
            }catch (\Exception $exception){
                return redirect()->back()->with('error',$exception->getMessage());
            }
        }
        $data['title'] = _trans('common.SMS Sender');
        return view('backend.sms.sender_form')->with($data);
    }


    public function updateSmsSetting(Request $request)
    {
        $result = $this->setting->updateSmsSetting($request);

        if ($result) {
            return redirect()->back()->with('success', _trans('alert.sms_settings_updated_successfully'));
        }
        return redirect()->back()->with('danger', _trans('alert.something_went_wrong_please_try_again'));
    }


    public function changeTheme(Request $request)
    {
        Cache::put('user_theme', $request->theme_mode);
        return true;
    }


    public function updatePermission()
    {
        try {
            foreach(Utils::permissions() as $attribute => $keywords){
                Permission::updateOrCreate(
                    [
                        'attribute' => $attribute
                    ], [
                        'keywords' => $keywords
                    ]
                );
            }
            return _trans('alert.Permissions successfully updated!.');
        }catch (\Exception $exception){
            return $exception->getMessage();
        }
    }
}
