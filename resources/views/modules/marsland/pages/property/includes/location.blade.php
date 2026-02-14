<div class="product-details-card mt-4">
    <div class="product-details-card_header">
        <h4 class="text-20 font-400 m-0 text-capitalize">{{ _trans('landlord.location') }} </h4>
    </div>
    <div class="product-details-card_body">

        <div class="single-description mb-20 border-bottom">
            <h5 class="title mb-20 font-700">{{ @$address['address'] }}</h5>
            <div class="d-flex gap-30 flex-wrap">
                <div class="information">
                    <p class="pera mb-0 font-700 text-title text-capitalize">{{ _trans('landlord.country') }}</p>
                    <p class="pera mb-0">{{ @$address['country'] }}</p>
                    <p class="pera mb-0 font-700 text-title text-capitalize">{{ _trans('landlord.area') }}</p>
                    <p class="pera"></p>
                </div>
                <div class="information">
                    <p class="pera mb-0 font-700 text-title text-capitalize">{{ _trans('landlord.number') }}</p>
                    <p class="pera mb-0"></p>
                    <p class="pera mb-0 font-700 text-title">{{ _trans('landlord.email') }}</p>
                    <p class="pera"></p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <img src="{{ asset('marsland/assets/images/gallery/location.png') }}" alt="img" class="w-100">
            </div>
        </div>
    </div>
</div>
