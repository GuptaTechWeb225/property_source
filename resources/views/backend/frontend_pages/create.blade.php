@extends('backend.master')

@section('title')
    {{ @$data['pt'] }}
@endsection
@section('style')
    <link href="{{ url('frontend/css/summernote-lite.css') }}" rel="stylesheet">
@endsection


@section('content')
    <div class="page-content">
        {{-- bradecrumb Area S t a r t --}}
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h4 class="bradecrumb-title mb-1">{{ $data['pt'] }}</h1>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a
                                    href="{{ route('dashboard') }}">{{ _trans('landlord.home') }}</a></li>
                            <li class="breadcrumb-item" aria-current="page"><a
                                    href="{{ route('frontend_pages.index') }}">{{ _trans('landlord.Pages') }}</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $data['pt'] }}</li>
                        </ol>
                </div>
            </div>
        </div>
        {{-- bradecrumb Area E n d --}}
        <div class="card ot-card">
            <div class="card-body">
                @if(isset($data['page']))
                    <form action=" {{route('frontend_pages.update')}}" enctype="multipart/form-data" method="post"
                          id="visitForm">
                        <input type="hidden" name="id" value="{{isset($data['page']) ? $data['page']->id : ''}}">
                        @else
                            <form action=" {{route('frontend_pages.store')}}" enctype="multipart/form-data"
                                  method="post" id="visitForm">

                                @endif
                                @csrf
                                <div class="row mb-3 align-items-center">
                                    <div class="col-md-6 mb-3">
                                        <label for="exampleDataList" class="form-label ">{{ _trans('landlord.title') }}
                                            <span
                                                class="fillable">*</span></label>
                                        <input class="form-control ot-input @error('title') is-invalid @enderror"
                                               name="title"
                                               list="datalistOptions" id="exampleDataList"
                                               placeholder="{{ _trans('landlord.enter_title') }}"
                                               value="{{ isset($data['page']) ? $data['page']->title  : old('title') }}">
                                        @error('title')
                                        <div id="validationServer04Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label"
                                               for="inputImage">{{ _trans('landlord.image') }}</label>
                                        <div class="ot_fileUploader left-side mb-3">
                                            @error('image') <small
                                                class="text-danger"> {{ $message }} </small> @enderror
                                            <input class="form-control" type="text" readonly="" id="placeholder"
                                                   placeholder="Image">

                                            <button class="primary-btn-small-input" type="button">
                                                <label class="btn btn-lg ot-btn-primary"
                                                       for="fileBrouse">{{ _trans('landlord.browse') }}</label>
                                                <input type="file" class="d-none form-control " name="image"
                                                       id="fileBrouse"
                                                       accept="image/*" placeholder="Image">
                                            </button>
                                        </div>
                                        @error('image')
                                        <div id="validationServer04Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-3 mb-3">

                                        <label for="validationServer04"
                                               class="form-label">{{ _trans('landlord.Parent Page') }} <span
                                                class="fillable">*</span></label>

                                        <select
                                            class="nice-select niceSelect bordered_style wide @error('parent_id') is-invalid @enderror"
                                            name="parent_id" id="validationServer04">
                                            <option value="">Select One</option>
                                            @include('backend.frontend_pages.page_options', ['pages' => $data['all_pages']])
                                        </select>
                                        @error('parent_id')
                                        <div id="validationServer04Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        {{-- Status --}}
                                        <label for="validationServer04"
                                               class="form-label">{{ _trans('landlord.Show On') }} <span
                                                class="fillable">*</span></label>
                                        <select
                                            class="nice-select niceSelect bordered_style wide @error('status') is-invalid @enderror"
                                            name="show_menu" id="validationServer04"
                                            aria-describedby="validationServer04Feedback">
                                            <option value="1"
                                                    @if(isset($data['page']) &&  $data['page']->show_menu == 1) selected @endif>{{ _trans('landlord.Header Menu') }}</option>
                                            <option value="0"
                                                    @if(isset($data['page']) &&  $data['page']->show_menu == 0) selected @endif>{{ _trans('landlord.Footer Menu') }}
                                            </option>
                                        </select>
                                        @error('status')
                                        <div id="validationServer04Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror

                                    </div>

                                    <div class="col-md-3 mb-3">

                                        {{-- Status --}}
                                        <label for="validationServer04"
                                               class="form-label">{{ _trans('landlord.status') }} <span
                                                class="fillable">*</span></label>

                                        <select
                                            class="nice-select niceSelect bordered_style wide @error('status') is-invalid @enderror"
                                            name="status" id="validationServer04"
                                            aria-describedby="validationServer04Feedback">
                                            <option value="{{ App\Enums\Status::ACTIVE }}"
                                                    @if(isset($data['page']) &&  $data['page']->status == 1) selected @endif>{{ _trans('landlord.active') }}</option>
                                            <option value="{{ App\Enums\Status::INACTIVE }}"
                                                    @if(isset($data['page']) &&  $data['page']->status == 0) selected @endif>{{ _trans('landlord.inactive') }}
                                            </option>
                                        </select>
                                        @error('status')
                                        <div id="validationServer04Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror

                                    </div>

                                    <div class="col-md-3 mb-3">

                                        {{-- Serial --}}
                                        <label for="validationServer04"
                                               class="form-label">{{ _trans('landlord.serial') }} <span
                                                class="fillable">*</span></label>

                                        <select
                                            class="nice-select niceSelect bordered_style wide @error('serial') is-invalid @enderror"
                                            name="serial" id="validationServer04"
                                            aria-describedby="validationServer04Feedback">
                                            @for ($a = 1 ; $a < (($data['all_pages_count'])+2) ; $a++)
                                                <option value="{{$a}}"
                                                        @if(isset($data['page']) &&  $data['page']->serial == $a) selected @endif>{{ $a }}</option>
                                            @endfor
                                        </select>
                                        @error('serial')
                                        <div id="validationServer04Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="exampleDataList" class="form-label ">{{ _trans('landlord.Url') }}</label>
                                        <input class="form-control ot-input @error('page_url') is-invalid @enderror"
                                               name="page_url"
                                               placeholder="{{ _trans('landlord.enter here') }}"
                                               value="{{ old('page_url', @$data['page']->page_url) }}">
                                        @error('page_url')
                                        <div id="validationServer04Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="col-md-2 direction-button mb-5">
                                        <div class="input-check-radio">
                                            <div class="form-check d-flex align-items-center">
                                                <input type="hidden" value="0" name="show_testimonial">
                                                <input type="checkbox"
                                                       class="form-check-input mt-0 mr-4 read common-key"
                                                       name="show_testimonial" value="1" id="show_testimonial">
                                                <label class="custom-control-label"
                                                       for="show_testimonial">{{ _trans('common.Show Testimonial List') }}</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3 direction-button mb-5">
                                        <div class="input-check-radio">
                                            <div class="form-check d-flex align-items-center">
                                                <input type="hidden" value="0" name="show_leadership">
                                                <input type="checkbox"
                                                       class="form-check-input mt-0 mr-4 read common-key"
                                                       name="show_leadership" value="1" id="show_leadership">
                                                <label class="custom-control-label"
                                                       for="show_leadership">{{ _trans('common.Show Leadership List') }}</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label for="exampleDataList"
                                               class="form-label">{{ _trans('landlord.description') }}</label>
                                        <textarea name="content" id="content"
                                                  placeholder="{{ _trans('landlord.enter description') }}"
                                                  class="form-control mt-0 summernote @error('content') is-invalid @enderror">{{ (isset($data['page']) &&  $data['page']->content) ? $data['page']->content : old('description') }}</textarea>
                                        @error('content')
                                        <div id="validationServer04Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="col-md-12 mt-24">
                                        <div class="text-end">
                                            <button class="btn btn-lg ot-btn-primary"><span><i
                                                        class="fa-solid fa-save"></i>
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
        $(document).ready(function () {
            $('.summernote').summernote({
                tabsize: 2,
                height: 100
            });
        });
    </script>
@endsection
