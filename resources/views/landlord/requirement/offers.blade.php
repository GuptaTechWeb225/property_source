@extends('landlord.landlord_layout')
@section('title',@$title)
@section('landlord_content')
    <x-landlord.container subtitle="Here's the list of offers you have made." tab="requirement">
        <div class="tab_main_content flex-fill mb-4 position-relative">
            @forelse($offers as $offer)
                <div
                    class="offer_pricing_box mb-4  {{ $offer->status == 'pending'? 'pending_style':($offer->status == 'declined' ? 'decline_style' : '') }}">
                    <div class="offer_pricing_box_heading">
                        <div class="">
                            <svg width="36" height="36" viewBox="0 0 36 36" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <rect x="2" y="2" width="32" height="32" rx="16" fill="#D1FADF"/>
                                <rect x="2" y="2" width="32" height="32" rx="16" stroke="#ECFDF3" stroke-width="4"/>
                                <path
                                    d="M13.9999 17.3332V19.9998M21.9999 15.9998V18.6665M21.3333 12.6665C22.9657 12.6665 23.8487 12.9163 24.288 13.1101C24.3465 13.1359 24.3758 13.1488 24.4602 13.2294C24.5108 13.2777 24.6032 13.4194 24.6269 13.4852C24.6666 13.595 24.6666 13.655 24.6666 13.775V20.9406C24.6666 21.5464 24.6666 21.8494 24.5757 22.0051C24.4833 22.1635 24.3942 22.2371 24.2212 22.298C24.0512 22.3578 23.7079 22.2918 23.0214 22.1599C22.5408 22.0676 21.9709 21.9998 21.3333 21.9998C19.3333 21.9998 17.3333 23.3332 14.6666 23.3332C13.0341 23.3332 12.1512 23.0833 11.7118 22.8895C11.6533 22.8637 11.6241 22.8508 11.5397 22.7703C11.489 22.722 11.3967 22.5802 11.3729 22.5144C11.3333 22.4047 11.3333 22.3447 11.3333 22.2247L11.3333 15.0591C11.3333 14.4532 11.3333 14.1503 11.4241 13.9946C11.5165 13.8362 11.6056 13.7626 11.7786 13.7017C11.9487 13.6419 12.2919 13.7078 12.9785 13.8397C13.459 13.9321 14.0289 13.9998 14.6666 13.9998C16.6666 13.9998 18.6666 12.6665 21.3333 12.6665ZM19.6666 17.9998C19.6666 18.9203 18.9204 19.6665 17.9999 19.6665C17.0794 19.6665 16.3333 18.9203 16.3333 17.9998C16.3333 17.0794 17.0794 16.3332 17.9999 16.3332C18.9204 16.3332 19.6666 17.0794 19.6666 17.9998Z"
                                    stroke="#039855" stroke-width="1.33" stroke-linecap="round"
                                    stroke-linejoin="round"/>
                            </svg>
                        </div>

                        <h4 class="pricing_title mb-0 flex-fill">Offer for
                            <strong>{{ @$offer->property->name }}</strong></h4>

                        <div class="check_icon">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <rect x="0.5" y="0.5" width="15" height="15" rx="7.5" fill="currentColor"/>
                                <rect x="0.5" y="0.5" width="15" height="15" rx="7.5" stroke="currentColor"/>
                                <path d="M11.3334 5.5L6.75008 10.0833L4.66675 8" stroke="white" stroke-width="1.66667"
                                      stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                    </div>
                    <div class="offer_pricing_box_body d-flex align-items-start">
                        <div class="flex-fill order-2 order-sm-1">
                            <div class="d-flex align-items-baseline gap-1 flex-fill">
                                <h3 class="pricing_price f_w_600 mb-0">{{ $offer->offer_price }}</h3>
                                <span class="pricing_type">Purchase</span>
                            </div>
                            <p class="pricing_desc">{{ $offer->property->location->address }}</p>
                        </div>
                        <span class="badge order-1 order-sm-2">{{ $offer->status }}</span>
                    </div>
                </div>
            @empty
                <h4 class="font_14 fw-normal neutral_text py-5 fw-bold">No offers found</h4>
        @endforelse
        <!-- Button trigger modal -->
            <button type="button" class="btn-offer-add-button" data-bs-toggle="modal" data-bs-target="#setOfferModal">
                <svg width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                     fill="rgba(255,255,255,1)">
                    <path d="M11 11V5H13V11H19V13H13V19H11V13H5V11H11Z"></path>
                </svg>
            </button>

            <!-- Modal -->
            <div class="modal fade" id="setOfferModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                 aria-labelledby="setOfferModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Create a new offer</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('landlord.requirement.offer-store') }}" class="row" method="post">
                                @csrf
                                <input type="hidden" name="property_id" id="propertyId">
                                <input type="hidden" name="price" id="propertyPrice">
                                <x-forms.select
                                    class="theme_select"
                                    col="col-lg-12 mb-3"
                                    :required="true"
                                    :browserRequired="true"
                                    label="Property"
                                    id="advertisement"
                                    onchange="advertisementChangeHandler(this.value)"
                                    name="advertisement_id">
                                    @foreach ($properties as $adv)
                                        @if($adv->property)
                                            <option value="{{ $adv->id }}">{{ @$adv->property->name }}</option>
                                        @endif
                                    @endforeach
                                </x-forms.select>

                                <x-forms.input
                                    class="primary_input"
                                    col="col-lg-12 mb-3"
                                    readonly
                                    id="formatePropertyPrice"
                                    label="Property Price"
                                ></x-forms.input>

                                <x-forms.input
                                    :browserRequired="true"
                                    type="number"
                                    class="primary_input"
                                    col="col-lg-12 mb-3"
                                    label="Offer Price"
                                    name="offer_price"
                                    value="{{ old('offer_price') }}"
                                ></x-forms.input>

                                <div class="col-lg-12">
                                    <div class="row justify-content-end mt-3">
                                        <div class="col-lg-4">
                                            <button type="submit" class="theme_btn w-100 m-0">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-landlord.container>
@endsection
@push('js')
    <script>
        function advertisementChangeHandler(adv) {
            $.ajax({
                url: "{{ route('landlord.requirement.offer.get-property') }}",
                type: "GET",
                data: {
                    advertisement_id: adv
                },
                success: function (data) {
                    $('#propertyId').val(data.property_id);
                    $('#propertyPrice').val(data.price);
                    $('#formatePropertyPrice').val(data.formatePrice);
                }
            });
        }
    </script>
@endpush
