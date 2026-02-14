@extends('backend.master')

@section('title')
    {{ @$data['title'] }}
@endsection
@section('content')

    <div class="page-content">

        {{-- bradecrumb Area S t a r t --}}
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h4 class="bradecrumb-title mb-1">{{ $data['title'] }}</h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ _trans('landlord.Home')}}</a></li>
                        <li class="breadcrumb-item">{{ $data['title'] }}</li>
                        <li class="breadcrumb-item">{{ _trans('landlord.View')}}</li>
                    </ol>
                </div>
                <div class="col-md-6 mt-3">
                    <div class="text-end">
                            <a href="{{ route('contact.index') }}" class="btn btn-lg ot-btn-primary"><i class="fa-solid fa-arrow-left"></i> {{ _trans('landlord.back')}}</a>
                    </div>
                </div>
            </div>
        </div>

        {{-- bradecrumb Area E n d --}}
        <div class="card ot-card">
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-12">
                        <div class="row mt-3">
                            <div class="col-md-2">
                                <h4>{{ _trans('landlord.Name')}}</h4>
                                <p>{{ $data['contact']->f_name }} {{ $data['contact']->l_name }}</p>
                            </div>
                            <div class="col-md-2">
                                <h4>{{ _trans('landlord.Email')}}</h4>
                                <p>{{ $data['contact']->email }}</p>
                            </div>
                            <div class="col-md-2">
                                <h4>{{ _trans('landlord.Phone Number')}}</h4>
                                <p>{{ $data['contact']->phone_number }}</p>
                            </div>
                            <div class="col-md-2">
                                <h4>{{ _trans('landlord.Date')}}</h4>
                                <p>{{ $data['contact']->created_at }}</p>
                            </div>
                            <div class="col-md-2">
                                <h4>{{ _trans('landlord.Reason')}}</h4>
                                <p>{{ $data['contact']->reason }}</p>
                            </div>
                            <div class="col-md-2">
                                <h4>{{ _trans('landlord.Order No')}}</h4>
                                <p>{{ $data['contact']->order_no }}</p>
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col-md-12">
                                <h4>{{ _trans('landlord.Message')}}</h4>
                                <p>{{ $data['contact']->message }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
