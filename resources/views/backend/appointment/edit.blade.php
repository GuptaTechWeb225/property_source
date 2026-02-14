@extends('backend.master')
@push('styles')
    <style>
        .book_viewing{
            display: none;
        }
        .free_evaluation{
            display: none;
        }
    </style>
@endpush
@section('title')
    {{ $title }}
@endsection
@section('content')
    <x-container title="{{ $title }}"
                 :breadcrumbs="[['title' => 'Appointment', 'route' => route('backend.appointment.index')], ['title' => 'Edit Appointment']]">
        <div class="card ot-card">
            <div class="card-body">
                <form action="{{ route('backend.appointment.update', $appointment->id) }}" class="row" method="post">
                    @csrf
                    @method('PUT')
                    <x-forms.select
                        id="appointment_type"
                        :required="true"
                        label="Type"
                        name="type">
                        <option {{ $appointment->type == 'free_evaluation' ? 'selected' : '' }}  value="free_evaluation">{{ _trans('common.Book Free Evaluation') }}</option>
                        <option {{ $appointment->type == 'book_viewing' ? 'selected' : '' }} value="book_viewing">{{ _trans('common.Book Viewing') }}
                    </x-forms.select>

                    <x-forms.input
                        :required="true"
                        label="Name"
                        name="name"
                        value="{{ $appointment->name }}"
                    ></x-forms.input>

                    <x-forms.input
                        :required="true"
                        label="Email"
                        name="email"
                        value="{{ $appointment->email }}"
                    ></x-forms.input>

                    <x-forms.input
                        :required="true"
                        label="Phone"
                        name="phone"
                        value="{{ $appointment->phone }}"
                    ></x-forms.input>
                    <x-forms.input
                        col="col-lg-6 mb-3"
                        type="date"
                        label="Date"
                        name="date"
                        value="{{ $appointment->date }}"
                    ></x-forms.input>

                    <div class="book_viewing row mb-3">
                        <x-forms.select
                            class="mb-3"
                            label="Property"
                            name="property_id">
                            @foreach($properties as $property)
                                <option {{ $appointment->property_id == $property->id ? 'selected' : '' }}  value="{{ $property->id }}">{{ $property->name }}</option>
                            @endforeach
                        </x-forms.select>

                        <div class="row flex-wrap ">
                            <label for="">{{ _trans('common.Time Slot') }}</label>
                            @foreach($timeslots ?? [] as $time_slot)
                                <div class="col-lg-3">
                                    <div class="slot mb-1">
                                        <label for="slotId{{$time_slot}}" class="btn btn-sm btn-light w-100 text-start">
                                            <input {{ $appointment->time_slot_id == $time_slot->id ? 'checked' : '' }} type="radio" value="{{ $time_slot->id }}"
                                                   name="time_slot_id" id="slotId{{$time_slot}}">
                                            {{ $time_slot->start_time }} - {{ $time_slot->end_time }}
                                        </label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="free_evaluation ">
                        <div class="row">
                            <x-forms.input
                                :required="true"
                                label="Property Address"
                                name="property_address"
                                value="{{ $appointment->property_address }}"
                            ></x-forms.input>

                            <x-forms.select
                                col="col-lg-3 mb-3"
                                label="Property Type"
                                name="property_type">
                                <option {{ $appointment->property_type == 'letting' ? 'selected' : '' }} value="letting">{{ _trans('common.Letting') }}</option>
                                <option {{ $appointment->property_type == 'sales' ? 'selected' : '' }} value="sales">{{ _trans('common.Sales') }}
                            </x-forms.select>

                            <x-forms.input
                                col="col-lg-3 mb-3"
                                type="time"
                                label="Time"
                                name="time"
                                value="{{ $appointment->time }}"
                            ></x-forms.input>

                            <x-forms.textarea
                                label="Message"
                                name="message"
                                value="{{ $appointment->message }}"
                            ></x-forms.textarea>

                        </div>
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

            let selectedOption = $('#appointment_type').find('option:selected').val();
            if (selectedOption === 'book_viewing') {
                $('.book_viewing').show();
                $('.free_evaluation').hide();
            } else {
                $('.book_viewing').hide();
                $('.free_evaluation').show();
            }
        });
    </script>
@endpush
