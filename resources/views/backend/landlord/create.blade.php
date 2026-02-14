@extends('backend.master')

@section('title')
    {{ $title }}
@endsection

@section('content')
    <x-container title="{{ $title }}"
                 :breadcrumbs="[['title' => 'Landlords', 'route' => route('landlord.index')], ['title' => 'Add New']]">
        <div class="card ot-card">
            <h2 class="mb-0">{{ $title }}</h2>

            <form action="{{ route('landlord.store') }}" enctype="multipart/form-data" method="post" id="visitForm"
                  class="row mt-5">
                @csrf
                <input type="hidden" name="role" value="4">
                <x-forms.input :required="true" name="name" value="{{ @old('name') }}"
                               label="Name"></x-forms.input>
                <x-forms.input :required="true" type="email" value="{{ @old('email') }}" name="email"
                               label="Email"></x-forms.input>
                <x-forms.input :required="true" name="phone" value="{{ @old('phone') }}"
                               label="Phone"></x-forms.input>
                <x-forms.file id="fileBrouse" file_id="placeholder" name="image"
                              label="Profile Photo"></x-forms.file>
                <x-forms.input :required="true" type="password" name="password" label="Password"></x-forms.input>

                <x-forms.select name="status" label="Status">
                    <option value="{{ App\Enums\Status::ACTIVE }}">{{ _trans('common.active') }}
                    </option>
                    <option value="{{ App\Enums\Status::INACTIVE }}">{{ _trans('common.inactive') }}
                    </option>
                </x-forms.select>

                <div class="col-lg-12 mb-3">
                    <x-button></x-button>
                </div>
            </form>
        </div>
    </x-container>
@endsection
@push('script')
@endpush
