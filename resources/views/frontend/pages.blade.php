@extends('frontend.layouts.master')
@section('title', _trans('Home'))
@section('content')
    <section class="section-padding3 my-5">
        <div class="container">
            <div class="row g-24 justify-content-between">
                @if($data->image)
                    <img class="img-fluid" src="{{ @globalAsset(@$data->image->path) }}" alt="img">
                @endif
                <div class="col-xl-12 col-lg-12">
                    <div class="card about-caption border-0">
{{--                        <div class="card-header mb-30 bg-white border-0">--}}
{{--                            <h3 class="small-title text-paragraph font-700">{{ $data->title }}</h3>--}}
{{--                        </div>--}}
                        <div class="card-body mb-30">
                            @if(!empty($data->content))
                            {!! $data->content !!}
                            @else
                                <h4 class="my-5 text-center">Content not available!</h4>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
