<style>
    .preview-image-container {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
    }

    .preview-image-container img {
        width: 180px;
    }

    .preview-image-container .image-item {
        display: flex;
        flex-direction: column;
        gap: 10px;
        justify-content: center;
    }
</style>

@php
    $user_id = request()->route('user_id');
@endphp

<nav>
    <ul class="nav flex-column mb-5">
        <li class="nav-item">
            <a class="nav-link {{ isActiveRoute(route('property_owner_form_data', ['user_id' => $user_id, 'slide_no' => 1])) }}"
                aria-current="page"
                href="{{ route('property_owner_form_data', ['user_id' => $user_id, 'slide_no' => 1]) }}">{{ _trans('Personal Details') }}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ isActiveRoute(route('property_owner_form_data', ['user_id' => $user_id, 'slide_no' => 2])) }}"
                aria-current="page"
                href="{{ route('property_owner_form_data', ['user_id' => $user_id, 'slide_no' => 2]) }}">{{ _trans('Contact Address') }}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ isActiveRoute(route('property_owner_form_data', ['user_id' => $user_id, 'slide_no' => 3])) }}"
                aria-current="page"
                href="{{ route('property_owner_form_data', ['user_id' => $user_id, 'slide_no' => 3]) }}">{{ _trans('Occuption') }}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ isActiveRoute(route('property_owner_form_data', ['user_id' => $user_id, 'slide_no' => 4])) }}"
                aria-current="page"
                href="{{ route('property_owner_form_data', ['user_id' => $user_id, 'slide_no' => 4]) }}">{{ _trans('Biomatric Capture') }}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ isActiveRoute(route('property_owner_form_data', ['user_id' => $user_id, 'slide_no' => 5])) }}"
                aria-current="page"
                href="{{ route('property_owner_form_data', ['user_id' => $user_id, 'slide_no' => 5]) }}">{{ _trans('Company Details') }}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ isActiveRoute(route('property_owner_form_data', ['user_id' => $user_id, 'slide_no' => 6])) }}"
                aria-current="page"
                href="{{ route('property_owner_form_data', ['user_id' => $user_id, 'slide_no' => 6]) }}">{{ _trans('Property/Asset Information') }}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ isActiveRoute(route('property_owner_form_data', ['user_id' => $user_id, 'slide_no' => 7])) }}"
                aria-current="page"
                href="{{ route('property_owner_form_data', ['user_id' => $user_id, 'slide_no' => 7]) }}">{{ _trans('Land Details') }}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ isActiveRoute(route('property_owner_form_data', ['user_id' => $user_id, 'slide_no' => 8])) }}"
                aria-current="page"
                href="{{ route('property_owner_form_data', ['user_id' => $user_id, 'slide_no' => 8]) }}">{{ _trans('Indenture Details (A)') }}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ isActiveRoute(route('property_owner_form_data', ['user_id' => $user_id, 'slide_no' => 9])) }}"
                aria-current="page"
                href="{{ route('property_owner_form_data', ['user_id' => $user_id, 'slide_no' => 9]) }}">{{ _trans('Indenture Details (B)') }}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ isActiveRoute(route('property_owner_form_data', ['user_id' => $user_id, 'slide_no' => 10])) }}"
                aria-current="page"
                href="{{ route('property_owner_form_data', ['user_id' => $user_id, 'slide_no' => 10]) }}">{{ _trans('Deponent Details') }}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ isActiveRoute(route('property_owner_form_data', ['user_id' => $user_id, 'slide_no' => 11])) }}"
                aria-current="page"
                href="{{ route('property_owner_form_data', ['user_id' => $user_id, 'slide_no' => 11]) }}">{{ _trans('Land Title/Concurrence Details') }}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ isActiveRoute(route('property_owner_form_data', ['user_id' => $user_id, 'slide_no' => 12])) }}"
                aria-current="page"
                href="{{ route('property_owner_form_data', ['user_id' => $user_id, 'slide_no' => 12]) }}">{{ _trans('Yellow Card Details') }}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ isActiveRoute(route('property_owner_form_data', ['user_id' => $user_id, 'slide_no' => 13])) }}"
                aria-current="page"
                href="{{ route('property_owner_form_data', ['user_id' => $user_id, 'slide_no' => 13]) }}">{{ _trans('Building Permit Details') }}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ isActiveRoute(route('property_owner_form_data', ['user_id' => $user_id, 'slide_no' => 14])) }}"
                aria-current="page"
                href="{{ route('property_owner_form_data', ['user_id' => $user_id, 'slide_no' => 14]) }}">{{ _trans('Building Plan Details') }}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ isActiveRoute(route('property_owner_form_data', ['user_id' => $user_id, 'slide_no' => 15])) }}"
                aria-current="page"
                href="{{ route('property_owner_form_data', ['user_id' => $user_id, 'slide_no' => 15]) }}">{{ _trans('Building Plan Details (Continued)') }}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ isActiveRoute(route('property_owner_form_data', ['user_id' => $user_id, 'slide_no' => 16])) }}"
                aria-current="page"
                href="{{ route('property_owner_form_data', ['user_id' => $user_id, 'slide_no' => 16]) }}">{{ _trans('Room/Space Registration') }}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ isActiveRoute(route('property_owner_form_data', ['user_id' => $user_id, 'slide_no' => 17])) }}"
                aria-current="page"
                href="{{ route('property_owner_form_data', ['user_id' => $user_id, 'slide_no' => 17]) }}">{{ _trans('House/Space Purpose Registration') }}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ isActiveRoute(route('property_owner_form_data', ['user_id' => $user_id, 'slide_no' => 18])) }}"
                aria-current="page"
                href="{{ route('property_owner_form_data', ['user_id' => $user_id, 'slide_no' => 18]) }}">{{ _trans('Facility Registration') }}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ isActiveRoute(route('property_owner_form_data', ['user_id' => $user_id, 'slide_no' => 19])) }}"
                aria-current="page"
                href="{{ route('property_owner_form_data', ['user_id' => $user_id, 'slide_no' => 19]) }}">{{ _trans('Rent & Property Control Tenant Online Form') }}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ isActiveRoute(route('property_owner_form_data', ['user_id' => $user_id, 'slide_no' => 20])) }}"
                aria-current="page"
                href="{{ route('property_owner_form_data', ['user_id' => $user_id, 'slide_no' => 20]) }}">{{ _trans('Work Information') }}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ isActiveRoute(route('property_owner_form_data', ['user_id' => $user_id, 'slide_no' => 21])) }}"
                aria-current="page"
                href="{{ route('property_owner_form_data', ['user_id' => $user_id, 'slide_no' => 21]) }}">{{ _trans('Inhabitant Details') }}</a>
        </li>
    </ul>
</nav>
