@props([
    'successStatus' => ['active','approve'],
    'warningStatus' => ['active','pending'],
    'errorStatus' => ['inactive','pending','cancelled'],
])
@if(in_array($slot,$successStatus))
    <span class="badge-basic-success-text text-capitalize">
        {{ $slot }}
    </span>
@elseif(in_array($slot,$warningStatus))
    <span class="badge-basic-warning-text text-capitalize">
        {{ $slot }}
    </span>
@elseif(in_array($slot,$errorStatus))
    <span class="badge-basic-danger-text text-capitalize">
        {{ $slot }}
    </span>
@else
    {{ $slot }}
@endif
