@extends('backend.master')
@section('title')
    {{ $title }}
@endsection
@section('content')
    <x-container title="{{ $title }}" :breadcrumbs="[['title' => 'Landlords']]">
        <div class="table-content table-basic mt-20">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">{{ _trans('common.Landlords') }}</h4>
                    <a href="{{ route('landlord.create') }}" class="btn btn-lg ot-btn-primary">
                        <span><i class="fa-solid fa-plus"></i> </span>
                        <span class="">{{ _trans('common.add') }}</span>
                    </a>
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
                                <th class="purchase">{{ _trans('common.Occupation') }}</th>
                                <th class="purchase">{{ _trans('common.Designation') }}</th>
                                <th class="purchase">{{ _trans('common.Country') }}</th>
                                <th class="purchase">{{ _trans('common.NID') }}</th>
                                <th class="purchase">{{ _trans('common.Image') }}</th>
                                <th class="purchase">{{ _trans('common.Status') }}</th>
                                @if (hasPermission('tenant_update') || hasPermission('tenant_delete'))
                                    <th class="action">{{ _trans('common.Action') }}</th>
                                @endif
                            </tr>
                            </thead>
                            <tbody class="tbody">
                            @forelse ($landlords as $key => $row)
                                <tr id="row_{{ $row->id }}">
                                    <td class="serial">{{ ++$key }}</td>
                                    <td>{{ $row->name }}</td>
                                    <td>{{ $row->email }}</td>
                                    <td>{{ $row->phone }}</td>
                                    <td>{{ $row->occupation }}</td>
                                    <td>{{ $row->designation ? $row->designation->title : '-'  }}</td>
                                    <td>{{ $row->country? $row->country->name : '-' }}</td>
                                    <td>{{ $row->nid }}</td>
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
                                            <span class="badge-basic-success-text">{{ _trans('common.active') }}</span>
                                        @else
                                            <span
                                                class="badge-basic-danger-text">{{ _trans('common.inactive') }}</span>
                                        @endif
                                    </td>
                                    <td class="action">
                                        <div class="dropdown dropdown-action">
                                            <button type="button" class="btn-dropdown" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                <i class="fa-solid fa-ellipsis"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li>
                                                    <a class="dropdown-item"
                                                       href="{{ route('landlord.edit', $row->id) }}">
                                                                    <span class="icon mr-8"><i
                                                                            class="fa-solid fa-pen-to-square"></i></span>
                                                        <span>{{ _trans('common.edit') }}</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item"
                                                       href="{{ route('landlord.show',$row->id) }}">
                                                                    <span class="icon mr-12"><i
                                                                            class="fa-solid fa-eye"></i></span>
                                                        <span>{{ _trans('common.show') }}</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="javascript:void(0);"
                                                       onclick="delete_row('landlord/destroy', {{ $row->id }})">
                                                                    <span class="icon mr-12"><i
                                                                            class="fa-solid fa-trash-can"></i></span>
                                                        <span>{{ _trans('common.delete') }}</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
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
                                {!! $landlords->links() !!}
                            </ul>
                        </nav>
                    </div>
                    <!--  pagination end -->
                </div>
            </div>
        </div>
    </x-container>
@endsection
@push('script')
    @include('backend.partials.delete-ajax')
@endpush
