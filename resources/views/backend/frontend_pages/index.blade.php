@extends('backend.master')
@section('title')
    {{ @$data['pt'] }}
@endsection
@section('content')

    <div class="page-content">

        {{-- bradecrumb Area S t a r t --}}
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h4 class="bradecrumb-title mb-1">{{ $data['pt'] }}</h1>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ _trans('landlord.Home') }}</a></li>
                            <li class="breadcrumb-item">{{ $data['pt'] }}</li>
                        </ol>
                </div>
            </div>
        </div>
        {{-- bradecrumb Area E n d --}}

        <!--  table content start -->
        <div class="table-content table-basic mt-20">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div class="d-flex justify-content-between align-items-center gap-3">
                        <h4 class="mb-0">{{ _trans('landlord.Pages') }}</h4>
                        <form action="" method="get" class="d-flex justify-content-between align-items-center gap-3">
                            <input type="text" name="keyword" value="{{ request('keyword') }}" class="form-control" placeholder="Enter page name">
                            <button type="submit" class="btn btn-light"><i class="las la-search"></i></button>
                        </form>
                    </div>
                    @if (hasPermission('category_create'))
                        <a href="{{ route('frontend_pages.create') }}" class="btn btn-lg ot-btn-primary">
                            <span><i class="fa-solid fa-plus"></i> </span>
                            <span class="">{{_trans('landlord.Create Page')}}</span>
                        </a>
                    @endif
                </div>
                <div class="card-body ot-card">
                    <div class="table-responsive">
                        <table class="table table-bordered ot-table-bg category-table">
                            <thead class="thead">
                                <tr>
                                    <th class="serial">{{ _trans('landlord.SR No.') }}</th>
                                    <th class="purchase">{{ _trans('landlord.Name') }}</th>
                                    <th class="purchase">{{ _trans('landlord.Parent') }}</th>
                                    <th class="purchase">{{ _trans('landlord.Slug') }}</th>
                                    <th class="purchase">{{ _trans('landlord.Image') }}</th>
                                    <th class="purchase">{{ _trans('landlord.Status') }}</th>
                                    <th class="purchase">{{ _trans('landlord.Show On') }}</th>
                                    @if (hasPermission('category_update') || hasPermission('category_delete'))
                                        <th class="action">{{ _trans('landlord.Action') }}</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody class="tbody">
                                @forelse ($data['pages'] as $key => $row)
                                    <tr id="row_{{ $row->id }}">
                                        <td class="serial">{{ ++$key }}</td>
                                        <td>{{ $row->title }} </td>
                                        <td>{{ @$row->parent->title }} </td>
                                        <td> <a href="{{route('view-page',$row->slug)}}" target="_blank"> {{ $row->slug }}</a> </td>
                                        <td>
                                            <div class="user-card">
                                                <div class="user-avatar">
                                                    <img src="{{ @globalAsset($row->image->path) }}"
                                                        alt="{{ $row->name }}">
                                                </div>
                                            </div>

                                        </td>

                                        <td>
                                            @if ($row->status == App\Enums\Status::ACTIVE)
                                                <span class="badge-basic-success-text">{{ _trans('landlord.active') }}</span>
                                            @else
                                                <span class="badge-basic-danger-text">{{ _trans('landlord.inactive') }}</span>
                                            @endif
                                        </td>

                                        <td>
                                            @if ($row->show_menu == 1)
                                                <span class="badge-basic-success-text">{{ _trans('landlord.Header Menu') }}</span>
                                            @else
                                                <span class="badge-basic-danger-text">{{ _trans('landlord.Footer Menu') }}</span>
                                            @endif
                                        </td>

                                        @if (hasPermission('frontend_pages_edit') || hasPermission('frontend_pages_delete'))
                                            <td class="action">
                                                <div class="dropdown dropdown-action">
                                                    <button type="button" class="btn-dropdown" data-bs-toggle="dropdown"
                                                        aria-expanded="false">
                                                        <i class="fa-solid fa-ellipsis"></i>
                                                    </button>
                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                        @if (hasPermission('frontend_pages_edit'))
                                                            <li>
                                                                <a class="dropdown-item"
                                                                    href="{{ route('frontend_pages.edit', $row->id) }}">
                                                                    <span class="icon mr-8"><i
                                                                            class="fa-solid fa-pen-to-square"></i></span>
                                                                    <span>{{ _trans('landlord.edit') }}</span>
                                                                </a>
                                                            </li>
                                                        @endif
                                                        @if (hasPermission('frontend_pages_delete'))
                                                            <li>
                                                                <a class="dropdown-item" href="javascript:void(0);"
                                                                    onclick="delete_row('frontend_pages/delete', {{ $row->id }})">
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
                                {!! $data['pages']->links() !!}
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
