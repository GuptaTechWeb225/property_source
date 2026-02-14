@props([
    'title' => 'Page Title',
    'addButton' => true,
    'buttonTitle' => 'Add New',
    'route' => null,
])
<div {{ $attributes->merge(['class' => 'table-content table-basic mt-20']) }}>
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="mb-0">{{ $title }}</h4>
            @if($addButton)
                <a href="{{ !empty($route) ? $route : '#' }}" class="btn btn-lg ot-btn-primary">
                    <i class="las la-plus"></i> {{ _trans('common.'.$buttonTitle) }}
                </a>
            @endif
        </div>
        <div class="card-body ot-card">
            {{ $slot }}
        </div>
    </div>
</div>
