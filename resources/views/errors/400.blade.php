@extends('errors.master')

@section('title', 'Error Page 400')
@section('main')
<main>
    <section
      class="error-wrapper bg-white p-0 m-0 text-center d-flex justify-content-center align-items-center flex-column"
    >
      <div
        class="error-content p-0 m-0 text-center d-flex justify-content-center align-items-center flex-column"
      >
        <!-- error 404 image  -->
        <img src="{{asset('backend')}}/assets/images/error/error500.png" alt="" />
        <!-- Head text  -->
        <h1 class="mt-30">400! Database Connection error</h1>
        <!-- Error text   -->
        <p class="mt-10">
          Please check database connection and tables !
        </p>
        <!-- Back to homepage button  -->
        <div class="btn-back-to-homepage mt-28">
            <a href="{{url('dashboard')}}" class="submit-button pv-16  btn ot-btn-primary">
              Back to Homepage
            </a>
            @if(env('APP_ENV')=="local")
            <a href="{{url('i-am-sure-to-reset-my-database')}}" class="submit-button pv-16  btn ot-btn-primary">
              Reset Database
            </a>
            @endif 
          </div>
      </div>
    </section>
  </main>
  @endsection