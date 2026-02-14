@extends('backend.master')
@section('title')
    {{ $title }}
@endsection
@section('content')
    <x-container title="{{ $title }}"
                 :breadcrumbs="[['title' => 'Reports'], ['title' => 'Payments']]">
        <div class="card ot-card">
            <form action="" class="search row mb-3" method="get">
                <x-forms.select col="col-lg-4" name="property_id">
                    <option value="">{{ _trans('common.Select Property') }}</option>
                    @foreach($properties as $property)
                        <option {{ $property->id == request('property_id') ? 'selected': ''  }} value="{{ $property->id }}">{{ $property->name }}</option>
                    @endforeach
                </x-forms.select>

                <x-forms.select col="col-lg-4" name="tenant_id">
                    <option value="">{{ _trans('common.Select Tenant') }}</option>
                    @foreach($tenants as $tenant)
                        <option {{ $tenant->id == request('tenant_id') ? 'selected': ''  }} value="{{ $tenant->id }}">{{ $tenant->name }}</option>
                    @endforeach
                </x-forms.select>

                <div class="col-lg-2">
                    @if(request('tenant_id') || request('property_id'))
                    <a href="{{ route('report.payment') }}" class="btn btn-lg btn-danger"><i class="fa fa-times"></i></a>
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
                        <th class="purchase">{{ _trans('common.Date') }}</th>
                        <th class="purchase">{{ _trans('common.Tenant') }}</th>
                        <th class="purchase">{{ _trans('common.Properties') }}</th>
                        <th class="purchase">{{ _trans('common.TRX No.') }}</th>
                        <th>{{ _trans('landlord.Amount') }}</th>
                        <th>{{ _trans('landlord.Payment Method') }}</th>
                    </tr>
                    </thead>
                    <tbody class="tbody">
                    @forelse ($reports as $row)
                        <tr id="row_{{ $row->id }}">
                            <td class="serial">{{ $loop->iteration }}</td>
                            <td>{{ $row->date }}</td>
                            <td>{{ $row->orderDetail->order->tenant->name }}</td>
                            <td>{{ $row->orderDetail->property->name }}</td>
                            <td>{{ $row->trx_no }}</td>
                            <td>{{ priceFormat($row->amount) }}</td>
                            <td>{{ $row->payment_method }}</td>
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

