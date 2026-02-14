@extends('backend.master')
@section('title', $title)

@section('content')
<div class="page-content">
    <div class="page-header">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="bradecrumb-title mb-1">{{ $title }}</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ _trans('common.home') }}</a></li>
                    <li class="breadcrumb-item">{{ $title }}</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="table-content table-basic">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('email.box.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group mb-3">
                        <label class="form-label">
                            {{ _trans('common.Recipients') }}
                            <span class="text-danger">*</span>
                        </label>
                        <select 
                            class="form-control ot-form-control ot-input select2" 
                            name="recipients[]"
                            multiple 
                            required
                        >
                            @foreach ($users ?? [] as $email => $name)
                                <option 
                                    value="{{ $email }}"
                                    {{ in_array($email, $mailbox->mailboxRecipients()->pluck('email')->toArray()) ? 'selected' : '' }}
                                >
                                    {{ $name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">
                            {{ _trans('common.CC') }}
                        </label>
                        <select 
                            class="form-control ot-form-control ot-input select2" 
                            name="cc[]"
                            multiple 
                            required
                        >
                            @foreach ($users ?? [] as $email => $name)
                                <option 
                                    value="{{ $email }}"
                                    {{ in_array($email, $mailbox->mailboxCC()->pluck('email')->toArray()) ? 'selected' : '' }}
                                >
                                    {{ $name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">
                            {{ _trans('common.Subject') }}
                            <span class="text-danger">*</span>
                        </label>
                        <input 
                            type="text" 
                            class="form-control ot-input @error('subject') is-invalid @enderror" 
                            name="subject"
                            id="subject" 
                            placeholder="{{ _trans('common.Enter subject') }}"
                            value="{{ old('subject', $mailbox->subject) }}"
                            required
                        >
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
                            <input 
                                class="form-control" 
                                type="text"
                                placeholder="{{ _trans('common.Attachment') }}" 
                                readonly="" 
                                id="placeholder"
                            >
                            <button class="primary-btn-small-input" type="button">
                                <label 
                                    class="btn btn-lg ot-btn-primary"
                                    for="attachmentBrowse">
                                    {{ _trans('common.browse') }}
                                </label>
                                <input type="file" class="d-none form-control" name="attachments[]" id="attachmentBrowse" multiple>
                            </button>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">
                            {{ _trans('common.Message') }}
                            <span class="text-danger">*</span>
                        </label>
                        <textarea name="message" class="summernote form-control ot-input" required>{!! old('message', $mailbox->message) !!}</textarea>
                        @error('message')
                            <div id="validation3" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="d-flex align-items-center justify-content-between gap-1">
                        <button type="button" onclick="permanentDelete({{ $mailbox->id }})" class="btn btn-danger">
                            <span class="fs-6">{{ _trans('common.Delete') }}</span>
                            <i class="las la-trash-alt"></i>
                        </button>
                        <button class="btn ot-btn-primary">
                            <span class="fs-6">{{ _trans('common.Send') }}</span>
                            <i class="las la-paper-plane"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection


@section('script')
    <script src="{{ url('frontend/js/summernote-lite.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2();

            $('.summernote').summernote({
                tabsize: 2,
                height: 500
            });
        });
    </script>
@endsection
