@extends('backend.master')
@section('title')
    {{ $title }}
@endsection
@section('content')
    <x-container title="{{ $title }}" :breadcrumbs="[['title' => 'Account'],['title' => $title]]">
        <div class="table-content table-basic mt-20">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">{{ _trans('common.Income Add') }}</h4>
                </div>
                <div class="card-body ot-card">
                    <form action="{{ route('income.store') }}" method="post" class="row" enctype="multipart/form-data">
                        @csrf
                        <x-forms.select label="Account" name="account_id" :required="true" value="{{ @old('account_id') }}">
                            <option value="">{{ _trans('common.Select One') }}</option>
                            @foreach($accounts as $account)
                                <option value="{{ $account->id }}">{{ $account->name }} ({{ $account->user->name }})</option>
                            @endforeach
                        </x-forms.select>
                        <x-forms.select label="Category" name="category_id" :required="true" value="{{ @old('type') }}">
                            <option value="">{{ _trans('common.Select One') }}</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </x-forms.select>
                        <x-forms.input
                            type="date"
                            label="Date"
                            name="date"
                            :required="true"
                            value="{{ @old('date') }}">
                        </x-forms.input>
                        <x-forms.input
                            type="number"
                            label="Amount"
                            name="amount"
                            :required="true"
                            value="{{ @old('amount') }}">
                        </x-forms.input>
                        <x-forms.input
                            label="Reference"
                            name="reference"
                            value="{{ @old('Reference') }}">
                        </x-forms.input>
                        <x-forms.file
                            label="Attachment"
                            name="attachment"
                            accept="image/*,.pdf">
                        </x-forms.file>
                        <x-forms.textarea
                            label="Description"
                            name="description"
                            value="{{ @old('description') }}">
                        </x-forms.textarea>
                        <x-button></x-button>
                    </form>
                </div>
            </div>
        </div>
    </x-container>
@endsection
