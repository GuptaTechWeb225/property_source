@extends('landlord.landlord_layout')
@section('title',@$title)
@section('landlord_content')
    <x-landlord.container subtitle="Please tell us what are your requirements here." tab="requirement">
        <form action="{{ route('landlord.requirement.update') }}" method="post">
            @csrf
            <div class="tab_main_content flex-fill mb-4">
                <div class="border_bottom">
                    <h4 class="font_18 f_w_500 mb-1">Register with us to Jump the Queue</h4>
                    <p class="font_14 f_w_400 mb_15">Tell us your requirements to get called first when new properties
                        get listed</p>
                </div>
                <div class="border_bottom  gap-4 settings_input_info pb-4">
                    <div class="requirement_slider mx-auto">
                        <h4 class="fs-4 fw-normal text-capitalize text-center">Price Range</h4>
                        <div class="mt-4" id="slider-range"></div>
                        <input type="hidden" id="min-value" name="min_price" value="{{ $requirement->min_price ?? 0 }}">
                        <input type="hidden" id="max-value" name="max_price"
                               value="{{ $requirement->max_price ?? 500 }}">
                    </div>
                </div>
                <div class="border_bottom  d-flex gap-4 settings_input_info">
                    <div class="info_left">
                        <label for="name" class="nowrap info_left">Property Purpose</label>
                        <p>What purpose of properties are you looking for?</p>
                    </div>
                    <div class=" d-flex gap_12 flex-wrap flex-fill">
                        <label for="for_sale" class="property_purpose d-flex align-items-start flex-shrink-0">
                            <div class="icon">
                                <svg width="36" height="36" viewBox="0 0 36 36" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <g style="mix-blend-mode:multiply">
                                        <rect x="2" y="2" width="32" height="32" rx="16" fill="#EFE2D1"/>
                                        <rect x="2" y="2" width="32" height="32" rx="16" stroke="#FAF5F0"
                                              stroke-width="4"/>
                                        <g clip-path="url(#clip0_470_599)">
                                            <path
                                                d="M15.3333 15.3335H15.34M11.3333 13.4668L11.3333 16.4498C11.3333 16.776 11.3333 16.939 11.3702 17.0925C11.4028 17.2285 11.4567 17.3586 11.5298 17.4779C11.6122 17.6124 11.7275 17.7277 11.9582 17.9583L17.0706 23.0708C17.8626 23.8628 18.2586 24.2588 18.7153 24.4072C19.117 24.5377 19.5497 24.5377 19.9513 24.4072C20.408 24.2588 20.804 23.8628 21.5961 23.0708L23.0706 21.5962C23.8626 20.8042 24.2586 20.4082 24.407 19.9515C24.5375 19.5498 24.5375 19.1171 24.407 18.7155C24.2586 18.2588 23.8626 17.8628 23.0706 17.0708L17.9582 11.9583C17.7275 11.7277 17.6122 11.6124 17.4777 11.53C17.3584 11.4569 17.2283 11.403 17.0923 11.3703C16.9388 11.3335 16.7758 11.3335 16.4497 11.3335L13.4666 11.3335C12.7199 11.3335 12.3465 11.3335 12.0613 11.4788C11.8104 11.6067 11.6065 11.8106 11.4786 12.0615C11.3333 12.3467 11.3333 12.7201 11.3333 13.4668ZM15.6666 15.3335C15.6666 15.5176 15.5174 15.6668 15.3333 15.6668C15.1492 15.6668 15 15.5176 15 15.3335C15 15.1494 15.1492 15.0002 15.3333 15.0002C15.5174 15.0002 15.6666 15.1494 15.6666 15.3335Z"
                                                stroke="#C99D66" stroke-width="1.33" stroke-linecap="round"
                                                stroke-linejoin="round"/>
                                        </g>
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_470_599">
                                            <rect width="16" height="16" fill="white" transform="translate(10 10)"/>
                                        </clipPath>
                                    </defs>
                                </svg>
                            </div>
                            <div class="checkbox_content">
                                <input id="for_sale" name="purpose" checked
                                       {{ @$requirement->purpose == \App\Enums\DealType::SELL ? 'checked':'' }} type="radio"
                                       value="{{ \App\Enums\DealType::SELL }}">
                                <span class="checkmark"></span>
                                <span class="checked_border"></span>
                                <h5 class="label_name">For Sale</h5>
                                <p>Properties that are for sale</p>
                            </div>
                        </label>
                        <label for="To_Let" class="property_purpose d-flex align-items-start flex-shrink-0">
                            <div class="icon">
                                <svg width="36" height="36" viewBox="0 0 36 36" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <rect x="2" y="2" width="32" height="32" rx="16" fill="#EFE2D1"/>
                                    <rect x="2" y="2" width="32" height="32" rx="16" stroke="#FAF5F0" stroke-width="4"/>
                                    <path
                                        d="M18 21.3333C18 23.1743 19.4924 24.6667 21.3333 24.6667C23.1743 24.6667 24.6667 23.1743 24.6667 21.3333C24.6667 19.4924 23.1743 18 21.3333 18C19.4924 18 18 19.4924 18 21.3333ZM18 21.3333C18 20.5828 18.2481 19.8902 18.6667 19.333V13.3333M18 21.3333C18 21.8836 18.1333 22.4027 18.3694 22.8601C17.8078 23.3345 16.5106 23.6667 15 23.6667C12.975 23.6667 11.3333 23.0697 11.3333 22.3333V13.3333M18.6667 13.3333C18.6667 14.0697 17.025 14.6667 15 14.6667C12.975 14.6667 11.3333 14.0697 11.3333 13.3333M18.6667 13.3333C18.6667 12.597 17.025 12 15 12C12.975 12 11.3333 12.597 11.3333 13.3333M11.3333 19.3333C11.3333 20.0697 12.975 20.6667 15 20.6667C16.4593 20.6667 17.7195 20.3567 18.3098 19.9079M18.6667 16.3333C18.6667 17.0697 17.025 17.6667 15 17.6667C12.975 17.6667 11.3333 17.0697 11.3333 16.3333"
                                        stroke="#C99D66" stroke-width="1.33" stroke-linecap="round"
                                        stroke-linejoin="round"/>
                                </svg>

                            </div>
                            <div class="checkbox_content">
                                <input id="To_Let" type="radio" name="purpose"
                                       {{ @$requirement->purpose == \App\Enums\DealType::RENT ? 'checked':'' }} value="{{ \App\Enums\DealType::RENT }}">
                                <span class="checkmark"></span>
                                <span class="checked_border"></span>
                                <h5 class="label_name">To Let</h5>
                                <p>Properties that are available to let</p>
                            </div>
                        </label>
                    </div>
                </div>
                <div class="border_bottom  d-flex gap-4 settings_input_info">
                    <div class="info_left">
                        <label for="name" class="nowrap info_left">City & Post Code</label>
                        <p>Enter post code of area you are looking for</p>
                    </div>
                    <div class="d-flex justify-content-between align-items-center gap-2">
                        <input id="name" class="primary_input info_right" name="city" value="{{ @$requirement->city }}"
                               type="text" placeholder="City">
                        <input id="name" class="primary_input info_right" name="post_code"
                               value="{{ @$requirement->post_code }}" type="text" placeholder="Post Code">
                    </div>
                </div>
                <div class="border_bottom  d-flex gap-4 settings_input_info">
                    <div class="info_left">
                        <label for="name" class="nowrap info_left">Radius Modifier</label>
                        <p>Lets increase Radius from your selected post code</p>
                    </div>
                    <div class="info_right">
                        <select class="theme_select wide" name="radius">
                            <option data-display="Radius" value="">Radius</option>
                            <option value="0" {{ @$requirement->radius == 0 ? 'selected':'' }}>0 Miles</option>
                            <option value="0.5" {{ @$requirement->radius == 0.5 ? 'selected':'' }}>+0.5 Miles</option>
                            <option value="5" {{ @$requirement->radius == 5 ? 'selected':'' }}>+5 Miles</option>
                            <option value="10" {{ @$requirement->radius == 10 ? 'selected':'' }}>+10 Miles</option>
                            <option value="20" {{ @$requirement->radius == 20 ? 'selected':'' }}>+20 Miles</option>
                        </select>
                    </div>
                </div>
                <div class="border_bottom  d-flex gap-4 settings_input_info">
                    <div class="info_left">
                        <label for="name" class="nowrap info_left">Property Type</label>
                        <p>Which type of property you are looking for?</p>
                    </div>
                    <div class="info_right">
                        <select class="theme_select wide" name="property_category_id">
                            <option data-display="Property Type" value="">Property Type</option>
                            @foreach($property_categories as $category)
                                <option
                                    {{ @$requirement->property_category_id == $category->id ? 'selected':'' }} value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-end gap-3 mt-4 tab_footer">
                <button type="button" class="theme_line_btn">Cancel</button>
                <button type="submit" class="theme_btn">Update</button>
            </div>
        </form>
    </x-landlord.container>
@endsection
