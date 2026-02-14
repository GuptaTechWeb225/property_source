@props([
    'class' => '',
    'icon' => 'fa-solid fa-ellipsis'
])
<div class="dropdown dropdown-action {{ $class }}">
    <button type="button" class="btn-dropdown" data-bs-toggle="dropdown"
            aria-expanded="false">
        <i class="{{ $icon }}"></i>
    </button>
    <div class="dropdown-menu dropdown-menu-end">
        {{ $slot }}
    </div>
</div>
