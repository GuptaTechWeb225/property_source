@extends('marsland::layouts.master')
@section('marsland-content')

<main>
    <div class="profile-account-area section-bg-two section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Mobile Device sidebar open Icon -->
                    <div class="panel-sidebar-icon">
                        <div class="sidebar-icon"><i class="ri-arrow-left-right-line"></i> </div>
                    </div>
                    <div class="flex-main-content">
                        {{-- Start sidebar --}}
                        @include('marsland::includes.customer-sidebar')
                        {{-- End sidebar --}}

                        {{--Start dynamic content --}}
                        @yield('customer-content')
                        {{--Ednt dynamic content --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection
