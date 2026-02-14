@extends('backend.master')
@section('title')
    {{ $title }}
@endsection
@section('content')
    <x-container title="{{ $title }}" :breadcrumbs="[['title' => 'Notifications', 'route' => route('notification.index')],['title' => 'Notification Details']]">
        <div class="table-content table-basic mt-20">
            <div class="ot-card">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="">
                            <h2>{{ $notification->title }}</h2>
                            <span>{{ _trans('common.Created') }}: </span>
                            <strong>{{ @$notification->createdby->name }}</strong>
                            <span>{{ $notification->created_at }}</span>
                        </div>
                        <div class="">
                            <a href="{{ route('notification.index') }}"><i class="fa fa-reply"></i> {{ _trans('common.Back') }}</a>
                        </div>
                    </div>
                    <div class="mt-30">
                        <p>
                            {!! $notification->message !!}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </x-container>
@endsection
