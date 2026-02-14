<ul class="list-unstyled mailbox-menu">
    <li>
        <a href="{{ route('sms.create') }}"
            class="d-flex align-items-center gap-2 {{ request()->routeIs('sms.create') ? 'active' : '' }}">
            <i class="las la-at fs-3"></i>
            {{ _trans('common.Compose') }}
        </a>
    </li>
    <li>
        <a href="{{ route('sms.index') }}"
            class="d-flex align-items-center gap-2 {{ request()->routeIs('sms.index') && !request()->filled('status') ? 'active' : '' }}">
            <i class="las la-inbox fs-3"></i>
            {{ _trans('common.Logs') }}
        </a>
    </li>
</ul>
