@extends('backend.master')
@section('title')
    {{ @$data['title'] }}
@endsection
@section('content')
    <div class="page-content">

        {{-- bradecrumb Area S t a r t --}}
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h4 class="bradecrumb-title mb-1">{{ $data['title'] }}</h1>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a
                                    href="{{ route('dashboard') }}">{{ _trans('common.home') }}</a>
                            </li>
                            <li class="breadcrumb-item">{{ $data['title'] }}</li>
                        </ol>
                </div>
            </div>
        </div>
    {{-- bradecrumb Area E n d --}}

    <!--  table content start -->
        <div class="table-content table-basic mt-20">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">{{ _trans('landlord.Advertisement') }}</h4>
                    @if (hasPermission('property_create'))
                        <a href="{{ route('advertisements.create') }}" class="btn btn-lg ot-btn-primary">
                            <span><i class="fa-solid fa-plus"></i> </span>
                            <span class="">{{ _trans('landlord.Add Advertisement') }}</span>
                        </a>
                    @endif
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered user-table">
                            <thead class="thead">
                            <tr>
                                <th class="serial">{{ _trans('landlord.SR No..') }}</th>
                                <th class="purchase">{{ _trans('landlord.Property Name') }}</th>
                                <th class="purchase">{{ _trans('landlord.Advertisement Type') }}</th>
                                <th class="purchase">{{ _trans('landlord.Booking Amount') }}</th>
                                <th class="purchase">{{ _trans('landlord.Rent Amount') }}</th>
                                <th class="purchase">{{ _trans('landlord.Rent Type') }}</th>
                                <th class="purchase">{{ _trans('landlord.Rent Start Date') }}</th>
                                <th class="purchase">{{ _trans('landlord.Rent End Date') }}</th>
                                <th class="purchase">{{ _trans('landlord.Sell Amount') }}</th>
                                <th class="purchase">{{ _trans('landlord.Sell Start Date') }}</th>
                                <th class="purchase">{{ _trans('landlord.Negotiable') }}</th>
                                <th class="purchase">{{ _trans('landlord.Status') }}</th>
                                <th class="purchase">{{ _trans('landlord.Approval Status') }}</th>
                                @if (hasPermission('user_update') || hasPermission('user_delete'))
                                    <th class="action">{{ _trans('landlord.action') }}</th>
                                @endif
                            </tr>
                            </thead>
                            <tbody class="tbody">
                            @forelse ($data['property'] as $key => $row)
                                <tr id="row_{{ $row->id }}">
                                    <td class="serial">{{ ++$key }}</td>
                                    <td>
                                        {{ @$row->property->name }}
                                    </td>
                                    <td>
                                        {{ App\Utils\Utils::advertisementTypes()[$row->advertisement_type] }}
                                    </td>
                                    <td>
                                        {{ priceFormat($row->booking_amount) }}
                                    </td>
                                    @if (@$row->ade)
                                    @endif
                                    <td>
                                        {{ priceFormat($row->rent_amount)  }}
                                    </td>
                                    <td>

                                        {{ @$row->rent_type == 1 ? 'Monthly' : 'Yearly' }}
                                    </td>
                                    <td>
                                        {{ @$row->rent_start_date }}
                                    </td>
                                    <td>
                                        {{ @$row->rent_end_date }}
                                    </td>
                                    <td>
                                        {{ priceFormat($row->sell_amount) }}
                                    </td>
                                    <td>
                                        {{ @$row->sell_start_date }}
                                    </td>
                                    <td>
                                        {{ @$row->negotiable == 1 ? 'Negotiable' : 'Not Negotiable' }}
                                    </td>
                                    <td>
                                        @if ($row->status == App\Enums\Status::ACTIVE)
                                            <span class="badge-basic-success-text">{{ _trans('common.active') }}</span>
                                        @else
                                            <span
                                                class="badge-basic-danger-text">{{ _trans('common.inactive') }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($row->approval_status == App\Enums\ApprovalStatus::APPROVED)
                                            <span
                                                class="badge-basic-success-text">{{ _trans('landlord.Approved') }}</span>
                                        @elseif ($row->approval_status == App\Enums\ApprovalStatus::PENDING)
                                            <span
                                                class="badge-basic-warning-text">{{ _trans('landlord.Pending') }}</span>
                                        @elseif ($row->approval_status == App\Enums\ApprovalStatus::REJECTED)
                                            <span
                                                class="badge-basic-danger-text">{{ _trans('landlord.Rejected') }}</span>
                                        @elseif ($row->approval_status == App\Enums\ApprovalStatus::CANCELLED)
                                            <span
                                                class="badge-basic-danger-text">{{ _trans('landlord.Cancelled') }}</span>
                                        @elseif ($row->approval_status == App\Enums\ApprovalStatus::DELETED)
                                            <span
                                                class="badge-basic-danger-text">{{ _trans('landlord.Deleted') }}</span>
                                        @endif
                                    </td>

                                    @if (hasPermission('user_update') || hasPermission('user_delete'))
                                        <td class="action">
                                            <div class="dropdown dropdown-action">
                                                <button type="button" class="btn-dropdown" data-bs-toggle="dropdown"
                                                        aria-expanded="false">
                                                    <i class="fa-solid fa-ellipsis"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li>
                                                        <a class="dropdown-item"
                                                           href="{{ route('admin.properties.details', [@$row->id, 'basicInfo']) }}">
                                                                <span class="icon mr-8"><i
                                                                        class="fa-solid fa-eye"></i></span>
                                                            <span>{{ _trans('common.view') }}</span>
                                                        </a>
                                                    </li>
                                                    @if (hasPermission('user_delete'))
                                                        <li>
                                                            <a class="dropdown-item" href="javascript:void(0);"
                                                               onclick="delete_row('advertisements/delete', {{ @$row->id }})">
                                                                    <span class="icon mr-12"><i
                                                                            class="fa-solid fa-trash-can"></i></span>
                                                                <span>{{ _trans('common.delete') }}</span>
                                                            </a>
                                                        </li>
                                                    @endif
                                                    @if(isSuperAdmin())
                                                        @if ($row->approval_status == 2)
                                                            <li>
                                                                <a class="dropdown-item"
                                                                   href="{{ route('advertisements.approveStatus', [@$row->id, 'approve']) }}">
                                                                        <span class="icon mr-8"><i
                                                                                class="fa-solid fa-circle-check"></i></span>
                                                                    <span>{{ _trans('common.Approve') }}</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item"
                                                                   href="{{ route('advertisements.approveStatus', [@$row->id, 'reject']) }}">
                                                                        <span class="icon mr-8"><i
                                                                                class="fa-solid fa-circle-xmark"></i></span>
                                                                    <span>{{ _trans('common.Reject') }}</span>
                                                                </a>
                                                            </li>
                                                        @elseif($row->approval_status == 1)
                                                            <li>
                                                                <a class="dropdown-item"
                                                                   href="{{ route('advertisements.approveStatus', [@$row->id, 'reject']) }}">
                                                                        <span class="icon mr-8"><i
                                                                                class="fa-solid fa-circle-xmark"></i></span>
                                                                    <span>{{ _trans('common.Reject') }}</span>
                                                                </a>
                                                            </li>
                                                        @elseif($row->approval_status == 3)
                                                            <li>
                                                                <a class="dropdown-item"
                                                                   href="{{ route('advertisements.approveStatus', [@$row->id, 'approve']) }}">
                                                                        <span class="icon mr-8"><i
                                                                                class="fa-solid fa-circle-check"></i></span>
                                                                    <span>{{ _trans('common.Approve') }}</span>
                                                                </a>
                                                            </li>
                                                        @endif
                                                    @endif
                                                </ul>
                                            </div>
                                        </td>
                                    @endif
                                </tr>

                            @empty
                                <tr>
                                    <td colspan="100%" class="text-center gray-color">
                                        <img src="{{ asset('images/no_data.svg') }}" alt="" class="mb-primary"
                                             width="100">
                                        <p class="mb-0 text-center">No data available</p>
                                        <p class="mb-0 text-center text-secondary font-size-90">
                                            Please add new entity regarding this table</p>
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                    <!--  table end -->
                    <!--  pagination start -->
                    <div class="ot-pagination pagination-content d-flex justify-content-end align-content-center py-3">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-between">
                                {!! $data['property']->links() !!}
                            </ul>
                        </nav>
                    </div>
                    <!--  pagination end -->
                </div>
            </div>
        </div>
        <!--  table content end -->
    </div>
@endsection


@push('script')
    @include('backend.partials.delete-ajax')
@endpush
