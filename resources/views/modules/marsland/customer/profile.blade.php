@extends('marsland::layouts.customer')
@section('title', _trans('common.Profile'))

@section('customer-content')
    <div class="sidebar-content-wrap flex-fill ot-card white-bg border-0">
        <div class="my-profile-card">
            <div class="d-flex flex-wrap align-items-center gap-20 border-bottom mb-20 pb-15 ">
                <!-- Profile -->
                <div class="profile-image">
                    <img src="{{ @globalAsset(auth()->user()->image?->path) }}" class="img-cover" alt="img">
                </div>
                <div class="caption">
                    <h6 class="profile-name font-600">{{ $user->name }}</h6>
                    <p class="profile-user-name font-500">{{ $user->email }}</p>
                    <div class="country d-flex align-items-center pb-20 mb-10">
                        <span class="country text-title font-600">{{ _trans('common.Country :') }} {{ $user->country?->name }}</span>
                    </div>
                </div>
            </div>

            <!-- About me -->
            <div class="about-me">
                <div class="country d-flex align-items-center mb-10">
                    <span class="country text-title font-600 ml-10">{{ _trans("common.Phone") }}</span>
                    <span class="country text-title font-600 ml-10">{{ $user->phone }}</span>
                </div>
                <div class="country d-flex align-items-center mb-10">
                    <span class="country text-title font-600 ml-10">{{ _trans("common.Date of birth") }}</span>
                    <span class="country text-title font-600 ml-10">{{ $user->date_of_birth }}</span>
                </div>
            </div>

        </div>
        <!-- Profile  -->
    </div>
@endsection
