<div class="product-details-card mt-4">
    <div class="product-details-card_header">
        <h4 class="text-20 font-400 m-0 text-capitalize">{{ _trans('landlord.gallery') }}</h4>
    </div>
    <div class="product-details-card_body">
        <div class="row slider-product-features features-dot-style">
            @forelse($galleries as $gallery)
            <div class="col-lg-4">
                <div class="single">
                    <img src="{{$gallery['image']}}" alt="" class="w-100">
                </div>
            </div>
            @empty
            <h4>{{ _trans('landlord.No data available') }}</h4>
            @endforelse
        </div>
    </div>
</div>
