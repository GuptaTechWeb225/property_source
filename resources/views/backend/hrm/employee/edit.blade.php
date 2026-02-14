@extends('backend.master')
@section('title', $title)
@php
    $model = 'employee';
@endphp
@section('content')
    <x-container title="{{ $title }}" :breadcrumbs="[['title' => 'HRM'],['title' => 'Employees', 'route' => route($model.'.index')],['title' => $title]]">
        <div class="card ot-card">
            <div class="card-body">
                <form action="{{ route($model.'.update', $employee->id) }}" method="post" enctype="multipart/form-data" class="row">
                    @csrf
                    @method('put')
                    <x-forms.input
                        name="name"
                        label="Name"
                        :required="true"
                        value="{{ $employee->name }}"
                    ></x-forms.input>
                    <x-forms.select name="department_id" label="Department" :required="true">
                        <option  value="">{{ _trans('common.Select One') }}</option>
                        @foreach($departments as $department)
                            <option {{ $employee->department_id == $department->id ? 'selected' : '' }} value="{{ $department->id }}">{{ $department->title }}</option>
                        @endforeach
                    </x-forms.select>
                    <x-forms.select name="designation_id" label="Designation" :required="true">
                        <option  value="">{{ _trans('common.Select One') }}</option>
                        @foreach($designations as $designation)
                            <option {{ $employee->designation_id == $designation->id ? 'selected' : '' }} value="{{ $designation->id }}">{{ $designation->title }}</option>
                        @endforeach
                    </x-forms.select>
                    <x-forms.input
                        name="email"
                        label="Email"
                        :required="true"
                        value="{{ $employee->email }}"
                    ></x-forms.input>
                    <x-forms.input
                        name="phone"
                        label="Phone"
                        :required="true"
                        value="{{ $employee->phone }}"
                    ></x-forms.input>
                    <x-forms.file
                        name="image"
                        label="Profile Photo"
                        :required="true"
                    ></x-forms.file>
                    <x-button></x-button>
                </form>
            </div>
        </div>
    </x-container>
@endsection
