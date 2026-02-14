@extends('backend.master')
@section('title')
    {{ $title }}
@endsection
@section('content')
    <x-container title="{{ $title }}" :breadcrumbs="[['title' => 'Reports'], ['title' => 'Available Room']]">
        <div class="card ot-card">
            <form action="" class="search row mb-3" method="get">
                <x-forms.select col="col-lg-3" name="property_id">
                    <option value="">{{ _trans('common.Select Property') }}</option>
                    @foreach($properties as $property)
                        <option
                            {{ $property->id == request('property_id') ? 'selected': ''  }} value="{{ $property->id }}">{{ $property->name }}</option>
                    @endforeach
                </x-forms.select>
                <x-forms.select col="col-lg-3" label="" name="user_id">
                    <option value="">{{ _trans('common.Select Land Owner') }}</option>
                    @foreach($users as $user)
                        <option
                            {{ $user->id == request('user_id') ? 'selected': ''  }} value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </x-forms.select>
                <x-forms.select col="col-lg-2" name="status">
                    <option value="">{{ _trans('common.Status') }}</option>
                    <option
                        value="occupied" {{ request('status') == 'occupied' ? 'selected': ''  }}>{{ _trans('common.Occupied') }}</option>
                    <option
                        value="available" {{ request('status') == 'available' ? 'selected': ''  }}>{{ _trans('common.Available') }}</option>
                </x-forms.select>
                <div class="col-lg-2">
                    @if(request('property_id') || request('user_id') || request('statys'))
                        <a href="{{ route('report.room') }}" class="btn btn-lg btn-danger"><i
                                class="fa fa-times"></i></a>
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
                        <th class="purchase">{{ _trans('common.Owner') }}</th>
                        <th class="purchase">{{ _trans('common.Size') }}</th>
                        <th class="purchase">{{ _trans('common.Bedroom') }}</th>
                        <th class="purchase">{{ _trans('common.Type') }}</th>
                        <th class="purchase">{{ _trans('common.Available') }}</th>
                    </tr>
                    </thead>
                    <tbody class="tbody">
                    @forelse ($reports as $row)
                        <tr id="row_{{ $row->id }}">
                            <td class="serial">{{ $loop->iteration }}</td>
                            <td>
                                <div class="">
                                    <a href="{{ route('admin.properties.details', [$row->id, 'basicInfo']) }}">
                                        <div class="user-card d-flex align-items-center gap-2">
                                            <div class="">
                                                <img src="{{ @globalAsset($row->defaultImage->path) }}"
                                                     alt="{{ $row->name }}">
                                            </div>
                                            <div class="user-info">
                                                <span class="tb-lead"><b>{{ _trans('landlord.Property') }}</b> : {{ $row->name }} </span>
                                                <span class="tb-lead"><b>{{ _trans('landlord.Owner') }}</b> : {{ $row->user->name }} </span>
                                                <span class="tb-lead"><b>{{ _trans('common.Flat No.') }}</b> : {{ $row->flat_no }} </span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </td>
                            <td>
                                {{ $row->user->name }}
                            </td>
                            <td>
                                {{ $row->size }} {{ _trans('common.sqft') }}
                            </td>
                            <td>{{ $row->bedroom }}</td>
                            <td>
                                <div>
                                   <span class="badge badge-pill {{ $row->deal_type == 1 ? 'badge-basic-primary-text' : 'badge-basic-warning-text' }}">{{ $row->deal_type == 1 ? 'Rent' : 'Sell' }}</span>
                                </div>
                            </td>
                            <td>
                                @if(request('status')  == 'occupied')
                                    {{ date('M d,Y', strtotime($row->orderDetail->end_date)) }}
                                @else
                                    @if($row->advertisement->advertisement_type == 1)
                                        {{ date('M d,Y', strtotime($row->advertisement->rent_end_date)) }}
                                    @endif
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

