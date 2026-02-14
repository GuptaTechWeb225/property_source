@extends('marsland::layouts.customer')
@section('title', _trans('common.Wishlists'))

@section('customer-content')
    <div class="sidebar-content-wrap flex-fill ot-card white-bg border-0">
        <div class="row">
            <div class="col-xl-12">
                <div class="d-flex align-items-center justify-content-between flex-wrap mb-10">
                    <div class="section-tittle-two pb-0">
                        <h5 class="title font-600 text-capitalize">{{ _trans('common.Accounts') }}</h5>
                    </div>
                    <a href="{{ route('customer.account.create') }}" class="btn btn-primary">{{ _trans('common.Add New') }}</a>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered role-table">
                        <thead class="thead">
                        <tr>
                            <th class="serial">{{ _trans('landlord.SR No') }}</th>
                            <th class="purchase">{{ _trans('landlord.Name') }}</th>
                            <th class="purchase">{{ _trans('landlord.Account Number') }}</th>
                            <th class="purchase">{{ _trans('landlord.Balance') }}</th>
                            <th class="action">{{ _trans('landlord.action') }}</th>
                        </tr>
                        </thead>
                        <tbody class="tbody">
                        @forelse($accounts as $account)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $account->name }}</td>
                                <td>{{ $account->account_no }}</td>
                                <td>{{ $account->balance }}</td>
                                <td class="action">
                                    <a href="{{ route('customer.account.edit', $account->id) }}"
                                       class="btn btn-primary btn-sm btn-rounded"
                                       title="{{ _trans('common.Edit') }}">
                                        <i class="ri-edit-fill"></i>
                                    </a>
                                    <a onclick="return confirm('Are you sure?')" href="{{ route('customer.account.delete', $account->id) }}"
                                       class="btn btn-danger btn-sm btn-rounded"
                                       title="{{ _trans('common.Delete') }}">
                                        <i class="ri-delete-bin-line"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center py-4" colspan="6">
                                    <h4>{{ _trans('common.No Data Available') }}</h4>
                                    <p>{{ _trans('common.Please Add New Entity Regarding This Table') }}</p>
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

