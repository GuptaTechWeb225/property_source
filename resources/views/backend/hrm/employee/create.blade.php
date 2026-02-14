@extends('backend.master')
@php
$model = 'employee';
 @endphp
@section('title', $title)
@section('content')
    <x-container title="{{ $title }}" :breadcrumbs="[['title' => 'HRM'],['title' => 'Employees','route' => route($model.'.index')],['title' => $title]]">
        <div class="card ot-card">
            <div class="card-body">
                <form action="{{ route($model.'.store') }}" method="post" enctype="multipart/form-data" class="row">
                    @csrf
                    <x-forms.input
                        name="name"
                        label="Name"
                        :required="true"
                    ></x-forms.input>
                    <x-forms.select name="department_id" label="Department" :required="true">
                        <option  value="">{{ _trans('common.Select One') }}</option>
                        @foreach($departments as $department)
                            <option  value="{{ $department->id }}">{{ $department->title }}</option>
                        @endforeach
                    </x-forms.select>
                    <x-forms.select name="designation_id" label="Designation" :required="true">
                        <option  value="">{{ _trans('common.Select One') }}</option>
                        @foreach($designations as $designation)
                            <option  value="{{ $designation->id }}">{{ $designation->title }}</option>
                        @endforeach
                    </x-forms.select>
                    <x-forms.input
                        name="email"
                        label="Email"
                        :required="true"
                    ></x-forms.input>
                    <x-forms.input
                        name="phone"
                        label="Phone"
                        :required="true"
                    ></x-forms.input>
                    <x-forms.file
                        name="image"
                        label="Profile Photo"
                        :required="true"
                    ></x-forms.file>
                    <x-forms.input
                        type="password"
                        name="password"
                        label="Password"
                        :required="true"
                    ></x-forms.input>
                    <x-forms.input
                        type="password"
                        name="password_confirmation"
                        label="Confirm Password"
                        :required="true"
                    ></x-forms.input>
                    <x-button></x-button>
                </form>
            </div>
        </div>
    </x-container>
@endsection
