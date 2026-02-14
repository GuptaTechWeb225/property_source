@extends('backend.master')
@section('title')
    {{ $title }}
@endsection
@section('content')
    <x-container title="{{ $title }}" :breadcrumbs="[['title' => 'Account'],['title' => $title]]">
        <div class="table-content table-basic mt-20">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">{{ _trans('common.Category Edit') }}</h4>
                </div>
                <div class="card-body ot-card">
                    <form action="{{ route('account_category.update',$category->id) }}" method="post" class="row">
                        @csrf
                        @method('put')
                        <x-forms.input
                            label="Name"
                            name="name"
                            :required="true"
                            value="{{ $category->name }}">
                        </x-forms.input>
                        <x-forms.select label="Type" name="type" :required="true" value="{{ @old('type') }}">
                            <option value="credit" {{ $category->type == 'credit' ? 'selected' : '' }}>{{ _trans('common.Credit') }}</option>
                            <option value="debit" {{ $category->type == 'debit' ? 'selected' : '' }}>{{ _trans('common.Debit') }}</option>
                        </x-forms.select>
                        <x-forms.select label="Status" name="status" :required="true" value="{{ @old('status') }}">
                            <option value="active" {{ $category->status == 'active' ? 'selected' : '' }}>{{ _trans('common.Active') }}</option>
                            <option value="inactive" {{ $category->status == 'inactive' ? 'selected' : '' }}>{{ _trans('common.Inactive') }}</option>
                        </x-forms.select>

                        <x-button></x-button>
                    </form>
                </div>
            </div>
        </div>
    </x-container>
@endsection
