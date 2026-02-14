@extends('backend.master')
@section('title')
    {{ $title }}
@endsection
@section('content')
    <x-container title="{{ $title }}" :breadcrumbs="[['title' => 'Settings'],['title' => $title]]">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card ot-card">
                    <div class="row">
                        <form action="{{ route('message-sender') }}" method="Post" class="row">
                            @csrf
                            <x-forms.input name="number" value="{{ @old('number') }}" label="Phone Number" col="col-lg-12 mb-3"></x-forms.input>
                            <x-forms.textarea name="message" value="{{ @old('message') }}" label="Message" col="col-lg-12 mb-3"></x-forms.textarea>

                            <x-button></x-button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </x-container>
@endsection
