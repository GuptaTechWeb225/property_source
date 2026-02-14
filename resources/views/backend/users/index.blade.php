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
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ _trans('common.home') }}</a>
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
                    <h4 class="mb-0">{{ _trans('common.users') }}</h4>
                    @if (hasPermission('user_create'))
                        <a href="{{ route('users.create') }}" class="btn btn-lg ot-btn-primary">
                            <span><i class="fa-solid fa-plus"></i> </span>
                            <span class="">{{ _trans('common.add_user') }}</span>
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
                                    <th class="purchase">{{ _trans('common.email') }}</th>
                                    <th class="purchase">{{ _trans('common.phone') }}</th>
                                    <th class="purchase">{{ _trans('common.status') }}</th>
                                    @if (hasPermission('user_update') || hasPermission('user_delete'))
                                        <th class="action">{{ _trans('common.action') }}</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody class="tbody">
                                @forelse ($data['users'] as $key => $row)
                                    <tr id="row_{{ $row->id }}">
                                        <td class="serial">{{ ++$key }}</td>
                                        <td>
                                            <div class="">
                                                <a href="{{ route('users.profileDetails', [$row->id, 'basicInfo']) }}">
                                                    <div class="user-card">
                                                        <div class="user-avatar">
                                                            <img src="{{ @globalAsset($row->image->path) }}"
                                                                alt="{{ $row->name }}">
                                                        </div>
                                                        <div class="user-info">
                                                            <span class="tb-lead">{{ $row->name }} <span
                                                                    class="dot dot-success d-md-none ml-1"></span></span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </td>
                                        <td>{{ $row->email }}</td>
                                        <td>{{ $row->phone }}</td>
                                        <td>
                                            @if ($row->status == App\Enums\Status::ACTIVE)
                                                <span class="badge-basic-success-text">{{ _trans('common.active') }}</span>
                                            @else
                                                <span
                                                    class="badge-basic-danger-text">{{ _trans('common.inactive') }}</span>
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
                                                        @if (hasPermission('user_update'))
                                                            <li>
                                                                <a class="dropdown-item"
                                                                    href="{{ route('users.edit', $row->id) }}">
                                                                    <span class="icon mr-8"><i
                                                                            class="fa-solid fa-pen-to-square"></i></span>
                                                                    <span>{{ _trans('common.edit') }}</span>
                                                                </a>
                                                            </li>
                                                        @endif
                                                        @if (hasPermission('user_delete'))
                                                            <li>
                                                                <a class="dropdown-item" href="javascript:void(0);"
                                                                    onclick="delete_row('users/delete', {{ $row->id }})">
                                                                    <span class="icon mr-12"><i
                                                                            class="fa-solid fa-trash-can"></i></span>
                                                                    <span>{{ _trans('common.delete') }}</span>
                                                                </a>
                                                            </li>
                                                        @endif
                                                        @if (hasPermission('user_read'))
                                                            @if ($row->role_id == 4)
                                                                @if (Module::has('BilnetPropertyOwnerForm') && Module::isEnabled('BilnetPropertyOwnerForm'))
                                                                    <li>
                                                                        <a class="dropdown-item"
                                                                            href="{{ route('property_owner_form_data', ['slide_no' => 1, 'user_id' => $row->id]) }}">
                                                                            <span class="icon mr-12"><i
                                                                                    class="las la-city"></i></span>
                                                                            <span>{{ _trans('common.Property Onwer Data') }}</span>
                                                                        </a>
                                                                    </li>
                                                                @endif
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
                                {!! $data['users']->links() !!}
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
