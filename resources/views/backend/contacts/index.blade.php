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
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ _trans('landlord.home') }}</a></li>
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
                    <h4 class="mb-0">{{ $data['title'] }}</h4>
                </div>
                <div class="card-body ot-card">
                    <div class="table-responsive">
                        <table class="table table-bordered ot-table-bg category-table">
                            <thead class="thead">
                                <tr>
                                    <th class="serial">{{ _trans('landlord.SR No.') }}</th>
                                    <th class="purchase">{{ _trans('landlord.Name') }}</th>
                                    <th class="purchase">{{ _trans('landlord.Reason') }}</th>
                                    <th class="purchase">{{ _trans('landlord.Email') }}</th>
                                    <th class="purchase">{{ _trans('landlord.Date') }}</th>
                                    <th class="purchase">{{ _trans('landlord.Status') }}</th>
                                    <th class="action">{{ _trans('landlord.Action') }}</th>
                                </tr>
                            </thead>
                            <tbody class="tbody">
                                @forelse ($data['contacts'] ?? [] as $key => $row)
                                    <tr id="row_{{ $row->id }}">
                                        <td class="serial">{{ ++$key }}</td>
                                        <td>{{ $row->f_name }} {{ $row->l_name }}</td>
                                        <td>{{ $row->reason }}</td>
                                        <td>{{ $row->email }}</td>
                                        <td>{{ $row->created_at }}</td>
                                        <td>
                                            @if ($row->status == 1)
                                                <span class="badge-basic-success-text">{{ _trans('landlord.Seen') }}</span>
                                            @else
                                                <span class="badge-basic-danger-text">{{ _trans('landlord.Not Seen') }}</span>
                                            @endif
                                        </td>
                                        @if (hasPermission('contact_read') || hasPermission('contact_delete'))
                                            <td class="action">
                                                <div class="dropdown dropdown-action">
                                                    <button type="button" class="btn-dropdown" data-bs-toggle="dropdown"
                                                        aria-expanded="false">
                                                        <i class="fa-solid fa-ellipsis"></i>
                                                    </button>
                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                            <li>
                                                                <a class="dropdown-item"
                                                                    href="{{ route('contact.view', $row->id) }}">
                                                                    <span class="icon mr-8"><i class="fa-solid fa-eye"></i></span>
                                                                    <span>{{ _trans('landlord.view') }}</span>
                                                                </a>
                                                            </li>
                                                        @if (hasPermission('contact_delete'))
                                                            <li>
                                                                <a class="dropdown-item" href="javascript:void(0);"
                                                                    onclick="delete_row('contacts/delete', {{ $row->id }})">
                                                                    <span class="icon mr-12"><i
                                                                            class="fa-solid fa-trash-can"></i></span>
                                                                    <span>{{ _trans('landlord.delete') }}</span>
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
                                                <p class="mb-0 text-center">{{ _trans('landlord.No data available')}}</p>
                                                <p class="mb-0 text-center text-secondary font-size-90">
                                                    {{ _trans('landlord.Please add new entity regarding this table')}}</p>
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
                                <!--  pagination start -->
                                @if (count($data['contacts']) > 10)
                                    <div class="ot-pagination pagination-content d-flex justify-content-end align-content-center py-3">
                                        <nav aria-label="Page navigation example">
                                            <ul class="pagination">
                                                {!! $data['contacts']->links() !!}
                                            </ul>
                                        </nav>
                                    </div>
                                @endif
                                <!--  pagination end -->
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
