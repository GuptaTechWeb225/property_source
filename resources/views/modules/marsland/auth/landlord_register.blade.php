@extends('layouts.marsland')
@section('content')
    <div class="registration-page p-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header">
                        <div class="logo logo-large dark-logo mb-40">
                            <a href="{{ route('home') }}">
                                <img src="{{ @globalAsset(setting('dark_logo')) }}" alt="logo">
                            </a>
                        </div>
                        <!-- White Logo ( light-mode )-->
                        <div class="logo logo-large  light-logo mb-40">
                            <a href="{{ route('home') }}">
                                <img src="{{ @globalAsset(setting('light_logo')) }}" alt="logo">
                            </a>
                        </div>
                    </div>
                    <div class="pe-5 pt-5">
                        <img class="img-fluid p-5" src="{{ asset('images/landlord-signin.jpg') }}" alt="singin">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="page-header">
                        <h2 class="mb-0"><i class="ri-user-add-line"></i> {{ _trans('frontend.Create New Account') }}</h2>
                    </div>
                    <ul>
                        @foreach($errors->all() as $error)
                            <li class="text-danger">{{ $error }}</li>
                        @endforeach
                    </ul>
                    <form id="multistep-form" class="my-5" action="{{ route('register') }}" method="POST" enctype="multipart/form-data">

                        <input type="hidden" name="role_id" value="{{@$data['role_id']}}">
                        @csrf
                        @if(env('BILLNET_THEME'))
                            @include('marsland::auth.includes.billnet_register_form')
                        @else
                            @include('marsland::auth.includes.register_form')
                        @endif

                        <div class="mt-3">
                            <p class="mb-3">{{ _trans('frontend.Please note that fields marked with') }} <span class="text-danger">*</span> {{ _trans('frontend.are required') }}.</p>

                            <button type="button" class="btn btn-secondary" id="prevButton" onclick="prevStep()"><i class="ri-arrow-left-line"></i> {{ _trans('frontend.Previous') }}</button>
                            <button type="button" class="btn btn-primary" id="nextButton" onclick="nextStep()">{{ _trans('frontend.Next') }} <i class="ri-arrow-right-line"></i></button>
                            <button type="submit" class="btn btn-primary" id="submitButton" onclick="nextStep()">{{ _trans('frontend.Submit') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        const nationalityChanageHandler = (nationality) => {
            let inputElement = document.getElementById('country__for__dual__foreigner');
            if (nationality === 'Dual' || nationality === 'Foreigner') {
                inputElement.style.display = 'block';
            } else {
                inputElement.style.display = 'none';
            }
        }

        const accountTypeChangeHandler = (selectedValue) => {
            var currentUrl = new URL(window.location.href);

            currentUrl.searchParams.set('account_type', selectedValue);

            window.history.pushState({ path: currentUrl.href }, '', currentUrl.href);

            window.location.href = currentUrl.href;
        }
    </script>

    <script>
        let currentStep = 1;
        const totalSteps = document.querySelectorAll('#multistep-form .step').length;
        function nextStep() {
            if (currentStep < totalSteps) {
                hideStep(currentStep);
                currentStep++;
                showStep(currentStep);
                submitButtonHandler();
                prevButtonHandler();
            }
        }

        function prevStep() {
            if (currentStep > 1) {
                hideStep(currentStep);
                currentStep--;
                showStep(currentStep);
                submitButtonHandler();
                prevButtonHandler();
            }
        }

        function showStep(step) {
            document.getElementById(`step${step}`).style.display = 'block';
        }

        function hideStep(step) {
            document.getElementById(`step${step}`).style.display = 'none';
        }

        function submitButtonHandler(){
            if  (currentStep === totalSteps){
                $('#submitButton').show()
                $('#nextButton').hide()
            }else{
                $('#submitButton').hide();
                $('#nextButton').show();
            }
        }

        function prevButtonHandler(){
            if  (currentStep > 1){
                $('#prevButton').show()
            }else{
                $('#prevButton').hide()
            }
        }
    </script>
@endpush
