@extends('backend.master')

@section('title')
    {{ $title }}
@endsection
@section('content')
    <x-container title="{{ $title }}"
                 :breadcrumbs="[['title' => 'Landlords', 'route' => route('landlord.index')], ['title' => 'Landlord Edit']]">
        <div class="card ot-card">
            <form action="{{ route('landlord.update', $landlord->id) }}" enctype="multipart/form-data" method="post"
                  id="visitForm" class="row">
                @csrf
                @method('put')
                <input type="hidden" name="role" value="4">
                <x-forms.input :required="true" name="name" value="{{ $landlord->name }}"
                               label="Name"></x-forms.input>
                <x-forms.input :required="true" type="email" value="{{ $landlord->email }}" name="email"
                               label="Email"></x-forms.input>
                <x-forms.input :required="true" name="phone" value="{{ $landlord->phone }}"
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

                <x-button></x-button>

            </form>
        </div>
    </x-container>
@endsection
