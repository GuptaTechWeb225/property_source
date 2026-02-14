@extends('frontend.layouts.master')

@section('content')

    <!-- faq_area::start  -->
    <div class="faq_area section_spacing6">
        <div class="container">
            <!-- content  -->
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-7">
                    <h3 class="font_30 f_w_700 mb_35">{{ _trans('landlord.Frequently Asked Questions') }}</h3>
                    <div class="theme_according mb_30" id="accordion1">
                        @foreach($faqs as $faq)
                            <div class="card">
                                <div class="card-header pink_bg" id="heading{{ $faq->id }}">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link text_white collapsed" data-bs-toggle="collapse"
                                                data-bs-target="#collapse{{ $faq->id }}" aria-expanded="false"
                                                aria-controls="collapse{{ $faq->id }}">{{ $faq->title }}
                                        </button>
                                    </h5>
                                </div>
                                <div class="collapse" id="collapse{{ $faq->id }}"
                                     aria-labelledby="heading{{ $faq->id }}" data-parent="#accordion1">
                                    <div class="card-body">
                                        {!! $faq->description !!}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
