@extends('backend.master')

@section('title')
    {{ $title }}
@endsection
@section('content')
    <x-container title="{{ $title }}"
                 :breadcrumbs="[['title' => 'Time Slot', 'route' => route('backend.timeslot.index')], ['title' => 'Edit time slot']]">
        <div class="card ot-card">
            <div class="card-body">
                <form action="{{ route('backend.timeslot.update', $timeslot->id) }}" class="row" method="post">
                    @csrf
                    @method('PUT')
                    <x-forms.input
                        :required="true"
                        label="Start Time"
                        name="start_time"
                        value="{{ $timeslot->start_time }}"
                    ></x-forms.input>

                    <x-forms.input
                        :required="true"
                        label="End Time"
                        name="end_time"
                        value="{{ $timeslot->end_time }}"
                    ></x-forms.input>
                    <x-forms.input
                        label="Duration"
                        name="duration"
                        value="{{ $timeslot->duration }}"
                    ></x-forms.input>
                    <x-forms.input
                        label="Capacity"
                        name="capacity"
                        value="{{ $timeslot->capacity }}"
                    ></x-forms.input>

                    <x-forms.select
                        :required="true"
                        label="Status"
                        name="status">
                        <option {{ $timeslot->status == 'active' ? 'selected':'' }} value="active">{{ _trans('common.Active') }}</option>
                        <option {{ $timeslot->status == 'inactive' ? 'selected':'' }} value="inactive">{{ _trans('common.Inactive') }}
                    </x-forms.select>

                    <x-button></x-button>
                </form>
            </div>
        </div>
    </x-container>
@endsection


@push('script')

@endpush
