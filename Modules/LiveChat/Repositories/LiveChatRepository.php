<?php

namespace Modules\LiveChat\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Modules\LiveChat\Entities\Message;
use App\Models\coreApp\Setting\Setting;
use Illuminate\Support\Facades\Artisan;
use Modules\LiveChat\Traits\PusherTrait;
use Modules\LiveChat\Entities\MessageUser;
use App\Helpers\CoreApp\Traits\FileHandler;
use Modules\LiveChat\Interfaces\LiveChatInterface;
use App\Helpers\CoreApp\Traits\ApiReturnFormatTrait;

class LiveChatRepository implements LiveChatInterface
{
    use ApiReturnFormatTrait, FileHandler, PusherTrait;
    // use CommonHelperTrait;

    private $messageModel;
    private $userModel;
    private $messageUser;
    private $settingModel;

    public function __construct(
        Message $messageModel,
        User $userModel,
        Setting $settingModel,
        MessageUser $messageUserModel

    ) {
        $this->messageModel = $messageModel;
        $this->userModel = $userModel;
        $this->messageUser = $messageUserModel;
        $this->settingModel = $settingModel;
    }

    public function model()
    {
        return $this->messageModel;
    }

    public function store($request)
    {
        DB::beginTransaction();

        try {
            $receiver = $this->userModel->find(decrypt($request->user_id));
            if (!$receiver) {
                return $this->responseWithError(_trans('alert.user_not_found'));
            }

            $message = $this->messageModel->create([
                'message'     => $request->message,
                'sender_id'   => auth()->user()->id,
                'receiver_id' => decrypt($request->user_id),
            ]);

            $result = $this->sendMessage($message, $receiver);
            if (!$result['status']) {
                return $this->responseWithError($result['message'], [], 400);
            }

            DB::commit();

            return $this->responseWithSuccess(_trans('alert.message_send'), [], 200);
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error($th->getMessage());

            return $this->responseWithError($th->getMessage(), [], 400);
        }
    }

    public function update($request)
    {
        try {
            if ($request->has('pusher_app_id')) {
                $pusher_app_id = $this->settingModel::where('name', 'pusher_app_id')->first();
                if ($pusher_app_id) {
                    $pusher_app_id->update(['value' => $request->pusher_app_id]);
                } else {
                    $this->settingModel::create([
                        'name'  => 'pusher_app_id',
                        'value' => $request->pusher_app_id,
                    ]);
                }

                $this->setEnvironmentValue('PUSHER_APP_ID', $request->pusher_app_id);
            }

            if ($request->has('pusher_app_key')) {
                $pusher_app_key = $this->settingModel::where('name', 'pusher_app_key')->first();
                if ($pusher_app_key) {
                    $pusher_app_key->update(['value' => $request->pusher_app_key]);
                } else {
                    $this->settingModel::create([
                        'name'  => 'pusher_app_key',
                        'value' => $request->pusher_app_key,
                    ]);
                }

                $this->setEnvironmentValue('PUSHER_APP_KEY', $request->pusher_app_key);
            }

            if ($request->has('pusher_app_secret')) {
                $pusher_app_secret = $this->settingModel::where('name', 'pusher_app_secret')->first();
                if ($pusher_app_secret) {
                    $pusher_app_secret->update(['value' => $request->pusher_app_secret]);
                } else {
                    $this->settingModel::create([
                        'name'  => 'pusher_app_secret',
                        'value' => $request->pusher_app_secret,
                    ]);
                }

                $this->setEnvironmentValue('PUSHER_APP_SECRET', $request->pusher_app_secret);
            }

            if ($request->has('pusher_app_cluster')) {
                $pusher_app_cluster = $this->settingModel::where('name', 'pusher_app_cluster')->first();
                if ($pusher_app_cluster) {
                    $pusher_app_cluster->update(['value' => $request->pusher_app_cluster]);
                } else {
                    $this->settingModel::create([
                        'name'  => 'pusher_app_cluster',
                        'value' => $request->pusher_app_cluster,
                    ]);
                }

                $this->setEnvironmentValue('PUSHER_APP_CLUSTER', $request->pusher_app_cluster);
            }
            return $this->responseWithSuccess(_trans('alert.Live_chat_settings_update'), [], 200);
        } catch (\Throwable $th) {
            Log::error($th->getMessage());

            return $this->responseWithError($th->getMessage(), [], 400);
        }
    }

    public function readMessages($id)
    {
        try {
            $this->model()->where('id', decryptFunction($id))->update(['is_seen' => 1]);

            return $this->responseWithSuccess(_trans('alert.message_read'), [], 200);
        } catch (\Throwable $th) {
            Log::error($th->getMessage());

            return $this->responseWithError($th->getMessage(), [], 400);
        }
    }

    public function setEnvironmentValue($type, $val)
    {
        $path = base_path('.env');
        if (file_exists($path)) {
            $val = '"' . trim($val) . '"';
            if (is_numeric(strpos(file_get_contents($path), $type)) && strpos(file_get_contents($path), $type) >= 0) {
                file_put_contents($path, str_replace(
                    $type . '="' . env($type) . '"',
                    $type . '=' . $val,
                    file_get_contents($path)
                ));
            } else {
                file_put_contents($path, file_get_contents($path) . "\r\n" . $type . '=' . $val);
            }
        }

        Artisan::call('optimize:clear');

        return true;
    }
}
