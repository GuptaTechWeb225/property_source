@extends('frontend.layouts.master')

@section('content')

<!-- CONTACT::START -->
<div class="contact_section ">
    <div class="container">
        <div class="row ">
            <div class="col-xl-12">
                <div class="contact_address">
                    <div class="row mb-4">
                        <div class="col-lg-4">
                            <div class="card card-body text-center">
                                <div class="__icon"><i class="fa fa-envelope fa-2x text-theme-color"></i></div>
                                <h3>{{ _trans('landlord.Email') }}</h3>
                                <address><a class="text-dark"  href="mailto:{{ @$data['information']['email'] }}">{{ @$data['information']['email'] }}</a></address>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card card-body text-center">
                                <div class="__icon"><i class="fa fa-phone fa-2x text-theme-color"></i></div>
                                <h3>{{ _trans('landlord.Phone') }}</h3>
                                <address><a class="text-dark" href="tel:{{ @$data['information']['phone_number'] }}">{{ @$data['information']['phone_number'] }}</a></address>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card card-body text-center">
                                <div class="__icon"><i class="fa fa-map-marker-alt fa-2x text-theme-color"></i></div>
                                <h3>{{ _trans('landlord.Address') }}</h3>
                                <address>{{ @$data['information']['address'] }}</address>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="contact_map mb_30">
                                <div id="contact-map"></div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="contact_form_box mb_30">
                                <div class="contact_info">
                                    <div class="contact_title mb_30">
                                        <h4 class="">{{ _trans('landlord.Get in Touch')}}</h4>
                                    </div>
                                </div>

                                <form class="form-area contact-form" action="{{ route('contact.store') }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <select class="o_land_select2 style2 wide mb_10" name="reason">
                                                <option value="" disabled selected>{{ _trans('landlord.Reason for Contact')}}</option>
                                                <option value="Issue">{{ _trans('landlord.Issue')}}</option>
                                                <option value="Support">{{ _trans('landlord.Support')}}</option>
                                                <option value="Query">{{ _trans('landlord.Query')}}</option>
                                                <option value="Others">{{ _trans('landlord.Others')}}</option>
                                            </select>
                                            @error('reason')
                                            <small class="text-danger"> {{ $message }} </small>
                                            @enderror
                                        </div>

                                        <div class="col-xl-12">
                                            <input placeholder="{{ _trans('landlord.First Name')}}" onfocus="this.placeholder = ''" onblur="this.placeholder = 'First Name'"
                                                   class="primary_line_input style4 mb_10" type="text" name="f_name" value="{{ old('f_name') }}">
                                            @error('f_name')
                                            <small class="text-danger"> {{ $message }} </small>
                                            @enderror
                                        </div>
                                        <div class="col-xl-12">
                                            <input placeholder="{{ _trans('landlord.Last Name')}}" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Last Name'"
                                                   class="primary_line_input style4 mb_10" type="text" name="l_name" value="{{ old('l_name') }}">
                                            @error('l_name')
                                             <small class="text-danger"> {{ $message }} </small>
                                            @enderror
                                        </div>
                                        <div class="col-xl-12">
                                            <input placeholder="{{ _trans('landlord.Type e-mail address')}}"
                                                   onfocus="this.placeholder = ''" onblur="this.placeholder = '{{ _trans("landlord.Type e-mail address")}}'" class="primary_line_input style4  mb_10"
                                                   type="email" name="email" value="{{ old('email') }}">
                                            @error('email')
                                            <small class="text-danger"> {{ $message }} </small>
                                            @enderror
                                        </div>
                                        <div class="col-xl-12">
                                            <input placeholder="{{ _trans('landlord.Phone No')}}" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Phone No'"
                                                   class="primary_line_input style4 mb_10" type="text" name="phone_number" value="{{ old('phone_number') }}">
                                            @error('phone_number')
                                            <small class="text-danger"> {{ $message }} </small>
                                            @enderror
                                        </div>
                                        <div class="col-xl-12 mb_40">
                                            <textarea class="primary_line_textarea style4 " placeholder="{{ _trans('landlord.Write Message here…')}}" onfocus="this.placeholder = ''"
                                                      onblur="this.placeholder = 'Write Message here…'" name="message">{{ old('message') }}</textarea>
                                            @error('message')
                                            <small class="text-danger"> {{ $message }} </small>
                                            @enderror
                                        </div>
                                        <div class="col-lg-12 text-right">
                                            <div class="alert-msg"></div>
                                            <button type="submit" class="o_land_primary_btn style2 submit-btn text-center f_w_700 text-uppercase rounded-0 w-100" >Send message</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- CONTACT::END -->

@endsection
