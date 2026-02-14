<?php

namespace Modules\LiveChat\Http\Controllers;

use App\Models\Order;
use App\Models\Property\Property;
use Illuminate\Http\Request;
use App\Interfaces\UserInterface;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Modules\LiveChat\Entities\MessageUser;
use Modules\LiveChat\Interfaces\LiveChatInterface;
use Modules\LiveChat\Http\Requests\LiveChatRequest;
use App\Helpers\CoreApp\Traits\ApiReturnFormatTrait;

class LiveChatController extends Controller
{
    use ApiReturnFormatTrait;

    private $user;
    private $live_chat;

    public function __construct(LiveChatInterface $liveChatInterface)
    {
        $this->live_chat = $liveChatInterface;
    }

    public function index(Request $request)
    {
        try {
            $data['title'] = _trans('Live Chat');
            return view('livechat::index', compact('data'));
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return redirect()->back()->with('danger', _trans('alert.something_went_wrong_please_try_again'));
        }
    }

    public function chatList(Request $request)
    {
        try {
            $data['user_id'] = @$request->user_id ? decrypt($request->user_id) : null;
            if (@$data['user_id']) {
                $data['user'] = MessageUser::with('image')->where('id', $data['user_id'])->first();
                $users        = MessageUser::with('image')->where('id', '!=', auth()->id())
                ->search($request)
                ->where('id', '!=', $data['user_id']);
            } else {
                $data['user'] = null;
                $users        = MessageUser::with('image')->search($request)->where('id', '!=', auth()->id());
            }

            $data['users'] = $users->orderBy('id', 'DESC')->paginate(5);
            $data['title'] = _trans('Live Chat');
            $content['last_page'] = $data['users']->lastPage();

            $content['html'] = view('livechat::partials.chat-list', compact('data'))->render();

            return $this->responseWithSuccess(_trans('Live Chat'), $content);
        } catch (\Throwable $th) {
            dd($th);
            Log::error($th->getMessage());
            return $this->responseWithError(_trans('alert.something_went_wrong_please_try_again'), [], 400);
        }
    }

    public function setting()
    {
        try {
            $data['title'] = _trans('Live Chat Setting');

            return view('livechat::setting', compact('data'));
        } catch (\Throwable $th) {
            Log::error($th->getMessage());

            return redirect()->back()->with('danger', _trans('alert.something_went_wrong_please_try_again'));
        }
    }

    public function settingUpdate(LiveChatRequest $request)
    {
        try {
            $result = $this->live_chat->update($request);
            if ($result->original['result']) {
                return redirect()->back()->with('success', $result->original['message']);
            } else {
                return redirect()->back()->with('danger', $result->original['message']);
            }
        } catch (\Throwable $th) {
            Log::error($th->getMessage());

            return redirect()->back()->with('danger', _trans('alert.something_went_wrong_please_try_again'));
        }
    }

    // live chat
    public function customerLiveChat()
    {
        try {
            $data['title'] = _trans('Live Chat');
            return view('livechat::customer.chat', compact('data'));
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return redirect()->back()->with('danger', _trans('alert.something_went_wrong_please_try_again'));
        }
    }
    // live chat

    public function customerChatList(Request $request)
    {
        try {
            $landownerIds = DB::table('order_details')
                ->join('properties', 'order_details.property_id', '=', 'properties.id')
                ->distinct()
                ->pluck('properties.user_id')
                ->toArray();

            $data['user_id'] = @$request->user_id ? decrypt($request->user_id) : null;
            if (@$data['user_id']) {
                $data['user'] = MessageUser::with('image')->where('id', $data['user_id'])->first();
                $users = MessageUser::with('image')
                    ->whereIn('id', $landownerIds)
                    ->search($request);
            } else {
                $data['user'] = null;
                $users = MessageUser::select('id','name','image_id','role_id')->with('image')
                    ->search($request)
                    ->whereIn('id', $landownerIds);
            }
            $data['users'] = $users->orderBy('id', 'DESC')->paginate(10);
            $data['title'] = _trans('live_chat.Live_Chat');
            $content['last_page'] = $data['users']->lastPage();
            $content['html'] = view('livechat::customer.chat-list', compact('data'))->render();
            return $this->responseWithSuccess(_trans('live_chat.Live_Chat'), $content); // return success response
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return $this->responseWithError(_trans('alert.something_went_wrong_please_try_again'), [], 400); // return error response
        }
    }

    // live chat
    public function instructorLiveChat()
    {
        try {
            $data['title'] = _trans('Live Chat');
            return view('livechat::instructor.live_chat', compact('data'));
        } catch (\Throwable $th) {
            Log::error($th->getMessage());

            return redirect()->back()->with('danger', _trans('alert.something_went_wrong_please_try_again'));
        }
    }
    // live chat

    public function instructorChatList(Request $request)
    {
        try {
            $data['user_id'] = @$request->user_id ? decryptFunction($request->user_id) : null;
            if (@$data['user_id']) {
                $data['user'] = MessageUser::with('image')->where('id', $data['user_id'])->first();
                $users = MessageUser::with('image')->where('id', '!=', auth()->id())
                    ->search($request)
                    ->where('id', '!=', $data['user_id']);
            } else {
                $data['user'] = null;
                $users = MessageUser::with('image')->search($request)->where('id', '!=', auth()->id());
            }
            $data['users'] = $users->orderBy('id', 'DESC')->paginate(5);
            $data['title'] = _trans('live_chat.Live_Chat');
            $content['last_page'] = $data['users']->lastPage();
            $content['html'] = view('livechat::partials.instructor-chat-list', compact('data'))->render();
            return $this->responseWithSuccess(_trans('live_chat.Live_Chat'), $content); // return success response
        } catch (\Throwable $th) {
            Log::error($th->getMessage());

            return $this->responseWithError(_trans('alert.something_went_wrong_please_try_again'), [], 400); // return error response
        }
    }
}
