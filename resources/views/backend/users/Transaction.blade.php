@extends('backend.master')
@section('title')
    {{ @$data['title'] }}
@endsection
@section('content')
    <div class="page-content">
        <!-- profile content start -->
        <div class="profile-content">
            <div class="d-flex flex-column flex-lg-row gap-4 gap-lg-0">
                <!-- profile menu mobile start -->
                <div class="profile-menu-mobile">
                    <button class="btn-menu-mobile" type="button" data-bs-toggle="offcanvas"
                            data-bs-target="#offcanvasWithBothOptionsMenuMobile"
                            aria-controls="offcanvasWithBothOptionsMenuMobile">
                        <span class="icon"><i class="fa-solid fa-bars"></i></span>
                    </button>

                    <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1"
                         id="offcanvasWithBothOptionsMenuMobile">
                        <div class="offcanvas-header">
                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close">
                                <span class="icon"><i class="fa-solid fa-xmark"></i></span>
                            </button>
                        </div>
                        <div class="offcanvas-body">
                            <!-- profile menu start -->
                            <div class="profile-menu">
                                <!-- profile menu head start -->
                            @include('backend.partials.user_profile-menu')
                            <!-- profile menu head end -->

                                <!-- profile menu body start -->
                                <div class="profile-menu-body">
                                    @include('backend.partials.profile_nav')

                                </div>
                                <!-- profile menu body end -->
                            </div>
                            <!-- profile menu end -->
                        </div>
                    </div>
                </div>
                <!-- profile menu mobile end -->

                <!-- profile menu start -->
                <div class="profile-menu">
                    <!-- profile menu head start -->
                @include('backend.partials.user_profile-menu')
                <!-- profile menu head end -->

                    <!-- profile menu body start -->
                    <div class="profile-menu-body">
                        @include('backend.partials.profile_nav')
                    </div>
                    <!-- profile menu body end -->
                </div>
                <!-- profile menu end -->

                <!-- profile body start -->
                <div class="profile-body">
                    <div class="emergency-header-edit mb-16">
                        <h2 class="m-0">Transaction History</h2>
                    </div>
                    <div class="transaction-history-data">

                        <div class="row">
                            <div class="col-xxl-12">
                                <div class="card table-content table-basic mb-5">
                                    <div class="card-body">
                                        <div class="all-transactions">
                                            <div class="table-responsive table-height-350 niceScroll">
                                                <table class="table">
                                                    <thead class="thead">
                                                    <tr>
                                                        <th class="purchase">{{ _trans('landlord.Trx No') }}</th>
                                                        <th class="purchase">{{ _trans('landlord.Date') }}</th>
                                                        <th class="serial">{{ _trans('landlord.Account') }}</th>
                                                        <th class="purchase">{{ _trans('landlord.Attachment') }}</th>
                                                        <th class="purchase">{{ _trans('landlord.Amount') }}</th>
                                                        <th class="purchase">{{ _trans('landlord.Payment Method') }}</th>
                                                        <th class="serial">{{ _trans('landlord.Ref No') }}</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody class="tbody">
                                                    @foreach ($transactions as $transaction)
                                                        <tr>
                                                            <td>{{ $transaction->trx_no }}</td>
                                                            <td>{{ $transaction->date }}</td>
                                                            <td>{{ @$transaction->account->name }}</td>
                                                            <td>
                                                                <i class="fa-solid fa-paperclip"></i>
                                                                {{ @$transaction->attachment->path }}
                                                            </td>
                                                            <td><b><span class="text-success">${{ @$transaction->amount }}</span></b></td>
                                                            <td>{{ $transaction->payment_method }}</td>

                                                            <td>{{ @$transaction->reference_no }}</td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
