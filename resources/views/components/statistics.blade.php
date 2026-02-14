@props([
'class' => '',
'cardIcon' => 'las la-key',
'title' => 'Title',
'data' => 0,
'badgeUpTitle' => 'Active',
'badgeUpData' => 0,
'badgeDownTitle' => 'Inactive',
'badgeDownData' => 0,
'badge' => true,
])

<div class="col-12 col-md-6 col-lg-6 col-xl-3 {{ $class }}">
    <div class="card summery-card ot-card h-100 ">
        <div class="card-heading d-flex">
            <div class="card-icon icon-circle-4">
                <i class="{{ $cardIcon }}"></i>
            </div>
            <div class="card-content">
                <h4>{{ _trans('common.'.$title) }}</h4>
                <h1>{{ $data }}</h1>
            </div>
        </div>
        @if(isset($badge) && $badgeUpData)
            <div class="card-bottom mt-20">
                <div class="card-states">
                    <div class="card-badge up">
                        <img src="{{ asset('backend/assets/images/icons/arrow-up.svg') }}"
                             alt=""/>
                        <span class="count">{{ $badgeUpData }}</span>
                        <span class="status">{{ _trans('common.'.$badgeUpTitle) }}</span>
                    </div>

                    <div class="card-badge down">
                        <img src="{{ asset('backend/assets/images/icons/arrow-donw.svg') }}"
                             alt=""/>
                        <span class="count">{{ $badgeDownData }}</span>
                        <span class="status">{{ _trans('common.'.$badgeDownTitle) }}</span>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
