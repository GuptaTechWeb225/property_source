@extends('backend.master')
@push('styles')
    <style>
        .book_viewing{
            display: none;
        }
    </style>
@endpush
@section('title')
    {{ $title }}
@endsection
@section('content')
    <x-container title="{{ $title }}"
                 :breadcrumbs="[['title' => 'Appointment', 'route' => route('backend.appointment.index')], ['title' => 'Add New']]">
        <div class="card ot-card">
            <div class="card-body">
                <form action="{{ route('backend.appointment.store') }}" class="row" method="post">
                    @csrf
                    <x-forms.select
                        id="appointment_type"
                        :required="true"
                        label="Type"
                        name="type">
                        <option value="free_evaluation" selected>{{ _trans('common.Book Free Evaluation') }}</option>
                        <option value="book_viewing">{{ _trans('common.Book Viewing') }}
                    </x-forms.select>

                    <x-forms.input
                        :required="true"
                        label="Name"
                        name="name"
                    ></x-forms.input>

                    <x-forms.input
                        :required="true"
                        label="Email"
                        name="email"
                    ></x-forms.input>

                    <x-forms.input
                        :required="true"
                        label="Phone"
                        name="phone"
                    ></x-forms.input>
                    <x-forms.input
                        :required="true"
                        type="date"
                        label="Date"
                        name="date"
                    ></x-forms.input>

                    <div class="book_viewing row mb-3">
                        <x-forms.select
                            class="mb-3"
                            label="Property"
                            name="property_id">
                            @foreach($properties as $property)
                                <option value="{{ $property->id }}">{{ $property->name }}</option>
                            @endforeach
                        </x-forms.select>

                        <div class="row flex-wrap ">
                            <label for="">{{ _trans('common.Time Slot') }}</label>
                            @foreach($timeslots ?? [] as $time_slot)
                                <div class="col-lg-3">
                                    <div class="slot mb-1">
                                        <label for="slotId{{$time_slot}}" class="btn btn-sm btn-light w-100 text-start">
                                            <input type="radio" value="{{ $time_slot->id }}"
                                                   name="time_slot_id" id="slotId{{$time_slot}}">
                                            {{ $time_slot->start_time }} - {{ $time_slot->end_time }}
                                        </label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="free_evaluation row">
                        <x-forms.input
                            :required="true"
                            label="Property Address"
                            name="property_address"
                        ></x-forms.input>

                        <x-forms.select
                            col="col-lg-3 mb-3"
                            label="Property Type"
                            name="property_type">
                            <option value="letting">{{ _trans('common.Letting') }}</option>
                            <option value="sales">{{ _trans('common.Sales') }}
                        </x-forms.select>

                        <x-forms.input
                            col="col-lg-3 mb-3"
                            type="time"
                            label="Time"
                            name="time"
                        ></x-forms.input>

                        <x-forms.textarea
                            label="Message"
                            name="message"
                        ></x-forms.textarea>
                    </div>
                    <x-button></x-button>
                </form>
            </div>
        </div>
    </x-container>
@endsection


@push('script')
    <script>
        $(document).ready(function () {
            $('#appointment_type').change(function () {
                if ($(this).val() === 'book_viewing') {
                    $('.book_viewing').show();
                    $('.free_evaluation').hide();
                } else {
                    $('.book_viewing').hide();
                    $('.free_evaluation').show();
                }
            });
        });
    </script>
@endpush
