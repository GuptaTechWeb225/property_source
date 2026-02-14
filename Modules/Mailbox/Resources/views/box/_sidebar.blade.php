<ul class="list-unstyled mailbox-menu">
    <li>
        <a 
            href="{{ route('email.box.create') }}"
            class="d-flex align-items-center gap-2 {{ request()->routeIs('email.box.create') ? 'active' : '' }}"
        >
            <i class="las la-at fs-3"></i>
            {{ _trans('common.Compose') }}
        </a>
    </li>
    <li>
        <a 
            href="{{ url('email/box') }}"
            class="d-flex align-items-center gap-2 {{ request()->routeIs('email.box.index') && !request()->filled('status') ? 'active' : '' }}"
        >
            <i class="las la-inbox fs-3"></i>    
            {{ _trans('common.Inbox') }}
        </a>
    </li>
    <li>
        <a 
            href="{{ route('email.box.index', ['status' => 'sent']) }}"
            class="d-flex align-items-center gap-2 {{ request()->routeIs('email.box.index') && request('status') == 'sent' ? 'active' : '' }}"
        >
            <i class="las la-paper-plane fs-3"></i>
            {{ _trans('common.Sent') }}
        </a>
    </li>
    <li>
        <a 
            href="{{ route('email.box.index', ['status' => 'starred']) }}"
            class="d-flex align-items-center gap-2 {{ request()->routeIs('email.box.index') && request('status') == 'starred' ? 'active' : '' }}"
        >
            <i class="las la-star fs-3"></i>
            {{ _trans('common.Starred') }}
        </a>
    </li>
    <li>
        <a 
            href="{{ route('email.box.index', ['status' => 'important']) }}"
            class="d-flex align-items-center gap-2 {{ request()->routeIs('email.box.index') && request('status') == 'important' ? 'active' : '' }}"
        >
            <i class="las la-bookmark fs-3"></i>
            {{ _trans('common.Important') }}
        </a>
    </li>
    <li>
        <a 
            href="{{ route('email.box.index', ['status' => 'draft']) }}"
            class="d-flex align-items-center gap-2 {{ request()->routeIs('email.box.index') && request('status') == 'draft' ? 'active' : '' }}"
        >
            <i class="las la-save fs-3"></i>
            {{ _trans('common.Draft') }}
        </a>
    </li>
    <li>
        <a 
            href="{{ route('email.box.index', ['status' => 'trash']) }}"
            class="d-flex align-items-center gap-2 {{ request()->routeIs('email.box.index') && request('status') == 'trash' ? 'active' : '' }}"
        >
            <i class="las la-trash-alt fs-3"></i>
            {{ _trans('common.Trash') }}
        </a>
    </li>
    <li class="d-none">
        <a 
            href="{{ url('mailbox/template') }}"
            class="d-flex align-items-center gap-2 {{ request()->routeIs('email.box.template') ? 'active' : '' }}"
        >
            <i class="las la-window-minimize fs-3"></i>
            {{ _trans('common.Templates') }}
        </a>
    </li>
</ul>
