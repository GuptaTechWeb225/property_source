@extends('landlord.landlord_layout')
@section('title',@$title)
@section('landlord_content')
    <x-landlord.container subtitle="Here’s the list of properties you have booked to view." tab="requirement">
        <div class="tab_main_content flex-fill d-flex align-items-start flex-wrap gap-4 ">
            <!-- viewing_widget  -->
            @foreach($properties as $adv)
                <div class="viewing_widget">
                    <div class="thumb">
                        <img height="200" width="300" src="{{ @globalAsset($adv->property->defaultImage->path) }}"
                             alt="">
                    </div>
                    <div class="viewing_meta">
                        <div class="viewing_date d-flex justify-content-between">
                            <span>{{ @$adv->property->category->name }}</span>
                            <span>Total Room: {{ @$adv->property->bedroom }}</span>
                        </div>
                        <a href="#" class="d-flex gap_20 primary_link">
                            <h4 class="viewing_meta_title mb-0 primary_link">{{ \Illuminate\Support\Str::of($adv->property->name)->words(5) }}</h4>
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="M7 17L17 7M17 7H7M17 7V17" stroke="#101828" stroke-width="2"
                                      stroke-linecap="round"
                                      stroke-linejoin="round"/>
                            </svg>
                        </a>
                        <p class="viewing_meta_description">{{ @$adv->property->location->address }},
                            {{ @$adv->property->state->name }},
                            {{ @$adv->property->city->name }}
                            {{ @$adv->property->location->post_code }}
                            {{ @$adv->property->location->country->name }}
                        </p>

                        <button onclick="bookViewingHandler('{{ @$adv->property->id }}')" data-bs-toggle="modal" data-bs-target="#bookAViewing" class="theme_btn">
                            <span>Book appointment</span>
                        </button>

                        <button data-bs-toggle="modal" data-bs-target="#viewing_modal" class="theme_btn_blue">
                            <svg width="12" height="12" viewBox="0 0 12 12" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="M11 1L1 11M1 1L11 11" stroke="#B42318" stroke-width="1.67"
                                      stroke-linecap="round"
                                      stroke-linejoin="round"/>
                            </svg>
                            <span>Cancel</span>
                        </button>

                    </div>
                </div>
            @endforeach
        </div>
    </x-landlord.container>

    <div class="modal fade" id="bookAViewing" data-bs-backdrop="static" tabindex="-1" aria-labelledby="staticBackdropLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header theme-bg">
                    <h1 class="modal-title fs-5"
                        id="staticBackdropLabel">
                        {{ _trans('landlord.Appointment') }}
                    </h1>
                    <button type="button" class="btn-close text-danger" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('appointment.store') }}" class="row" method="post">
                        @csrf
                        <div class="ot-contact-form mb-2">
                            <label for="name" class="ot-contact-label">{{ _trans('common.Select Booking Date') }}<span
                                    class="text-danger">*</span></label>
                            <input type="date" required class="form-control ot-contact-input" name="date" id="name"
                                   placeholder="{{ _trans('common.Enter here') }}">
                            @error('name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="ot-contact-form mb-2">
                            <label for="name" class="ot-contact-label">{{ _trans('common.Name') }}<span class="text-danger">*</span></label>
                            <input type="text" required class="form-control ot-contact-input" name="name" id="name"
                                   placeholder="{{ _trans('common.Enter here') }}">
                            @error('name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="ot-contact-form mb-2">
                            <label for="property_id" class="ot-contact-label">{{ _trans('common.Choose Property') }}<span
                                    class="text-danger">*</span> </label>
                            <select required name="property_id" class="form-control ot-contact-input" id="property_id"></select>
                            @error('property_id')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="ot-contact-form mb-2">
                            <label for="email" class="ot-contact-label">{{ _trans('common.Email') }}<span
                                    class="text-danger">*</span> </label>
                            <input type="email" required name="email" class="form-control ot-contact-input" id="email"
                                   placeholder="{{ _trans('common.Enter here') }}">
                            @error('email')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="ot-contact-form mb-2">
                            <label for="phone" class="ot-contact-label">{{ _trans('common.Phone') }}<span
                                    class="text-danger">*</span> </label>
                            <input type="text" required name="phone" class="form-control ot-contact-input" id="phone"
                                   placeholder="{{ _trans('common.Enter here') }}">
                            @error('phone')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <input type="hidden" name="type" value="book_viewing">

                        <div class="ot-contact-form mb-2">
                            <label for="phone" class="ot-contact-label">
                                {{ _trans('common.Time Slots') }} <span class="text-danger">*</span>
                            </label>
                            <div class="row flex-wrap">
                                @foreach($time_slots ?? [] as $time_slot)
                                    <div class="col-lg-6">
                                        <div class="slot mb-1">
                                            <label for="slotId{{$time_slot}}" class="btn btn-sm btn-light w-100 text-start">
                                                <input type="radio" value="{{ $time_slot->id }}" required
                                                       name="time_slot_id" id="slotId{{$time_slot}}">
                                                {{ $time_slot->start_time }} - {{ $time_slot->end_time }}
                                            </label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="col-lg-12 mt-20 text-end mt-4">
                            <button type="submit"
                                    class="theme_btn">{{ _trans('landlord.Book Now') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('js')
    <script>
        function bookViewingHandler(propertyId) {
            console.log(propertyId)
            $.ajax({
                url: '{{ route('get-properties') }}',
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    const selectBox = $('#property_id');
                    selectBox.empty();
                    $.each(data, function (index, item) {
                        console.log(item)
                        const option = $('<option>', {
                            value: item.id, // Assuming item has a 'value' property
                            text: item.name    // Assuming item has a 'text' property
                        });
                        if (item.id == propertyId) {
                            option.prop('selected', true);
                        }
                        selectBox.append(option);
                    });
                },
                error: function (xhr, status, error) {
                    console.error('Error fetching data:', error);
                }
            });
        }
    </script>
@endpush
