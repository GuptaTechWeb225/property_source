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
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ _trans('landlord.Home') }}</a>
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
                <div class="card-header">
                    {{-- <h4 class="mb-0">{{ _trans('common.countries') }}</h4> --}}
                    <div class="row justify-content-between">
                        <div class="col-md-4">
                            <form action="{{ route('countries.index') }}" class="needs-validation d-flex align-items-center gap-3" method="GET">
                                <input type="text" name="search_text" class="form-control ot-input" placeholder="Search"
                                    value="{{ old('search_text', request()->input('search_text')) }}" />
                                @if ($errors->has('search_text'))
                                    <div class="text-danger">
                                        {{ $errors->first('search_text') }}
                                    </div>
                                @endif
                                <button type="submit" class="btn btn-lg ot-btn-primary">
                                    {{ _trans('common.search') }}</button>
                            </form>
                        </div>
                        <div class="col-md-2">
                            <div class="d-flex justify-content-end">
                                <a href="{{ route('countries.create') }}" class="btn btn-lg ot-btn-primary">
                                    <span><i class="fa-solid fa-plus"></i> </span>
                                    <span class="">{{ _trans('common.add') }}</span>
                                </a>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body ot-card">
                    <div class="table-responsive">
                        <table class="table table-bordered ot-table-bg category-table">
                            <thead class="thead">
                                <tr>
                                    <th class="serial">{{ _trans('landlord.SR No.') }}</th>
                                    {{-- <th class="purchase">{{ _trans('landlord.Code') }}</th> --}}
                                    <th class="purchase">{{ _trans('landlord.Name') }}</th>
                                    <th class="purchase">{{ _trans('landlord.Currency') }}</th>
                                    <th class="purchase">{{ _trans('landlord.Currency Symbol') }}</th>
                                    <th class="purchase">{{ _trans('landlord.Currency Name') }}</th>
                                    <th class="purchase">{{ _trans('landlord.Status') }}</th>
                                    <th class="purchase">{{ _trans('landlord.Action') }}</th>
                                </tr>
                            </thead>
                            <tbody class="tbody">
                                @forelse ($data['countries'] as $key => $row)
                                    <tr id="row_{{ $row->id }}">
                                        <td class="serial">{{ ++$key }}</td>
                                        {{-- <td>{{ $row->code }}</td> --}}
                                        <td>{{ $row->name }}</td>
                                        <td>{{ $row->currency }}</td>
                                        <td>{{ $row->currency_symbol }}</td>
                                        <td>{{ $row->currency_name }}</td>
                                        <td>
                                            @if ($row->status == App\Enums\Status::ACTIVE)
                                                <span
                                                    class="badge-basic-success-text">{{ _trans('landlord.active') }}</span>
                                            @else
                                                <span
                                                    class="badge-basic-danger-text">{{ _trans('landlord.inactive') }}</span>
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
                                                            href="{{ route('countries.edit', $row->id) }}">
                                                            <span class="icon mr-8"><i
                                                                    class="fa-solid fa-pen-to-square"></i></span>
                                                            <span>{{ _trans('common.edit') }}</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="javascript:void(0);"
                                                            onclick="delete_row('countries/delete', {{ $row->id }})">
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
                                            <p class="mb-0 text-center">{{ _trans('landlord.No data available') }}</p>
                                            <p class="mb-0 text-center text-secondary font-size-90">
                                                {{ _trans('landlord.Please add new entity regarding this table') }}
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
                                {!! $data['countries']->links() !!}
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
