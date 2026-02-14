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
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ _trans('landlord.Home') }}</a></li>
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
                    <h4 class="mb-0">{{ _trans('landlord.categories') }}</h4>
                    @if (hasPermission('category_create'))
                        <a href="{{ route('categories.create') }}" class="btn btn-lg ot-btn-primary">
                            <span><i class="fa-solid fa-plus"></i> </span>
                            <span class="">{{ _trans('landlord.add') }}</span>
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
                                    <th class="purchase">{{ _trans('landlord.Image') }}</th>
                                    <th class="purchase">{{ _trans('landlord.Icon') }}</th>
                                    <th class="purchase">{{ _trans('landlord.Slug') }}</th>
                                    <th class="purchase">{{ _trans('landlord.Status') }}</th>
                                    @if (hasPermission('category_update') || hasPermission('category_delete'))
                                        <th class="action">{{ _trans('landlord.Action') }}</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody class="tbody">
                                @forelse ($data['categories'] as $key => $row)
                                    <tr id="row_{{ $row->id }}">
                                        <td class="serial">{{ ++$key }}</td>
                                        <td>{{ $row->title }}</td>
                                        <td>
                                            <div class="user-card">
                                                <div class="user-avatar">
                                                    <img src="{{ @globalAsset($row->image->path) }}"
                                                        alt="{{ $row->name }}">
                                                </div>
                                            </div>

                                        </td>
                                        <td>
                                            <div class="user-card">
                                                <div class="user-avatar">
                                                    <img src="{{ @globalAsset($row->icon->path) }}"
                                                        alt="{{ $row->name }}">
                                                </div>
                                            </div>

                                        </td>
                                        <td>{{ $row->slug }}</td>
                                        <td>
                                            @if ($row->status == App\Enums\Status::ACTIVE)
                                                <span class="badge-basic-success-text">{{ _trans('landlord.active') }}</span>
                                            @else
                                                <span class="badge-basic-danger-text">{{ _trans('landlord.inactive') }}</span>
                                            @endif
                                        </td>
                                        @if (hasPermission('category_update') || hasPermission('category_delete'))
                                            <td class="action">
                                                <div class="dropdown dropdown-action">
                                                    <button type="button" class="btn-dropdown" data-bs-toggle="dropdown"
                                                        aria-expanded="false">
                                                        <i class="fa-solid fa-ellipsis"></i>
                                                    </button>
                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                        @if (hasPermission('category_update'))
                                                            <li>
                                                                <a class="dropdown-item"
                                                                    href="{{ route('categories.edit', $row->id) }}">
                                                                    <span class="icon mr-8"><i
                                                                            class="fa-solid fa-pen-to-square"></i></span>
                                                                    <span>{{ _trans('landlord.edit') }}</span>
                                                                </a>
                                                            </li>
                                                        @endif
                                                        @if (hasPermission('category_delete'))
                                                            <li>
                                                                <a class="dropdown-item" href="javascript:void(0);"
                                                                    onclick="delete_row('categories/delete', {{ $row->id }})">
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
                                {!! $data['categories']->links() !!}
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
