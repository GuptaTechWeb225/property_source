@extends('backend.master')
@section('title')
    {{ @$title }}
@endsection
@section('content')
    <x-container title="{{ $title }}"
                 :breadcrumbs="[['title' => 'tenants', 'route' => route('tenants.index')], ['title' => 'Tenant Details']]">
        <div class="row">
            <div class="col-lg-3 mb-3">
                <div class="card ot-card">
                    <div class="card-body d-flex flex-column gap-4 ot-card">
                        <div class="position-relative d-flex flex-column align-items-center justify-space-center gap-2">
                            <img src="{{ @globalAsset($tenant->image->path) }}" alt="{{ $tenant->name  }}" width="150" >
                            <span class="fs-3 fw-bold">{{ $tenant->name }}</span>
                            <a class="position-absolute end-0" href="{{ route('tenants.edit',$tenant->id) }}">
                                <span class="icon mr-8">
                                    <i class="las la-edit fs-5"></i>
                                </span>
                            </a>
                        </div>
                        <table class="table table-bordered ot-table-bg language-table">
                            <tbody>
                            <tr>
                                <th>{{ _trans('landlord.Email') }}</th>
                                <th>{{ $tenant->email }}</th>
                            </tr>
                            <tr>
                                <th>{{ _trans('landlord.Phone') }}</th>
                                <th>{{ $tenant->phone }}</th>
                            </tr>
                            <tr>
                                <th>{{ _trans('landlord.Date of Birth') }}</th>
                                <th>{{ $tenant->date_of_birth }}</th>
                            </tr>
                            <tr>
                                <th>{{ _trans('landlord.Blood Group') }}</th>
                                <th>{{ $tenant->blood_group }}</th>
                            </tr>
                            <tr>
                                <th>{{ _trans('landlord.Gender') }}</th>
                                <th>{{ $tenant->gender }}</th>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @php
                $address_info = $tenant->address_details ? json_decode($tenant->address_details) : [];

            @endphp
            <div class="col-lg-9 mb-3">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card ot-card">
                            <h2 class="mb-0">{{ _trans('landlord.Address Verification Info') }}</h2>
                            <hr>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-md-6 mb-20">
                                            <div class="media">
                                                <div class="media-body">
                                                    <h6>{{ _trans('landlord.Country') }}</h6>
                                                    <p class="text-muted"> {{@$address_info->country_name}}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-20">
                                            <div class="media">
                                                <div class="media-body">
                                                    <h6>{{ _trans('landlord.Code') }}</h6>
                                                    <p class="">{{ @$address_info->country_code }}</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 mb-20">
                                            <div class="media">
                                                <div class="media-body">
                                                    <h6>{{ _trans('landlord.City') }}</h6>
                                                    <p class="text-muted">{{@$address_info->cityName}}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-20">
                                            <div class="media">
                                                <div class="media-body">
                                                    <h6>{{ _trans('landlord.State') }}</h6>
                                                    <p class="text-muted">{{@$address_info->regionName}}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-20">
                                            <div class="media">
                                                <div class="media-body">
                                                    <h6>{{ _trans('landlord.Latitude') }}</h6>
                                                    <p class="text-muted">{{@$address_info->latitude}}</p>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-md-6 mb-20">
                                            <div class="media">
                                                <div class="media-body">
                                                    <h6>{{ _trans('landlord.Logitude') }}</h6>
                                                    <p class="text-muted">{{@$address_info->longitude}}</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 mb-20">
                                            <div class="media">
                                                <div class="media-body">
                                                    @if($tenant->address_verify == 1)
                                                    <a href="javascript:void()" class="btn btn-success"><i class="fas fa-check"> </i> Verified</a>
                                                        @else
                                                        <a href="{{route('tenants.verifyAddress',[$tenant->id, 1])}}" class="btn btn-success">Address Verify Approve</a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 mb-20">
                                            <div class="media">
                                                <div class="media-body">
                                                    <a href="{{route('tenants.verifyAddress',[$tenant->id, 2])}}" class="btn btn-danger">Address Verify Rejected</a>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="card ot-card">
                            <h2 class="mb-0">{{ _trans('landlord.Others Information') }}</h2>
                            <hr>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-md-6 mb-20">
                                            <div class="media">
                                                <div class="media-body">
                                                    <h6>{{ _trans('landlord.Institution') }}</h6>
                                                    <p class="text-muted">{{ $tenant->institution }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-20">
                                            <div class="media">
                                                <div class="media-body">
                                                    <h6>{{ _trans('landlord.Occupation') }}</h6>
                                                    <p class="text-muted">{{ $tenant->occupation }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-20">
                                            <div class="media">
                                                <div class="media-body">
                                                    <h6>{{ _trans('landlord.Designation') }}</h6>
                                                    <p class="text-muted">{{ $tenant->designation ? $tenant->designation->title : '-' }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-20">
                                            <div class="media">
                                                <div class="media-body">
                                                    <h6>{{ _trans('landlord.Alt phone') }}</h6>
                                                    <p class="text-muted">{{ $tenant->alt_phone }}</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 mb-20">
                                            <div class="media">
                                                <div class="media-body">
                                                    <h6>{{ _trans('landlord.Nid') }}</h6>
                                                    <p class="text-muted">{{ $tenant->nid }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-20">
                                            <div class="media">
                                                <div class="media-body">
                                                    <h6>{{ _trans('landlord.Passport No') }}</h6>
                                                    <p class="text-muted">{{ $tenant->passport }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-20">
                                            <div class="media">
                                                <div class="media-body">
                                                    <h6>{{ _trans('landlord.Nationality') }}</h6>
                                                    <p class="">{{ $tenant->nationality }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mb-20">
                                            <div class="media">
                                                <div class="media-body">
                                                    <h6>{{ _trans('landlord.Total Family Member') }}</h6>
                                                    <p class="text-muted">{{ $tenant->total_family_member }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="card ot-card">
                    <h3 class="">{{ _trans('landlord.Present Address') }}</h3>
                    <div class="row">
                        <div class="col-md-3 col-lg-3 mb-20">
                            <div class="media">
                                <div class="media-body">
                                    <h6>{{ _trans('landlord.Country') }}</h6>
                                    <p class="">{{ $tenant->country ? @$tenant->country->name: '-' }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3 mb-20">
                            <div class="media">
                                <div class="media-body">
                                    <h6>{{ _trans('landlord.State') }}</h6>
                                    <p class="">{{ !empty($tenant->state) && is_array($tenant->state) ? @$tenant->state->name: '-' }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3 mb-20">
                            <div class="media">
                                <div class="media-body">
                                    <h6>{{ _trans('landlord.City') }}</h6>
                                    <p class="">{{ $tenant->city ? @$tenant->city->name: '-' }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3 mb-20">
                            <div class="media">
                                <div class="media-body">
                                    <h6>{{ _trans('landlord.address') }}</h6>
                                    <p class="">{{ $tenant->address }}, {{ $tenant->zip_code  }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card ot-card">
                    <h3 class="">{{ _trans('landlord.Permanent Address') }}</h3>
                    <div class="row">
                        <div class="col-md-3 col-lg-3 mb-20">
                            <div class="media">
                                <div class="media-body">
                                    <h6>{{ _trans('landlord.Country') }}</h6>
                                    <p class="">{{ $tenant->permanentCountry ? $tenant->permanentCountry->name: '-' }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3 mb-20">
                            <div class="media">
                                <div class="media-body">
                                    <h6>{{ _trans('landlord.State') }}</h6>
                                    <p class="">{{ $tenant->permanentState ? $tenant->permanentState->name: '-' }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3 mb-20">
                            <div class="media">
                                <div class="media-body">
                                    <h6>{{ _trans('landlord.City') }}</h6>
                                    <p class="">{{ $tenant->permanentCity ? $tenant->permanentCity->name: '-' }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3 mb-20">
                            <div class="media">
                                <div class="media-body">
                                    <h6>{{ _trans('landlord.address') }}</h6>
                                    <p class="">{{ $tenant->per_address }}, {{ $tenant->per_zip_code  }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <h3 class="">{{ _trans('landlord.Properties') }}</h3>
            <div class="row">
                @foreach($tenant->properties as $property)
                    <div class="col-lg-3">
                        <div class="card ot-card">
                            <div class="card-header text-center">
                                <img src="{{ @globalAsset($property->property->path) }}" alt="">
                            </div>
                            <div class="card-body">
                                <h3 class="mb-0">{{ $property->property ?  $property->property->name : '-' }}</h3>
                                <h3>{{ _trans('landlord.BDT') }} {{ $property->total_amount }}</h3>
                                <p>{{ $property->start_date }} - {{ $property->end_date }}</p>
                                <p>{{ $property->property ?  $property->property->description : '-' }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </x-container>
@endsection


@push('script')
    @include('backend.partials.delete-ajax')
@endpush
