<section class="product-categories-two section-padding ">
    <div class="container">
        <!-- Section Tittle -->
        <div class="row justify-content-center">
            <div class=" col-xl-12">
                <div class="section-tittle d-flex align-items-center flex-wrap gap-15 mb-30">
                    <div class="flex-fill">
                        <h2 class="title text-capitalize mb-0 ">{{ _trans('common.Explore Categories') }}</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row g-24">
            @foreach($categories as $category)
            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                <a href="{{ route('properties',['category_id' => $category['id']]) }}"  class="singleCategory h-calc wow fadeInLeft" data-wow-delay=".0s">
                    <div class="icon">
                        <i class="{{ $category['icon'] }}"></i>
                    </div>
                    <div class="catContent">
                        <h4 class="title text-capitalize line-clamp-1">{{ $category['name'] }} </h4>
                        <span class="para">{{ $category['properties'] }} {{ _trans('common.Items') }}</span>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>
