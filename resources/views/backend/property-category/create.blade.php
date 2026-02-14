@extends('backend.master')
@section('title', @$title)
@php
    $model = 'properties.categories';
@endphp
@section('content')
    <x-container title="{{ $title }}" :breadcrumbs="[['title' => 'Property'],['title' => $title]]">
        <div class="card ot-card">
            <div class="card-body">
                <form action="{{ route($model.'.store') }}" enctype="multipart/form-data" method="post" class="row" id="visitForm">
                    @csrf
                    <x-forms.input
                        :required="true"
                        label="Name"
                        name="name"
                    ></x-forms.input>
                    <x-forms.select label="Parent Category" name="parent_id">
                        <option value="">{{ _trans('common.Select One') }}</option>
                        @foreach($parents as $parent)
                            <option value="{{ $parent->id }}">{{ $parent->name }}</option>
                        @endforeach
                    </x-forms.select>

                    <x-forms.file
                        accept="image/png, image/jpeg, image/jpg"
                        label="Image"
                        name="image"
                    ></x-forms.file>
                    <div class="col-lg-6">
                        <x-forms.input
                            col="col-lg-12"
                            :required="true"
                            label="Icon"
                            name="icon_class"
                            placeholder="Enter icon class ex: ri-community-line"
                        ></x-forms.input>
                        <span>{{ _trans('landlord.See more icon') }}
                            <a href="https://remixicon.com/" class="text-info" target="_blank">https://remixicon.com/</a>
                        </span>
                    </div>

                    <x-forms.select label="Status" name="status">
                        <option value="active">{{ _trans('common.Active') }}</option>
                        <option value="inactive">{{ _trans('common.Inactive') }}</option>
                    </x-forms.select>

                    <x-forms.switch label="Is featured" name="is_featured" col="col-lg-6 mt-5 mb-3"></x-forms.switch>
                    <hr>
                    <div class="col-md-12">
                        <div class="d-flex align-items-center gap-4 flex-wrap">
                            <h5 class="m-0 flex-fill">
                                New Document
                            </h5>
                            <hr>
                            <button type="button" class="btn btn-lg ot-btn-primary radius_30px small_add_btn" onclick="addNewDocument()">
                                <span><i class="fa-solid fa-plus"></i> </span>
                                Add New Document</button>
                        </div>
                    </div>
                    <input type="hidden" id="counter" name="counter" value="1">

                    <div class="new_doc_area">

                    </div>

                    <x-button></x-button>
                </form>
            </div>
        </div>
    </x-container>
@endsection

@push('script')
<script>
    function addNewDocument(){
        var counter = parseInt($("#counter").val());
        var newForm =
            `<div id="full_document_area-${counter}">
                <h5> Document ${counter} </h5>
            <div class="row mt-3">
                    <div class="col-md-3">
                        <label for="name" class="form-label">Name</label>
                        <input class="form-control  ot-input " name="doc_name[]" value="" placeholder="Enter Name" type="text">
                    </div>
                    <div class="col-md-3">
                        <label for="name" class="form-label">Label</label>
                        <input class="form-control  ot-input " name="doc_label[]" value=""  placeholder="Enter Label" type="text">
                    </div>

                <div class="col-md-6">
                    <label for="name" class="form-label">Placeholder</label>
                    <input class="form-control  ot-input " name="doc_placeholder[]" value=""  placeholder="Enter Placeholder" type="text">
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-6">
                    <label for="name" class="form-label">File Type</label>
                    <select class="form-control ot-input" name="doc_file_type[]" value="" >
                        <option  value ="text">Text Input</option>
                        <option  value ="file">File</option>
                        <option  value ="textarea">Textarea</option>
                        <option  value ="datepicker">Datepicker</option>
                        <option  value ="switch">Switch</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="name" class="form-label">File Validation</label>
                    <select class="form-control  ot-input " name="doc_is_required[]" value="" >
                        <option  value ="1">Required</option>
                        <option  value ="0" selected>Optional</option>
                    </select>
                </div>
            </div>
            <button type="button" class="btn btn-lg ot-btn-danger radius_30px small_add_btn mt-4" onclick="RemoveDocument(${counter})">
                                <span><i class="fa-solid fa-trash"></i> </span>
                                Remove</button>
            </div>
            `
        ;

        $(".new_doc_area").append(newForm);
        $("#counter").val(counter +1);
    }

    function RemoveDocument(id){
        $("#full_document_area-" +id).remove();
    }
</script>
@endpush
