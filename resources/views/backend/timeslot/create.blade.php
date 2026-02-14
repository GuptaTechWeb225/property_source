@extends('backend.master')

@section('title')
    {{ $title }}
@endsection
@section('content')
    <x-container title="{{ $title }}"
                 :breadcrumbs="[['title' => 'Time slot', 'route' => route('backend.timeslot.index')], ['title' => 'Add New']]">
        <div class="card ot-card">
            <div class="card-body">
                <form action="{{ route('backend.timeslot.store') }}" class="row" method="post">
                    @csrf
                    <x-forms.input
                        :required="true"
                        label="Start Time"
                        name="start_time"
                    ></x-forms.input>

                    <x-forms.input
                        :required="true"
                        label="End Time"
                        name="end_time"
                    ></x-forms.input>
                    <x-forms.input
                        label="Duration"
                        name="duration"
                    ></x-forms.input>
                    <x-forms.input
                        label="Capacity"
                        name="capacity"
                    ></x-forms.input>

                    <x-forms.select
                        :required="true"
                        label="Status"
                        name="status">
                        <option selected value="active">{{ _trans('common.Active') }}</option>
                        <option value="inactive">{{ _trans('common.Inactive') }}
                    </x-forms.select>

                    <x-button></x-button>
                </form>
            </div>
        </div>
    </x-container>
@endsection


@push('script')

@endpush
