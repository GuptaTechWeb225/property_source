@props([
    'title' => 'Page Title',
    'breadcrumbs' => [],
])
<div {{ $attributes->merge(['class' => 'page-content']) }}>
    <div class="page-header">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="bradecrumb-title mb-1">{{ $title }}</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('dashboard') }}">{{ _trans('landlord.home') }}</a>
                    </li>
                    @foreach($breadcrumbs as $item)
                    <li class="breadcrumb-item {{ $loop->first ? 'active' :'' }}" aria-current="page">
                        <a href="{{ isset($item['route']) ? $item['route'] : 'javascript:'}}">
                            {{ _trans('landlord.'.$item['title']) }}
                        </a>
                    </li>
                    @endforeach
                </ol>
            </div>
            <div class="col-lg-6">
                {{ $rightPageHeader ?? ''}}
            </div>
        </div>
    </div>
    {{ $slot }}
</div>
