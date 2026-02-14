@extends('backend.master')
@section('title', $title)

@section('content')
<div class="page-content">
    <div class="page-header">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="bradecrumb-title mb-1">{{ $title }}</h4>
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
                <div class="d-flex flex-column">
                    <div class="d-flex flex-column gap-3 border-b">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="d-flex align-items-center gap-3">
                                    <a href="{{ route('email.box.index') }}" class="btn btn-light">
                                        <i class="las la-arrow-left fs-4"></i>
                                    </a>
                                    <h5 class="fs-3 fw-bold mt-1 pt-1">
                                        @if ($mailbox->parent_id == null)
                                            {{ $mailbox->subject }}
                                        @else
                                            {{ $mailbox['parent']->subject }}
                                        @endif
                                    </h5>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                @if (count($mailbox->mailboxAttachments))
                                    <div class="d-flex flex-wrap gap-2 fw-semibold">
                                        @foreach ($mailbox->mailboxAttachments as $attachment)
                                            <small>
                                                <a class="d-flex align-items-center gap-1 bg-light px-2 py-1 rounded"
                                                    href="{{ asset($attachment->path) }}" download="">
                                                    <i class="las la-paperclip"></i>
                                                    {{ _trans('common.attachment') }} {{ $loop->iteration }}
                                                </a>
                                            </small>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="d-flex align-items-center gap-1">
                            <i class="las la-calendar fs-4"></i>
                            {{ date('Y-m-d h:i:s A', strtotime($mailbox->created_at)) }}
                        </div>
                    </div>
                    <p class="mt-3"><span class="fw-bold">{{ _trans('common.Message') }} :</span>
                        @if (is_null($mailbox['parent']))
                            {!! $mailbox->message ?? '' !!}
                        @else
                            {!! $mailbox['parent']->message ?? '' !!}
                        @endif
                    </p>
                    <hr>
                    <div class="d-flex flex-column gap-3">
                        @foreach ($mailbox->childrens as $children)
                            <div class="row">
                                <div class="col-lg-8">
                                    <span class="fw-bold">
                                        {{ _trans('common.Name') }} : {{ $children->createdByUser->name }}
                                    </span>
                                    <h6 class="font-monospace"><i
                                            class="las la-reply"></i>&nbsp;{{ $children->subject }} <i
                                            class="las la-calendar fs-4"></i>
                                        {{ date('Y-m-d h:i:s A', strtotime($children->created_at)) }}

                                        @if (@$children->status && $children->status == "draft" )
                                            <button class="btn btn-primacy">Send</button>
                                        @endif
                                    </h6>
                                    <span>{{ _trans('common.To:') }}
                                        @foreach ($children->mailboxRecipients as $key => $item)
                                            <a href="#">{{ $item->email }}</a>
                                            @if (!$loop->last)
                                                <a href="#">,&nbsp;</a>
                                            @endif
                                        @endforeach
                                    </span> <br> <br>
                                    <p class="text-muted">{!! $children->message !!} </p>
                                </div>
                                <div class="col-lg-4">
                                    @if (count($children->mailboxAttachments))
                                        <div class="d-flex flex-wrap gap-2 text-capitalize fw-semibold">
                                            @foreach ($children->mailboxAttachments as $attachment)
                                                <small>
                                                    <a class="d-flex align-items-center gap-1 bg-light px-2 py-1 rounded"
                                                        href="{{ asset($attachment->path) }}" download="">
                                                        <i class="las la-paperclip"></i>
                                                        {{ _trans('common.attachment') }} {{ $loop->iteration }}
                                                    </a>
                                                </small>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <hr>
                        @endforeach
                    </div>
                </div>

                <form action="{{ route('email.box.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="reply" value="reply" readonly>
                    <input type="hidden" name="mail_box_id" value="{{ $mailbox->id }}" readonly>

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
                                <option value="{{ $email }}">{{ $name }}</option>
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
                                <option value="{{ $email }}">{{ $name }}</option>
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
                            value="{{ old('subject') }}"
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
                        <textarea name="message" class="summernote form-control ot-input" required>{!! old('message') !!}</textarea>
                        @error('message')
                            <div id="validation3" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="d-flex align-items-center justify-content-between gap-1">
                        <a
                            href="{{ url('email/box') }}"
                            class="btn btn-secondary"
                        >
                            <i class="las la-arrow-left"></i>
                            <span class="fs-6">{{ _trans('common.Back') }}</span>
                        </a>
                        <div class="d-flex align-items-center gap-1">
                            <button name="submit_action" value="draft" class="btn btn-light">
                                <span class="fs-6">{{ _trans('common.Save as draft') }}</span>
                                <i class="las la-save"></i>
                            </button>
                            <button name="submit_action" value="sent" class="btn ot-btn-primary send-btn">
                                <span class="fs-6">{{ _trans('common.Send') }}</span>
                                <i class="las la-paper-plane"></i>
                            </button>
                        </div>
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
