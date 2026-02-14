@extends('backend.master')

@section('title')
    {{ $title }}
@endsection

@section('content')
    <x-container title="{{ $title }}" :breadcrumbs="[['title' => 'Accounts']]">
        <div class="table-content table-basic mt-20">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">{{ _trans('common.Accounts') }}</h4>
                    <a href="{{ route('account.create') }}" class="btn ot-btn-primary"><i
                            class="fa fa-plus-circle"></i> {{ _trans('common.Add New') }}</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered role-table">
                            <thead class="thead">
                            <tr>
                                <th class="serial">{{ _trans('landlord.SR No') }}</th>
                                <th class="purchase">{{ _trans('landlord.Category') }}</th>
                                <th class="purchase">{{ _trans('landlord.Name') }}</th>
                                <th class="purchase">{{ _trans('landlord.Account Number') }}</th>
                                <th class="purchase">{{ _trans('landlord.Balance') }}</th>
                                <th class="purchase">{{ _trans('landlord.Created By') }}</th>
                                <th class="action">{{ _trans('landlord.action') }}</th>
                            </tr>
                            </thead>
                            <tbody class="tbody">
                            @forelse($accounts as $account)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $account->category->name }}</td>
                                    <td>{{ $account->name }}</td>
                                    <td>{{ $account->account_no }}</td>
                                    <td>{{ $account->balance }}</td>
                                    <td>{{ $account->user->name }}</td>
                                    <td class="action">
                                        <x-action.dropdown>
                                            <x-action.button route="{{ route('account.edit',$account->id) }}" text="Edit"></x-action.button>
{{--                                            <x-action.button--}}
{{--                                                text="Delete"--}}
{{--                                                icon="fa-solid fa-trash-can"--}}
{{--                                                onclick="delete_row('account/destroy', {{ $account->id }})"--}}
{{--                                            ></x-action.button>--}}
                                        </x-action.dropdown>
                                    </td>
                                </tr>
                            @empty
                                <x-emptytable></x-emptytable>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </x-container>
@endsection
@push('script')
    @include('backend.partials.delete-ajax')
@endpush
