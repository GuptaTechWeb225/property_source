<div class="product-details-card mt-4">
    <div class="product-details-card_header">
        <h4 class="text-20 font-400 m-0 text-capitalize">{{ _trans('landlord.floor plan') }}</h4>
    </div>
    <div class="product-details-card_body">
        <div class="row slider-product-features features-dot-style">

            @foreach($floorPlans as $floor_plan)
            <div class="col-lg-4">
                <div class="single">
                    <img src="{{ $floor_plan['image'] }}" alt="img" class="w-100">
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
