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
                        <h2 class="m-0">Basic Info</h2>

                        <a href="#" class="add-edit-btn">
                            <i class="fa-solid fa-edit"></i>
                        </a>
                    </div>


                    <!-- profile body nav end -->
                    <!-- profile body form start -->
                    <div class="profile-body-form">
                        <form action="" class="load-data">
                            <div class="form-item border-bottom-0 pb-0">
                                <div class="image-box">
                                    <img id="id-profile-image" class="img-fluid rounded-circle"
                                        src="{{ @globalAsset($user->image->path) }}"
                                        alt="profile avatar" />
                                    <span class="icon" id="open-file-uploader"><i class="fa-solid fa-user-pen"></i></span>
                                    <input type="file" name="file" id="input-button" />
                                </div>
                            </div>
                            <div class="form-item">
                                <div class="d-flex justify-content-between align-content-center">
                                    <div class="align-self-center">
                                        <h2 class="title">{{ _trans('landlord.Name')}}</h2>
                                        <p class="paragraph">{{ $user->name }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="form-item">
                                <div class="d-flex justify-content-between align-content-center">
                                    <div class="align-self-center">
                                        <h2 class="title">{{ _trans('E-mail Address')}}</h2>
                                        <p class="paragraph">{{ $user->email }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="form-item">
                                <div class="d-flex justify-content-between align-content-center">
                                    <div class="align-self-center">
                                        <h2 class="title">{{ _trans('Date of Birth')}}</h2>
                                        <p class="paragraph">{{ $user->date_of_birth }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="form-item">
                                <div class="d-flex justify-content-between align-content-center">
                                    <div class="align-self-center">
                                        <h2 class="title">{{ _trans('landlord.Gender')}}</h2>
                                        <p class="paragraph">{{ $user->gender }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="form-item">
                                <div class="d-flex justify-content-between align-content-center">
                                    <div class="align-self-center">
                                        <h2 class="title">{{ _trans('landlord.Phone Number')}}</h2>
                                        <p class="paragraph">{{ $user->phone }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="form-item">
                                <div class="d-flex justify-content-between align-content-center">
                                    <div class="align-self-center">
                                        <h2 class="title">{{ _trans('landlord.Address Line')}}</h2>
                                        <p class="paragraph">
                                            {{ $user->present_address }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="form-item">
                                <div class="d-flex justify-content-between align-content-center">
                                    <div class="align-self-center">
                                        <h2 class="title">{{ _trans('landlord.Nationality')}}</h2>
                                        <p class="paragraph">{{ $user->nationality }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="form-item">
                                <div class="d-flex justify-content-between align-content-center">
                                    <div class="align-self-center">
                                        <h2 class="title">{{ _trans('landlord.NID Number')}}</h2>
                                        <p class="paragraph">{{ $user->nid }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="form-item">
                                <div class="d-flex justify-content-between align-content-center">
                                    <div class="align-self-center">
                                        <h2 class="title">{{ _trans('landlord.Passport')}}</h2>
                                        <p class="paragraph">{{ $user->passport }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="form-item">
                                <div class="d-flex justify-content-between align-content-center">
                                    <div class="align-self-center">
                                        <h2 class="title">{{ _trans('landlord.Blood Group')}}</h2>
                                        <p class="paragraph">{{ $user->blood_group }}</p>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card ot-card mb-24 update-data">
                        <form action="{{ route('users.profileDetailsStore',[$data['id'], 'basicInfo']) }}" enctype="multipart/form-data" method="post"
                            id="visitForm">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-md-6 mb-3">
                                    <label for="exampleDataList" class="form-label ">{{ _trans('landlord.name') }} <span
                                            class="fillable">*</span></label>
                                    <input class="form-control ot-input @error('name') is-invalid @enderror"
                                        name="name" value="{{ @$user->name }}" list="datalistOptions"
                                        id="exampleDataList" placeholder="Enter Name">
                                    @error('name')
                                        <div id="validationServer04Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="exampleDataList" class="form-label ">{{ _trans('landlord.email') }} <span
                                            class="fillable">*</span></label>
                                    <input class="form-control ot-input @error('email') is-invalid @enderror"
                                        name="email" value="{{ @$user->email }}" list="datalistOptions"
                                        id="exampleDataList" placeholder="Enter email">
                                    @error('email')
                                        <div id="validationServer04Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="exampleDataList" class="form-label ">{{ _trans('landlord.Date Of Birth') }} <span
                                            class="fillable">*</span></label>
                                    <input class="form-control ot-input @error('date_of_birth') is-invalid @enderror" type="date"
                                        name="date_of_birth" value="{{ Carbon\Carbon::parse($user->date_of_birth)->format('Y-m-d') }}" list="datalistOptions"
                                        id="exampleDataList" placeholder="Enter Date Of Birth">
                                    @error('date_of_birth')
                                        <div id="validationServer04Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="validationServer04" class="form-label">{{ _trans('landlord.Gender') }} <span class="fillable">*</span></label>

                                    <select class="nice-select niceSelect bordered_style wide @error('gender') is-invalid @enderror"
                                    name="gender" id="validationServer04"
                                    aria-describedby="validationServer04Feedback">

                                        <option value="male"
                                            {{ $user->gender == 'male' ? 'selected' : '' }}>
                                            {{ _trans('landlord.Male') }}
                                        </option>
                                        <option value="female"
                                            {{ $user->gender == 'female' ? 'selected' : '' }}>
                                            {{ _trans('landlord.Female') }}
                                        </option>
                                    </select>
                                    @error('status')
                                        <div id="validationServer04Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="exampleDataList" class="form-label ">{{ _trans('landlord.Phone Number') }} <span
                                            class="fillable">*</span></label>
                                    <input class="form-control ot-input @error('phone') is-invalid @enderror"
                                        name="phone" value="{{ @$user->phone }}" list="datalistOptions"
                                        id="exampleDataList" placeholder="Enter Phone Number">
                                    @error('phone')
                                        <div id="validationServer04Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="exampleDataList" class="form-label ">{{ _trans('landlord.Address Line') }} <span
                                            class="fillable">*</span></label>
                                    <input class="form-control ot-input @error('present_address') is-invalid @enderror"
                                        name="present_address" value="{{ @$user->present_address }}" list="datalistOptions"
                                        id="exampleDataList" placeholder="Enter Address Line">
                                    @error('present_address')
                                        <div id="validationServer04Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="exampleDataList" class="form-label ">{{ _trans('landlord.Nationality') }} <span
                                            class="fillable">*</span></label>
                                    <input class="form-control ot-input @error('nationality') is-invalid @enderror"
                                        name="nationality" value="{{ @$user->nationality }}" list="datalistOptions"
                                        id="exampleDataList" placeholder="Enter Nationality">
                                    @error('nationality')
                                        <div id="validationServer04Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="exampleDataList" class="form-label ">{{ _trans('landlord.NID Number') }} <span
                                            class="fillable">*</span></label>
                                    <input class="form-control ot-input @error('nid') is-invalid @enderror"
                                        name="nid" value="{{ @$user->nid }}" list="datalistOptions"
                                        id="exampleDataList" placeholder="Enter NID Number">
                                    @error('nid')
                                        <div id="validationServer04Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="exampleDataList" class="form-label ">{{ _trans('landlord.Passport') }} <span
                                            class="fillable">*</span></label>
                                    <input class="form-control ot-input @error('passport') is-invalid @enderror"
                                        name="passport" value="{{ @$user->passport }}" list="datalistOptions"
                                        id="exampleDataList" placeholder="Enter Passport">
                                    @error('passport')
                                        <div id="validationServer04Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="exampleDataList" class="form-label ">{{ _trans('landlord.Blood Group') }} <span
                                            class="fillable">*</span></label>
                                    <input class="form-control ot-input @error('blood_group') is-invalid @enderror"
                                        name="blood_group" value="{{ @$user->blood_group }}" list="datalistOptions"
                                        id="exampleDataList" placeholder="Enter Blood Group">
                                    @error('blood_group')
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
                    <!-- profile body form end -->
                </div>
                <!-- profile body end -->
            </div>
        </div>
    @endsection

    @push('script')
        @include('backend.partials.delete-ajax')
    @endpush
