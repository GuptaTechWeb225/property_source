@extends('backend.master')
@section('title')
    {{ $title }}
@endsection
@section('content')
    <x-container title="{{ $title }}"
                 :breadcrumbs="[['title' => 'Reports'], ['title' => 'Tenant']]">
        <div class="card ot-card">
            <form action="" class="search row mb-3" method="get">
                <x-forms.select col="col-lg-4" name="tenant_id">
                    <option value="">{{ _trans('common.Select Tenant') }}</option>
                    @foreach($tenants as $tenant)
                        <option {{ $tenant->id == request('tenant_id') ? 'selected': ''  }} value="{{ $tenant->id }}">{{ $tenant->name }}</option>
                    @endforeach
                </x-forms.select>
                <x-forms.select col="col-lg-4" name="property_id">
                    <option value="">{{ _trans('common.Select Property') }}</option>
                    @foreach($properties as $property)
                        <option {{ $property->id == request('property_id') ? 'selected': ''  }} value="{{ $property->id }}">{{ $property->name }}</option>
                    @endforeach
                </x-forms.select>
                <div class="col-lg-2">
                    @if(request('tenant_id') || request('property_id'))
                    <a href="{{ route('report.tenant') }}" class="btn btn-lg btn-danger"><i class="fa fa-times"></i></a>
                    @endif
                    <button class="btn btn-lg ot-btn-primary">
                        <span><i class="fa-solid fa-search"></i>
                    </span>{{ _trans('common.Search') }}</button>
                </div>
            </form>
            <div class="table-responsive">
                <table class="table table-bordered ot-table-bg category-table">
                    <thead class="thead">
                    <tr>
                        <th  >{{ _trans('common.SR No.') }}</th>
                        <th class="purchase">{{ _trans('common.Name') }}</th>
                        <th class="purchase">{{ _trans('common.Email') }}</th>
                        <th class="purchase">
                            {{ _trans('common.Properties') }}
                        </th>
                        <th>{{ _trans('landlord.For') }}</th>
                        <th>{{ _trans('landlord.Start Date') }}</th>
                        <th>{{ _trans('landlord.End Date') }}</th>
                        <th class="purchase">{{ _trans('common.status') }}</th>
                    </tr>
                    </thead>
                    <tbody class="tbody">
                    @forelse ($reports as $row)
                        <tr id="row_{{ $row->id }}">
                            <td class="serial">{{ $loop->iteration }}</td>
                            <td>{{ $row->order->tenant->name }}</td>
                            <td>{{ $row->order->tenant->email }}</td>
                            <td>{{ $row->property->name }}</td>
                            <td>{{ @$row->advertisement->advertisement_type == 1 ? 'Rent' : 'Sell' }}</td>
                            <td>{{ $row->start_date }}</td>
                            <td>{{ isset($row->end_date) ? $row->end_date : 'Lifetime'}}</td>
                            <td>
                                @if ($row->status == 'approved')
                                    <span class="badge-basic-success-text text-capitalize">{{ $row->status }}</span>
                                @elseif($row->status  == 'pending')
                                    <span class="badge-basic-warning-text text-capitalize">{{ $row->status }}</span>
                                @else
                                    <span class="badge-basic-danger-text text-capitalize">{{ $row->status }}</span>
                                @endif
                            </td>
                        </tr>

                    @empty
                        <x-emptytable></x-emptytable>
                    @endforelse
                    </tbody>
                </table>
            </div>
            <!--  pagination start -->
            <div class="ot-pagination pagination-content d-flex justify-content-end align-content-center py-3">
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-between">
                        {!! $reports->links() !!}
                    </ul>
                </nav>
            </div>
        </div>
    </x-container>
@endsection

