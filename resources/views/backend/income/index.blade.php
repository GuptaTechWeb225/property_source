@extends('backend.master')
@section('title')
    {{ $title }}
@endsection
@section('content')
    <x-container title="{{ $title }}" :breadcrumbs="[['title' => 'Accounts', 'route' => route('account.index')],['title' => $title]]">
        <div class="table-content table-basic mt-20">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">{{ $title }}</h4>
                    <a href="{{ route('income.create') }}" class="btn ot-btn-primary btn-lg">
                        <i class="las la-plus"></i>{{ _trans('common.Add New') }}</a>
                </div>
                <div class="card-body ot-card">
                    <div class="table-responsive">
                        <table class="table table-bordered ot-table-bg">
                            <thead class="thead">
                            <tr>
                                <th class="serial">{{ _trans('common.SR No') }}</th>
                                <th>{{ _trans('common.Account Name') }}</th>
                                <th>{{ _trans('common.Category') }}</th>
                                <th>{{ _trans('common.Amount') }}</th>
                                <th>{{ _trans('common.Date') }}</th>
                                <th>{{ _trans('common.Referenace') }}</th>
                                <th>{{ _trans('common.Created By') }}</th>
                                <th>{{ _trans('common.Action') }}</th>
                            </tr>
                            </thead>
                            <tbody class="tbody">
                                @forelse($incomes as $row)
                                    <tr>
                                        <th>{{ $loop->iteration }}</th>
                                        <td>{{ @$row->account->name }}</td>
                                        <td>{{ @$row->category->name }}</td>
                                        <td>{{ $row->amount }}</td>
                                        <td>{{ $row->date }}</td>
                                        <td>{{ $row->reference }}</td>
                                        <td>{{ @$row->createdby->name }}</td>
                                        <td>
                                            <x-action.dropdown>
                                                <x-action.button text="Edit" route="{{ route('income.edit',$row->id) }}"></x-action.button>
                                                <x-action.button
                                                    text="Invoice"
                                                    icon="fa-solid fa-print"
                                                    route="{{ route('income.show',$row->id) }}"
                                                ></x-action.button>
                                                <x-action.button
                                                    onclick="delete_row('income/destroy', '{{$row->id}}')"
                                                    text="Delete"
                                                    icon="fa-solid fa-trash-can">
                                                </x-action.button>
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
