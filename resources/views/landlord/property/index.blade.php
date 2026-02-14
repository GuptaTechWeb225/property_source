@extends('landlord.landlord_layout')
@section('title', 'Properties')
@section('landlord_content')
    <x-landlord.container subtitle="Here's your list of properties that you have listed on Property Hub." tab="property">
        <x-slot name="actionButton">
            <a class="theme_btn" href="{{ route('landlord.property.create') }}">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9.99996 4.16699V15.8337M4.16663 10.0003H15.8333" stroke="white" stroke-width="1.67"
                          stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                Add Property
            </a>
        </x-slot>
        <h3 class="fs-4 fw-normal mb_12">Pending</h3>
        <p class="mb-2">Here's your property list those properties have not been advertised yet</p>
        <div class="theme_table_wrapper mb_25">
            <div class="table-responsive ">
                <table class="table custom_table m-0">
                    <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Property Category</th>
                        <th scope="col">Property Type</th>
                        <th scope="col">Status</th>
                        <th scope="col">PDF</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($properties as $property)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center gap_12">
                                    <div class="thumb flex-shrink-0">
                                        <img class="img-fluid wh_40 rounded-circle" src="{{ @globalAsset($property->defaultImage->path) }}" alt="#">
                                    </div>
                                    <div class="">
                                        <h5 class="font_14 f_w_500 mb-0">{{ $property->name }}</h5>
                                        <p class="mb-0 font_14 fw-normal neutral_text">
                                            {{ @$property->location->address }},
                                            {{ @$property->state->name }},
                                            {{ @$property->city->name }}
                                            {{ @$property->location->post_code }}
                                            {{ @$property->location->country->name }}
                                        </p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="font_14 fw-normal text-capitalize neutral_text">{{ @$property->category->name }}</span>
                            </td>
                            <td>
                            <span class="font_14 fw-normal text-capitalize neutral_text">
                                     {{ $property->type == 1 ? 'Commercial' : 'Residential' }}
                            </span>
                            </td>
                            <td>
                                @if ($property->status == 'approved')
                                    <span class="badge bg-success green_text  order-1 order-sm-2">{{ $property->status }}</span>
                                @else
                                    <span class="badge bg-danger red_text order-1 order-sm-2">{{ $property->status }} </span>
                                @endif
                            </td>
                            <td>
                                <div class="d-flex align-items-center gap_12">
                                    <div class="thumb flex-shrink-0">
                                        <img class="img-fluid wh_40 rounded-circle" src="{{ asset('landlord/img/avatars/file.png') }}" alt="#">
                                    </div>
                                    <div class="">
                                        <h5 class="font_14 f_w_500 mb-0">{{ @$property->documents[0]->title }}</h5>
                                        <p class="mb-0 font_14 fw-normal neutral_text">{{ getFileSize(@$property->documents[0]->file->path) }}</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="action_buttons d-flex align-items-center justify-content-center">
                                    <a href="{{ route('landlord.property.edit', $property->id) }}" class="border-0 bg-transparent action_item d-flex align-items-center justify-content-center">
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M14.1666 2.49993C14.3855 2.28106 14.6453 2.10744 14.9313 1.98899C15.2173 1.87054 15.5238 1.80957 15.8333 1.80957C16.1428 1.80957 16.4493 1.87054 16.7353 1.98899C17.0213 2.10744 17.2811 2.28106 17.5 2.49993C17.7188 2.7188 17.8924 2.97863 18.0109 3.2646C18.1294 3.55057 18.1903 3.85706 18.1903 4.16659C18.1903 4.47612 18.1294 4.78262 18.0109 5.06859C17.8924 5.35455 17.7188 5.61439 17.5 5.83326L6.24996 17.0833L1.66663 18.3333L2.91663 13.7499L14.1666 2.49993Z" stroke="#667085" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </a>
                                    <x-landlord.deleteModal id="{{ $property->id }}" route="{{ route('landlord.property.delete', $property->id) }}"></x-landlord.deleteModal>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <x-table.pagination :data="$properties"></x-table.pagination>
        </div>
        <!-- Lettings ::  -->
        <h3 class="fs-4 fw-normal mb_12">Lettings</h3>
        <div class="theme_table_wrapper mb_25">
            <div class="table-responsive ">
                <table class="table custom_table m-0">
                    <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Property Category</th>
                        <th scope="col">Property Type</th>
                        <th scope="col">Status</th>
                        <th scope="col">PDF</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($letProperties as $property)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center gap_12">
                                <div class="thumb flex-shrink-0">
                                    <img class="img-fluid wh_40 rounded-circle" src="{{ @globalAsset($property->defaultImage->path) }}" alt="#">
                                </div>
                                <div class="">
                                    <h5 class="font_14 f_w_500 mb-0">{{ $property->name }}</h5>
                                    <p class="mb-0 font_14 fw-normal neutral_text">
                                        {{ @$property->location->address }},
                                        {{ @$property->state->name }},
                                        {{ @$property->city->name }}
                                        {{ @$property->location->post_code }}
                                        {{ @$property->location->country->name }}
                                    </p>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="font_14 fw-normal text-capitalize neutral_text">{{ @$property->category->name }}</span>
                        </td>
                        <td>
                            <span class="font_14 fw-normal text-capitalize neutral_text">
                                     {{ $property->type == 1 ? 'Commercial' : 'Residential' }}
                            </span>
                        </td>
                        <td>
                            @if ($property->status == 'approved')
                                <span class="badge bg-success green_text  order-1 order-sm-2">{{ $property->status }}</span>
                            @else
                                <span class="badge bg-danger red_text order-1 order-sm-2">{{ $property->status }} </span>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex align-items-center gap_12">
                                <div class="thumb flex-shrink-0">
                                    <img class="img-fluid wh_40 rounded-circle" src="{{ asset('landlord/img/avatars/file.png') }}" alt="#">
                                </div>
                                <div class="">
                                    <h5 class="font_14 f_w_500 mb-0">{{ @$property->documents[0]->title }}</h5>
                                    <p class="mb-0 font_14 fw-normal neutral_text">{{ getFileSize(@$property->documents[0]->file->path) }}</p>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="action_buttons d-flex align-items-center justify-content-center">
                                <a href="{{ route('landlord.property.edit', $property->id) }}" class="border-0 bg-transparent action_item d-flex align-items-center justify-content-center">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M14.1666 2.49993C14.3855 2.28106 14.6453 2.10744 14.9313 1.98899C15.2173 1.87054 15.5238 1.80957 15.8333 1.80957C16.1428 1.80957 16.4493 1.87054 16.7353 1.98899C17.0213 2.10744 17.2811 2.28106 17.5 2.49993C17.7188 2.7188 17.8924 2.97863 18.0109 3.2646C18.1294 3.55057 18.1903 3.85706 18.1903 4.16659C18.1903 4.47612 18.1294 4.78262 18.0109 5.06859C17.8924 5.35455 17.7188 5.61439 17.5 5.83326L6.24996 17.0833L1.66663 18.3333L2.91663 13.7499L14.1666 2.49993Z" stroke="#667085" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </a>
                                <x-landlord.deleteModal id="{{ $property->id }}" route="{{ route('landlord.property.delete', $property->id) }}"></x-landlord.deleteModal>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <x-table.pagination :data="$selProperties"></x-table.pagination>
        </div>
        <!-- Lettings ::  -->
        <h3 class="fs-4 fw-normal mb_12">Selling's</h3>
        <div class="theme_table_wrapper mb_25">
            <div class="table-responsive ">
                <table class="table custom_table m-0">
                    <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Property Category</th>
                        <th scope="col">Property Type</th>
                        <th scope="col">Status</th>
                        <th scope="col">PDF</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($selProperties as $property)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center gap_12">
                                    <div class="thumb flex-shrink-0">
                                        <img class="img-fluid wh_40 rounded-circle" src="{{ @globalAsset($property->defaultImage->path) }}" alt="#">
                                    </div>
                                    <div class="">
                                        <h5 class="font_14 f_w_500 mb-0">{{ $property->name }}</h5>
                                        <p class="mb-0 font_14 fw-normal neutral_text">
                                            {{ @$property->location->address }},
                                            {{ @$property->state->name }},
                                            {{ @$property->city->name }}
                                            {{ @$property->location->post_code }}
                                            {{ @$property->location->country->name }}
                                        </p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="font_14 fw-normal text-capitalize neutral_text">{{ @$property->category->name }}</span>
                            </td>
                            <td>
                            <span class="font_14 fw-normal text-capitalize neutral_text">
                                     {{ $property->type == 1 ? 'Commercial' : 'Residential' }}
                            </span>
                            </td>
                            <td>
                                @if ($property->status == 'approved')
                                    <span class="badge bg-success green_text  order-1 order-sm-2">{{ $property->status }}</span>
                                @else
                                    <span class="badge bg-danger red_text order-1 order-sm-2">{{ $property->status }} </span>
                                @endif
                            </td>
                            <td>
                                <div class="d-flex align-items-center gap_12">
                                    <div class="thumb flex-shrink-0">
                                        <img class="img-fluid wh_40 rounded-circle" src="{{ asset('landlord/img/avatars/file.png') }}" alt="#">
                                    </div>
                                    <div class="">
                                        <h5 class="font_14 f_w_500 mb-0">{{ @$property->documents[0]->title }}</h5>
                                        <p class="mb-0 font_14 fw-normal neutral_text">{{ getFileSize(@$property->documents[0]->file->path) }}</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="action_buttons d-flex align-items-center justify-content-center">
                                    <a href="{{ route('landlord.property.edit', $property->id) }}" class="border-0 bg-transparent action_item d-flex align-items-center justify-content-center">
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M14.1666 2.49993C14.3855 2.28106 14.6453 2.10744 14.9313 1.98899C15.2173 1.87054 15.5238 1.80957 15.8333 1.80957C16.1428 1.80957 16.4493 1.87054 16.7353 1.98899C17.0213 2.10744 17.2811 2.28106 17.5 2.49993C17.7188 2.7188 17.8924 2.97863 18.0109 3.2646C18.1294 3.55057 18.1903 3.85706 18.1903 4.16659C18.1903 4.47612 18.1294 4.78262 18.0109 5.06859C17.8924 5.35455 17.7188 5.61439 17.5 5.83326L6.24996 17.0833L1.66663 18.3333L2.91663 13.7499L14.1666 2.49993Z" stroke="#667085" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </a>
                                    <x-landlord.deleteModal id="{{ $property->id }}" route="{{ route('landlord.property.delete', $property->id) }}"></x-landlord.deleteModal>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <x-table.pagination :data="$selProperties"></x-table.pagination>
        </div>
    </x-landlord.container>
@endsection
