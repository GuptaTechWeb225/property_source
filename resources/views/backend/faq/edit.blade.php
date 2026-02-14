@extends('backend.master')

@section('title')
    {{ $title }}
@endsection

@section('content')
    <x-container title="{{ $title }}" :breadcrumbs="[['title' => 'Home Page'], ['title' => 'Faqs', 'route' => route('faq.index')], ['title' => 'Faq edit']]">
        <div class="card ot-card">
            <div class="card-body">
                <form action="{{ route('faq.update', $faq->id) }}" class="row" method="post">
                    @csrf
                    @method('put')
                    <x-forms.input
                        :required="true"
                        label="Title"
                        name="title"
                        value="{{ $faq->title }}"
                    ></x-forms.input>

                    <x-forms.select :required="true" label="Status" name="status">
                        <option {{ $faq->status == 'active' ? 'selected' : '' }} value="active">{{ _trans('common.Active') }}</option>
                        <option {{ $faq->status == 'inactive' ? 'selected' : '' }} value="inactive">{{ _trans('common.Inactive') }}</option>
                    </x-forms.select>

                    <x-forms.input
                        type="number"
                        label="Serial"
                        name="serial"
                        value="{{ $faq->serial }}"
                    ></x-forms.input>

                    <x-forms.textarea id="content" label="Description" class="summernote" name="description" value="{{ $faq->description }}"></x-forms.textarea>

                    <x-button title="Update"></x-button>
                </form>
            </div>
        </div>
    </x-container>

@endsection
