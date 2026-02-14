@props([
    'class' => 'dropdown-item ',
    'text' => 'text',
    'icon' => 'fa-solid fa-pen-to-square',
    'route' => null
])
<a class="{{ $class }} mb-3" {{ $attributes }} href="{{ isset($route) ? $route : '#'  }}">
    <span class="icon mr-8">
        <i class="{{ $icon }}"></i>
    </span>
    <span>{{ _trans('common.'.$text) }}</span>
</a>
