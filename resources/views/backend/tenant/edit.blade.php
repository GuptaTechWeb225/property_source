@extends('backend.master')

@section('title')
    {{ @$data['title'] }}
@endsection

@section('content')
    <x-container title="{{ $title }}" :breadcrumbs="[['title' => 'tenants', 'route' => route('tenants.index')], ['title' => 'Tenant Edit']]">
        <div class="card ot-card">
            <form action="{{ route('tenants.update', $tenant->id) }}" enctype="multipart/form-data" method="post"
                id="visitForm" class="row">
                @csrf
                @method('put')
                <div class="col-lg-6 mb-5">
                    <fieldset>
                        <legend>
                            <h3>{{ _trans('landlord.Personal Details') }}</h3>
                        </legend>
                        <div class="row">
                            <x-forms.input :required="true" name="name" value="{{ $tenant->name }}"
                                label="Name"></x-forms.input>
                            <x-forms.input :required="true" type="email" value="{{ $tenant->email }}" name="email"
                                label="Email"></x-forms.input>
                            <x-forms.input :required="true" name="phone" value="{{ $tenant->phone }}"
                                label="Phone"></x-forms.input>
                            <x-forms.input name="alt_phone" value="{{ $tenant->alt_phone }}"
                                label="Alt Phone"></x-forms.input>
                            <x-forms.input name="institution" value="{{ $tenant->institution }}"
                                label="Institution"></x-forms.input>
                            <x-forms.input name="occupation" value="{{ $tenant->occupation }}"
                                label="Occupation"></x-forms.input>
{{--                            <x-forms.select name="designation_id" label="Designation">--}}
{{--                                <option value="">{{ _trans('landlord.Select on') }}</option>--}}
{{--                                @foreach ($designations as $designation)--}}
{{--                                    <option value="{{ $designation->id }}"--}}
{{--                                        {{ $designation->id == $tenant->designation_id ? 'selected' : '' }}>--}}
{{--                                        {{ $designation->title }}</option>--}}
{{--                                @endforeach--}}
{{--                            </x-forms.select>--}}
                            <x-forms.file id="fileBrouse" file_id="placeholder" :required="true" name="image"
                                label="Profile Photo"></x-forms.file>
                        </div>
                    </fieldset>
                </div>
                <div class="col-lg-6 mb-5">
                    <fieldset>
                        <legend>
                            <h3>{{ _trans('landlord.Others Details') }}</h3>
                        </legend>
                        <div class="row">
                            <x-forms.input name="date_of_birth" type="date" value="{{ $tenant->date_of_birth }}"
                                label="Date of Birth"></x-forms.input>
                            <x-forms.select name="gender" label="Gender">
                                <option value="">{{ _trans('landlord.Select on') }}</option>
                                <option value="Male" {{ $tenant->gender == 'Male' ? 'selected' : '' }}>
                                    {{ _trans('landlord.Male') }}</option>
                                <option value="Female" {{ $tenant->gender == 'Female' ? 'selected' : '' }}>
                                    {{ _trans('landlord.Female') }}</option>
                            </x-forms.select>
                            <x-forms.input name="blood_group" value="{{ $tenant->blood_group }}"
                                label="Blood Group"></x-forms.input>
                            <x-forms.input name="nationality" value="{{ $tenant->nationality }}"
                                label="Nationality"></x-forms.input>
                            <x-forms.input name="nid" value="{{ $tenant->nid }}" type="number" label="NID"></x-forms.input>
                        </div>
                    </fieldset>
                </div>

                <div class="col-lg-6 mb-5">
                    <fieldset>
                        <legend>
                            <h3>{{ _trans('landlord.Present Address') }}</h3>
                        </legend>
                        <div class="row">
                            <x-forms.select onchange="fetchStates()" :required="true" name="country_id"
                                value="{{ @old('country_id') }}" label="Country" id="presentAddressCountry">
                                <option value="">{{ _trans('landlord.Select on') }}</option>
                                @foreach ($countries as $country)
                                    <option value="{{ $country->id }}"
                                        {{ $country->id == $tenant->country_id ? 'selected' : '' }}>{{ $country->name }}
                                    </option>
                                @endforeach
                            </x-forms.select>

                            <x-forms.select onchange="fetchCities()" :required="true" name="state_id" value="{{ @old('state_id') }}" label="State"
                                id="presentAddressState" selected-id="{{ old('state_id', $tenant->state_id) }}">
                                <option value="">{{ _trans('landlord.Select on') }}</option>
                            </x-forms.select>

                            <x-forms.select :required="true" id="city_select" name="city_id" value="{{ @old('city_id') }}"
                                label="City" id="presentAddressCity"
                                selected-id="{{ old('city_id', $tenant->city_id) }}">
                                <option value="">{{ _trans('landlord.Select on') }}</option>
                            </x-forms.select>
                            <x-forms.input  name="zip_code" value="{{ @old('zip_code') }}"
                                label="Zip Code"></x-forms.input>
                            <x-forms.textarea rows="2" :required="true" name="address" value="{{ $tenant->name }}"
                                label="Address"></x-forms.textarea>
                        </div>
                    </fieldset>
                </div>
                <div class="col-lg-6 mb-5">
                    <fieldset>
                        <legend>
                            <h3>{{ _trans('landlord.Permanent Address') }}</h3>
                        </legend>
                        <div class="row">
                            <x-forms.select onchange="fetchPermanentState()"
                                name="per_country_id" value="{{ @old('per_country_id') }}"  label="Country" id="permanentAddressCountry">
                                <option value="">{{ _trans('landlord.Select on') }}</option>
                                @foreach ($countries as $country)
                                    <option value="{{ $country->id }}"
                                        {{ $country->id == $tenant->per_country_id ? 'selected' : '' }}>
                                        {{ $country->name }}</option>
                                @endforeach
                            </x-forms.select>
                            <x-forms.select onchange="fetchPermanentCities()"
                                name="per_state_id" value="{{ @old('per_state_id') }}" label="State" selected-id="{{ old('per_state_id', $tenant->per_state_id) }}" id="permanentAddressState">
                                <option value="">{{ _trans('landlord.Select on') }}</option>
                            </x-forms.select>

                            <x-forms.select  name="per_city_id" value="{{ @old('per_city_id') }}"
                                label="City" selected-id="{{ old('per_city_id', $tenant->per_city_id) }}" id="permanentAddressCity">
                                <option value="">{{ _trans('landlord.Select on') }}</option>
                            </x-forms.select>
                            <x-forms.input name="per_zip_code" value="{{ $tenant->per_zip_code }}"
                                label="Zip Code"></x-forms.input>
                            <x-forms.textarea rows="2" name="per_address" value="{{ $tenant->per_address }}"
                                label="Address"></x-forms.textarea>
                        </div>
                    </fieldset>
                </div>
                <div class="col-lg-12 mb-3">
                    <x-forms.select name="status" label="Status" col="col-lg-4">
                        <option value="">{{ _trans('landlord.Select One') }}</option>
                        <option value="{{ App\Enums\Status::ACTIVE }}" selected>{{ _trans('landlord.Active') }}
                        </option>
                        <option value="{{ App\Enums\Status::INACTIVE }}">{{ _trans('landlord.Inactive') }}
                        </option>
                    </x-forms.select>
                    <x-button></x-button>
                </div>
            </form>
        </div>
    </x-container>
@endsection
@push('script')
    <script>
        // Present Address
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
                success: function({
                    status,
                    message,
                    data
                }) {

                    if (status) {
                        data.map(state => {
                            $('#presentAddressState').append(
                                `<option value="${state.id}" ${ selected_state_id == state.id ? 'selected' : '' }>${state.name}</option>`
                            )
                        });

                        fetchCities();
                    }

                    reinitializeNiceSelect();
                },
                error: function(error) {
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
                success: function({
                    status,
                    message,
                    data
                }) {

                    if (status) {
                        data.map(city => {
                            $('#presentAddressCity').append(
                                `<option value="${city.id}" ${ selected_city_id == city.id ? 'selected' : '' }>${city.name}</option>`
                            )
                        });
                    }

                    reinitializeNiceSelect();
                },
                error: function(error) {
                    console.error('Error fetching cities:', error);
                }
            });
        }

        $(document).ready(function() {
            fetchStates();
        })

        // Permanent Address
        const fetchPermanentState = async () => {
            let country_id = $('#permanentAddressCountry').find('option:selected').val();
            let selected_state_id = $('#permanentAddressState').attr('selected-id');
            const url = `{{ route('fetch-states') }}`;
            await $.ajax({
                type: 'GET',
                url: url,
                data: {
                    country_id
                },
                success: function({
                    status,
                    message,
                    data
                }) {

                    if (status) {
                        data.map(state => {
                            $('#permanentAddressState').append(
                                `<option value="${state.id}" ${ selected_state_id == state.id ? 'selected' : '' }>${state.name}</option>`
                            )
                        });

                        fetchPermanentCities();
                    }
                    reinitializeNiceSelect();
                },
                error: function(error) {
                    console.error('Error fetching cities:', error);
                }
            });
        }


        const fetchPermanentCities = async () => {
            let country_id = $('#permanentAddressCountry').find('option:selected').val();
            let state_id = $('#permanentAddressState').find('option:selected').val();
            let selected_city_id = $('#permanentAddressCity').attr('selected-id');
            const url = `{{ route('fetch-cities') }}`;
            await $.ajax({
                type: 'GET',
                url: url,
                data: {
                    country_id,
                    state_id
                },
                success: function({
                    status,
                    message,
                    data
                }) {

                    if (status) {
                        data.map(city => {
                            $('#permanentAddressCity').append(
                                `<option value="${city.id}" ${ selected_city_id == city.id ? 'selected' : '' }>${city.name}</option>`
                            )
                        });
                    }
                    reinitializeNiceSelect();
                },
                error: function(error) {
                    console.error('Error fetching cities:', error);
                }
            });
        }
        $(document).ready(function() {
            fetchPermanentState();
        })
    </script>
@endpush
