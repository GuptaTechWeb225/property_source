@extends('backend.master')
@section('style')
    <link href="{{ url('frontend/css/summernote-lite.css') }}" rel="stylesheet">
@endsection
@section('title')
    {{ @$data['title'] }}
@endsection
@section('content')
    <div class="page-content">
        {{-- bradecrumb Area S t a r t --}}
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h4 class="bradecrumb-title mb-1">{{ $data['title'] }}</h1>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ _trans('landlord.home') }}</a></li>
                            <li class="breadcrumb-item" aria-current="page"><a
                                    href="{{ route('hero-sections.index') }}">{{ _trans('landlord.hero section') }}</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{ _trans('landlord.add new') }}</li>
                        </ol>
                </div>
            </div>
        </div>
        {{-- bradecrumb Area E n d --}}
        <div class="card ot-card">
            <div class="card-body">
                <form action="{{ route('hero-sections.store') }}" enctype="multipart/form-data" method="post"
                    id="visitForm">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-6 mb-3">
                            <label for="exampleDataList" class="form-label ">{{ _trans('landlord.title') }} <span
                                    class="fillable">*</span></label>
                            <input class="form-control ot-input @error('title') is-invalid @enderror" name="title"
                                list="datalistOptions" id="exampleDataList" placeholder="{{ _trans('landlord.enter_title') }}" value="{{ old('title') }}">
                            @error('title')
                                <div id="validationServer04Feedback" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="exampleDataList" class="form-label ">{{ _trans('landlord.highlight title one') }} <span
                                    class="fillable">*</span></label>
                            <input class="form-control ot-input @error('highlight_title_one') is-invalid @enderror" name="highlight_title_one"
                                list="datalistOptions" id="exampleDataList1"
                                placeholder="{{ _trans('landlord.highlight title one') }}" value="{{ old('highlight_title_one') }}">
                            @error('highlight_title_one')
                                <div id="validationServer04Feedback1" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="exampleDataList" class="form-label ">{{ _trans('landlord.highlight title two') }}</label>
                            <input class="form-control ot-input @error('highlight_title_two') is-invalid @enderror" name="highlight_title_two"
                                list="datalistOptions" id="exampleDataList" placeholder="{{ _trans('landlord.highlight title two') }}" value="{{ old('highlight_title_two') }}">
                            @error('highlight_title_two')
                                <div id="validationServer04Feedback" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="exampleDataList" class="form-label ">{{ _trans('landlord.btn one link') }} <span
                                    class="fillable">*</span></label>
                            <input class="form-control ot-input @error('btn_one') is-invalid @enderror" name="btn_one"
                                list="datalistOptions" id="exampleDataList" placeholder="{{ _trans('landlord.link') }}" value="{{ old('btn_one') }}">
                            @error('btn_one')
                                <div id="validationServer04Feedback" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="exampleDataList" class="form-label ">{{ _trans('landlord.btn two') }}</label>
                            <input class="form-control ot-input @error('btn_two') is-invalid @enderror" name="btn_two"
                                list="datalistOptions" id="exampleDataList" placeholder="{{ _trans('landlord.btn two') }}" value="{{ old('btn_two') }}">
                            @error('btn_two')
                                <div id="validationServer04Feedback" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            {{-- File Uplode --}}
                            <label class="form-label" for="inputImage">{{ _trans('landlord.image') }}</label>
                            <div class="ot_fileUploader left-side mb-3">
                                @error('image') <small class="text-danger"> {{ $message }} </small> @enderror
                                <input class="form-control" type="text" readonly="" id="placeholder" placeholder="Image">

                                <button class="primary-btn-small-input" type="button">
                                    <label class="btn btn-lg ot-btn-primary"
                                        for="fileBrouse">{{ _trans('landlord.browse') }}</label>
                                    <input type="file" class="d-none form-control " name="image" id="fileBrouse"
                                        accept="image/*" placeholder="Image">
                                </button>
                            </div>
                            @error('image')
                                <div id="validationServer04Feedback" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="exampleDataList" class="form-label ">{{ _trans('landlord.description') }}</label>
                                    <textarea name="description" id="description" placeholder="{{ _trans('landlord.enter description') }}" class="form-control summernote mt-0 @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                            @error('description')
                                <div id="validationServer04Feedback" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror


                        </div>
                        <div class="col-md-12 mb-3">

                            {{-- Status --}}
                            <label for="validationServer04" class="form-label">{{ _trans('landlord.status') }} <span
                                    class="fillable">*</span></label>

                            <select class="nice-select niceSelect bordered_style wide @error('status') is-invalid @enderror"
                                name="status" id="validationServer04" aria-describedby="validationServer04Feedback">

                                <option value="{{ App\Enums\Status::ACTIVE }}">{{ _trans('landlord.active') }}</option>
                                <option value="{{ App\Enums\Status::INACTIVE }}">{{ _trans('landlord.inactive') }}
                                </option>
                            </select>
                            @error('status')
                                <div id="validationServer04Feedback" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>
                        <div class="col-md-12 mt-24">
                            <div class="text-end">
                                <button class="btn btn-lg ot-btn-primary"><span><i class="fa-solid fa-save"></i>
                                    </span>{{ _trans('landlord.submit') }}</button>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ url('frontend/js/summernote-lite.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.summernote').summernote({
                tabsize: 2,
                height: 200
            });
        });
    </script>
@endsection
