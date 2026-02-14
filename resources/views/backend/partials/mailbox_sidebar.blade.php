<li class="sidebar-menu-item {{ set_menu(['email.box.index', 'email.box.create', 'email.box.show', 'email.box.draft.reply']) }}">
    <a href="{{ route('email.box.index') }}" class="parent-item-content">
        <i class="las la-envelope"></i>
        <span class="on-half-expanded">{{ _trans('common.Mailbox') }}</span>
    </a>
</li>