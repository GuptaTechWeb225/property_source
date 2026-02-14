@extends('backend.master')
@section('title', $title)
@php
    $model = 'leavetype';
@endphp
@section('content')
    <x-container title="{{ $title }}" :breadcrumbs="[['title' => 'HRM'],['title' => 'Leave Type', 'route' => route($model.'.index')],['title' => $title]]">
        <div class="card ot-card">
            <div class="card-body">
                <form action="{{ route($model.'.update', $leave_type->id) }}" method="post" enctype="multipart/form-data" class="row">
                    @csrf
                    @method('put')
                    <x-forms.input
                        :required="true"
                        label="Name"
                        name="name"
                        value="{{ $leave_type->name }}">
                    </x-forms.input>
                    <x-forms.select name="status" label="Status">
                        <option {{ $leave_type->status == 'active' ? 'selected' : '' }} value="active">{{ _trans('common.Active') }}</option>
                        <option {{ $leave_type->status == 'inactive' ? 'selected' : '' }} value="inactive">{{ _trans('common.Inactive') }}</option>
                    </x-forms.select>
                    <x-button></x-button>
                </form>
            </div>
        </div>
    </x-container>
@endsection
