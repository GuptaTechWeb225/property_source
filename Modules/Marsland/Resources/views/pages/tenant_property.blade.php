@extends('marsland::layouts.master')
@section('title', _trans('About Us'))
@section('marsland-content')
    <!-- Breadcrumb Area S t a r t-->
    <section class="ot-breadcrumb-area breadcrumb-gradient">
        <div class="container">
            <div class="ot-breadcrumb-inner">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="ot-breadcrumb-inner-wrapper text-center">
                            <div class="breadcrumb-text">
                                <h3 class="title font-700">{{ _trans('landlord.Properties') }}</h3>
                                <div class="line-dro mt-20">
                                    <span class="line-left diamond-square-shape"></span>
                                    <span class="line-circle"></span>
                                    <span class="line-right diamond-square-shape2"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Product S t a r t-->
    <div class="ot-sidebar-overlay"></div>
    <section class="ot-filter-course section-padding3  section-bg-two">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 position-relative">
                    <div class="row g-24" id="properties">
                        @forelse($properties ??[] as $property)
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 view-wrapper">
                                <div class="single-product radius-8 h-calc">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="product-img position-relative overflow-hidden">
                                                <img src="{{ @globalAsset($property->defaultImage->path) }}"
                                                     class="img-fluid" alt="img">
                                            </div>
                                        </div>
                                        <div class="col-lg-9">
                                            <div class="w-100">
                                                <div class="product-info d-flex flex-column gap-15">
                                                    <div class="d-flex justify-content-between flex-wrap gap-2">
                                                        <span
                                                            class="product_banding text-title">{{ @$property->category->name }}</span>
                                                    </div>
                                                    <h4 class="line-clamp-1 text-20 font-600">{{ $property->name }}</h4>
                                                </div>
                                                <div class="row">
                                                    @foreach($tenants ?? [] as $tenant)
                                                        @if(!empty($tenant))
                                                            <div class="col-lg-4 mb-3" title="Click to see details">
                                                                <div
                                                                    class="bg-white shadow-sm d-flex align-items-center justify-content-between gap-2 rounded-5 px-2">
                                                                    <div class="d-flex gap-2">
                                                                        <a href="{{ route('verifyVisitor', ['code' => $tenant->personal_code, 'pn' => encrypt($tenant->phone)]) }}">
                                                                            <strong
                                                                                class="text-black font-22">{{ $tenant->personal_code }}</strong>
                                                                        </a>
                                                                    </div>
                                                                    <a href="{{ route('verifyVisitor', ['code' => $tenant->personal_code, 'pn' => encrypt($tenant->phone)]) }}"
                                                                       class="text-primary">
                                                                        <i class="ri-arrow-right-line"></i>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="text-center mt-40">
                                <img src="{{ asset('marsland/assets/images/gallery/empty-data.png') }}">
                                <h5 class="text-muted">{{ _trans('common.No data found') }}</h5>
                                <a href="/">{{ _trans('Back to home') }}</a>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
