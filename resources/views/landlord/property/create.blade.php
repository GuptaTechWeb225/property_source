@extends('landlord.landlord_layout')
@section('title', $title)

@section('landlord_content')
    <x-landlord.container subtitle="Here's your list of properties that you have listed on Property Hub.">
        <x-slot name="actionButton">
            <a class="theme_btn" href="{{ route('landlord.property.index') }}">
                <svg width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                    <path
                        d="M7.82843 10.9999H20V12.9999H7.82843L13.1924 18.3638L11.7782 19.778L4 11.9999L11.7782 4.22168L13.1924 5.63589L7.82843 10.9999Z"></path>
                </svg>
                Back to list
            </a>
        </x-slot>

        <form action="{{ route('landlord.property.store') }}" enctype="multipart/form-data" method="post" class="row">
            @csrf
            <div class="col-lg-8">
                <div class="row">
                    <x-forms.select
                        class="theme_select"
                        id="propertyCategory"
                        onchange="categoryChangeHandler()"
                        col="col-lg-6 mb-3"
                        :required="true"
                        label="Property Category"
                        name="property_category"
                        value="{{ old('property_category') }}">
                        @foreach ($property_categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </x-forms.select>
                    <x-forms.input
                        class="primary_input"
                        col="col-lg-6 mb-3"
                        :required="true"
                        label="Name"
                        name="name"
                        value="{{ old('name') }}"
                    ></x-forms.input>
                    <x-forms.input
                        class="primary_input"
                        col="col-lg-6 mb-3"
                        :required="true"
                        type="number"
                        label="Size of Property [Square Feet]"
                        name="size_of_property"
                        value="{{ old('size_of_property') }}"
                    ></x-forms.input>
                    <x-forms.input
                        class="primary_input"
                        parentDivId="bedroom"
                        col="col-lg-6 mb-3"
                        :required="true"
                        type="number"
                        label="Bedroom"
                        name="bedroom"
                        value="{{ old('bedroom') }}"
                    ></x-forms.input>
                    <x-forms.input
                        class="primary_input"
                        parentDivId="bathroom"
                        col="col-lg-6 mb-3"
                        :required="true"
                        type="number"
                        label="Bathroom"
                        name="bathroom"
                        value="{{ old('bathroom') }}"
                    ></x-forms.input>
                    <x-forms.input
                        class="primary_input"
                        col="col-lg-6 mb-3"
                        :required="true"
                        label="Rent Price"
                        name="rent_amount"
                        value="{{ old('rent_amount') }}"
                    ></x-forms.input>
                    <x-forms.input
                        class="primary_input"
                        col="col-lg-6 mb-3"
                        :required="true"
                        label="Flat Number"
                        name="flat_number"
                        value="{{ old('flat_number') }}"
                    ></x-forms.input>
                    <x-forms.select
                        class="theme_select"
                        col="col-lg-6 mb-3"
                        :required="true"
                        label="Property Type"
                        name="property_type"
                        value="{{ old('property_type') }}">
                        <option value="0" selected>{{ _trans('common.Residential') }}</option>
                        <option value="1">{{ _trans('common.Commercial') }}</option>
                        <option value="2">{{ _trans('common.Mixed') }}</option>
                    </x-forms.select>
                    <x-forms.select
                        class="theme_select"
                        col="col-lg-6 mb-3"
                        :required="true"
                        label="Completion"
                        name="completion"
                        value="{{ old('completion') }}">
                        <option value="2">{{ _trans('common.New') }}</option>
                        <option value="1">{{ _trans('common.Completed') }}</option>
                        <option value="0">{{ _trans('common.Under Construction') }}</option>
                    </x-forms.select>
                    <div></div>

                    <x-forms.checkbox
                        class="primary_input"
                        col="col-lg-6"
                        label="Drawing dining combined"
                        name="drawing_dining_combined"
                        value="{{ old('drawing_dining_combined') }}">
                    </x-forms.checkbox>

                    <x-forms.checkbox
                        class="primary_input"
                        col="col-lg-6 mb-3"
                        label="Vacant"
                        name="vacant"
                        value="{{ old('vacant') }}">
                    </x-forms.checkbox>

                    <x-forms.input
                        class="primary_input"
                        col="col-lg-6 mb-3"
                        :required="true"
                        label="Address"
                        name="address"
                        value="{{ old('address') }}"
                    ></x-forms.input>

                    <x-forms.input
                        class="primary_input"
                        col="col-lg-6 mb-3"
                        label="Post Code"
                        name="post_code"
                        value="{{ old('post_code') }}"
                    ></x-forms.input>

                    <x-forms.select onchange="fetchStates()" :required="true" name="country_id" class="theme_select"
                                    value="{{ @old('country_id') }}" label="Country"
                                    id="presentAddressCountry">
                        @foreach ($countries as $country)
                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                        @endforeach
                    </x-forms.select>

                    <x-forms.select onchange="fetchCities()" name="state_id" class="theme_select"
                                    value="{{ @old('state_id') }}" label="State"
                                    id="presentAddressState" selected-id="{{ old('state_id') }}">
                    </x-forms.select>

                    <x-forms.select name="city_id" class="theme_select"
                                    value="{{ @old('city_id') }}"
                                    label="City" id="presentAddressCity"
                                    selected-id="{{ old('city_id') }}">
                    </x-forms.select>

                    <x-forms.input
                        class="primary_input"
                        col="col-lg-6 mb-3"
                        label="Latitude"
                        name="latitude"
                        value="{{ old('latitude') }}"
                    ></x-forms.input>

                    <x-forms.input
                        class="primary_input"
                        col="col-lg-6 mb-3"
                        label="Longitude"
                        name="longitude"
                        value="{{ old('longitude') }}"
                    ></x-forms.input>
                    <x-forms.textarea
                        class="primary_input"
                        col="col-lg-12 mb-3"
                        label="Description"
                        name="description"
                        value="{{ old('description') }}"
                    ></x-forms.textarea>
                </div>
            </div>
            <div class="col-lg-4">
                <h3>{{ _trans('common.Property Document') }}</h3>
                <div class="row" id="ajax_doc_fields">

                </div>
                <div class="row">
                    <x-forms.file
                        col="col-lg-12 mb-3"
                        :required="true"
                        label="Image"
                        name="image"
                        value="{{ old('image') }}">
                    </x-forms.file>

                    <x-forms.file
                        col="col-lg-12 mb-3"
                        :required="true"
                        label="Property Deed"
                        name="document[property_deed]"
                        accept="image/*,.pdf"
                        value="{{ old('property_deed') }}">
                    </x-forms.file>

                    <x-forms.file
                        col="col-lg-12 mb-3"
                        label="Sales Agreement/Contract"
                        name="document[sales_agreement]"
                        accept="image/*,.pdf"
                        value="{{ old('sales_agreement') }}">
                    </x-forms.file>

                    <x-forms.file
                        col="col-lg-12 mb-3"
                        label="Transfer Tax Declaration (if applicable)"
                        name="document[tax_declaration]"
                        accept="image/*,.pdf"
                        value="{{ old('tax_declaration') }}">
                    </x-forms.file>

                    <x-forms.file
                        col="col-lg-12 mb-3"
                        label="Occupancy Certificate (if applicable)"
                        name="document[occupancy_certificate]"
                        accept="image/*,.pdf"
                        value="{{ old('occupancy_certificate') }}">
                    </x-forms.file>
                </div>

                <x-button class="theme_btn" :iconEnable="false" title="Submit"></x-button>
            </div>
        </form>
    </x-landlord.container>
@endsection
@push('js')
    <script>
        const categoryChangeHandler = async () => {
            let selectedCategory = $('#propertyCategory').find('option:selected').val();
            if (selectedCategory == 6) {
                $('#bedroom').hide();
                $('#bathroom').hide();
            } else {
                $('#bedroom').show();
                $('#bathroom').show();
            }

            const url = `{{ route('fetchCategoriesDoc') }}`;
            await $.ajax({
                type: 'GET',
                url: url,
                data: {
                    category_id: selectedCategory
                },
                success: function ({status, message, data}) {
                    console.log(data)
                    if (status) {
                        $('#ajax_doc_fields').html(data);
                    }

                },
                error: function (error) {
                    console.error('Error fetching cities:', error);
                }
            });
        }
    </script>
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
                    $(".theme_select").niceSelect("destroy");
                    $(".theme_select").niceSelect();
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
                    $(".theme_select").niceSelect("destroy");
                    $(".theme_select").niceSelect();
                },
                error: function (error) {
                    console.error('Error fetching cities:', error);
                }
            });
        }

    </script>
@endpush
