<?php

namespace Modules\LiveChat\Http\Controllers;

use App\Models\User;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;
use Modules\LiveChat\Http\Requests\MessageRequest;
use Modules\LiveChat\Interfaces\LiveChatInterface;
use App\Helpers\CoreApp\Traits\ApiReturnFormatTrait;

class MessageController extends Controller
{
    use ApiReturnFormatTrait;

    protected $authUser;
    protected $message;

    public function __construct(LiveChatInterface $liveChatInterface)
    {
        $this->message = $liveChatInterface;
    }

    public function chat($id)
    {
        $data['title']    = _trans('Live Chat');
        $data['messages'] = $this->message->model()
            ->UserReceiverIdOrReceiverUserId($id)
            ->orderBy('created_at', 'ASC')
            ->get();
        $data['user']     = User::where('id', $id)->first();

        return view('livechat::message.index', compact('data'));
    }

    public function store(MessageRequest $request, $id)
    {
        try {
            $request->merge(['user_id' => $id]);

            $result = $this->message->store($request);
            if ($result->original['result']) {
                return $this->responseWithSuccess($result->original['message'], globalAsset(auth()->user()->avatar_id));
            } else {
                return $this->responseWithError(_trans('alert.something_went_wrong_please_try_again'), [], 400);
            }
        } catch (\Throwable $th) {
            Log::error($th->getMessage());

            return $this->responseWithError(_trans('alert.something_went_wrong_please_try_again'), [], 400);
        }
    }

    public function customerChat($id)
    {
        $this->message->readMessages($id);

        $data['title']    = _trans('live_chat.Live_Chat');
        $data['messages'] = $this->message->model()
            ->UserReceiverIdOrReceiverUserId($id)
            ->orderBy('created_at', 'ASC')
            ->get();
        $data['user']     = User::where('id', $id)->first();

        return view('livechat::customer.message', compact('data'));
    }

    public function customerStore(MessageRequest $request, $id)
    {
        try {
            $request->merge(['user_id' => $id]);
            $result = $this->message->store($request);
            if ($result->original['result']) {
                return $this->responseWithSuccess($result->original['message'], @globalAsset(auth()->user()->image_id));
            } else {
                return $this->responseWithError(_trans('alert.something_went_wrong_please_try_again'), [], 400);
            }
        } catch (\Throwable $th) {
            dd($th);
            Log::error($th->getMessage());
            return $this->responseWithError(_trans('alert.something_went_wrong_please_try_again'), [], 400);
        }
    }

    public function instructorChat($id)
    {
        $this->message->readMessages($id);

        $data['messages'] = $this->message->model()->UserReceiverIdOrReceiverUserId($id)->orderBy('created_at', 'ASC')->get();
        $data['title']    = _trans('live_chat.Live_Chat');
        $data['user']     = User::where('id', $id)->first();

        return view('livechat::message.instructor', compact('data'));
    }

    public function instructorStore(MessageRequest $request, $id)
    {
        try {
            $request->merge(['user_id' => $id]);
            $result = $this->message->store($request);

            if ($result->original['result']) {
                return $this->responseWithSuccess($result->original['message'], uploaded_asset(auth()->user()->avatar_id));
            } else {
                return $this->responseWithError(_trans('alert.something_went_wrong_please_try_again'), [], 400);
            }
        } catch (\Throwable $th) {
            Log::error($th->getMessage());

            return $this->responseWithError(_trans('alert.something_went_wrong_please_try_again'), [], 400);
        }
    }

    public function messageRead($id)
    {
        $this->message->readMessages($id);

        return $this->responseWithSuccess(_trans('live_chat.message_read_successfully'), []);
    }
}
