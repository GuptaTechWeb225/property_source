@extends('backend.master')
@section('title')
    {{ @$data['title'] }}
@endsection
@section('content')
    <div class="page-content">
        <!-- profile content start -->
        <div class="profile-content">
            <div class="d-flex flex-column flex-lg-row gap-4 gap-lg-0">
                <!-- profile menu mobile start -->
                <div class="profile-menu-mobile">
                    <button class="btn-menu-mobile" type="button" data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasWithBothOptionsMenuMobile"
                        aria-controls="offcanvasWithBothOptionsMenuMobile">
                        <span class="icon"><i class="fa-solid fa-bars"></i></span>
                    </button>

                    <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1"
                        id="offcanvasWithBothOptionsMenuMobile">
                        <div class="offcanvas-header">
                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close">
                                <span class="icon"><i class="fa-solid fa-xmark"></i></span>
                            </button>
                        </div>
                        <div class="offcanvas-body">
                            <!-- profile menu start -->
                            <div class="profile-menu">
                                <!-- profile menu head start -->
                                @include('backend.partials.property-profile-menu')
                                <!-- profile menu head end -->

                                <div class="profile-menu-body">
                                    @include('backend.property.propert_nav')
                                </div>
                            </div>
                            <!-- profile menu end -->
                        </div>
                    </div>
                </div>
                <!-- profile menu mobile end -->

                <!-- profile menu start -->
                <div class="profile-menu">

                    <!-- profile menu head start -->
                    @include('backend.partials.property-profile-menu')
                    <!-- profile menu head end -->

                    <!-- profile menu body start -->
                    <div class="profile-menu-body">
                        @include('backend.property.propert_nav')
                    </div>
                    <!-- profile menu body end -->
                </div>
                <!-- profile menu end -->

                <!-- profile body start -->
                <div class="profile-body">

                    <div class="emergency-header-edit mb-16">
                        <h3 class="title m-0">Overview</h3>

                        <a href="#" class="add-edit-btn">
                            <i class="fa-regular fa-pen-to-square"></i>
                        </a>
                    </div>

                    <!-- profile body nav end -->
                    <!-- profile body form start -->
                    <div class="profile-body-form style-2">
                        <div class="form-item border-bottom-0 p-0">

                            {{-- <form action=""> --}}
                            <div class="land-basic-data">

                                <div class="ot-card ot_heightFull mb-24">

                                    <div class="browser-details">


                                        <div class="card table-content table-basic mb-5">
                                            <div class="card-body">
                                                <div class="title mb-10">
                                                    <h3 class="">Flat Details</h3>
                                                </div>
                                                <div class="all-lands-basic">
                                                    <div class="table-responsive table-height-350 niceScroll">
                                                        <table class="table table-bordered">
                                                            <tbody class="tbody">
                                                                <tr>
                                                                    <td class="w-50percent"><i
                                                                            class="fa-solid fa-expand"></i> Size</td>
                                                                    <td class="w-50percent">{{ $data['property']->size }}
                                                                        {{ _trans('common.Square Feet') }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="w-50percent"><i
                                                                            class="fa-solid fa-mattress-pillow"></i>
                                                                        Beds</td>
                                                                    <td class="w-50percent">{{ $data['property']->bedroom }}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="w-50percent"><i
                                                                            class="fa-solid fa-shower"></i> Bath</td>
                                                                    <td class="w-50percent">
                                                                        {{ $data['property']->bathroom }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="w-50percent"><i
                                                                            class="fa-regular fa-credit-card"></i> Rent
                                                                    </td>
                                                                    <td class="w-50percent">
                                                                        {{ $data['property']->rent_amount }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="w-50percent"><i
                                                                            class="fa-solid fa-sliders"></i> Type</td>
                                                                    <td class="w-50percent">
                                                                        {{ $data['property']->type == 1 ? 'Commercial' : 'Residential' }}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="w-50percent"><i
                                                                            class="fa-solid fa-sliders"></i> Category</td>
                                                                    <td class="w-50percent">
                                                                        {{ @$data['property']->category->name }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="w-50percent"><i
                                                                            class="fa-regular fa-circle-check"></i>
                                                                        Completion</td>
                                                                    <td class="w-50percent">
                                                                        {{ $data['property']->completion == 1 ? 'Completed' : 'Under Construction' }}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="w-50percent"><i
                                                                            class="fa-regular fa-clipboard"></i>
                                                                        Description</td>
                                                                    <td class="w-50percent">
                                                                        {{ $data['property']->description }}</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        {{-- basic info edit --}}
                                        <div class="card table-content table-basic">
                                            <div class="card-body">
                                                <div class="title mb-10">
                                                    <h3 class="">Edit Basic Info</h3>
                                                </div>
                                                <div class="lands-basic-edit">
                                                    <form
                                                        action="{{ route('properties.update', [$data['property']->id, 'basicInfo']) }}"
                                                        enctype="multipart/form-data" method="post" id="visitForm">
                                                        @csrf
                                                        <div class="row mb-3">

                                                            <div class="col-md-6 mb-3">
                                                                <label for="exampleDataList"
                                                                    class="form-label ">{{ _trans('common.Name') }}</label>
                                                                <input
                                                                    class="form-control ot-input @error('name') is-invalid @enderror"
                                                                    name="name" list="datalistOptions"
                                                                    id="exampleDataList"
                                                                    placeholder="{{ _trans('common.3') }}"
                                                                    value="{{ @$data['property']->name }}">
                                                                @error('name')
                                                                    <div id="validationServer04Feedback"
                                                                        class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>

                                                            <div class="col-md-6 mb-3">
                                                                <label for="exampleDataList"
                                                                    class="form-label ">{{ _trans('common.Size of Property') }}
                                                                    [{{ _trans('common.Square Feet') }}]</label>
                                                                <input
                                                                    class="form-control ot-input @error('size_of_property') is-invalid @enderror"
                                                                    name="size_of_property" type="number"
                                                                    list="datalistOptions" id="exampleDataList"
                                                                    placeholder="{{ _trans('common.234') }}"
                                                                    value="{{ @$data['property']->size }}">
                                                                @error('size_of_property')
                                                                    <div id="validationServer04Feedback"
                                                                        class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>

                                                            <div class="col-md-6 mb-3">
                                                                <label for="exampleDataList"
                                                                    class="form-label ">{{ _trans('common.Bedroom') }}
                                                                </label>
                                                                <input
                                                                    class="form-control ot-input @error('bedroom') is-invalid @enderror"
                                                                    name="bedroom" list="datalistOptions"
                                                                    id="exampleDataList"
                                                                    placeholder="{{ _trans('common.3') }}"
                                                                    value="{{ @$data['property']->bedroom }}">
                                                                @error('bedroom')
                                                                    <div id="validationServer04Feedback"
                                                                        class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>

                                                            <div class="col-md-6 mb-3">
                                                                <label for="exampleDataList"
                                                                    class="form-label ">{{ _trans('common.Bathroom') }}</label>
                                                                <input
                                                                    class="form-control ot-input @error('bathroom') is-invalid @enderror"
                                                                    name="bathroom" list="datalistOptions"
                                                                    id="exampleDataList"
                                                                    placeholder="{{ _trans('common.3') }}"
                                                                    value="{{ @$data['property']->bathroom }}">
                                                                @error('bathroom')
                                                                    <div id="validationServer04Feedback"
                                                                        class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>


                                                            <div class="col-md-6 mb-3">
                                                                <label for="exampleDataList"
                                                                    class="form-label ">{{ _trans('common.Rent Price') }}</label>
                                                                <input
                                                                    class="form-control ot-input @error('rent_price') is-invalid @enderror"
                                                                    name="rent_price" list="datalistOptions"
                                                                    id="exampleDataList"
                                                                    placeholder="{{ _trans('common.40,000') }}"
                                                                    value="{{ @$data['property']->rent_amount }}">
                                                                @error('rent_price')
                                                                    <div id="validationServer04Feedback"
                                                                        class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>

                                                            <div class="col-md-6 mb-3">
                                                                <label for="exampleDataList"
                                                                    class="form-label ">{{ _trans('common.Flat Number') }}</label>
                                                                <input
                                                                    class="form-control ot-input @error('Flat Number') is-invalid @enderror"
                                                                    name="Flat_Number" list="datalistOptions"
                                                                    id="exampleDataList"
                                                                    placeholder="{{ _trans('common.3') }}"
                                                                    value="{{ @$data['property']->rent_amount }}">
                                                                @error('Flat Number')
                                                                    <div id="validationServer04Feedback"
                                                                        class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>

                                                            <div class="col-md-6 mb-3">
                                                                <label for="validationServer04"
                                                                    class="form-label">{{ _trans('common.Property Type') }}</label>
                                                                <select
                                                                    class="nice-select niceSelect bordered_style wide @error('property_type') is-invalid @enderror"
                                                                    name="property_type" id="validationServer04"
                                                                    aria-describedby="validationServer04Feedback">
                                                                    <option value="0" selected>
                                                                        {{ _trans('common.Residential') }}</option>
                                                                    <option value="1"
                                                                        {{ @$data['property']->type == 1 ? 'selected' : '' }}>
                                                                        {{ _trans('common.Commercial') }}</option>
                                                                </select>
                                                                @error('property_type')
                                                                    <div id="validationServer04Feedback"
                                                                        class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>

                                                            <div class="col-md-6 mb-3">
                                                                <label for="validationServer04"
                                                                    class="form-label">{{ _trans('common.Property Category') }}</label>
                                                                <select
                                                                    class="nice-select niceSelect bordered_style wide @error('property_category') is-invalid @enderror"
                                                                    name="property_category" id="validationServer04"
                                                                    aria-describedby="validationServer04Feedback">
                                                                    @foreach ($data['property_categories'] as $categories)
                                                                        <option value="{{ $categories->id }}"
                                                                            {{ @$data['property']->property_category_id == $categories->id ? 'selected' : '' }}>
                                                                            {{ $categories->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                                @error('property_category')
                                                                    <div id="validationServer04Feedback"
                                                                        class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>

                                                            <div class="col-md-6 mb-3 mt-3">
                                                                <input class="form-check-input mr-4  common-key"
                                                                    type="checkbox" name="drawing_dining_combined"
                                                                    id="drawing_dinning_combined"
                                                                    {{ @$data['property']->dining_combined == 1 ? 'checked' : '' }} />
                                                                <label class="form-check-label"
                                                                    for="drawing_dinning_combined">{{ _trans('common.drawing dining combined') }}<span
                                                                        class="fillable">*</span></label>
                                                            </div>

                                                            <div class="col-md-6 mb-3 mt-3">
                                                                <input class="form-check-input mr-4  common-key"
                                                                    type="checkbox" name="vacant" id="vacant"
                                                                    {{ @$data['property']->vacant == 1 ? 'checked' : '' }} />
                                                                <label class="form-check-label"
                                                                    for="vacant">{{ _trans('common.vacant') }}<span
                                                                        class="fillable">*</span></label>
                                                            </div>

                                                            <div class="col-md-6 mb-3 mt-3">
                                                                {{-- File Uplode --}}
                                                                <label class="form-label"
                                                                    for="inputImage">{{ _trans('common.image') }}</label>
                                                                <div class="ot_fileUploader left-side mb-3">
                                                                    <input class="form-control" type="text"
                                                                        placeholder="{{ _trans('common.image') }}"
                                                                        readonly="" id="placeholder">
                                                                    <button class="primary-btn-small-input"
                                                                        type="button">
                                                                        <label class="btn btn-lg ot-btn-primary"
                                                                            for="fileBrouse">{{ _trans('common.browse') }}</label>
                                                                        <input type="file" class="d-none form-control"
                                                                            name="image" id="fileBrouse"
                                                                            accept="image/*">
                                                                    </button>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6 mb-3 mt-3">
                                                                <label for="exampleDataList"
                                                                    class="form-label ">{{ _trans('common.Address') }}</label>
                                                                <input
                                                                    class="form-control ot-input @error('address') is-invalid @enderror"
                                                                    name="address" list="datalistOptions"
                                                                    id="exampleDataList"
                                                                    placeholder="{{ _trans('common.Property Address') }}"
                                                                    value="{{ @$data['property']->location->address }}">
                                                                @error('address')
                                                                    <div id="validationServer04Feedback"
                                                                        class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>

                                                            <x-forms.select onchange="fetchStates()" :required="true"
                                                                name="country" value="{{ @old('country') }}"
                                                                label="Country" id="presentAddressCountry">
                                                                @foreach ($data['countries'] as $country)
                                                                    <option value="{{ $country->id }}"
                                                                        {{ @$data['property']->location->country_id == $country->id ? 'selected' : '' }}>
                                                                        {{ $country->name }}</option>
                                                                @endforeach
                                                            </x-forms.select>

                                                            <x-forms.select onchange="fetchCities()" name="state"
                                                                value="{{ @old('state', @$data['property']->location->state_id) }}"
                                                                label="State" id="presentAddressState"
                                                                selected-id="{{ old('state', @$data['property']->location->state_id) }}">
                                                            </x-forms.select>

                                                            <x-forms.select name="city"
                                                                value="{{ @old('city', @$data['property']->location->city_id) }}"
                                                                label="City" id="presentAddressCity"
                                                                selected-id="{{ old('city', @$data['property']->location->city_id) }}">
                                                            </x-forms.select>

                                                            <div class="col-md-6 mb-3">
                                                                <label for="validationServer04"
                                                                    class="form-label">{{ _trans('common.Completion') }}</label>
                                                                <select
                                                                    class="nice-select niceSelect bordered_style wide @error('completion') is-invalid @enderror"
                                                                    name="completion" id="validationServer04"
                                                                    aria-describedby="validationServer04Feedback">
                                                                    <option value="1">
                                                                        {{ _trans('common.Completed') }}
                                                                    </option>
                                                                    <option value="0"
                                                                        {{ @$data['property']->completion == 0 ? 'selected' : '' }}>
                                                                        {{ _trans('common.Under Construction') }}
                                                                    </option>
                                                                </select>
                                                                @error('completion')
                                                                    <div id="validationServer04Feedback"
                                                                        class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>

                                                            <div class="col-md-4 mb-3">
                                                                <label for="validationServer04"
                                                                    class="form-label">{{ _trans('common.Status') }}</label>
                                                                <select
                                                                    class="nice-select niceSelect bordered_style wide @error('status') is-invalid @enderror"
                                                                    name="status" id="validationServer04"
                                                                    aria-describedby="validationServer04Feedback">
                                                                    <option value="1">{{ _trans('common.Active') }}
                                                                    </option>
                                                                    <option value="0"
                                                                        {{ @$data['property']->status == 0 ? 'selected' : '' }}>
                                                                        {{ _trans('common.Inactive') }}
                                                                    </option>
                                                                </select>
                                                                @error('status')
                                                                    <div id="validationServer04Feedback"
                                                                        class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                            <div class="col-md-4 mb-3">
                                                                <label for="city"
                                                                    class="form-label">{{ _trans('common.Latitude') }}</label>
                                                                <input
                                                                    class="form-control ot-input @error('latitude') is-invalid @enderror"
                                                                    name="latitude" id="latitude"
                                                                    placeholder="{{ _trans('common.Latitude') }}"
                                                                    value="{{ @$data['property_location']->latitude }}">
                                                            </div>
                                                            <div class="col-md-4 mb-3">
                                                                <label for="city"
                                                                    class="form-label">{{ _trans('common.Longitude') }}</label>
                                                                <input
                                                                    class="form-control ot-input @error('longitude') is-invalid @enderror"
                                                                    name="longitude" id="longitude"
                                                                    placeholder="{{ _trans('common.Longitude') }}"
                                                                    value="{{ @$data['property_location']->longitude }}">
                                                            </div>
                                                            <div class="col-md-12 mb-3">
                                                                <label for="exampleDataList"
                                                                    class="form-label ">{{ _trans('common.Description') }}
                                                                    <span class="fillable">*</span></label>
                                                                <textarea name="Description" id="Description" placeholder="{{ _trans('common.Description') }}"
                                                                    class="form-control m-0 @error('Description') is-invalid @enderror">{{ @$data['property']->description }}</textarea>
                                                                @error('Description')
                                                                    <div id="validationServer04Feedback"
                                                                        class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>

                                                            <div class="col-md-12 mt-24">
                                                                <div class="text-center">
                                                                    <button type="submit"
                                                                        class="btn btn-lg ot-btn-primary"><span><i
                                                                                class="fa-solid fa-save"></i>
                                                                        </span>{{ _trans('common.Save') }}</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                            {{-- </form> --}}

                        </div>
                    </div>
                    <!-- profile body form end -->
                </div>
                <!-- profile body end -->
            </div>
        </div>
    @endsection

    @push('script')
        <script>
            $(document).ready(function() {
                fetchStates();
                fetchCities();
            })

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
                        let stateSelect = $('#presentAddressState');

                        stateSelect.niceSelect("destroy"); // Destroy first
                        $('#presentAddressCity').niceSelect("destroy"); // Destroy first
                        stateSelect.empty();
                        $('#presentAddressCity').empty();

                        if (status) {
                            data.map(state => {
                                $('#presentAddressState').append(
                                    `<option value="${state.id}" ${selected_state_id == state.id ? 'selected' : ''}>${state.name}</option>`
                                )
                            });
                        }

                        stateSelect.niceSelect();
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
                    success: function(data) {
                        // if (status) {
                        let citySelect = $('#presentAddressCity');

                        citySelect.niceSelect("destroy"); // Destroy first
                        citySelect.empty();

                        data.map(city => {
                            $('#presentAddressCity').append(
                                `<option value="${city.id}" ${selected_city_id == city.id ? 'selected' : ''}>${city.name}</option>`
                            )
                        });
                        citySelect.niceSelect();
                        // }
                    },
                    error: function(error) {
                        console.error('Error fetching cities:', error);
                    }
                });
            }
        </script>
        @include('backend.property.property_script')
        @include('backend.partials.delete-ajax')
    @endpush
