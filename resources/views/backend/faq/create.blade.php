@extends('backend.master')
@push('styles')
    <link rel="stylesheet" href="{{ url('frontend/css/summernote-lite.css') }}">
@endpush
@section('title')
    {{ $title }}
@endsection

@section('content')
    <x-container title="{{ $title }}"
                 :breadcrumbs="[['title' => 'Home Page'], ['title' => 'Faqs', 'route' => route('faq.index')], ['title' => 'Faq Create']]">
        <div class="card ot-card">
            <div class="card-body">
                <form action="{{ route('faq.store') }}" class="row" method="post">
                    @csrf

                    <x-forms.input
                        :required="true"
                        label="Title"
                        name="title"
                    ></x-forms.input>

                    <x-forms.select :required="true" label="Status" name="status">
                        <option selected value="active">{{ _trans('common.Active') }}</option>
                        <option value="inactive">{{ _trans('common.Inactive') }}</option>
                    </x-forms.select>

                    <x-forms.input
                        type="number"
                        label="Serial"
                        name="serial"
                        value="{{ $serial }}"
                    ></x-forms.input>

                    <x-forms.textarea id="content" label="Description" class="summernote" name="description"></x-forms.textarea>
                    <x-button title="Submit"></x-button>
                </form>
            </div>
        </div>
    </x-container>

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
