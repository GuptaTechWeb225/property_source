@extends('landlord.landlord_layout')

@section('title', 'Settings')
@section('landlord_content')
    <form action="{{ route('landlord.setting') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="section__title">
            <h3 class="title">Settings</h3>
        </div>
        <div class="border_bottom">
            <h4 class="font_18 f_w_500 mb-1">Personal info</h4>
            <p class="font_14 f_w_400 mb_15">Update your photo and personal details here.</p>
        </div>
        <div class="border_bottom  d-flex gap-4 settings_input_info flex-wrap">
            <label for="name" class="nowrap info_left">Full Name</label>
            <input id="name" name="name" class="primary_input info_right" value="{{ $user->name }}" type="text"
                   placeholder="John Meow">
        </div>
        <div class="border_bottom  d-flex gap-4 settings_input_info flex-wrap">
            <label for="Email" class="nowrap info_left">Date of Birth</label>
            <div class="input-group input_search_group info_right">
                <span class="input-group-text" id="basic-addon1">
                    <img src="{{ asset('landlord/img/svg/calendar-2-line')}}" alt="">
                </span>
                <input id="Email" type="date" name="date_of_birth" class="form-control" value="{{ $user->date_of_birth }}"
                       placeholder="johnmeow@example.com" aria-label="Search" aria-describedby="basic-addon1">
            </div>
        </div>
        <div class="border_bottom  d-flex gap-4 settings_input_info flex-wrap">
            <label for="Email" class="nowrap info_left">Email address</label>
            <div class="input-group input_search_group info_right">
                <span class="input-group-text" id="basic-addon1">
                    <img src="{{ asset('landlord/img/svg/email.svg')}}" alt="">
                </span>
                <input id="Email" type="text" name="email" class="form-control" value="{{ $user->email }}"
                       placeholder="johnmeow@example.com" aria-label="Search" aria-describedby="basic-addon1">
            </div>
        </div>

        <div class="border_bottom  d-flex gap-4 settings_input_info flex-wrap">
            <label for="Phone" class="nowrap info_left">Phone number</label>
            <div class="input-group input_search_group info_right">
                <span class="input-group-text" id="basic-addon1">
                    <img src="{{ asset('landlord/img/svg/phone.svg')}}" alt="">
                </span>
                <input id="Phone" name="phone" type="text" class="form-control" value="{{ $user->phone }}"
                       placeholder="Phone"
                       aria-label="Search" aria-describedby="basic-addon1">
            </div>
        </div>
        <div class="border_bottom  d-flex gap-4 settings_input_info flex-wrap">
            <label for="Address" class="nowrap info_left">Address</label>
            <div class="input-group input_search_group info_right">
                <span class="input-group-text" id="basic-addon1">
                    <img src="{{ asset('landlord/img/svg/address.svg')}}" alt="">
                </span>
                <input id="Address" name="address" type="text" class="form-control " value="{{ $user->address }}"
                       placeholder="Address"
                       aria-label="Search" aria-describedby="basic-addon1">
            </div>
        </div>
        <div class=" d-flex gap-4 settings_input_info flex-wrap">
            <div class="info_left">
                <label for="name" class="nowrap info_left">Your photo</label>
                <p>This will be displayed on your profile.</p>
            </div>
            <div class="info_right">
                <div class="profile_file_upload d-flex gap-4">
                    <div class="uploaded_thumb">
                        <img class="rounded-circle" src="{{ @globalAsset($user->image->path) }}"
                             alt="{{ $user->name }}">
                    </div>
                    <div
                        class="file_upload_field d-flex flex-column justify-content-center align-items-center position-relative ">
                        <input type="file" name="image"
                               class="position-absolute left-0 top-0 right-0 bottom-0 pointer-event opacity-25 file_upload_field_input">
                        <div class="upload_icon d-flex align-items-center justify-content-center rounded-circle">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_420_528)">
                                    <path
                                        d="M13.3333 13.3332L10 9.9999M10 9.9999L6.66666 13.3332M10 9.9999V17.4999M16.9917 15.3249C17.8044 14.8818 18.4465 14.1806 18.8166 13.3321C19.1866 12.4835 19.2635 11.5359 19.0352 10.6388C18.8068 9.7417 18.2862 8.94616 17.5556 8.37778C16.8249 7.80939 15.9257 7.50052 15 7.4999H13.95C13.6978 6.52427 13.2276 5.61852 12.575 4.85073C11.9223 4.08295 11.104 3.47311 10.1817 3.06708C9.25946 2.66104 8.25712 2.46937 7.25009 2.50647C6.24307 2.54358 5.25755 2.80849 4.36764 3.28129C3.47774 3.7541 2.70659 4.42249 2.11218 5.23622C1.51777 6.04996 1.11557 6.98785 0.935814 7.9794C0.756055 8.97095 0.803418 9.99035 1.07434 10.961C1.34527 11.9316 1.8327 12.8281 2.5 13.5832"
                                        stroke="#475467" stroke-width="1.66667" stroke-linecap="round"
                                        stroke-linejoin="round"/>
                                </g>
                                <defs>
                                    <clipPath id="clip0_420_528">
                                        <rect width="20" height="20" fill="white"/>
                                    </clipPath>
                                </defs>
                            </svg>
                        </div>
                        <p class="text-center"><span>Click to upload </span> or drag and drop SVG, PNG, JPG or GIF (max.
                            800x400px)</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-end gap-3 mt-4 border_top tab_footer">
            <button type="button" class="theme_line_btn">Cancel</button>
            <button type="submit" class="theme_btn">Update</button>
        </div>
    </form>
@endsection

