@props([
'tab' => 'requirement',
'title' => '',
'subtitle' => "Here's your brief",
])


<div class="landlord-page-wrapper">
    <div class="section__title d-flex flex-wrap align-items-start gap-4">
        <div class="flex-fill">
            <h3 class="title">Welcome back, {{ auth()->user()->name }}</h3>
            <p class="fs-6 fw-normal">{{ $subtitle }}</p>
        </div>
        @isset($actionButton)
            {{ $actionButton }}
        @endisset
    </div>

    @if($tab == 'requirement')
        @include('landlord.includes.requirement_tab')
    @else
        @include('landlord.includes.property_tab')
    @endif
    {{ $slot }}


</div>

