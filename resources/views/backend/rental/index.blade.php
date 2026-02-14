@extends('backend.master')
@section('title')
    {{ $title }}
@endsection
@section('content')
    <x-container title="{{ $title }}"
                 :breadcrumbs="[['title' => 'Rentals']]">
        <div class="card ot-card">
            <form action="" class="search row mb-3" method="get">
                <x-forms.select col="col-lg-3" name="property_id">
                    <option value="">{{ _trans('common.Select Property') }}</option>
                    @foreach($properties as $property)
                        <option
                            {{ $property->id == request('property_id') ? 'selected': ''  }} value="{{ $property->id }}">{{ $property->name }}</option>
                    @endforeach
                </x-forms.select>
                <x-forms.select col="col-lg-3" name="tenant_id">
                    <option value="">{{ _trans('common.Select Tenant') }}</option>
                    @foreach($tenants as $tenant)
                        <option
                            {{ $tenant->id == request('tenant_id') ? 'selected': ''  }} value="{{ $tenant->id }}">{{ $tenant->name }}</option>
                    @endforeach
                </x-forms.select>
                <x-forms.select col="col-lg-2" name="payment_status">
                    <option value="">{{ _trans('common.Payment Status') }}</option>
                    <option value="paid" {{ request('payment_status') == 'paid' ? 'selected': ''  }}>{{ _trans('common.Paid') }}</option>
                    <option value="unpaid" {{ request('payment_status') == 'unpaid' ? 'selected': ''  }}>{{ _trans('common.Unpaid') }}</option>
                    <option value="partial" {{ request('payment_status') == 'partial' ? 'selected': ''  }}>{{ _trans('common.Partial') }}</option>
                </x-forms.select>

                <x-forms.select col="col-lg-2" name="status">
                    <option value="">{{ _trans('common.Status') }}</option>
                    <option value="approved" {{ request('status') == 'approved' ? 'selected': ''  }}>{{ _trans('common.Approved') }}</option>
                    <option value="completed" {{ request('status') == 'completed' ? 'selected': ''  }}>{{ _trans('common.Completed') }}</option>
                    <option value="pending" {{ request('status') == 'pending' ? 'selected': ''  }}>{{ _trans('common.Pending') }}</option>
                    <option value="cancelled" {{ request('status') == 'cancelled' ? 'selected': ''  }}>{{ _trans('common.Cancelled') }}</option>
                    <option value="rejected" {{ request('status') == 'rejected' ? 'selected': ''  }}>{{ _trans('common.Rejected') }}</option>
                </x-forms.select>
                <div class="col-lg-2">
                    @if(request('tenant_id') || request('property_id') || request('payment_status') || request('status'))
                        <a href="{{ route('rental.index') }}" class="btn btn-lg btn-danger"><i class="fa fa-times"></i></a>
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
                        <th>{{ _trans('common.SR No.') }}</th>
                        <th class="purchase">{{ _trans('common.Property') }}</th>
                        <th class="purchase">{{ _trans('common.Tenant') }}</th>
                        <th>{{ _trans('landlord.For') }}</th>
                        <th>{{ _trans('landlord.Duration') }}</th>
                        <th class="purchase">{{ _trans('common.Price') }}</th>
                        <th class="purchase">{{ _trans('common.Paid Amount') }}</th>
                        <th class="purchase">{{ _trans('common.Due Amount') }}</th>
                        <th class="purchase">{{ _trans('common.Payment Status') }}</th>
                        <th class="purchase">{{ _trans('common.Status') }}</th>
                    </tr>
                    </thead>
                    <tbody class="tbody">
                    @forelse ($rentals as $row)
                        <tr id="row_{{ $row->id }}">
                            <td class="serial">{{ $loop->iteration }}</td>
                            <td>
                                <div class="">
                                    <a href="{{ route('admin.properties.details', [$row->id, 'basicInfo']) }}">
                                        <div class="user-card d-flex align-items-center gap-2">
                                            <div class="">
                                                <img src="{{ @globalAsset($row->property->defaultImage->path) }}"
                                                     alt="{{ @$row->property->name }}">
                                            </div>
                                            <div class="user-info">
                                                <span class="tb-lead"><b>{{ _trans('landlord.Property') }}</b> : {{ @$row->property->name }} </span>
                                                <span class="tb-lead"><b>{{ _trans('landlord.Owner') }}</b> : {{ @$row->property->user->name }} </span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </td>
                            <td>{{ @$row->order->tenant->name }}</td>
                            <td>{{ @$row->advertisement->advertisement_type == 1 ? 'Rent' : 'Sell' }}</td>
                            <td>
                                <p class="mb-0"><small class="text-primary fw-bold">{{ date('M d Y', strtotime($row->start_date)) }}</small></p>
                                <p class="mb-0">
                                    @if(isset($row->end_date))
                                        <small class="text-danger fw-bold">
                                            {{ date('M d Y', strtotime($row->end_date)) }}
                                        </small>
                                    @else
                                        <small class="text-success fw-bold">
                                            {{ _trans('common.Lifetime') }}
                                        </small>
                                    @endif
                                </p>
                            </td>

                            <td>
                                @if($row->advertisement->advertisement_type == 1)
                                    {{ priceFormat($row->advertisement->rent_amount) }}
                                @else
                                    {{ priceFormat($row->advertisement->sell_amount) }}
                                @endif
                            </td>
                            <td>{{ priceFormat($row->payments->sum('amount')) }}</td>
                            <td>{{ priceFormat($row->total_amount - $row->payments->sum('amount')) }}</td>
                            <td>
                                <span class="badge-basic-{{ $row->payment_status == 'paid' ? 'success' : ($row->payment_status == 'unpaid' ? 'warning' : 'danger') }}-text text-capitalize">
                                    {{ $row->payment_status }}
                                </span>
                            </td>
                            <td>
                                <span class="badge-basic-{{ $row->status == 'approved' ? 'success' : ($row->status == 'pending' ? 'warning' : 'danger') }}-text text-capitalize">
                                    {{ $row->status }}
                                </span>
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
                        {!! $rentals->links() !!}
                    </ul>
                </nav>
            </div>
        </div>
    </x-container>
@endsection

