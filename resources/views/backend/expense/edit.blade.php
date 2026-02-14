@extends('backend.master')
@section('title')
    {{ $title }}
@endsection
@section('content')
    <x-container title="{{ $title }}" :breadcrumbs="[['title' => 'Account'],['title' => $title]]">
        <div class="table-content table-basic mt-20">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">{{ _trans('common.Expense Edit') }}</h4>
                </div>
                <div class="card-body ot-card">
                    <form action="{{ route('expense.update',$expense->id) }}" method="post" class="row" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <x-forms.select label="Account" name="account_id" :required="true" value="{{ @old('account_id') }}">
                            <option value="">{{ _trans('common.Select One') }}</option>
                            @foreach($accounts as $account)
                                <option value="{{ $account->id }}" {{ $account->id == $expense->account_id ? 'selected' : '' }}>
                                    {{ $account->name }} ({{ $account->user->name }})
                                </option>
                            @endforeach
                        </x-forms.select>
                        <x-forms.select label="Category" name="category_id" :required="true" value="{{ @old('type') }}">
                            <option value="">{{ _trans('common.Select One') }}</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ $category->id == $expense->category_id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </x-forms.select>
                        <x-forms.input
                            type="date"
                            label="Date"
                            name="date"
                            :required="true"
                            value="{{ $expense->date }}">
                        </x-forms.input>
                        <x-forms.input
                            type="number"
                            label="Amount"
                            name="amount"
                            :required="true"
                            value="{{ $expense->amount }}">
                        </x-forms.input>
                        <x-forms.input
                            label="Reference"
                            name="reference"
                            value="{{ $expense->reference }}">
                        </x-forms.input>
                        <x-forms.file
                            label="Attachment"
                            name="attachment"
                            accept="image/*,.pdf">
                        </x-forms.file>
                        <x-forms.textarea
                            label="Description"
                            name="description"
                            value="{{ $expense->description }}">
                        </x-forms.textarea>
                        <x-button></x-button>
                    </form>
                </div>
            </div>
        </div>
    </x-container>
@endsection
