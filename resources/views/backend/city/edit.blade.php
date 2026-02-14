@extends('backend.master')
@section('title')
{{ @$data['title'] }}
@endsection
@section('content')
<div class="page-content">

    {{-- bradecrumb Area S t a r t --}}
    <div class="page-header">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="bradecrumb-title mb-1">{{ $data['title'] }}</h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ _trans('landlord.home') }}</a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{ route('cities.index') }}">{{ $data['title'] }}</a>
                        </li>
                        <li class="breadcrumb-item">{{ _trans('landlord.edit') }}</li>
                    </ol>
            </div>
        </div>
    </div>
    {{-- bradecrumb Area E n d --}}

    <div class="card ot-card">
        <div class="card-header">
            <h4>{{ _trans('landlord.Edit') }}</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('cities.update', @$data['city']->id) }}" enctype="multipart/form-data" method="post"
                id="visitForm">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-md-6 mb-3" id="countryDiv">

                                {{-- Status --}}
                                <label for="countrySelect" class="form-label">{{ _trans('landlord.Country') }}
                                    <span class="fillable">*</span></label>

                                <select
                                    class="nice-select niceSelect bordered_style wide @error('country_id') is-invalid @enderror"
                                    name="country_id" id="countrySelect" aria-describedby="countrySelectFeedback">

                                    @foreach ($data['countries'] as $country)
                                    <option value="{{ $country->id }}"
                                        {{ old('country_id', $data['city']->country_id) == $country->id ? 'selected' : '' }}>
                                        {{ $country->name }}
                                    </option>


                                    @endforeach
                                </select>
                                @error('country_id')
                                <div id="countrySelectFeedback" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror

                            </div>

                            <div class="col-md-6 mb-3">
                                {{-- State --}}
                                <label for="stateSelect" class="form-label">{{ _trans('landlord.State') }}<span
                                        class="fillable">*</span></label>
                                <select
                                    class="nice-select niceSelect bordered_style wide @error('state_id') is-invalid @enderror"
                                    name="state_id" id="stateSelect" aria-describedby="stateFeedback">
                                    <!-- Options will be populated by JavaScript -->
                                </select>
                                @error('state_id')
                                <div id="stateFeedback" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="exampleDataList" class="form-label ">{{ _trans('landlord.Name') }} <span
                                        class="fillable">*</span></label>
                                <input class="form-control ot-input @error('name') is-invalid @enderror" name="name"
                                    value="{{ $data['city']->name }}" list="datalistOptions" id="exampleDataList"
                                    placeholder="{{ _trans('landlord.enter name') }}">
                                @error('name')
                                <div id="validationServer04Feedback" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="col-md-6">

                                {{-- Status --}}
                                <label for="validationServer04" class="form-label">{{ _trans('landlord.Status') }}
                                    <span class="fillable">*</span></label>

                                <select
                                    class="nice-select niceSelect bordered_style wide @error('status') is-invalid @enderror"
                                    name="status" id="validationServer04" aria-describedby="validationServer04Feedback">

                                    <option value="{{ App\Enums\Status::ACTIVE }}"
                                        {{ @$data['city']->status == App\Enums\Status::ACTIVE ? 'selected' : '' }}>
                                        {{ _trans('landlord.Active') }}
                                    </option>
                                    <option value="{{ App\Enums\Status::INACTIVE }}"
                                        {{ @$data['city']->status == App\Enums\Status::INACTIVE ? 'selected' : '' }}>
                                        {{ _trans('landlord.Inactive') }}
                                    </option>
                                </select>
                                @error('status')
                                <div id="validationServer04Feedback" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror

                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mt-24">
                        <div class="text-end">
                            <button class="btn btn-lg ot-btn-primary"><span><i class="fa-solid fa-save"></i>
                                </span>{{ _trans('landlord.Update') }}
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('script')

<script>
$(document).ready(function() {
    $('#countrySelect, #stateSelect').niceSelect();

    const countriesWithStates = @json($data['countries']);

    console.log(countriesWithStates);

    function populateStates(countryId) {
        console.log("hhh")
        const stateSelect = $('#stateSelect');
        stateSelect.empty();

        const selectedCountry = countriesWithStates.find(country => country.id === countryId);

        if (selectedCountry && selectedCountry.states) {
            $.each(selectedCountry.states, function(index, state) {
                const option = $('<option></option>').val(state.id).text(state.name);
                stateSelect.append(option);
            });

            const previousStateId = {{$data['city']-> state_id ?? 'null'}};

            if (previousStateId) {
                stateSelect.val(previousStateId);
            }
        } else {
            const option = $('<option></option>').val('').text('No states available');
            stateSelect.append(option);
        }

        stateSelect.niceSelect('update');
    }

    $('#countryDiv').on('change', '#countrySelect', function() {
        const selectedCountryId = parseInt($(this).val());
        console.log(selectedCountryId);
        populateStates(selectedCountryId);
    });

    const initialCountryId = parseInt($('#countrySelect').val());

    console.log($('#countrySelect').val());

    if (initialCountryId) {
        populateStates(initialCountryId);
    }

    console.log("hhhh")
});
</script>
@endpush