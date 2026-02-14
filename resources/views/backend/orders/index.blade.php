@extends('backend.master')
@section('title')
    {{ @$data['title'] }}
@endsection
@section('content')

    <!-- start main content -->
    <div class="page-content">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h4 class="bradecrumb-title mb-1">{{ $data['title'] }}</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ _trans('common.home') }}</a>
                        </li>
                        <li class="breadcrumb-item">{{ $data['title'] }}</li>
                    </ol>
                </div>
            </div>
        </div>


        <!--  table content start -->
        <div class="table-content table-basic mt-20">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">{{ _trans('common.Orders') }}</h4>
                    @if(hasPermission('order_create'))
                        <a href="{{ route('orders.create') }}" class="btn ot-btn-primary"><i
                                class="fa fa-plus-circle"></i> {{ _trans('common.Add New') }}</a>
                    @endif
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered role-table">
                            <thead class="thead">
                            <tr>
                                <th class="serial">{{ _trans('landlord.SR No.') }}</th>
                                <th class="purchase">{{ _trans('landlord.Order No') }}</th>
                                <th class="purchase">{{ _trans('landlord.Order Date') }}</th>
                                <th class="purchase">{{ _trans('landlord.Subtotal') }}</th>
                                <th class="purchase">{{ _trans('landlord.Discount') }}</th>
                                <th class="purchase">{{ _trans('landlord.Total Amount') }}</th>
                                <th class="purchase">{{ _trans('landlord.Paid Amount') }}</th>
                                <th class="purchase">{{ _trans('landlord.Due Amount') }}</th>
                                @if(hasPermission('order_delete') || hasPermission('order_show'))
                                    <th class="action">{{ _trans('landlord.action') }}</th>
                                @endif
                            </tr>
                            </thead>
                            <tbody class="tbody">
                            @forelse ($data['orders'] as  $row)
                                <tr id="row_{{$loop->iteration }}">
                                    <td>{{$loop->iteration }}</td>
                                    <td>{{$row->invoice_no}}</td>
                                    <td>{{$row->date}}</td>
                                    <td>{{priceFormat($row->subtotal)}}</td>
                                    <td>{{priceFormat($row->discount_amount)}}</td>
                                    <td>{{priceFormat($row->grand_total)}}</td>
                                    <td>{{priceFormat($row->paid_amount)}}</td>
                                    <td>{{priceFormat($row->due_amount)}}</td>
                                    <td class="action">
                                        <div class="dropdown dropdown-action">
                                            <button type="button" class="btn-dropdown" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                <i class="fa-solid fa-ellipsis"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end ">
                                                @if(hasPermission('order_show'))
                                                    <li>
                                                        <a class="dropdown-item"
                                                           href="{{ route('orders.detail', $row->id) }}"><span
                                                                class="icon mr-8"><i class="fa-solid fa-eye"></i></span>
                                                            {{ _trans('common.View') }}
                                                        </a>
                                                    </li>
                                                @endif
                                                <li>
                                                    <a class="dropdown-item"
                                                       href="{{ route('orders.invoice', $row->id) }}">
                                                        <span class="icon mr-8"><i
                                                                class="fa-solid fa-file-download"></i></span>
                                                        {{ _trans('common.Invoice') }}</a>
                                                </li>
                                                @if(hasPermission('order_delete'))
                                                    <li>
                                                        <a class="dropdown-item" href="javascript:void(0);"
                                                           onclick="delete_row('orders/delete', {{ $row->id }})">
                                                                    <span class="icon mr-12"><i
                                                                            class="fa-solid fa-trash-can"></i></span>
                                                            <span>{{ _trans('common.delete') }}</span>
                                                        </a>
                                                    </li>
                                               @endif
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="100%" class="text-center gray-color">
                                        <img src="{{ asset('images/no_data.svg') }}" alt="" class="mb-primary"
                                             width="100">
                                        <p class="mb-0 text-center">{{ _trans('common.No data available') }}</p>
                                        <p class="mb-0 text-center text-secondary font-size-90">
                                            {{ _trans('common.Please add new entity regarding this table') }}
                                        </p>
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

                            </ul>
                        </nav>
                    </div>

                    <!--  pagination end -->
                </div>
            </div>
        </div>
        <!--  table content end -->

    </div>
    <!-- end main content -->

@endsection

@push('script')
    <script>
        function delete_row(route, row_id) {

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
                            _method: 'DELETE'
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
    @include('backend.partials.delete-ajax')
@endpush
