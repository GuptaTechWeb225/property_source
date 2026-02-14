@extends('backend.master')
@section('title')
    {{ @$data['title'] }}
@endsection
@section('content')
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

        <div class="table-content table-basic mt-20">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">{{ _trans('common.Committee') }}</h4>
                    @if (hasPermission('committee_create'))
                        <a href="{{ route('committees.create') }}" class="btn btn-lg ot-btn-primary">
                            <span><i class="fa-solid fa-plus"></i> </span>
                            <span class="">{{ _trans('common.add') }}</span>
                        </a>
                    @endif
                </div>
                <div class="card-body ot-card">
                    <div class="table-responsive">
                        <table class="table table-bordered ot-table-bg language-table">
                            <thead class="thead">
                                <tr>
                                    <th class="serial">{{ _trans('common.SR No') }}</th>
                                    <th class="purchase">{{ _trans('common.Committee name') }}</th>
                                    <th class="purchase">{{ _trans('common.Property') }}</th>
                                    <th class="purchase">{{ _trans('common.Email') }}</th>
                                    <th class="purchase">{{ _trans('common.Phone') }}</th>
                                    <th class="purchase">{{ _trans('common.Status') }}</th>
                                    @if (hasPermission('committee_show') || hasPermission('committee_edit') || hasPermission('committee_delete'))
                                        <th class="action">{{ _trans('common.Action') }}</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody class="tbody">
                                @foreach ($data['committees'] as $committee)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $committee->name }}</td>
                                        <td>{{ $committee->property->name }} </td>
                                        <td>{{ $committee->email }}</td>
                                        <td>{{ $committee->phone }}</td>
                                        <td>
                                            @if ($committee->status == 'active')
                                                <span class="badge-basic-success-text">{{ $committee->status }}</span>
                                            @else
                                                <span class="badge-basic-danger-text">{{ $committee->status }}</span>
                                            @endif
                                        </td>
                                        @if (hasPermission('committee_show') || hasPermission('committee_edit') || hasPermission('committee_delete'))
                                            <td class="action">
                                                <div class="dropdown dropdown-action">
                                                    <button type="button" class="btn-dropdown" data-bs-toggle="dropdown"
                                                        aria-expanded="false">
                                                        <i class="fa-solid fa-ellipsis"></i>
                                                    </button>
                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                        @if(hasPermission('committee_show'))
                                                            <li>
                                                                <a class="dropdown-item"
                                                                    href="{{ route('committees.show', $committee->id) }}">
                                                                    <span class="icon mr-8">
                                                                        <i class="fa-solid fa-eye"></i>
                                                                    </span>
                                                                    <span>{{ _trans('landlord.Show') }}</span>
                                                                </a>
                                                            </li>
                                                        @endif
                                                        @if(hasPermission('committee_edit'))
                                                            <li>
                                                                <a class="dropdown-item"
                                                                    href="{{ route('committees.edit', $committee->id) }}">
                                                                    <span class="icon mr-8">
                                                                        <i class="fa-solid fa-pencil"></i>
                                                                    </span>
                                                                    <span>{{ _trans('landlord.Edit') }}</span>
                                                                </a>
                                                            </li>
                                                        @endif
                                                        @if(hasPermission('committee_delete'))
                                                            <li>
                                                                <a class="dropdown-item" href="javascript:void(0);"
                                                                    onclick="delete_row('committees/destroy', {{ $committee->id }})">
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
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="ot-pagination pagination-content d-flex justify-content-end align-content-center py-3">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-between">
                                {!! $data['committees']->links() !!}
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    @include('backend.partials.delete-ajax')
@endpush
