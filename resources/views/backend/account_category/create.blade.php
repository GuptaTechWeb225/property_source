@extends('backend.master')
@section('title')
    {{ $title }}
@endsection
@section('content')
    <x-container title="{{ $title }}" :breadcrumbs="[['title' => 'Account'],['title' => $title]]">
        <div class="table-content table-basic mt-20">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">{{ _trans('common.Category Add') }}</h4>
                </div>
                <div class="card-body ot-card">
                    <form action="{{ route('account_category.store') }}" method="post" class="row">
                        @csrf
                        <x-forms.input
                            label="Name"
                            name="name"
                            :required="true"
                            value="{{ @old('name') }}">
                        </x-forms.input>
                        <x-forms.select label="Type" name="type" :required="true" value="{{ @old('type') }}">
                            <option value="credit">{{ _trans('common.Credit') }}</option>
                            <option value="debit">{{ _trans('common.Debit') }}</option>
                        </x-forms.select>
                        <x-forms.select label="Status" name="status" :required="true" value="{{ @old('status') }}">
                            <option value="active">{{ _trans('common.Active') }}</option>
                            <option value="inactive">{{ _trans('common.Inactive') }}</option>
                        </x-forms.select>

                        <x-button></x-button>
                    </form>
                </div>
            </div>
        </div>
    </x-container>
@endsection
