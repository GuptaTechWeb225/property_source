@extends('frontend.layouts.master')

@section('content')
    <div class="o_landy_dashboard_area dashboard_bg section_spacing6">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-4">
                    @include('frontend.include.sidebar')
                </div>
                <div class="col-xl-9 col-lg-8">
                    <div class="profile_white_box bg-white">
                        <ul class="nav profile_tabs mb_40" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="Info-tab" data-bs-toggle="tab" data-bs-target="#Info"
                                    type="button" role="tab" aria-controls="Info"
                                    aria-selected="true">{{ _trans('landlord.Basic Info') }}</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="Password-tab" data-bs-toggle="tab" data-bs-target="#Password"
                                    type="button" role="tab" aria-controls="Password"
                                    aria-selected="false">{{ _trans('landlord.Change Password') }}</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link " id="Address-tab" data-bs-toggle="tab" data-bs-target="#Address"
                                    type="button" role="tab" aria-controls="Address"
                                    aria-selected="false">{{ _trans('landlord.Address') }}</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link " id="Documents-tab" data-bs-toggle="tab"
                                    data-bs-target="#Documents" type="button" role="tab" aria-controls="Documents"
                                    aria-selected="false">{{ _trans('landlord.Documents') }}</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link " id="Emergency-tab" data-bs-toggle="tab"
                                    data-bs-target="#Emergency" type="button" role="tab" aria-controls="Emergency"
                                    aria-selected="false">{{ _trans('landlord.Emergency') }} </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="Accounts-tab" data-bs-toggle="tab" data-bs-target="#Accounts"
                                    type="button" role="tab" aria-controls="Accounts"
                                    aria-selected="false">{{ _trans('landlord.Accounts') }} </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="Transaction-tab" data-bs-toggle="tab"
                                    data-bs-target="#Transaction" type="button" role="tab" aria-controls="Transaction"
                                    aria-selected="false">{{ _trans('landlord.Transaction') }} </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="Agreements-tab" data-bs-toggle="tab"
                                    data-bs-target="#Agreements" type="button" role="tab" aria-controls="Agreements"
                                    aria-selected="false">{{ _trans('landlord.Agreements') }} </button>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="Info" role="tabpanel"
                                aria-labelledby="Info-tab">
                                <!-- content ::start  -->
                                <h4 class="mb-3">Update Your Basic Info</h4>
                                <div class="dashboard_account_wrapper mb_20">
                                    <form action="{{ route('customer.updateProfile') }}" enctype="multipart/form-data"
                                        method="post" id="visitForm">
                                        @csrf
                                        <div class="row">
                                            <div class="col-12">
                                                <label class="primary_label2 style2 ">{{ _trans('landlord.Name') }}
                                                    <span>*</span></label>
                                                <input id="name" type="text"
                                                    class="primary_input3 style4 mb_30 @error('name') is-invalid @enderror"
                                                    name="name" value="{{ old('name', @$data['profile']->name) }}"
                                                    required autocomplete="name" autofocus>

                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror

                                            </div>
                                            <div class="col-12">
                                                <label
                                                    class="primary_label2 style2 ">{{ _trans('landlord.E-mail Address') }}
                                                    <span>*</span></label>
                                                <input name="email"
                                                    class="primary_input3 style4 mb_30 @error('email') is-invalid @enderror"
                                                    placeholder="{{ _trans('landlord.Type e-mail address') }}"
                                                    value="{{ old('email', @$data['profile']->email) }}"
                                                    onfocus="this.placeholder = ''"
                                                    onblur="this.placeholder = 'Type e-mail address'" required=""
                                                    type="text">
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror

                                            </div>
                                            <div class="col-12">
                                                <label
                                                    class="primary_label2 style2 ">{{ _trans('landlord.Phone Number') }}</label>
                                                <input name="phone"
                                                    class="primary_input3 style4 mb_30 @error('phone') is-invalid @enderror"
                                                    placeholder="{{ _trans('landlord.01XX-XXX-XXX') }}"
                                                    value={{ old('phone', @$data['profile']->phone) }}
                                                    onfocus="this.placeholder = ''"
                                                    onblur="this.placeholder = '01XX-XXX-XXX'" required=""
                                                    type="text">
                                                @error('phone')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-12">
                                                <label
                                                    class="primary_label2 style2 ">{{ _trans('landlord.Date of Birth') }}</label>
                                                <input id="date_of_birth" type="date"
                                                    class="primary_input3 style4 mb_30 @error('date_of_birth') is-invalid @enderror"
                                                    name="date_of_birth"
                                                    value="{{ old('date_of_birth', @$data['profile']->date_of_birth) }}"
                                                    required autocomplete="date_of_birth" autofocus>

                                                @error('date_of_birth')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror


                                            </div>
                                            <div class="col-12 mb_30">
                                                <label
                                                    class="primary_label2 style2 mb_30">{{ _trans('landlord.Image') }}</label>
                                                <input type="file" class=" form-control" name="image"
                                                    id="fileBrouse" accept="image/*">

                                            </div>
                                            <div class="col-12 ">
                                                <label
                                                    class="primary_label2 style2 ">{{ _trans('landlord.Occupation') }}</label>
                                                <input name="occupation"
                                                    class="primary_input3 style4 mb_30 @error('occupation') is-invalid @enderror"
                                                    value="{{ old('occupation', @$data['profile']->occupation) }}"
                                                    placeholder="Write Occupation here…"
                                                    value={{ @$data['profile']->occupation }}
                                                    onfocus="this.placeholder = ''"
                                                    onblur="this.placeholder = 'Write Occupation here… here…'"
                                                    required="">
                                                @error('occupation')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror

                                            </div>

                                            <div class="col-12 d-flex justify-content-end">
                                                <button
                                                    class="o_land_primary_btn style2 rounded-0  text-uppercase  text-center min_200 radius_5px">{{ _trans('landlord.update now') }}</button>
                                            </div>
                                        </div>

                                    </form>
                                </div>

                                <!-- content ::end  -->
                            </div>
                            <div class="tab-pane fade " id="Password" role="tabpanel" aria-labelledby="Password-tab">
                                <!-- content ::start  -->
                                <h4 class="mb-3">{{ _trans('landlord.Update Your Password') }}</h4>
                                <form action="{{ route('customer.updatePassword') }}" enctype="multipart/form-data"
                                    method="post" id="visitForm1">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <label class="primary_label">{{ _trans('landlord.Current Password') }}</label>
                                            <input name="password"
                                                placeholder="{{ _trans('landlord.Current Password') }}"
                                                onfocus="this.placeholder = ''"
                                                onblur="this.placeholder = 'Current Password'"
                                                class="primary_input3 style3 mb_30 @error('password') is-invalid @enderror"
                                                required="" type="password">
                                            @error('password')
                                                <span>{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-12">
                                            <label class="primary_label">{{ _trans('landlord.New Password') }}</label>
                                            <input name="new_password"
                                                placeholder="{{ _trans('landlord.New Password') }}"
                                                onfocus="this.placeholder = ''" onblur="this.placeholder = 'New Password'"
                                                class="primary_input3 style3 mb_30 @error('new_password') is-invalid @enderror"
                                                required="" type="password">
                                            @error('new_password')
                                                <span>{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-12">
                                            <label
                                                class="primary_label">{{ _trans('landlord.Re-enter New Password') }}</label>
                                            <input name="confirm_password"
                                                placeholder="{{ _trans('landlord.Re-enter New Password') }}"
                                                onfocus="this.placeholder = ''"
                                                onblur="this.placeholder = 'Re-enter New Password'"
                                                class="primary_input3 style3 mb_30 @error('confirm_password') is-invalid @enderror"
                                                required="" type="password">
                                            @error('confirm_password')
                                                <span>{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-12">
                                            <button
                                                class="o_land_primary_btn style2 rounded-0  text-uppercase  text-center min_200 radius_5px">{{ _trans('landlord.update now') }}</button>
                                        </div>
                                    </div>
                                </form>
                                <!-- content ::end  -->
                            </div>
                            <div class="tab-pane fade " id="Address" role="tabpanel" aria-labelledby="Address-tab">
                                <!-- content ::start  -->

                                <h4 class="mb-3">{{ _trans('landlord.Update Your Address') }}</h4>

                                <div class="table-responsive mb_30">
                                    <table class="table o_landy_table style6 mb-0">
                                        <thead>
                                            <tr>
                                                <th class="font_14 f_w_700" scope="col">
                                                    {{ _trans('landlord.Full Name') }}</th>
                                                <th class="font_14 f_w_700 border-start-0 border-end-0" scope="col">
                                                    {{ _trans('landlord.Address') }}</th>
                                                <th class="font_14 f_w_700 border-start-0 border-end-0" scope="col">
                                                    {{ _trans('landlord.Region') }}</th>
                                                <th class="font_14 f_w_700 border-start-0 border-end-0" scope="col">
                                                    {{ _trans('landlord.E-mail') }}</th>
                                                <th class="font_14 f_w_700 text-nowrap" scope="col">
                                                    {{ _trans('landlord.Phone Number') }}</th>
                                                <th class="font_14 f_w_700 text-nowrap" scope="col">
                                                    {{ _trans('landlord.Action') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data['address'] as $address)
                                                <tr>
                                                    <td>
                                                        <span class="font_14 f_w_400 mute_text text-nowrap">
                                                            {{ $address->name }} </span>
                                                    </td>
                                                    <td>
                                                        <span
                                                            class="font_14 f_w_500 mute_text">{{ $address->address }}</span>
                                                    </td>
                                                    <td>
                                                        <span
                                                            class="font_14 f_w_400 mute_text text-nowrap">{{ $address->country->name }}</span>
                                                    </td>
                                                    <td>
                                                        <span
                                                            class="font_14 f_w_400 mute_text text-nowrap">{{ $address->email }}</span>
                                                    </td>
                                                    <td>
                                                        <span
                                                            class="font_14 f_w_400 mute_text text-nowrap">{{ $address->phone }}</span>
                                                    </td>
                                                    <td>
                                                        <button class="o_landy_status_btn" data-bs-toggle="modal"
                                                            data-bs-target="#Address_modal-{{ $address->id }}">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="15"
                                                                height="15" viewBox="0 0 15 15">
                                                                <g data-name="edit (1)" transform="translate(0 -0.004)">
                                                                    <g data-name="Group 1742"
                                                                        transform="translate(0 1.074)">
                                                                        <g data-name="Group 1741">
                                                                            <path data-name="Path 3050"
                                                                                d="M12.324,40.566a.536.536,0,0,0-.536.536V46.46a.536.536,0,0,1-.536.536H1.607a.536.536,0,0,1-.536-.536V35.744a.536.536,0,0,1,.536-.536h6.43a.536.536,0,1,0,0-1.072H1.607A1.607,1.607,0,0,0,0,35.744V46.46a1.607,1.607,0,0,0,1.607,1.607h9.645A1.607,1.607,0,0,0,12.86,46.46V41.1A.536.536,0,0,0,12.324,40.566Z"
                                                                                transform="translate(0 -34.137)"
                                                                                fill="#F99417" />
                                                                        </g>
                                                                    </g>
                                                                    <g data-name="Group 1744"
                                                                        transform="translate(3.229 0.004)">
                                                                        <g data-name="Group 1743"
                                                                            transform="translate(0 0)">
                                                                            <path data-name="Path 3051"
                                                                                d="M113.58.6a2.048,2.048,0,0,0-2.9,0l-7.048,7.047a.541.541,0,0,0-.129.209l-1.07,3.21a.535.535,0,0,0,.507.7.544.544,0,0,0,.169-.027l3.21-1.07a.535.535,0,0,0,.209-.129L113.58,3.5A2.048,2.048,0,0,0,113.58.6Zm-.757,2.141L105.868,9.7l-2.078.694.692-2.076,6.959-6.956a.978.978,0,1,1,1.384,1.382Z"
                                                                                transform="translate(-102.409 -0.004)"
                                                                                fill="#F99417" />
                                                                        </g>
                                                                    </g>
                                                                </g>
                                                            </svg>
                                                        </button>
                                                    </td>
                                                </tr>
                                                <div class="modal fade" id="Address_modal-{{ $address->id }}"
                                                    tabindex="-1"
                                                    aria-labelledby="Address_modalLabel-{{ $address->id }}"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title"
                                                                    id="Address_modalLabel-{{ $address->id }}">Edit Item
                                                                </h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form
                                                                    action="{{ route('customer.updateAddress', $address->id) }}"
                                                                    method="post" enctype="multipart/form-data"
                                                                    id="editForm-{{ $address->id }}">
                                                                    @csrf
                                                                    <input type="hidden" name="id"
                                                                        value="{{ $address->id }}">
                                                                    <div class="mb-3">
                                                                        <label for="name"
                                                                            class="form-label">Name</label>
                                                                        <input type="text" class="form-control"
                                                                            id="name" name="name"
                                                                            value="{{ $address->name }}">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="description"
                                                                            class="form-label">Address</label>
                                                                        <input class="form-control" id="description"
                                                                            name="address"
                                                                            value="{{ $address->address }}">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="description"
                                                                            class="form-label">Region</label>
                                                                        <select class="form-control" name="country_id">
                                                                            @foreach ($data['country'] as $country)
                                                                                <option value="{{ $country->id }}"
                                                                                    {{ $address->country_id == $country->id ? 'selected' : '' }}>
                                                                                    {{ $country->name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="description"
                                                                            class="form-label">Email</label>
                                                                        <input class="form-control" id="description"
                                                                            name="email" value="{{ $address->email }}">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="description"
                                                                            class="form-label">Phone</label>
                                                                        <input class="form-control" id="description"
                                                                            name="phone" value="{{ $address->phone }}">
                                                                    </div>
                                                                </form>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <button id="editModal"
                                                                    class="btn btn-primary editModalAddress"
                                                                    data-id="{{ $address->id }}">Save changes</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- content ::end  -->
                            </div>
                            <div class="tab-pane fade" id="Documents" role="tabpanel" aria-labelledby="Documents-tab">
                                <!-- Documents ::start  -->
                                <h4 class="mb-3">{{ _trans('landlord.Documents') }}</h4>
                                <div class="table-responsive mb_30">
                                    <table class="table o_landy_table style6 mb-0">
                                        <thead>
                                            <tr>
                                                <th class="font_14 f_w_700" scope="col">No</th>
                                                <th class="font_14 f_w_700 border-start-0 border-end-0" scope="col">
                                                    {{ _trans('landlord.File Name') }}</th>
                                                <th class="font_14 f_w_700 border-start-0 border-end-0" scope="col">
                                                    {{ _trans('landlord.File Size') }}</th>
                                                <th class="font_14 f_w_700 border-start-0 border-end-0" scope="col">
                                                    {{ _trans('landlord.Date') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data['documents'] as $key => $document)
                                                <tr>
                                                    <td>
                                                        <span class="font_14 f_w_400 mute_text text-nowrap">
                                                            {{ ++$key }} </span>
                                                    </td>
                                                    <td>
                                                        <span
                                                            class="font_14 f_w_500 mute_text">{{ $document->filename }}</span>
                                                    </td>
                                                    <td>
                                                        <span
                                                            class="font_14 f_w_400 mute_text text-nowrap">{{ $document->size }}</span>
                                                    </td>
                                                    <td>
                                                        <span
                                                            class="font_14 f_w_400 mute_text text-nowrap">{{ $document->created_at->format('Y-m-d') }}</span>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- Documents ::end  -->
                            </div>
                            <div class="tab-pane fade" id="Emergency" role="tabpanel" aria-labelledby="Emergency-tab">
                                <!-- Emergency ::start  -->
                                <h4 class="mb-3">{{ _trans('landlord.Emergency') }}</h4>
                                <div class="table-responsive mb_30">
                                    <table class="table o_landy_table style6 mb-0">
                                        <thead>
                                            <tr>
                                                <th class="font_14 f_w_700" scope="col">{{ _trans('landlord.No') }}
                                                </th>
                                                <th class="font_14 f_w_700 border-start-0 border-end-0" scope="col">
                                                    {{ _trans('landlord.Name') }}</th>
                                                <th class="font_14 f_w_700 border-start-0 border-end-0" scope="col">
                                                    {{ _trans('landlord.Relation') }}</th>
                                                <th class="font_14 f_w_700 border-start-0 border-end-0 text-nowrap"
                                                    scope="col">{{ _trans('landlord.phone Number') }}</th>
                                                <th class="font_14 f_w_700 border-start-0 border-end-0" scope="col">
                                                    {{ _trans('landlord.Email') }}</th>
                                                <th class="font_14 f_w_700 border-start-0 border-end-0" scope="col">
                                                    {{ _trans('landlord.Action') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data['emergencyContact'] as $key => $emergencyContact)
                                                <tr>
                                                    <td>
                                                        <span class="font_14 f_w_400 mute_text text-nowrap">
                                                            {{ ++$key }} </span>
                                                    </td>
                                                    <td>
                                                        <div class="Emergency_person_info d-flex align-items-center gap-2">
                                                            <div class="thumb">
                                                                <img class="img-fluid"
                                                                    src="{{ @globalAsset($emergencyContact->image->path) }}"
                                                                    alt="">
                                                            </div>
                                                            <div class="Emergency_person_info_content d-flex flex-column">
                                                                <h5 class="font_16 f_w_500 title_text m-0 text-nowrap">
                                                                    {{ $emergencyContact->name }}</h5>
                                                                <span
                                                                    class="font_14 f_w_400 mute_text text-nowrap m-0">{{ $emergencyContact->occupied }}</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span
                                                            class="font_14 f_w_400 mute_text text-nowrap">{{ $emergencyContact->relation }}</span>
                                                    </td>
                                                    <td>
                                                        <span
                                                            class="font_14 f_w_400 mute_text text-nowrap">{{ $emergencyContact->phone }}</span>
                                                    </td>
                                                    <td>
                                                        <span
                                                            class="font_14 f_w_400 mute_text text-nowrap">{{ $emergencyContact->email }}</span>
                                                    </td>
                                                    <td>
                                                        <button class="o_landy_status_btn editEmergencyContact"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#emergencyContactEditModal-{{ $emergencyContact->id }}">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="15"
                                                                height="15" viewBox="0 0 15 15">
                                                                <g data-name="edit (1)" transform="translate(0 -0.004)">
                                                                    <g data-name="Group 1742"
                                                                        transform="translate(0 1.074)">
                                                                        <g data-name="Group 1741">
                                                                            <path data-name="Path 3050"
                                                                                d="M12.324,40.566a.536.536,0,0,0-.536.536V46.46a.536.536,0,0,1-.536.536H1.607a.536.536,0,0,1-.536-.536V35.744a.536.536,0,0,1,.536-.536h6.43a.536.536,0,1,0,0-1.072H1.607A1.607,1.607,0,0,0,0,35.744V46.46a1.607,1.607,0,0,0,1.607,1.607h9.645A1.607,1.607,0,0,0,12.86,46.46V41.1A.536.536,0,0,0,12.324,40.566Z"
                                                                                transform="translate(0 -34.137)"
                                                                                fill="#F99417"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g data-name="Group 1744"
                                                                        transform="translate(3.229 0.004)">
                                                                        <g data-name="Group 1743"
                                                                            transform="translate(0 0)">
                                                                            <path data-name="Path 3051"
                                                                                d="M113.58.6a2.048,2.048,0,0,0-2.9,0l-7.048,7.047a.541.541,0,0,0-.129.209l-1.07,3.21a.535.535,0,0,0,.507.7.544.544,0,0,0,.169-.027l3.21-1.07a.535.535,0,0,0,.209-.129L113.58,3.5A2.048,2.048,0,0,0,113.58.6Zm-.757,2.141L105.868,9.7l-2.078.694.692-2.076,6.959-6.956a.978.978,0,1,1,1.384,1.382Z"
                                                                                transform="translate(-102.409 -0.004)"
                                                                                fill="#F99417"></path>
                                                                        </g>
                                                                    </g>
                                                                </g>
                                                            </svg>
                                                        </button>
                                                    </td>
                                                </tr>
                                                <div class="modal fade"
                                                    id="emergencyContactEditModal-{{ $emergencyContact->id }}"
                                                    tabindex="-1"
                                                    aria-labelledby="emergencyContactEditModalLabel-{{ $emergencyContact->id }}"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title"
                                                                    id="emergencyContactEditModalLabel">Edit Emergency
                                                                    Contact</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form
                                                                    action="{{ route('customer.updateEmergency', $emergencyContact->id) }}"
                                                                    method="post" enctype="multipart/form-data"
                                                                    id="editEmergencyForm-{{ $emergencyContact->id }}">
                                                                    @csrf
                                                                    <input type="hidden" name="id"
                                                                        value="{{ $emergencyContact->id }}">
                                                                    <div class="mb-3">
                                                                        <label for="name"
                                                                            class="form-label">Name</label>
                                                                        <input type="text" class="form-control"
                                                                            id="name" name="name"
                                                                            value="{{ $emergencyContact->name }}">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="description"
                                                                            class="form-label">Occupation</label>
                                                                        <input class="form-control" id="description"
                                                                            name="occupied"
                                                                            value="{{ $emergencyContact->occupied }}">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="description"
                                                                            class="form-label">Relation</label>
                                                                        <input class="form-control" id="description"
                                                                            name="relation"
                                                                            value="{{ $emergencyContact->relation }}">
                                                                    </div>

                                                                    <div class="mb-3">
                                                                        <label for="description"
                                                                            class="form-label">Email</label>
                                                                        <input class="form-control" id="description"
                                                                            name="email"
                                                                            value="{{ $emergencyContact->email }}">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="description"
                                                                            class="form-label">Phone</label>
                                                                        <input class="form-control" id="description"
                                                                            name="phone"
                                                                            value="{{ $emergencyContact->phone }}">
                                                                    </div>
                                                                </form>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <button
                                                                    id="editEmergencyModal-{{ $emergencyContact->id }}"
                                                                    class="btn btn-primary editEmergencyModalBtn"
                                                                    data-id="{{ $emergencyContact->id }}">Save
                                                                    changes</button>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <!-- Emergency ::end  -->
                                </div>
                            </div>
                            <div class="tab-pane fade " id="Accounts" role="tabpanel" aria-labelledby="Accounts-tab">
                                <!-- Accounts ::start  -->
                                <h4 class="mb-3">{{ _trans('landlord.Accounts') }}</h4>
                                <div class="dashboard_account_wrapper mb_20">
                                    <form action="{{ route('customer.updateAccount') }}" enctype="multipart/form-data"
                                        method="post" id="visitForm2">
                                        @csrf
                                        <div class="row">
                                            <div class="col-12">
                                                <label class="primary_label2 style2 ">{{ _trans('landlord.Account No') }}
                                                    <span>*</span></label>
                                                <input name="account_number"
                                                    class="primary_input3 style4 mb_30 @error('account_number') is-invalid @enderror"
                                                    placeholder="{{ _trans('landlord.Type e-mail address') }}"
                                                    value="{{ old('account_number', @$data['accounts']->account_number) }}"
                                                    onfocus="this.placeholder = ''"
                                                    onblur="this.placeholder = 'Type e-mail address'" required=""
                                                    type="text">
                                                @error('account_number')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-12">
                                                <label
                                                    class="primary_label2 style2 ">{{ _trans('landlord.Account Holder Name') }}
                                                    *</label>
                                                <input name="account_name"
                                                    class="primary_input3 style4 mb_30 @error('account_name') is-invalid @enderror"
                                                    placeholder="{{ _trans('landlord.Type e-mail address') }}"
                                                    value="{{ old('account_name', @$data['accounts']->account_name) }}"
                                                    onfocus="this.placeholder = ''"
                                                    onblur="this.placeholder = 'Type e-mail address'" required=""
                                                    type="text">
                                                @error('account_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-12">
                                                <label class="primary_label2 style2 ">{{ _trans('landlord.Bank Name') }}
                                                    <span>*</span></label>
                                                <input name="name"
                                                    class="primary_input3 style4 mb_30 @error('name') is-invalid @enderror"
                                                    placeholder="{{ _trans('landlord.Type e-mail address') }}"
                                                    value="{{ old('name', @$data['accounts']->name) }}"
                                                    onfocus="this.placeholder = ''"
                                                    onblur="this.placeholder = 'Type e-mail address'" required=""
                                                    type="text">
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-12">
                                                <label
                                                    class="primary_label2 style2 ">{{ _trans('landlord.Branch Name') }}
                                                    *</label>
                                                <input name="branch"
                                                    class="primary_input3 style4 mb_30 @error('branch') is-invalid @enderror"
                                                    placeholder="{{ _trans('landlord.Type e-mail address') }}"
                                                    value="{{ old('branch', @$data['accounts']->branch) }}"
                                                    onfocus="this.placeholder = ''"
                                                    onblur="this.placeholder = 'Type e-mail address'" required=""
                                                    type="text">
                                                @error('branch')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-12 d-flex justify-content-end">
                                                <button
                                                    class="o_land_primary_btn style2 rounded-0  text-uppercase  text-center min_200 radius_5px">{{ _trans('landlord.update now') }}</button>
                                            </div>
                                        </div>
                                    </form>
                                    <!--/ form  -->
                                </div>
                                <!-- Accounts ::end  -->
                            </div>
                            <div class="tab-pane fade " id="Transaction" role="tabpanel"
                                aria-labelledby="Transaction-tab">
                                <!-- Transaction ::start  -->
                                <h4 class="mb-3">{{ _trans('landlord.Transaction History') }}</h4>
                                <div class="table-responsive mb_30">
                                    <table class="table o_landy_table style6 mb-0">
                                        <thead>
                                            <tr>
                                                <th class="font_14 f_w_700" scope="col">{{ _trans('landlord.No') }}
                                                </th>
                                                <th class="font_14 f_w_700 border-start-0 border-end-0" scope="col">
                                                    {{ _trans('landlord.Property Name') }}</th>
                                                <th class="font_14 f_w_700 border-start-0 border-end-0" scope="col">
                                                    {{ _trans('landlord.Transaction Date') }}</th>
                                                <th class="font_14 f_w_700 border-start-0 border-end-0" scope="col">
                                                    {{ _trans('landlord.Prise') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data['transactionHistory'] ?? [] as $key => $transactionHistory)
                                                <tr>
                                                    <td>
                                                        <span class="font_14 f_w_400 mute_text text-nowrap">
                                                            {{ ++$key }} </span>
                                                    </td>
                                                    <td>
                                                        <span class="font_14 f_w_500 mute_text">
                                                            {{ $transactionHistory->property->name }} </span>
                                                    </td>
                                                    <td>
                                                        <span
                                                            class="font_14 f_w_400 mute_text text-nowrap">{{ $transactionHistory->date }}</span>
                                                    </td>
                                                    <td>
                                                        <span class="font_14 f_w_400 mute_text text-nowrap">৳
                                                            {{ $transactionHistory->amount }}</span>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- Transaction ::end  -->
                            </div>
                            <div class="tab-pane fade " id="Agreements" role="tabpanel"
                                aria-labelledby="Agreements-tab">
                                <!-- Agreements ::start  -->
                                <h4 class="mb-3">{{ _trans('landlord.Agreements') }}</h4>
                                <div class="table-responsive mb_30">
                                    <table class="table o_landy_table style6 mb-0">
                                        <thead>
                                            <tr>
                                                <th class="font_14 f_w_700" scope="col">{{ _trans('landlord.No') }}
                                                </th>
                                                <th class="font_14 f_w_700 border-start-0 border-end-0" scope="col">
                                                    {{ _trans('landlord.Property Name') }}</th>
                                                <th class="font_14 f_w_700 border-start-0 border-end-0" scope="col">
                                                    {{ _trans('landlord.Move in Date') }}</th>
                                                <th class="font_14 f_w_700 border-start-0 border-end-0" scope="col">
                                                    {{ _trans('landlord.Move out') }}</th>
                                                <th class="font_14 f_w_700 border-start-0 border-end-0" scope="col">
                                                    {{ _trans('landlord.Rent Amount') }}</th>
                                                <th class="font_14 f_w_700 border-start-0 border-end-0" scope="col">
                                                    {{ _trans('landlord.Rent Type') }}</th>
                                                <th class="font_14 f_w_700 border-start-0 border-end-0" scope="col">
                                                    {{ _trans('landlord.Rent for') }}</th>
                                                <th class="font_14 f_w_700 border-start-0 border-end-0" scope="col">
                                                    {{ _trans('landlord.Reminder Date') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data['agreement'] as $key => $agreement)
                                                <tr>
                                                    <td>
                                                        <span
                                                            class="font_14 f_w_400 mute_text text-nowrap">{{ ++$key }}</span>
                                                    </td>
                                                    <td>
                                                        <span
                                                            class="font_14 f_w_500 mute_text">{{ $agreement->property->name }}</span>
                                                    </td>
                                                    <td>
                                                        <span
                                                            class="font_14 f_w_400 mute_text text-nowrap">{{ $agreement->move_in }}</span>
                                                    </td>
                                                    <td>
                                                        <span
                                                            class="font_14 f_w_400 mute_text text-nowrap">{{ $agreement->move_out }}</span>
                                                    </td>
                                                    <td>
                                                        <span class="font_14 f_w_400 mute_text text-nowrap">$
                                                            {{ $agreement->rent_amount }}</span>
                                                    </td>
                                                    <td>
                                                        <span
                                                            class="font_14 f_w_400 mute_text text-nowrap">{{ $agreement->rent_type }}</span>
                                                    </td>
                                                    <td>
                                                        <span
                                                            class="font_14 f_w_400 mute_text text-nowrap">{{ $agreement->rent_for }}
                                                            Months</span>
                                                    </td>
                                                    <td>
                                                        <span
                                                            class="font_14 f_w_400 mute_text text-nowrap">{{ $agreement->reminder_date }}</span>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- Agreements ::end  -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Edit address modal --}}
@endsection

@section('script')
@include('frontend.customer.profile_script')
@endsection
