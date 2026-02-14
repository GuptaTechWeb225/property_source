@extends('backend.master')

@section('title')
    {{ $title }}
@endsection

@section('content')
    <x-container title="{{ $title }}" :breadcrumbs="[['title' => 'Accounts', 'route' => route('account.index')], ['title' => 'Account Edit']]">
        <div class="card ot-card">
            <div class="card-body">
                <form action="{{ route('account.update', $account->id) }}" class="row" method="post">
                    @csrf
                    @method('put')
                    <x-forms.select :required="true" label="Account Category" name="account_category_id">
                        @foreach($categories as $category)
                            <option {{ $category->id == $account->account_category_id ? 'selected':'' }} value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </x-forms.select>
                    <x-forms.input
                        :required="true"
                        label="Account Name"
                        name="name"
                        value="{{ $account->name }}"
                    ></x-forms.input>
                    <x-forms.input
                        :required="true"
                        label="Account Number"
                        name="account_no"
                        value="{{ $account->account_no }}"
                    ></x-forms.input>
                    <x-forms.input
                        :required="true"
                        type="number"
                        label="Balance"
                        name="balance"
                        value="{{ $account->balance }}"
                    ></x-forms.input>
                    <x-forms.switch
                        :required="true"
                        col="mt-2 mb-5"
                        label="Set as default"
                        name="is_default"
                    ></x-forms.switch>

                    <x-forms.textarea label="Details" name="details"></x-forms.textarea>

                    <x-button title="Update"></x-button>
                </form>
            </div>
        </div>
    </x-container>

@endsection
