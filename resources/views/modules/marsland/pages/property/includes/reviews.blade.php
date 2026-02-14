<!-- Review -->
<div class="col-lg-12">
    <div class="d-flex align-items-center justify-content-between flex-wrap mt-16 mb-16 gap-10">
        <div class="section-tittle-three">
            <h6 class="title">{{ _trans('landlord.Reviews') }} ({{count($property_reviews) ?? 0}})</h6>
        </div>
    </div>
</div>
<!-- Review -->
<div class="col-lg-12">
    <!-- Single Review -->
    @forelse($property_reviews as $review)
    <div class="review-widget section-bg-two border-0">
        <div class="review-widget-header mb-0 flex-wrap">
            <div class="review-widget-header-author flex-fill">
                <div class="flex-fill">
                    <h5 class="review-widget-header-author-name">
                        {{ $review->name }}
                    </h5>
                </div>
            </div>
            <div class="review-widget-header-action d-flex align-items-center gap-8">
                <p>{{ date('d M, Y', strtotime($review->created_at)) }} | {{ date('H:i', strtotime($review->created_at)) }}</p>
            </div>
        </div>
        <p class="review-widget-description mb-10">
            {{ $review->comments }}
        </p>
        <div class="rating-star d-flex align-items-center">
            @for ($i = 1; $i <= 5; $i++)
                @if ($i <= $review->ratings)
                    <i class="ri-star-fill"></i>
                @else
                    <i class="ri-star-line"></i>
                @endif
            @endfor
        </div>
    </div>
    @empty
        <h4 class="my-4 text-center">{{ _trans('landlord.No data available') }}</h4>
    @endforelse
</div>

