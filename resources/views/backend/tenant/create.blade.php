@extends('backend.master')

@section('title')
    {{ @$data['title'] }}
@endsection


@section('content')
    <x-container title="{{ $title }}"
                 :breadcrumbs="[['title' => 'tenants', 'route' => route('tenants.index')], ['title' => 'Add New']]">
        <div class="card ot-card">
            <h2 class="mb-0">{{ $title }}</h2>

            <form action="{{ route('tenants.store') }}" enctype="multipart/form-data" method="post" id="visitForm"
                  class="row mt-5">
                @csrf

                <div class="col-lg-6 mb-5">
                    <fieldset>
                        <legend><h3>{{ _trans('landlord.Personal Details') }}</h3></legend>
                        <div class="row">
                            <x-forms.input :required="true" name="name" value="{{ @old('name') }}"
                                           label="Name"></x-forms.input>
                            <x-forms.input :required="true" type="email" value="{{ @old('email') }}" name="email"
                                           label="Email"></x-forms.input>
                            <x-forms.input :required="true" name="phone" value="{{ @old('phone') }}"
                                           label="Phone"></x-forms.input>
                            <x-forms.file id="fileBrouse" file_id="placeholder" name="image"
                                          label="Profile Photo"></x-forms.file>
                            <x-forms.input :required="true" type="password" name="password" label="Password"></x-forms.input>
                            <x-forms.input :required="true" type="password" name="password_confirmation"
                                           label="Confirm Password"></x-forms.input>
                        </div>
                    </fieldset>
                </div>
                <div class="col-lg-6 mb-5">
                    <fieldset>
                        <legend><h3>{{ _trans('landlord.Present Address') }}</h3></legend>
                        <div class="row">
                            <x-forms.select onchange="fetchStates()" name="country_id"
                                            value="{{ @old('country_id') }}" label="Country" id="presentAddressCountry">
                                @foreach ($countries as $country)
                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                @endforeach
                            </x-forms.select>

                            <x-forms.select onchange="fetchCities()"  name="state_id"
                                            value="{{ @old('state_id') }}" label="State"
                                            id="presentAddressState" selected-id="{{ old('state_id') }}">
                            </x-forms.select>

                            <x-forms.select id="city_select" name="city_id"
                                            value="{{ @old('city_id') }}"
                                            label="City" id="presentAddressCity"
                                            selected-id="{{ old('city_id') }}">
                            </x-forms.select>
                            <x-forms.input  name="zip_code" value="{{ @old('zip_code') }}"
                                           label="Zip Code"></x-forms.input>
                            <x-forms.textarea rows="2" :required="true" name="address" value="{{ @old('name') }}"
                                              label="Address"></x-forms.textarea>
                        </div>
                    </fieldset>
                </div>
                <div class="col-lg-12 mb-3">
                    <x-button></x-button>
                </div>
            </form>
        </div>
    </x-container>
@endsection
@push('script')
    <script>
        const fetchStates = async () => {
            let country_id = $('#presentAddressCountry').find('option:selected').val();
            let selected_state_id = $('#presentAddressState').attr('selected-id');
            const url = `{{ route('fetch-states') }}`;
            await $.ajax({
                type: 'GET',
                url: url,
                data: {
                    country_id
                },
                success: function ({status, message, data}) {
                    if (status) {
                        data.map(state => {
                            $('#presentAddressState').append(
                                `<option value="${state.id}" ${selected_state_id == state.id ? 'selected' : ''}>${state.name}</option>`
                            )
                        });
                    }
                    reinitializeNiceSelect();
                },
                error: function (error) {
                    console.error('Error fetching cities:', error);
                }
            });
        }


        const fetchCities = async () => {
            let country_id = $('#presentAddressCountry').find('option:selected').val();
            let state_id = $('#presentAddressState').find('option:selected').val();
            let selected_city_id = $('#presentAddressCity').attr('selected-id');
            const url = `{{ route('fetch-cities') }}`;
            await $.ajax({
                type: 'GET',
                url: url,
                data: {
                    country_id,
                    state_id
                },
                success: function ({status, message, data}) {
                    if (status) {
                        data.map(city => {
                            $('#presentAddressCity').append(
                                `<option value="${city.id}" ${selected_city_id == city.id ? 'selected' : ''}>${city.name}</option>`
                            )
                        });
                    }
                    reinitializeNiceSelect();
                },
                error: function (error) {
                    console.error('Error fetching cities:', error);
                }
            });
        }
    </script>
@endpush
