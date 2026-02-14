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
                    <div class="emergency-header-edit edit-section">
                        <h2 class="m-0">{{ _trans('landlord.Agreements') }}</h2>

                        <a href="#" class="add-edit-btn">
                            <i class="fa-solid fa-edit"></i>
                        </a>
                    </div>
                    <div class="load-data">
                        <!-- profile body form start -->
                        <div class="profile-body-form">
                            <form action="profile-agreements-details">

                                <div class="form-item">
                                    <div class="d-flex justify-content-between align-content-center">
                                        <div class="align-self-center">
                                            <h2 class="title">{{ _trans('landlord.Property Name') }}</h2>
                                            <p class="paragraph">{{ @$rental->property->name }}</p>
                                        </div>

                                    </div>
                                </div>

                                <div class="form-item">
                                    <div class="d-flex justify-content-between align-content-center">
                                        <div class="align-self-center">
                                            <h2 class="title">{{ _trans('landlord.Move in Date') }}</h2>
                                            <p class="paragraph">{{ @$rental->move_in }}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-item">
                                    <div class="d-flex justify-content-between align-content-center">
                                        <div class="align-self-center">
                                            <h2 class="title">{{ _trans('landlord.Move Out Date') }}</h2>
                                            <p class="paragraph">{{ @$rental->move_out }}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-item">
                                    <div class="d-flex justify-content-between align-content-center">
                                        <div class="align-self-center">
                                            <h2 class="title">{{ _trans('landlord.Rent Amount') }}</h2>
                                            <p class="paragraph">{{ @$rental->rent_amount }}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-item">
                                    <div class="d-flex justify-content-between align-content-center">
                                        <div class="align-self-center">
                                            <h2 class="title">{{ _trans('landlord.Rent Type') }}</h2>
                                            <p class="paragraph">{{ @$rental->rent_type }}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-item">
                                    <div class="d-flex justify-content-between align-content-center">
                                        <div class="align-self-center">
                                            <h2 class="title">{{ _trans('landlord.Rent For') }}</h2>
                                            <p class="paragraph">{{ @$rental->rent_for }} Months</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-item">
                                    <div class="d-flex justify-content-between align-content-center">
                                        <div class="align-self-center">
                                            <h2 class="title">{{ _trans('landlord.Reminder Date') }}</h2>
                                            <p class="paragraph">{{ @$rental->reminder_date }}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-item">
                                    <div class="d-flex justify-content-between align-content-center">
                                        <div class="align-self-center">
                                            <h2 class="title">{{ _trans('landlord.Note') }}</h2>
                                            <p class="paragraph">
                                                {{ @$rental->note }}
                                            </p>
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>

                    <!-- profile body form end -->
                    <div class="card ot-card mb-24 update-data">
                        <form action="{{ route('users.profileDetailsStore', [$data['id'], 'agreements']) }}"
                            enctype="multipart/form-data" method="post" id="visitForm">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-md-6 mb-3">
                                    <label for="exampleDataList" class="form-label ">{{ _trans('landlord.name') }} <span
                                            class="fillable">*</span></label>
                                    <input class="form-control ot-input @error('name') is-invalid @enderror" name="name"
                                        value="{{ @$rental->property->name }}" list="datalistOptions" id="exampleDataList"
                                        placeholder="Enter Name">
                                    @error('name')
                                        <div id="validationServer04Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="exampleDataList" class="form-label ">{{ _trans('landlord.Move In Date') }}
                                        <span class="fillable">*</span></label>
                                    <input class="form-control ot-input @error('move_in') is-invalid @enderror"
                                        type="date" name="move_in"
                                        value="{{ Carbon\Carbon::parse(@$rental->move_in)->format('Y-m-d') }}"
                                        list="datalistOptions" id="exampleDataList" placeholder="Enter email">
                                    @error('move_in')
                                        <div id="validationServer04Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="exampleDataList"
                                        class="form-label ">{{ _trans('landlord.Move Out Date') }}
                                        <span class="fillable">*</span></label>
                                    <input class="form-control ot-input @error('move_out') is-invalid @enderror"
                                        type="date" name="move_out"
                                        value="{{ Carbon\Carbon::parse(@$rental->move_out)->format('Y-m-d') }}"
                                        list="datalistOptions" id="exampleDataList" placeholder="Enter Move Out Date">
                                    @error('move_out')
                                        <div id="validationServer04Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="exampleDataList"
                                        class="form-label ">{{ _trans('landlord.Rental Amount') }}
                                        <span class="fillable">*</span></label>
                                    <input class="form-control ot-input @error('rent_amount') is-invalid @enderror"
                                        name="rent_amount" value="{{ @$rental->rent_amount }}" list="datalistOptions"
                                        id="exampleDataList" placeholder="Enter Rental Amount">
                                    @error('rent_amount')
                                        <div id="validationServer04Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="validationServer04"
                                        class="form-label">{{ _trans('landlord.Rental Type') }} <span
                                            class="fillable">*</span></label>

                                    <select
                                        class="nice-select niceSelect bordered_style wide @error('rent_type') is-invalid @enderror"
                                        name="rent_type" id="validationServer04"
                                        aria-describedby="validationServer04Feedback">

                                        <option value="monthly" {{ @$rental->rent_type == 'monthly' ? 'selected' : '' }}>
                                            {{ _trans('landlord.monthly') }}
                                        </option>
                                        <option value="yearly" {{ @$rental->rent_type == 'yearly' ? 'selected' : '' }}>
                                            {{ _trans('landlord.yearly') }}
                                        </option>
                                    </select>
                                    @error('rent_type')
                                        <div id="validationServer04Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="exampleDataList" class="form-label ">{{ _trans('landlord.Rent For') }}
                                        <span class="fillable">*</span></label>
                                    <input class="form-control ot-input @error('rent_for') is-invalid @enderror"
                                        name="rent_for" value="{{ @$rental->rent_for }}" list="datalistOptions"
                                        id="exampleDataList" placeholder="Enter Rent For">
                                    @error('rent_for')
                                        <div id="validationServer04Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="exampleDataList"
                                        class="form-label ">{{ _trans('landlord.Reminder Date') }} <span
                                            class="fillable">*</span></label>
                                    <input type="date"
                                        class="form-control ot-input @error('reminder_date') is-invalid @enderror"
                                        name="reminder_date"
                                        value="{{ Carbon\Carbon::parse(@$rental->reminder_date)->format('Y-m-d') }}"
                                        list="datalistOptions" id="exampleDataList" placeholder="Enter Reminder Date">
                                    @error('reminder_date')
                                        <div id="validationServer04Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="exampleDataList" class="form-label ">{{ _trans('landlord.Note') }} <span
                                            class="fillable">*</span></label>
                                    <textarea name="note" id="note" class="form-control @error('note') is-invalid @enderror">{{ @$rental->note }}</textarea>
                                    @error('note')
                                        <div id="validationServer04Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12 mt-3">
                                <div class="text-end">
                                    <button class="btn btn-lg ot-btn-primary"><span><i class="fa-solid fa-save"></i>
                                        </span>{{ _trans('landlord.submit') }}</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            <!-- profile body end -->
        </div>
    </div>
@endsection

@push('script')
    @include('backend.partials.delete-ajax')
@endpush
