@extends('landlord.landlord_layout')
@section('title', 'Summary')
@section('landlord_content')

    <x-landlord.container subtitle="Here's your brief summary." tab="requirement">
        <h3 class="fs-4 fw-normal mb_12">Favourited Properties</h3>
        <div class="theme_table_wrapper  mb_25">
            <div class="table-responsive">
                <table class="table custom_table m-0">
                    <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Property Type</th>
                        <th scope="col">Purpose</th>
                        <th scope="col">Total Rooms</th>
                        <th scope="col">PDF</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($favouriteProperties as $fav)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center gap_12">
                                    <div class="flex-shrink-0">
                                        <label class="star_checkbox d-flex">
                                            <input type="checkbox" checked onchange="removeFavourite('{{ $fav->id }}')">
                                            <i class="fas fa-star icon"></i>
                                        </label>
                                    </div>
                                    <div class="thumb flex-shrink-0">
                                        <img class="img-fluid wh_40 rounded-circle"
                                             src="{{ @globalAsset($fav->property->defaultImage->path) }}" alt="#">
                                    </div>
                                    <div class="">
                                        <h5 class="font_14 f_w_500 mb-0">{{ $fav->property->name }}</h5>
                                        <p class="mb-0 font_14 fw-normal neutral_text">
                                            {{ @$fav->property->location->address }},
                                            {{ @$fav->property->state->name }},
                                            {{ @$fav->property->city->name }}
                                            {{ @$fav->property->location->post_code }}
                                            {{ @$fav->property->location->country->name }}
                                        </p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span
                                    class="font_14 fw-normal text-capitalize neutral_text">{{ @$fav->property->category->name }}</span>
                            </td>
                            <td>
                            <span class="font_14 fw-normal text-capitalize neutral_text">
                                {{ App\Utils\Utils::advertisementTypes()[$fav->advertisement->advertisement_type]  }}
                            </span>
                            </td>
                            <td>
                                <span
                                    class="font_14 fw-normal text-capitalize neutral_text">{{ @$fav->property->bedroom }}</span>
                            </td>
                            <td>
                                <div class="d-flex align-items-center gap_12">
                                    <div class="thumb flex-shrink-0">
                                        <img class="img-fluid wh_40 rounded-circle"
                                             src="{{ asset('landlord/img/avatars/file.png') }}" alt="#">
                                    </div>
                                    <div class="">
                                        <h5 class="font_14 f_w_500 mb-0">{{ @$fav->property->documents[0]->title }}</h5>
                                        <p class="mb-0 font_14 fw-normal neutral_text">{{ getFileSize(@$fav->property->documents[0]->file->path) }}</p>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @empty
                    @endforelse
                    </tbody>
                </table>
            </div>
            <x-table.pagination :data="$favouriteProperties"></x-table.pagination>
        </div>

        <!-- Properties ::  -->
        <h3 class="fs-4 fw-normal mb_12">Properties For Sales</h3>
        <div class="theme_table_wrapper  mb_25">
            <div class="table-responsive">
                <table class="table custom_table m-0">
                    <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Property Category</th>
                        <th scope="col">Purpose</th>
                        <th scope="col">Total Rooms</th>
                        <th scope="col">PDF</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($salesAdvertisement as $adv)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center gap_12">
                                    <div class="flex-shrink-0">
                                        <label class="star_checkbox d-flex">
                                            <input type="checkbox"
                                                   onchange="makeFavourite('{{ $adv->id }}', '{{ @$adv->property->id }}')">
                                            <i class="fas fa-star icon"></i>
                                        </label>
                                    </div>
                                    <div class="thumb flex-shrink-0">
                                        <img class="img-fluid wh_40 rounded-circle"
                                             src="{{ @globalAsset($adv->property->defaultImage->path) }}" alt="#">
                                    </div>
                                    <div class="">
                                        <h5 class="font_14 f_w_500 mb-0">{{ @$adv->property->name }}</h5>
                                        <p class="mb-0 font_14 fw-normal neutral_text">
                                            {{ @$adv->property->location->address }},
                                            {{ @$adv->property->state->name }},
                                            {{ @$adv->property->city->name }}
                                            {{ @$adv->property->location->post_code }}
                                            {{ @$adv->property->location->country->name }}
                                        </p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span
                                    class="font_14 fw-normal text-capitalize neutral_text">{{ @$adv->property->category->name }}</span>
                            </td>
                            <td>
                            <span class="font_14 fw-normal text-capitalize neutral_text">
                                {{ App\Utils\Utils::advertisementTypes()[$adv->advertisement_type]  }}
                            </span>
                            </td>
                            <td>
                                <span
                                    class="font_14 fw-normal text-capitalize neutral_text">{{ @$adv->property->bedroom }}</span>
                            </td>
                            <td>
                                <div class="d-flex align-items-center gap_12">
                                    <div class="thumb flex-shrink-0">
                                        <img class="img-fluid wh_40 rounded-circle"
                                             src="{{ asset('landlord/img/avatars/file.png') }}" alt="#">
                                    </div>
                                    <div class="">
                                        <h5 class="font_14 f_w_500 mb-0">{{ @$adv->property->documents[0]->title }}</h5>
                                        <p class="mb-0 font_14 fw-normal neutral_text">{{ getFileSize(@$adv->property->documents[0]->file->path) }}</p>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <x-table.pagination :data="$salesAdvertisement"></x-table.pagination>
        </div>

        <!-- Lettings ::  -->
        <h3 class="fs-4 fw-normal mb_12">Properties For Lettings</h3>
        <div class="theme_table_wrapper  mb_25">
            <div class="table-responsive">
                <table class="table custom_table m-0">
                    <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Property Category</th>
                        <th scope="col">Purpose</th>
                        <th scope="col">Total Rooms</th>
                        <th scope="col">PDF</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($letAdvertisement as $adv)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center gap_12">
                                    <div class="flex-shrink-0">
                                        <label class="star_checkbox d-flex">
                                            <input type="checkbox"
                                                   onchange="makeFavourite('{{ $adv->id }}', '{{ @$adv->property->id }}')">
                                            <i class="fas fa-star icon"></i>
                                        </label>
                                    </div>
                                    <div class="thumb flex-shrink-0">
                                        <img class="img-fluid wh_40 rounded-circle"
                                             src="{{ @globalAsset($adv->property->defaultImage->path) }}" alt="#">
                                    </div>
                                    <div class="">
                                        <h5 class="font_14 f_w_500 mb-0">{{ @$adv->property->name }}</h5>
                                        <p class="mb-0 font_14 fw-normal neutral_text">
                                            {{ @$adv->property->location->address }},
                                            {{ @$adv->property->state->name }},
                                            {{ @$adv->property->city->name }}
                                            {{ @$adv->property->location->post_code }}
                                            {{ @$adv->property->location->country->name }}
                                        </p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="font_14 fw-normal text-capitalize neutral_text">{{ @$adv->property->category->name }}</span>
                            </td>
                            <td>
                            <span class="font_14 fw-normal text-capitalize neutral_text">
                                {{ App\Utils\Utils::advertisementTypes()[@$adv->advertisement_type]  }}
                            </span>
                            </td>
                            <td>
                                <span
                                    class="font_14 fw-normal text-capitalize neutral_text">{{ @$adv->property->bedroom }}</span>
                            </td>
                            <td>
                                <div class="d-flex align-items-center gap_12">
                                    <div class="thumb flex-shrink-0">
                                        <img class="img-fluid wh_40 rounded-circle"
                                             src="{{ asset('landlord/img/avatars/file.png') }}" alt="#">
                                    </div>
                                    <div class="">
                                        <h5 class="font_14 f_w_500 mb-0">{{ @$adv->property->documents[0]->title }}</h5>
                                        <p class="mb-0 font_14 fw-normal neutral_text">{{ getFileSize(@$adv->property->documents[0]->file->path) }}</p>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <x-table.pagination :data="$letAdvertisement"></x-table.pagination>
        </div>
    </x-landlord.container>
@endsection

@push('js')
    <script>
        const x = document.getElementById("demo");

        function getLocation() {
            console.log("Geolocation")

            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            } else {
                x.innerHTML = "Geolocation is not supported by this browser.";
            }
        }

        function showPosition(position) {
            x.innerHTML = "Latitude: " + position.coords.latitude +
                "<br>Longitude: " + position.coords.longitude;
        }


        function makeFavourite(advId, propertyId) {
            $.ajax({
                url: '{{ route('landlord.makeFavourite') }}',
                type: 'POST',
                dataType: 'json',
                data: {
                    advertisement_id: advId,
                    property_id: propertyId,
                    _token: '{{ csrf_token() }}'
                },
                success: function (response) {
                   if (response.status == 200) {
                       window.location.reload();
                   }
                },
                error: function (xhr, status, error) {
                    toastr.error('Something went wrong!');
                }
            });
        }

        function removeFavourite(id) {
            $.ajax({
                url: '{{ route('landlord.removeFavourite') }}',
                type: 'POST',
                dataType: 'json',
                data: {
                    id: id,
                    _token: '{{ csrf_token() }}'
                },
                success: function (response) {
                    if (response.status == 200) {
                        window.location.reload();
                    }
                },
                error: function (xhr, status, error) {
                    console.error('Error fetching data:', error);
                }
            });
        }

    </script>
@endpush
