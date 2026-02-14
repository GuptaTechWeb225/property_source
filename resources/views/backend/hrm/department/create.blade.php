@extends('backend.master')
@section('title', $title)
@php
    $model = 'department';
@endphp
@section('content')
    <x-container title="{{ $title }}" :breadcrumbs="[['title' => 'HRM'],['title' => 'Departments','route' => route($model.'.index')],['title' => $title]]">
        <div class="card ot-card">
            <div class="card-body">
                <form action="{{ route($model.'.store') }}" method="post" enctype="multipart/form-data" class="row">
                    @csrf
                    <x-forms.input
                            name="title"
                            label="Title"
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
