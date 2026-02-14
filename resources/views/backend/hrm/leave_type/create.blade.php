@extends('backend.master')
@php
$model = 'leavetype';
 @endphp
@section('title', $title)
@section('content')
    <x-container title="{{ $title }}" :breadcrumbs="[['title' => 'HRM'],['title' => 'Leave Type','route' => route($model.'.index')],['title' => $title]]">
        <div class="card ot-card">
            <div class="card-body">
                <form action="{{ route($model.'.store') }}" method="post" enctype="multipart/form-data" class="row">
                    @csrf
                    <x-forms.input
                        name="name"
                        label="Name"
                        :required="true"
                    ></x-forms.input>
                    <x-forms.select name="status" label="Status">
                        <option  value="active">{{ _trans('common.Active') }}</option>
                        <option  value="inactive">{{ _trans('common.Inactive') }}</option>
                    </x-forms.select>
                    <x-button></x-button>
                </form>
            </div>
        </div>
    </x-container>
@endsection
