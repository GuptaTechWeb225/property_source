@extends('backend.master')
@section('title', $title)
@php
    $model = 'department';
@endphp
@section('content')
    <x-container title="{{ $title }}" :breadcrumbs="[['title' => 'HRM'],['title' => 'Departments', 'route' => route($model.'.index')],['title' => $title]]">
        <div class="card ot-card">
            <div class="card-body">
                <form action="{{ route($model.'.update', $department->id) }}" method="post" enctype="multipart/form-data" class="row">
                    @csrf
                    @method('put')
                    <x-forms.input
                        :required="true"
                        label="Title"
                        name="title"
                        value="{{ $department->title }}">
                    </x-forms.input>
                    <x-forms.select name="status" label="Status">
                        <option {{ $department->status == 'active' ? 'selected' : '' }} value="active">{{ _trans('common.Active') }}</option>
                        <option {{ $department->status == 'inactive' ? 'selected' : '' }} value="inactive">{{ _trans('common.Inactive') }}</option>
                    </x-forms.select>
                    <x-button></x-button>
                </form>
            </div>
        </div>
    </x-container>
@endsection
