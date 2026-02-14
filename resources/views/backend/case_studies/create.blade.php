@extends('backend.master')

@section('title')
    {{ @$data['title'] }}
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
                    <h4 class="bradecrumb-title mb-1">{{ $data['title'] }}</h4>
                    <ol class="breadcrumb ot-breadcrumb-secondary mb-0">
                        <li class="breadcrumb-item"><a
                                href="{{ route('dashboard') }}">{{ _trans('common.home') }}</a></li>
                        <li class="breadcrumb-item" aria-current="page"><a
                                href="{{ route('languages.index') }}">{{ _trans('common.blogs') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ _trans('common.add new') }}</li>
                    </ol>
                </div>
            </div>
        </div>
        {{-- bradecrumb Area E n d --}}

        <div class="card ot-card">
            <div class="card-body">
                <form action="{{ route('case_studies.store') }}" enctype="multipart/form-data" method="post"
                      id="visitForm" class="row mb-3">
                    @csrf

                    <x-forms.input
                        label="title"
                        name="title"
                        required="true"
                        placeholder="Case study title"
                        value="{{ old('title') }}"
                    ></x-forms.input>

                    <x-forms.file
                        label="Image"
                        name="image"
                        required="true"
                        button_title="Image"
                    ></x-forms.file>

                    <x-forms.select
                        label="status"
                        name="status"
                        required="true"
                    >
                        <option selected value="{{ App\Enums\Status::ACTIVE }}">{{ _trans('landlord.active') }}</option>
                        <option value="{{ App\Enums\Status::INACTIVE }}">{{ _trans('landlord.inactive') }}</option>
                    </x-forms.select>

                    <x-forms.textarea
                        id="summernote"
                        label="content"
                        name="content"
                        required="true"
                        placeholder="Case study title"
                        class="summernote"
                        value="{{ old('content') }}"
                    ></x-forms.textarea>

                    <div class="col-md-12 mt-3">
                        <div class="text-end">
                            <button class="btn btn-lg ot-btn-primary"><span><i class="fa-solid fa-save"></i>
                                    </span>{{ _trans('landlord.submit') }}</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ url('frontend/js/summernote-lite.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('.select2').select2();

            $('.summernote').summernote({
                tabsize: 2,
                height: 500
            });
        });
    </script>
@endsection
