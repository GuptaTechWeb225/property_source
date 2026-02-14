@extends('landlord.landlord_layout')
@section('title',@$title)
@section('landlord_content')
    <x-landlord.container subtitle="Please provide your documents in order to verify your identity." tab="requirement">
        <form action="{{ route('landlord.requirement.document.store') }}" enctype="multipart/form-data" method="post">
            @csrf
            <div class="tab_main_content flex-fill">
                <div class="border_bottom  d-flex gap_32 settings_input_info">
                    <div class="info_left">
                        <label for="name" class="nowrap info_left">Proof Of ID for {{ auth()->user()->name }}</label>
                        <p>As with all estate agents, <span class="fw-bold">{{ config('app.name') }}</span> requires all
                            customers to provide ID.</p>
                    </div>
                    <div class="info_right flex-fill">
                        <div class="profile_file_upload d-flex gap-4">
                            <div class="uploaded_thumb">
                                @if(!empty($proofId['file']) && $proofId['file_extension'] !== 'pdf')
                                    <img class="rounded-circle" src="{{ $proofId['file'] }}"
                                         alt="">
                                @else
                                    <img class="rounded-circle" src="{{ asset('landlord/img/avatars/file.png') }}"
                                         alt="">
                                @endif
                            </div>
                            <div
                                class="file_upload_field d-flex flex-column justify-content-center align-items-center position-relative flex-fill">
                                <input type="file" name="proof_of_id"
                                       class="position-absolute left-0 top-0 right-0 bottom-0 pointer-event opacity-25 file_upload_field_input">
                                <div
                                    class="upload_icon d-flex align-items-center justify-content-center rounded-circle">
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
                                <p class="text-center"><span>Click to upload </span> or drag and drop</p>
                                <p class="font_12 f_w_400 neutral_text ">PNG, JPG or PDF (max. 8 MB)</p>
                            </div>
                        </div>
                        @if(!empty($proofId['file']))
                            <p class="mt-4">
                            <span>
                                {{ $proofId['name'] }} ({{  $proofId['file_size'] }})
                                <a href="{{ $proofId['file'] }}" download>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"
                                         fill="rgba(201,157,102,1)"><path
                                            d="M13 13V18.585L14.8284 16.7574L16.2426 18.1716L12 22.4142L7.75736 18.1716L9.17157 16.7574L11 18.585V13H13ZM12 2C15.5934 2 18.5544 4.70761 18.9541 8.19395C21.2858 8.83154 23 10.9656 23 13.5C23 16.3688 20.8036 18.7246 18.0006 18.9776L18.0009 16.9644C19.6966 16.7214 21 15.2629 21 13.5C21 11.567 19.433 10 17.5 10C17.2912 10 17.0867 10.0183 16.8887 10.054C16.9616 9.7142 17 9.36158 17 9C17 6.23858 14.7614 4 12 4C9.23858 4 7 6.23858 7 9C7 9.36158 7.03838 9.7142 7.11205 10.0533C6.91331 10.0183 6.70879 10 6.5 10C4.567 10 3 11.567 3 13.5C3 15.2003 4.21241 16.6174 5.81986 16.934L6.00005 16.9646L6.00039 18.9776C3.19696 18.7252 1 16.3692 1 13.5C1 10.9656 2.71424 8.83154 5.04648 8.19411C5.44561 4.70761 8.40661 2 12 2Z"></path></svg>
                                </a>
                            </span>
                            </p>
                        @endif
                    </div>
                </div>

                <div class="border_bottom  d-flex gap_32 settings_input_info">
                    <div class="info_left">
                        <label for="name" class="nowrap info_left">Proof Of Address
                            for {{ auth()->user()->name }}</label>
                        <p>As with all estate agents, <span class="fw-bold">{{ config('app.name') }}</span> requires all
                            customers to provide ID.</p>
                    </div>
                    <div class="info_right flex-fill">
                        <div class="profile_file_upload d-flex gap-4">
                            <div class="uploaded_thumb">
                                @if(!empty($proofAddress['file']) && $proofAddress['file_extension'] !== 'pdf')
                                    <img class="rounded-circle" src="{{ $proofAddress['file'] }}"
                                         alt="">
                                @else
                                    <img class="rounded-circle" src="{{ asset('landlord/img/avatars/file.png') }}"
                                         alt="">
                                @endif
                            </div>
                            <div
                                class="file_upload_field d-flex flex-column justify-content-center align-items-center position-relative flex-fill">
                                <input type="file" name="proof_of_address"
                                       class="position-absolute left-0 top-0 right-0 bottom-0 pointer-event opacity-25 file_upload_field_input">
                                <div
                                    class="upload_icon d-flex align-items-center justify-content-center rounded-circle">
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
                                <p class="text-center"><span>Click to upload </span> or drag and drop</p>
                                <p class="font_12 f_w_400 neutral_text ">PNG, JPG or PDF (max. 8 MB)</p>
                            </div>
                        </div>
                        @if(!empty($proofAddress['file']))
                            <p class="mt-4">
                            <span>
                                {{ $proofAddress['name'] }} ({{  $proofAddress['file_size'] }})
                                <a href="{{ $proofAddress['file'] }}" download>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"
                                         fill="rgba(201,157,102,1)"><path
                                            d="M13 13V18.585L14.8284 16.7574L16.2426 18.1716L12 22.4142L7.75736 18.1716L9.17157 16.7574L11 18.585V13H13ZM12 2C15.5934 2 18.5544 4.70761 18.9541 8.19395C21.2858 8.83154 23 10.9656 23 13.5C23 16.3688 20.8036 18.7246 18.0006 18.9776L18.0009 16.9644C19.6966 16.7214 21 15.2629 21 13.5C21 11.567 19.433 10 17.5 10C17.2912 10 17.0867 10.0183 16.8887 10.054C16.9616 9.7142 17 9.36158 17 9C17 6.23858 14.7614 4 12 4C9.23858 4 7 6.23858 7 9C7 9.36158 7.03838 9.7142 7.11205 10.0533C6.91331 10.0183 6.70879 10 6.5 10C4.567 10 3 11.567 3 13.5C3 15.2003 4.21241 16.6174 5.81986 16.934L6.00005 16.9646L6.00039 18.9776C3.19696 18.7252 1 16.3692 1 13.5C1 10.9656 2.71424 8.83154 5.04648 8.19411C5.44561 4.70761 8.40661 2 12 2Z"></path></svg>
                                </a>
                            </span>
                            </p>
                        @endif
                    </div>
                </div>
            </div>
            <!--/ tab_main_content -->

            <div class="d-flex justify-content-end gap-3 mt-4 tab_footer">
                <button type="button" class="theme_line_btn">Cancel</button>
                <button type="submit" class="theme_btn">Update</button>
            </div>
        </form>
    </x-landlord.container>
@endsection
