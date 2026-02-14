@extends('backend.master')
@section('title', $title)

@section('content')
    {!! breadcrumb([
        'title' => $title,
        route('dashboard') => _trans('common.Dashboard'),
        '#' => $title,
    ]) !!}
    <div class="table-content table-basic">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('mailbox.template.store') }}" method="POST">
                   
                    @include('mailbox::template._form')
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ asset('vendors/summernote/summernote-lite.min.js') }}"></script>
    <script>
        $('.summernote').summernote({
            tabsize: 2,
            height: 500
        });
        $('#markAsPublic').change(function() {
            if (this.checked) {
                $('#message').show();
            } else {
                $('#message').hide();
            }
        });
    </script>
@endsection
