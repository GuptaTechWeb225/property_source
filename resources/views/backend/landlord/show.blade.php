@extends('backend.master')
@section('title')
    {{ @$title }}
@endsection
@section('content')
    <x-container title="{{ $title }}"
                 :breadcrumbs="[['title' => 'landlors', 'route' => route('landlord.index')], ['title' => 'Landlord Details']]">
        <div class="row">
            <div class="col-lg-3 mb-3">
                <div class="card ot-card">
                    <div class="card-body d-flex flex-column gap-4 ot-card">
                        <div class="position-relative d-flex flex-column align-items-center justify-space-center gap-2">
                            <img src="{{ @globalAsset($landlord->image->path) }}" alt="{{ $landlord->name  }}"
                                 width="150">
                            <span class="fs-3 fw-bold">{{ $landlord->name }}</span>
                            <a class="position-absolute end-0" href="{{ route('landlord.edit',$landlord->id) }}">
                                <span class="icon mr-8">
                                    <i class="las la-edit fs-5"></i>
                                </span>
                            </a>
                        </div>
                        <table class="table table-bordered ot-table-bg language-table">
                            <tbody>
                            <tr>
                                <th>{{ _trans('landlord.Email') }}</th>
                                <th>{{ $landlord->email }}</th>
                            </tr>
                            <tr>
                                <th>{{ _trans('landlord.Phone') }}</th>
                                <th>{{ $landlord->phone }}</th>
                            </tr>
                            <tr>
                                <th>{{ _trans('landlord.Date of Birth') }}</th>
                                <th>{{ $landlord->date_of_birth }}</th>
                            </tr>
                            <tr>
                                <th>{{ _trans('landlord.Blood Group') }}</th>
                                <th>{{ $landlord->blood_group }}</th>
                            </tr>
                            <tr>
                                <th>{{ _trans('landlord.Gender') }}</th>
                                <th>{{ $landlord->gender }}</th>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 mb-3">
                <div class="card ot-card">
                    <h2 class="mb-0">{{ _trans('landlord.Others Information') }}</h2>
                    <hr>
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-md-6 mb-20">
                                    <div class="media">
                                        <div class="media-body">
                                            <h6>{{ _trans('landlord.Institution') }}</h6>
                                            <p class="text-muted">{{ $landlord->institution }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-20">
                                    <div class="media">
                                        <div class="media-body">
                                            <h6>{{ _trans('landlord.Occupation') }}</h6>
                                            <p class="text-muted">{{ $landlord->occupation }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-20">
                                    <div class="media">
                                        <div class="media-body">
                                            <h6>{{ _trans('landlord.Designation') }}</h6>
                                            <p class="text-muted">{{ $landlord->designation ? $landlord->designation->title : '-' }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-20">
                                    <div class="media">
                                        <div class="media-body">
                                            <h6>{{ _trans('landlord.Alt phone') }}</h6>
                                            <p class="text-muted">{{ $landlord->alt_phone }}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-20">
                                    <div class="media">
                                        <div class="media-body">
                                            <h6>{{ _trans('landlord.Nid') }}</h6>
                                            <p class="text-muted">{{ $landlord->nid }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-20">
                                    <div class="media">
                                        <div class="media-body">
                                            <h6>{{ _trans('landlord.Passport No') }}</h6>
                                            <p class="text-muted">{{ $landlord->passport }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-20">
                                    <div class="media">
                                        <div class="media-body">
                                            <h6>{{ _trans('landlord.Nationality') }}</h6>
                                            <p class="">{{ $landlord->nationality }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-20">
                                    <div class="media">
                                        <div class="media-body">
                                            <h6>{{ _trans('landlord.Total Family Member') }}</h6>
                                            <p class="text-muted">{{ $landlord->total_family_member }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <h4>{{ _trans('common.Documents') }}</h4>
                                @foreach($documents as $doc)
                                    <div class="col-3">
                                        <div class="card ot-badge border-primary shadow-sm  p-3">
                                            <div class="card-body pt-0">
                                                <a class="d-flex align-items-center"
                                                   href="{{ @globalAsset($doc->attachment->path) }}">
                                                    <h4 class=""><i
                                                            class="las la-file-pdf font-size-20 text-theme-color"></i> {{ $doc->filename }}
                                                    </h4>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            @endforeach
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
                                    <p class="">{{ $landlord->country ? $landlord->country->name: '-' }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3 mb-20">
                            <div class="media">
                                <div class="media-body">
                                    <h6>{{ _trans('landlord.State') }}</h6>
                                    <p class="">{{ !empty($landlord->state) && is_array($landlord->state) ? $landlord->state->name: '-' }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3 mb-20">
                            <div class="media">
                                <div class="media-body">
                                    <h6>{{ _trans('landlord.City') }}</h6>
                                    <p class="">{{ $landlord->city ? $landlord->city->name: '-' }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3 mb-20">
                            <div class="media">
                                <div class="media-body">
                                    <h6>{{ _trans('landlord.address') }}</h6>
                                    <p class="">{{ $landlord->address }}, {{ $landlord->zip_code  }}</p>
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
                                    <p class="">{{ $landlord->permanentCountry ? $landlord->permanentCountry->name: '-' }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3 mb-20">
                            <div class="media">
                                <div class="media-body">
                                    <h6>{{ _trans('landlord.State') }}</h6>
                                    <p class="">{{ $landlord->permanentState ? $landlord->permanentState->name: '-' }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3 mb-20">
                            <div class="media">
                                <div class="media-body">
                                    <h6>{{ _trans('landlord.City') }}</h6>
                                    <p class="">{{ $landlord->permanentCity ? $landlord->permanentCity->name: '-' }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3 mb-20">
                            <div class="media">
                                <div class="media-body">
                                    <h6>{{ _trans('landlord.address') }}</h6>
                                    <p class="">{{ $landlord->per_address }}, {{ $landlord->per_zip_code  }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-container>
@endsection

@push('script')
    @include('backend.partials.delete-ajax')
@endpush
