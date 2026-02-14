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
                    <h4 class="mb-0">{{ _trans('landlord.case_studies') }}</h4>
                    @if (hasPermission('case_studies_create'))
                        <a href="{{ route('case_studies.create') }}" class="btn btn-lg ot-btn-primary">
                            <span><i class="fa-solid fa-plus"></i> </span>
                            <span class="">{{ _trans('landlord.add') }}</span>
                        </a>
                    @endif
                </div>
                <div class="card-body ot-card">
                    <div class="table-responsive">
                        <table class="table table-bordered ot-table-bg language-table">
                            <thead class="thead">
                                <tr>
                                    <th class="serial">{{ _trans('landlord.sr no') }}</th>
                                    <th class="purchase">{{ _trans('landlord.title') }}</th>
                                    <th class="purchase">{{ _trans('landlord.status') }}</th>
                                    @if (hasPermission('case_studies_update') ||
                                        hasPermission('case_studies_delete'))
                                        <th class="action">{{ _trans('landlord.action') }}</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody class="tbody">
                                @forelse ($data['case_studies'] as $key => $row)
                                <tr id="row_{{ $row->id }}">
                                    <td class="serial">{{ ++$key }}</td>
                                    <td>{{ $row->title }}</td>

                                    <td>
                                        @if ($row->status == App\Enums\Status::ACTIVE)
                                            <span class="badge-basic-success-text">{{ _trans('landlord.active') }}</span>
                                        @else
                                            <span class="badge-basic-danger-text">{{ _trans('landlord.inactive') }}</span>
                                        @endif
                                    </td>

                                    @if (hasPermission('case_studies_update') ||
                                        hasPermission('case_studies_delete'))
                                        <td class="action">
                                            <div class="dropdown dropdown-action">
                                                <button type="button" class="btn-dropdown" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    <i class="fa-solid fa-ellipsis"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    @if (hasPermission('case_studies_update'))
                                                        <li>
                                                            <a class="dropdown-item"
                                                                href="{{ route('case_studies.edit', $row->id) }}"><span
                                                                    class="icon mr-8"><i
                                                                        class="fa-solid fa-pen-to-square"></i></span>
                                                                <span>{{ _trans('landlord.edit') }}</span></a>
                                                        </li>
                                                    @endif

                                                        @if (hasPermission('case_studies_delete'))
                                                            <li>
                                                                <a class="dropdown-item" href="javascript:void(0);"
                                                                    onclick="delete_row('case_studies/delete', {{ $row->id }})">
                                                                    <span class="icon mr-8"><i
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
                                        <img src="{{ asset('images/no_data.svg') }}" alt="" class="mb-primary" width="100">
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
                    @if($data['case_studies'] instanceof \Illuminate\Pagination\LengthAwarePaginator)
                        <div class="ot-pagination pagination-content d-flex justify-content-end align-content-center py-3">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination">
                                    {!! $data['case_studies']->links() !!}
                                </ul>
                            </nav>
                        </div>
                    @endif
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
