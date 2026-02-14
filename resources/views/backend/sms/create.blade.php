@extends('backend.master')
@section('title', $title)
@section('style')
    <link rel="stylesheet" href="{{ url('backend/vendors/summernote/summernote-bs5.min.css') }}">
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
                    @include('backend.sms._sidebar')
                </div>
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('sms.send') }}" method="POST" enctype="multipart/form-data">
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
                                        {{ _trans('common.Message') }}
                                        <span class="text-danger">*</span>
                                    </label>
                                    <textarea name="message" class="form-control ot-input" rows="10" required>{!! old('message') !!}</textarea>
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
                height: 500
            });
        });
    </script>
@endsection
