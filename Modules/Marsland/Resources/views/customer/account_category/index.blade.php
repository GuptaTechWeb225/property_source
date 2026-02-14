@extends('marsland::layouts.customer')
@section('title', _trans('common.Account Category'))

@section('customer-content')
    <div class="sidebar-content-wrap flex-fill ot-card white-bg border-0">
        <div class="row">
            <div class="col-xl-12">
                <div class="d-flex align-items-center justify-content-between flex-wrap mb-10">
                    <div class="section-tittle-two pb-0">
                        <h5 class="title font-600 text-capitalize">{{ _trans('common.Accounts Category') }}</h5>
                    </div>
                    <a href="{{ route('customer.account_category.create') }}"
                       class="btn btn-primary">{{ _trans('common.Add New') }}
                    </a>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered role-table">
                        <thead class="thead">
                        <tr>
                            <th class="serial">{{ _trans('landlord.SR No') }}</th>
                            <th class="purchase">{{ _trans('landlord.Name') }}</th>
                            <th class="purchase">{{ _trans('landlord.Type') }}</th>
                            <th class="purchase">{{ _trans('landlord.Status') }}</th>
                            <th class="action">{{ _trans('landlord.action') }}</th>
                        </tr>
                        </thead>
                        <tbody class="tbody">
                        @forelse($categories as $category)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $category->name }}</td>
                                <td><span class="text-capitalize">{{ $category->type }}</span></td>
                                <td>
                                    <span class="text-capitalize badge bg-{{$category->status =='active'?'primary':'danger'}}">{{ $category->status }}</span>
                                </td>
                                <td class="action">
                                    <a href="{{ route('customer.account_category.edit', $category->id) }}"
                                       class="btn btn-primary btn-sm btn-rounded"
                                       title="{{ _trans('common.Edit') }}">
                                        <i class="ri-edit-fill"></i>
                                    </a>
                                    <a onclick="return confirm('Are you sure?')" href="{{ route('customer.account_category.delete', $category->id) }}"
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

