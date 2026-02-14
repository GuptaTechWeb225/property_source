<nav>
    <ul class="nav flex-column">
        {{-- <li class="nav-item">
            <a class="nav-link " aria-current="page" href="./profile">My Profile</a>
        </li> --}}
        <li class="nav-item">
            <a class="nav-link {{ request()->route()->parameters['type'] === 'basicInfo' ? 'active' : '' }}" href="{{route('users.profileDetails',[$data['id'], 'basicInfo'] )}}">{{ _trans('landlord.Basic Info')}}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->route()->parameters['type'] === 'documents' ? 'active' : '' }}"  href="{{route('users.profileDetails', [$data['id'], 'documents'])}}">{{ _trans('landlord.Documents')}}</a>
        </li>
         <li class="nav-item">
            <a class="nav-link {{ request()->route()->parameters['type'] === 'emergency' ? 'active' : '' }}" href="{{route('users.profileDetails', [$data['id'], 'emergency'])}}">{{ _trans('landlord.Emergency')}}</a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ request()->route()->parameters['type'] === 'accountCategory' ? 'active' : '' }}" href="{{route('users.profileDetails',[$data['id'], 'accountCategory'])}}">{{ _trans('landlord.Account Category')}}</a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ request()->route()->parameters['type'] === 'accounts' ? 'active' : '' }}" href="{{route('users.profileDetails',[$data['id'], 'accounts'])}}">{{ _trans('landlord.Account')}}</a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ request()->route()->parameters['type'] === 'transaction' ? 'active' : '' }}" href="{{route('users.profileDetails', [$data['id'], 'transaction'])}}">{{ _trans('landlord.Transaction')}}</a>
        </li>
{{--        <li class="nav-item">--}}
{{--            <a class="nav-link {{ request()->route()->parameters['type'] === 'agreements' ? 'active' : '' }}" href="{{route('users.profileDetails', [$data['id'], 'agreements'])}}">{{ _trans('landlord.Agreements')}}</a>--}}
{{--        </li>--}}

    </ul>
</nav>
