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
                    <h4 class="mb-0">{{ _trans('common.tenants') }}</h4>
                    @if (hasPermission('tenant_create'))
                        <a href="{{ route('tenants.create') }}" class="btn btn-lg ot-btn-primary">
                            <span><i class="fa-solid fa-plus"></i> </span>
                            <span class="">{{ _trans('common.add') }}</span>
                        </a>
                    @endif
                </div>
                <div class="card-body ot-card">
                    <div class="table-responsive">
                        <table class="table table-bordered ot-table-bg tenant-table">
                            <thead class="thead">
                                <tr>
                                    <th>{{ _trans('common.SR No.') }}</th>
                                    <th class="purchase">{{ _trans('common.Name') }}</th>
                                    <th class="purchase">{{ _trans('common.Email') }}</th>
                                    <th class="purchase">{{ _trans('common.Phone') }}</th>
                                    <th class="purchase">{{ _trans('common.Country') }}</th>
                                    <th class="purchase">{{ _trans('common.State') }}</th>
                                    <th class="purchase">{{ _trans('common.City') }}</th>
                                    <th class="purchase">{{ _trans('common.Occupation') }}</th>
                                    <th class="purchase">{{ _trans('common.Designation') }}</th>
                                    <th class="purchase">{{ _trans('common.NID') }}</th>
                                    <th class="purchase">{{ _trans('common.Passport') }}</th>
                                    <th class="purchase">{{ _trans('common.Image') }}</th>
                                    <th class="purchase">{{ _trans('common.Status') }}</th>
                                    @if (hasPermission('tenant_update') || hasPermission('tenant_delete'))
                                        <th class="action">{{ _trans('common.Action') }}</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody class="tbody">
                                @forelse ($data['tenant'] as $key => $row)
                                    <tr id="row_{{ $row->id }}">
                                        <td class="serial">{{ ++$key }}</td>

                                        <td><a href="{{ route('users.profileDetails', [$row->id, 'basicInfo']) }}">{{ $row->name }}</a></td>
                                        <td>{{ $row->email }}</td>
                                        <td>{{ $row->phone }}</td>
                                        <td>{{ $row->country? @$row->country->name : '-' }}</td>
                                        <td>{{ $row->state? @$row->state->name : '-' }}</td>
                                        <td>{{ $row->city? @$row->city->name : '-' }}</td>
                                        <td>{{ $row->occupation }}</td>
                                        <td>{{ $row->designation ? @$row->designation->title : '-'  }}</td>
                                        <td>{{ $row->nid }}</td>
                                        <td>{{ $row->passport }}</td>
                                        <td>
                                            <div class="user-card">
                                                <div class="user-avatar">
                                                    <img src="{{ @globalAsset($row->image->path) }}" alt="{{ $row->name }}">
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            @if ($row->status == App\Enums\Status::ACTIVE)
                                                <span class="badge-basic-success-text">{{ _trans('common.active') }}</span>
                                            @else
                                                <span class="badge-basic-danger-text">{{ _trans('common.inactive') }}</span>
                                            @endif
                                        </td>
                                        @if (hasPermission('tenant_update') || hasPermission('tenant_delete'))
                                            <td class="action">
                                                <div class="dropdown dropdown-action">
                                                    <button type="button" class="btn-dropdown" data-bs-toggle="dropdown"
                                                        aria-expanded="false">
                                                        <i class="fa-solid fa-ellipsis"></i>
                                                    </button>
                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                        @if (hasPermission('tenant_update'))
                                                            <li>
                                                                <a class="dropdown-item"
                                                                    href="{{ route('tenants.edit', $row->id) }}">
                                                                    <span class="icon mr-8"><i class="fa-solid fa-pen-to-square"></i></span>
                                                                    <span>{{ _trans('common.edit') }}</span>
                                                                </a>
                                                            </li>
                                                        @endif
                                                            <li>
                                                                <a class="dropdown-item" href="{{ route('tenants.show',$row->id) }}">
                                                                    <span class="icon mr-12"><i class="fa-solid fa-eye"></i></span>
                                                                    <span>{{ _trans('common.show') }}</span>
                                                                </a>
                                                            </li>
                                                        @if (hasPermission('tenant_delete'))
                                                            <li>
                                                                <a class="dropdown-item" href="javascript:void(0);"
                                                                    onclick="delete_row('tenants/delete', {{ $row->id }})">
                                                                    <span class="icon mr-12"><i
                                                                            class="fa-solid fa-trash-can"></i></span>
                                                                    <span>{{ _trans('common.delete') }}</span>
                                                                </a>
                                                            </li>
                                                        @endif

                                                        @if ((!$row->address_verify))
                                                            <li>
                                                                <a class="dropdown-item" href="javascript:void(0);"
                                                                    onclick="verify_user('tenants/verify', {{ $row->id }})">
                                                                    <span class="icon mr-12"><i
                                                                            class="fa-solid fa-map"></i></span>
                                                                    <span>{{ _trans('common.address verify') }}</span>
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
                                {!! $data['tenant']->links() !!}
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


    <script>
        function verify_user(route, row_id) {

            var table_row = '#row_' + row_id;
            var url = "<?php echo e(url('')); ?>" + '/' + route + '/' + row_id;
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!'
            }).then((confirmed) => {
                if (confirmed.isConfirmed) {
                    $.ajax({
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            id: row_id,
                            _method: 'POST'
                        },
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: url,
                    })
                        .done(function (response) {
                            Swal.fire(
                                response[2],
                                response[0],
                                response[1]
                            );
                            $(table_row).fadeOut(2000);
                            window.location.reload();
                        })
                        .fail(function (error) {
                            console.log(error);
                            Swal.fire('<?php echo e(_trans('common.opps')); ?>...',
                                '<?php echo e(_trans('common.something_went_wrong_with_ajax')); ?>', 'error');
                        })
                }
            });
        };
    </script>
@endpush
