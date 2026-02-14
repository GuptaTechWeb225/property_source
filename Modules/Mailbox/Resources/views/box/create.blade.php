@extends('backend.master')
@section('title', $title)
@section('style')
    <link rel="stylesheet" href="{{ url('backend/vendors/summernote/summernote-bs5.min.css') }}">
{{--    <style>--}}
{{--        .note-modal .modal-dialog {--}}
{{--            z-index: 123456;--}}
{{--            position: relative;--}}
{{--        }--}}
{{--    </style>--}}
@endsection
@section('content')
    <div class="page-content">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h4 class="bradecrumb-title mb-1">{{ $title }}</h1>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ _trans('common.home') }}</a>
                            </li>
                            <li class="breadcrumb-item">{{ $title }}</li>
                        </ol>
                </div>
            </div>
        </div>
        <div class="table-content table-basic">
            <div class="row">
                <div class="col-md-2">
                    @include('mailbox::box._sidebar')
                </div>
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('email.box.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group mb-3">
                                    <label class="form-label">
                                        {{ _trans('common.Recipients') }}
                                        <span class="text-danger">*</span>
                                    </label>
                                    <select class="form-control ot-form-control ot-input select2" name="recipients[]"
                                        multiple required>
                                        @foreach ($users ?? [] as $email => $name)
                                            <option value="{{ $email }}">{{ $name }} ({{ $email }})
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">
                                        {{ _trans('common.CC') }}
                                    </label>
                                    <select class="form-control ot-form-control ot-input select2" name="cc[]" multiple>
                                        @foreach ($users ?? [] as $email => $name)
                                            <option value="{{ $email }}">{{ $name }} ({{ $email }})
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">
                                        {{ _trans('common.Subject') }}
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text"
                                        class="form-control ot-input @error('subject') is-invalid @enderror" name="subject"
                                        id="subject" placeholder="{{ _trans('common.Enter subject') }}"
                                        value="{{ old('subject') }}" required>
                                    @error('subject')
                                        <div id="validation3" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">
                                        {{ _trans('common.Attachment') }}
                                    </label>
                                    <div class="ot_fileUploader left-side mb-3">
                                        <input class="form-control" type="text"
                                            placeholder="{{ _trans('common.Attachment') }}" readonly=""
                                            id="placeholder">
                                        <button class="primary-btn-small-input" type="button">
                                            <label class="btn btn-lg ot-btn-primary" for="attachmentBrowse">
                                                {{ _trans('common.browse') }}
                                            </label>
                                            <input type="file" class="d-none form-control" name="attachments[]"
                                                id="attachmentBrowse" multiple>
                                        </button>
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">
                                        {{ _trans('common.Message') }}
                                        <span class="text-danger">*</span>
                                    </label>
                                    <textarea name="message" class="summernote form-control ot-input" required>{!! old('message') !!}</textarea>
                                    @error('message')
                                        <div id="validation3" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="text-end">
                                    <button type="submit" class="btn btn-lg ot-btn-primary">
                                        {{ _trans('common.Send') }}
                                        <i class="las la-paper-plane"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('script')
    <script src="{{ url('backend/vendors/summernote/summernote-bs5.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2();

            $('.summernote').summernote({
                tabsize: 2,
                height: 500,
                dialogsInBody: true,
            });
        });
    </script>
@endsection
