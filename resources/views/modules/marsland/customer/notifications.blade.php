@extends('marsland::layouts.customer')
@section('title', _trans('common.Profile'))

@section('customer-content')
    <div class="sidebar-content-wrap flex-fill ot-card white-bg border-0">
        <div class="row">
            <div class="col-xl-12 border-bottom mb-3">
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-6">
                            <h4 class="bradecrumb-title mb-1">{{ _trans('common.Notifications') }}</h4>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a
                                        href="{{ route('dashboard') }}">{{ _trans('common.home') }}</a>
                                </li>
                                <li class="breadcrumb-item">{{ _trans('common.Notifications') }}</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            @foreach ($notifications as $notification)
                <div class="d-flex bg-white shadow-sm rounded justify-content-start align-items-center mb-3">
                    <div class="{{ $notification->is_read ? 'bg-info':'bg-primary' }}  h-100 px-3 d-flex align-items-center">
                        <h5 class="text-white">{{ $loop->iteration }}</h5>
                    </div>
                    <a href="{{ route('customer.notification_details', $notification->id) }}" class="p-3">
                        <h5 class="{{ $notification->is_read ? 'text-muted':'text-primary' }}"> {{ $notification->title }}</h5>
                        <p>
                            @if(!empty($notification->createdby))
                            <b>{{_trans('common.Sent By')}}
                                : {{ @$notification->createdby->name }}</b>, {{ $notification->created_at }}
                                @endif
                        </p>
                        <div class="text-muted">
                            {{ strip_tags($notification->message) }}
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
