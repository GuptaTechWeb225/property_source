@extends('frontend.layouts.master')
@section('content')
<div class="o_landy_login_area">
    <div class="o_landy_login_area_left d-flex align-items-center justify-content-center">
        <div class="o_landy_login_form">
            <a href="index.php " class="logo mb_50 d-block">
                <img src="images/logo.png" alt="">
            </a>
            <h3 class="m-0">Sign In</h3>
            <p class="support_text">See your growth and get consulting support!</p>
            <form action="#">
                <div class="row">
                    <div class="col-12">
                        <label class="primary_label2">Email Address <span>*</span> </label>
                        <input name="name" placeholder="Enter user name or email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter user name or email'" class="primary_input3 radius_5px mb_20" required="" type="text">
                    </div>
                    <div class="col-12">
                        <label class="primary_label2">Password <span>*</span></label>
                        <input name="name" placeholder="Min. 8 Character" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Password'" class="primary_input3 radius_5px mb_20" required="" type="password">
                    </div>
                    <div class="col-12">
                        <button class="o_land_primary_btn style2 radius_5px  w-100 text-uppercase  text-center mb_25">Sign In</button>
                    </div>
                    <div class="col-12">
                        <p class="sign_up_text">Don’t have an Account? <a href="resister.php">Sign Up</a></p>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="o_landy_login_area_right d-flex align-items-center justify-content-center">
        <div class="o_landy_login_area_right_inner d-flex align-items-center justify-content-center flex-column">
            <div class="thumb">
                <img class="img-fluid" src="img/banner/login_img.png" alt="">
            </div>
            <!-- <div class="login_text d-flex align-items-center justify-content-center flex-column text-center">
                <h4>Turn your ideas into reality.</h4>
                <p class="m-0">Consistent quality and experience across
                all platforms and devices.</p>
            </div> -->
        </div>
    </div>
</div>
@endsection

