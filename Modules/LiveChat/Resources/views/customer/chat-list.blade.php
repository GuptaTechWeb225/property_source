@if (@$data['user'])
    <a class="single-chat active" href="{{ route('customer_livechat.chat', $data['user']->id) }}">
        <div class="chat-cap">
            <div class="user-img">
                <img src="{{ @globalAsset($data['user']->image->path) }}" alt="img" class="img-cover">
            </div>
            <div class="user-chat-caption">
                <h5 class="user-name">{{ @$data['user']->name }}</h5>
                <p class="chat">{{ @$data['user']->role->name }}</p>
            </div>
        </div>
        @if ($data['user']->lastMessage && $data['user']->unreadMessages->count() > 0)
            <div class="chat-timer mb-10">
                <span class="time">{{ $data['user']->lastMessage->created_at->diffForHumans() }}</span>
                <span class="chat-count">{{ $data['user']->unreadMessages->count() }}</span>
            </div>
        @endif
    </a>

@endif

@foreach ($data['users'] as $user)
    <a class="single-chat @if ($user->id == $data['user_id']) active @endif"
        href="{{ route('customer_livechat.chat', $user->id) }}">
        <div class="chat-cap">
            <div class="user-img">
                <img src="{{ @globalAsset($user->avatar_id) }}" alt="img" class="img-cover">
            </div>
            <div class="user-chat-caption">
                <h5 class="user-name">{{ @$user->name }}</h5>
                <p class="chat">{{ @$user->role->name }}</p>
            </div>
        </div>
        @if ($user->lastMessage && $user->unreadMessages->count() > 0)
            <div class="chat-timer mb-10">
                <span class="time">{{ $user->lastMessage->created_at->diffForHumans() }}</span>
                <span class="chat-count">{{ $user->unreadMessages->count() }}</span>
            </div>
        @endif
    </a>
@endforeach
