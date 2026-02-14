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
                                <h3 class="title font-700">{{ _trans('landlord.Tenant Public profile') }}</h3>
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
                    <div class="row g-24">
                        <div class="col-lg-4">
                            <div class="card border-0 shadow-sm bg-white p-5">
                                <div class="card-header text-center bg-transparent border-0">
                                    <img src="{{ @globalAsset($tenant->image->path) }}" height="120" width="120" class="rounded-circle" alt="">
                                </div>
                                <div class="card-body">
                                    <h2>{{ $tenant->name }}</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="card card-body border-0 shadow-sm bg-white p-5">
                                <h4>Personal Details</h4>
                                <ul class="mt-3">
                                    <li><b>Email: </b>{{ $tenant->email }}</li>
                                    <li><b>Phone: </b>{{ $tenant->phone }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
