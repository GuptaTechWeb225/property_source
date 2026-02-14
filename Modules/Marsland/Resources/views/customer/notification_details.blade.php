@extends('marsland::layouts.customer')
@section('title', _trans('common.Profile'))

@section('customer-content')
    <div class="sidebar-content-wrap flex-fill ot-card white-bg border-0">
        <div class="row">
            <div class="col-xl-12 mb-3">
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-6">
                            <h4 class="bradecrumb-title mb-1">{{ _trans('common.Notification Details') }}</h4>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a
                                        href="{{ route('dashboard') }}">{{ _trans('common.home') }}</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{ route('customer.notifications') }}">{{ _trans('common.Notification') }}</a>
                                </li>
                                <li class="breadcrumb-item">{{ _trans('common.Notification Details') }}</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex flex-column mb-3">
                <h5 class="text-muted"> {{ $notification->title }}</h5>
                <p>
                    @if(!empty($notification->createdby))
                    <b>{{_trans('common.Sent By')}}
                        : {{ @$notification->createdby->name }}</b>, {{ $notification->created_at }}
                        @endif
                </p>
                <div class="text-muted">
                    {!! $notification->message !!}
                </div>
            </div>
        </div>
    </div>
@endsection
