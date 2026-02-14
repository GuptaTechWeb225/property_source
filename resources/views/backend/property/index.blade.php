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
                    <h4 class="mb-0">{{ _trans('common.Property') }}</h4>
                    @if (hasPermission('property_create'))
                        <a href="{{ route('properties.create') }}" class="btn btn-lg ot-btn-primary">
                            <span><i class="fa-solid fa-plus"></i> </span>
                            <span class="">{{ _trans('common.Add Property') }}</span>
                        </a>
                    @endif
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered user-table">
                            <thead class="thead">
                            <tr>
                                <th class="serial">{{ _trans('common.sr_no.') }}</th>
                                <th class="purchase">{{ _trans('common.name') }}</th>
                                <th class="purchase">{{ _trans('common.Info') }}</th>
                                <th class="purchase">{{ _trans('common.Particulars') }}</th>
                                <th class="purchase">{{ _trans('common.Address') }}</th>
                                <th class="purchase">{{ _trans('common.Type') }}</th>
                                <th class="purchase">{{ _trans('common.status') }}</th>
                                @if (hasPermission('user_update') || hasPermission('user_delete'))
                                    <th class="action">{{ _trans('common.action') }}</th>
                                @endif
                            </tr>
                            </thead>
                            <tbody class="tbody">
                            @forelse ($data['property'] as $key => $row)
                                <tr id="row_{{ $row->id }}">
                                    <td class="serial">{{ ++$key }}</td>
                                    <td>
                                        <div class="">
                                            <a href="{{ route('admin.properties.details', [$row->id, 'basicInfo']) }}">
                                                <div class="user-card">
                                                    <div class="">
                                                        <img src="{{ @globalAsset($row->defaultImage->path) }}"
                                                             alt="{{ $row->name }}">
                                                    </div>
                                                    <div class="user-info">
                                                        <span class="tb-lead p-2">{{ $row->name }} </span>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <strong>{{ $row->type == 1 ? 'Commercial' : 'Residential' }}</strong><br>
                                        <strong>{{ _trans('common.Status') }}:</strong>
                                        {{ $row->completion == 1 ? 'Completed' : 'Under Construction' }}<br>
                                        <strong>{{ _trans('common.Unit') }}:</strong> {{ $row->total_unit }}<br>
                                        <strong>{{ _trans('common.Occupied') }}:</strong>
                                        {{ $row->total_occupied }}<br>
                                        <strong>{{ _trans('common.Rent') }}:</strong> {{ $row->total_rent }}<br>
                                        <strong>{{ _trans('common.Sell') }}:</strong> {{ $row->total_sell }}
                                    </td>
                                    <td>
                                        <strong>{{ _trans('common.Size') }}:</strong> {{ $row->size }}
                                        {{ _trans('common.sqft') }}<br>
                                        <strong>{{ _trans('common.Dining Combined') }}:</strong>
                                        {{ $row->dining_combined == 1 ? 'Yes' : 'No' }}<br>
                                        <strong>{{ _trans('common.Bedroom') }}:</strong> {{ $row->bedroom }}<br>
                                        <strong>{{ _trans('common.Bathroom') }}:</strong> {{ $row->bathroom }}<br>
                                        <strong>{{ _trans('common.Rent Amount') }}:</strong>
                                        {{ $row->rent_amount }}<br>
                                        @if ($row->flat_no)
                                            <strong>{{ _trans('common.Flat No.') }}:</strong> {{ $row->flat_no }}
                                        @endif
                                    </td>
                                    <td>
                                        <strong>{{ _trans('common.Address') }}:</strong>
                                        {{ @$row->location->address }}<br>
                                        <strong>{{ _trans('common.State') }}:</strong>
                                        {{ @$row->location->state->name }}<br>
                                        <strong>{{ _trans('common.City') }}:</strong>
                                        {{ @$row->location->city->name }}<br>
                                        <strong>{{ _trans('common.Post Code') }}:</strong>
                                        {{ @$row->location->post_code }}<br>
                                        <strong>{{ _trans('common.Country') }}:</strong>
                                        {{ @$row->location->country->name }}
                                    </td>
                                    <td>
                                        <div>
                                                <span
                                                    class="badge badge-pill {{ $row->deal_type == 1 ? 'badge-basic-primary-text' : 'badge-basic-warning-text' }}">{{ $row->deal_type == 1 ? 'Rent' : 'Sell' }}</span>
                                        </div>
                                    </td>
                                    <td>
                                        @if ($row->status == 'approved')
                                            <span
                                                class="badge-basic-success-text text-capitalize">{{ $row->status }}</span>
                                        @else
                                            <span
                                                class="badge-basic-danger-text text-capitalize">{{ $row->status }}</span>
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
                                                    @if(isSuperAdmin())
                                                        @if($row->status !== 'approved')
                                                            <li>
                                                                <a class="dropdown-item"
                                                                   href="{{ route('admin.properties.update_status', [$row->id, 'approved']) }}">
                                                                        <span class="icon mr-8"><i
                                                                                class="fa-solid fa-check-circle"></i></span>
                                                                    <span>{{ _trans('common.Approve') }}</span>
                                                                </a>
                                                            </li>
                                                        @endif
                                                        @if($row->status !== 'rejected')
                                                            <li>
                                                                <a class="dropdown-item"
                                                                   href="{{ route('admin.properties.update_status', [$row->id, 'rejected']) }}">
                                                                <span class="icon mr-8"><i
                                                                        class="fa-solid fa fa-ban"></i></span>
                                                                    <span>{{ _trans('common.Reject') }}</span>
                                                                </a>
                                                            </li>
                                                        @endif
                                                    @endif
                                                    {{-- @if (hasPermission('user_update')) --}}
                                                    <li>
                                                        <a class="dropdown-item"
                                                           href="{{ route('admin.properties.details', [$row->id, 'basicInfo']) }}">
                                                                <span class="icon mr-8"><i
                                                                        class="fa-solid fa-eye"></i></span>
                                                            <span>{{ _trans('common.view') }}</span>
                                                        </a>
                                                    </li>
                                                    @if (hasPermission('user_delete'))
                                                        <li>
                                                            <a class="dropdown-item" href="javascript:void(0);"
                                                               onclick="delete_row('properties/delete', {{ $row->id }})">
                                                                    <span class="icon mr-12"><i
                                                                            class="fa-solid fa-trash-can"></i></span>
                                                                <span>{{ _trans('common.delete') }}</span>
                                                            </a>
                                                        </li>
                                                    @endif

                                                    @if($row->video_verification_status == 0)
                                                    <li>
                                                        <a class="dropdown-item" href="{{route('verifyProperty',$row->id)}}">
                                                                <span class="icon mr-12"><i
                                                                        class="fa-solid fa-camera"></i></span>
                                                            <span>{{ _trans('common.Video Verification') }}</span>
                                                        </a>
                                                    </li>
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
