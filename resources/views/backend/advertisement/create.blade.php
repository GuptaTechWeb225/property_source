@extends('backend.master')

@section('title')
    {{ @$data['title'] }}
@endsection
@section('content')
    <x-container title="{{ $data['title'] }}"
                 :breadcrumbs="[['title' => 'Advertisement', 'route' => route('advertisements.index')], ['title' => 'Add New']]">
        <div class="card ot-card">
            <div class="card-body">
                <form action="{{ route('advertisements.store') }}" class="row" method="post">
                    @csrf
                    <x-forms.select
                        col="col-md-4 mb-3"
                        onchange="adlist()"
                        id="advertisementType"
                        :required="true"
                        label="Advertisement Type"
                        name="advertisement_type"
                    >
                        @foreach(\App\Utils\Utils::advertisementTypes() as $key => $type)
                            <option
                                {{ old('advertisement_type') == $key ? 'selected':'' }}   value="{{ $key }}">{{ $type }}</option>
                        @endforeach
                    </x-forms.select>

                    <x-forms.select
                        col="col-md-4 mb-3"
                        :required="true"
                        label="Property Name"
                        name="property_id">
                        @foreach ($data['properties'] as $property)
                            <option value="{{ $property->id }}"
                                {{ old('property_id') == $property->id ? 'selected' : '' }}>{{ $property->name }}
                                {{ Auth::id() == 1 ? '(' . $property->id . ')' : '' }}</option>
                        @endforeach
                    </x-forms.select>
                    <x-forms.input
                        col="col-md-4 mb-3"
                        id="booking_amount_field"
                        :required="true"
                        label="Booking Amount"
                        name="booking_amount"
                        placeholder="{{ _trans('common.40,000') }}"
                        value="0"
                    ></x-forms.input>

                    <div class="col-md-12" id="rent">
                        <div class="row">
                            <x-forms.input
                                col="col-md-4 mb-3"
                                :required="true"
                                label="Rent Amount"
                                name="rent_amount"
                                placeholder="{{ _trans('common.40,000') }}"
                            ></x-forms.input>
                            <x-forms.input
                                col="col-md-4 mb-3"
                                :required="true"
                                label="Max Member"
                                name="max_member"
                                placeholder="{{ _trans('common.5') }}"
                            ></x-forms.input>

                            <x-forms.select
                                col="col-md-4 mb-3"
                                :required="true"
                                label="Rent Type"
                                name="rent_type">
                                <option value="1" {{ old('rent_type') == 1 ? 'selected' : '' }}>
                                    {{ _trans('landlord.Monthly') }}</option>
                                <option value="2" {{ old('rent_type') == 2 ? 'selected' : '' }}>
                                    {{ _trans('landlord.Yearly') }}
                                </option>
                            </x-forms.select>

                            <x-forms.input
                                col="col-md-4 mb-3"
                                type="date"
                                :required="true"
                                label="Rent Start Date"
                                name="rent_start_date"
                            ></x-forms.input>

                            <x-forms.input
                                col="col-md-4 mb-3"
                                type="date"
                                :required="true"
                                label="Rent End Date"
                                name="rent_end_date"
                            ></x-forms.input>
                        </div>
                    </div>

                    <div class="col-md-12" id="sell">
                        <div class="row">
                            <x-forms.input
                                col="col-md-4 mb-3"
                                :required="true"
                                label="Sell Amount"
                                name="sell_amount"
                                placeholder="{{ _trans('common.40,000') }}"
                            ></x-forms.input>
                            <x-forms.input
                                col="col-md-4 mb-3"
                                type="date"
                                :required="true"
                                label="Sell Start Date"
                                name="sell_start_date"
                                placeholder="{{ _trans('common.40,000') }}"
                            ></x-forms.input>
                        </div>
                    </div>


                    <div class="col-md-12" id="lease">
                        <div class="row">
                            <x-forms.input
                                col="col-md-4 mb-3"
                                type="number"
                                :required="true"
                                label="Number of days"
                                name="lease_duration"
                            ></x-forms.input>
                            <x-forms.input
                                col="col-md-4 mb-3"
                                label="Lease Amount"
                                name="lease_amount"
                                placeholder="{{ _trans('common.40,000') }}"
                            ></x-forms.input>
                        </div>
                    </div>


                    <div class="col-md-12" id="mortgage">
                        <div class="row">
                            <x-forms.input
                                col="col-md-4 mb-3"
                                type="number"
                                :required="true"
                                label="Number of days"
                                name="mortgage_duration"
                            ></x-forms.input>
                            <x-forms.input
                                col="col-md-4 mb-3"
                                label="Mortgage Amount"
                                name="mortgage_amount"
                                placeholder="{{ _trans('common.40,000') }}"
                            ></x-forms.input>
                        </div>
                    </div>

                    <div class="col-md-12" id="caretaker">
                        <div class="row">
                            <x-forms.input
                                col="col-md-4 mb-3"
                                type="number"
                                label="Number of days"
                                name="caretaker_duration"
                            ></x-forms.input>
                        </div>
                    </div>

                    <x-forms.select
                        col="col-md-4 mb-3"
                        label="Negotiable"
                        name="negotiable">
                        <option value="1" {{ old('negotiable') == 1 ? 'selected' : '' }}>
                            {{ _trans('common.Negotiable') }}</option>
                        <option value="0" {{ old('negotiable') == 0 ? 'selected' : '' }}>
                            {{ _trans('common.Not Negotiable') }}
                        </option>
                    </x-forms.select>

                    <x-forms.select
                        col="col-md-4 mb-3"
                        label="Status"
                        name="status">
                        <option value="{{ App\Enums\Status::ACTIVE }}">{{ _trans('common.active') }}</option>
                        <option value="{{ App\Enums\Status::INACTIVE }}">{{ _trans('common.inactive') }}
                    </x-forms.select>


                    <x-forms.textarea
                        :required="true"
                        label="Terms & Conditions"
                        name="terms_condition"
                    ></x-forms.textarea>

                    <x-button></x-button>
                </form>
            </div>
        </div>
    </x-container>
@endsection


@push('script')
    <script>
        adlist();

        function adlist() {
            let adTypeVal = $('#advertisementType').val();
            if (adTypeVal == '{{ \App\Enums\DealType::RENT }}') {
                $('#rent').css('display', 'block');
                $('#sell').css('display', 'none');
                $('#caretaker').css('display', 'none');
                $('#lease').css('display', 'none');
                $('#mortgage').css('display', 'none');
            } else if (adTypeVal == '{{ \App\Enums\DealType::SELL }}') {
                $('#sell').css('display', 'block');
                $('#rent').css('display', 'none');
                $('#lease').css('display', 'none');
                $('#mortgage').css('display', 'none');
                $('#caretaker').css('display', 'none');
            } else if (adTypeVal == '{{ \App\Enums\DealType::MORTGAGE }}') {
                $('#sell').css('display', 'none');
                $('#rent').css('display', 'none');
                $('#caretaker').css('display', 'none');
                $('#lease').css('display', 'none');
                $('#mortgage').css('display', 'block');
            } else if (adTypeVal == '{{ \App\Enums\DealType::LEASE }}') {
                $('#sell').css('display', 'none');
                $('#rent').css('display', 'none');
                $('#lease').css('display', 'block');
                $('#mortgage').css('display', 'none');
                $('#caretaker').css('display', 'none');
            } else if (adTypeVal == '{{ \App\Enums\DealType::CARETAKER }}') {
                $('#sell').css('display', 'none');
                $('#rent').css('display', 'none');
                $('#caretaker').css('display', 'block');
                $('#lease').css('display', 'none');
                $('#mortgage').css('display', 'none');
            } else {
                $('#sell').css('display', 'none');
                $('#rent').css('display', 'none');
                $('#caretaker').css('display', 'none');
                $('#lease').css('display', 'none');
                $('#mortgage').css('display', 'none');
            }
        }
    </script>
@endpush
