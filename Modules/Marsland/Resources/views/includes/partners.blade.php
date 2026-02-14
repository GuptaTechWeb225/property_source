<section class="technology-used section-padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class=" col-xl-12">
                <div class="section-tittle d-flex align-items-center flex-wrap gap-15 mb-30">
                    <div class="flex-fill">
                        <h2 class="title text-capitalize mb-0 ">{{ _trans('landlord.Our Partners') }}</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-3 row-cols-xl-3 row-cols-xxl-5 g-24 mt-0 p-0">
            @foreach($partners as $partner)
            <div class="col">
                <div class="single-technology">
                    <img src="{{ @globalAsset($partner->image->path) }}" alt="img">
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
