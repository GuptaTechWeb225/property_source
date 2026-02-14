@extends('backend.master')
@section('title', @$title)
@php
    $model = 'properties.categories';
@endphp
@section('content')
    <x-container title="{{ $title }}" :breadcrumbs="[['title' => 'Property'],['title' => $title]]">
        <div class="card ot-card">
            <div class="card-body">
                <form action="{{ route($model.'.update', $category->id) }}" enctype="multipart/form-data" method="post" class="row" id="visitForm">
                    @csrf
                    @method('put')
                    <x-forms.input
                        label="Name"
                        name="name"
                        value="{{ $category->name }}"
                    ></x-forms.input>
                    <x-forms.select label="Parent Category" name="parent_id">
                        <option value="">{{ _trans('common.Select One') }}</option>
                        @foreach($parents as $parent)
                            <option {{ $category->id  = $parent->id ? 'selected' : '' }} value="{{ $parent->id }}">{{ $parent->name }}</option>
                        @endforeach
                    </x-forms.select>

                    <x-forms.file
                        accept="jpeg, png, jpg"
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
                            value="{{ $category->icon_class }}"
                        ></x-forms.input>
                        <span>{{ _trans('landlord.See more icon') }}
                            <a href="https://remixicon.com/" class="text-info" target="_blank">https://remixicon.com/</a>
                        </span>
                    </div>
                    <x-forms.select label="Status" name="status">
                        <option {{ $category->status == 'active' ? 'selected': '' }} value="active">{{ _trans('common.Active') }}</option>
                        <option {{ $category->status == 'inactive' ? 'selected': '' }} value="inactive">{{ _trans('common.Inactive') }}</option>
                    </x-forms.select>

                    <x-forms.switch value="{{ $category->is_featured }}" label="Is featured" name="is_featured" col="col-lg-6 mt-5"></x-forms.switch>

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
                    <input type="hidden" id="counter" name="counter" value="{{count($category->documents) +1}}">


                    @if($category->documents)
                        @foreach ($category->documents as $key => $document)
                        <div class="row mt-4">
                            <input type="hidden" name="ids[]" value="{{$document->id}}">
                            <h5> Document {{$key+1}} </h5>
                                <div class="col-md-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input class="form-control  ot-input " name="doc_name[]" placeholder="Enter Name" type="text" value="{{$document->name}}">
                                </div>
                                <div class="col-md-3">
                                    <label for="name" class="form-label">Label</label>
                                    <input class="form-control  ot-input " name="doc_label[]"  placeholder="Enter Label" type="text" value="{{$document->label}}">
                                </div>

                            <div class="col-md-6">
                                <label for="name" class="form-label">Placeholder</label>
                                <input class="form-control  ot-input " name="doc_placeholder[]"   placeholder="Enter Placeholder" type="text" value="{{$document->placeholder}}">
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-4">
                                <label for="name" class="form-label">File Type</label>
                                <select class="form-control ot-input" name="doc_file_type[]" >
                                    <option @if($document->file_type == "text") selected @endif value ="text">Text Input</option>
                                    <option @if($document->file_type == "file") selected @endif value ="file">File</option>
                                    <option @if($document->file_type == "textarea") selected @endif value ="textarea">Textarea</option>
                                    <option @if($document->file_type == "datepicker") selected @endif value ="datepicker">Datepicker</option>
                                    <option @if($document->file_type == "switch") selected @endif value ="switch">Switch</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="name" class="form-label">File Validation</label>
                                <select class="form-control  ot-input " name="doc_is_required[]" >
                                    <option @if($document->is_required == 1) selected @endif value ="1">Required</option>
                                    <option @if($document->is_required == 0) selected @endif value ="0">Optional</option>
                                </select>
                            </div>

                            <div class="col-md-4">
                                <label for="name" class="form-label">{{_trans('common.status')}}</label>
                                <select class="form-control  ot-input " name="doc_active_status[]" >
                                    <option @if($document->active_status == 1) selected @endif value ="1">Active</option>
                                    <option @if($document->active_status == 0) selected @endif value ="0">InActive</option>
                                </select>
                            </div>
                        </div>
                        @endforeach

                    @endif

                    <div class="new_doc_area mt-4">

                    </div>
                    <hr>


                    {{-- @foreach ($category->documents as $document)
                        <x-forms.file
                        col="col-lg-6 mb-3"
                        required="{{$document->is_required}}"
                        label="{{$document->label}}"
                        name="custom_doc[{{$document->name}}]"
                        accept="image/*,.pdf"
                        value="{{ old($document->name) }}">
                     </x-forms.file>
                    @endforeach --}}

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
            `
            <div class="row mt-3">
                <h5> Document ${counter} </h5>
                    <div class="col-md-3">
                        <label for="name" class="form-label">Name</label>
                        <input class="form-control  ot-input " name="doc_name[${counter}]" value="" placeholder="Enter Name" type="text">
                    </div>
                    <div class="col-md-3">
                        <label for="name" class="form-label">Label</label>
                        <input class="form-control  ot-input " name="doc_label[${counter}]" value=""  placeholder="Enter Label" type="text">
                    </div>

                <div class="col-md-6">
                    <label for="name" class="form-label">Placeholder</label>
                    <input class="form-control  ot-input " name="doc_placeholder[${counter}]" value=""  placeholder="Enter Placeholder" type="text">
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-6">
                    <label for="name" class="form-label">File Type</label>
                    <select class="form-control ot-input" name="doc_file_type[${counter}]" value="" >
                        <option  value ="text">Text Input</option>
                        <option  value ="file">File</option>
                        <option  value ="textarea">Textarea</option>
                        <option  value ="datepicker">Datepicker</option>
                        <option  value ="switch">Switch</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="name" class="form-label">File Validation</label>
                    <select class="form-control  ot-input " name="doc_is_required[${counter}]" value="" >
                        <option  value ="1">Required</option>
                        <option  value ="0" selected>Optional</option>
                    </select>
                </div>
            </div>
            `
        ;

        $(".new_doc_area").append(newForm);
        $("#counter").val(counter +1)

    }
</script>
@endpush
