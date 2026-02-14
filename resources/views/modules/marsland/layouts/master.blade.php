@extends('layouts.marsland')

@section('content')

    @include('marsland::includes.header')
    <main>
        @yield('marsland-content')
    </main>
    <!-- Footer S t a r t -->
    @include('marsland::includes.footer')
    <!-- End-of Footer -->
    <div class="modal fade" id="bookEvaluation" data-bs-backdrop="static" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h1 class="modal-title fs-5 text-white" id="staticBackdropLabel">{{ _trans('landlord.Book A Valuation') }}</h1>
                    <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('appointment.store') }}" class="row" method="post">
                        @csrf
                        <div class="ot-contact-form mb-2">
                            <label for="name" class="ot-contact-label text-black">{{ _trans('common.Name') }}<span class="text-danger">*</span></label>
                            <input type="text" required class="form-control ot-contact-input" name="name" id="name" placeholder="{{ _trans('common.Enter here') }}">
                            @error('name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="ot-contact-form mb-2">
                            <label for="email" class="ot-contact-label text-black">{{ _trans('common.Email') }}<span class="text-danger">*</span> </label>
                            <input type="email" required name="email" class="form-control ot-contact-inpxut" id="email" placeholder="{{ _trans('common.Enter here') }}">
                            @error('email')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="ot-contact-form mb-2">
                            <label for="phone" class="ot-contact-label text-black">{{ _trans('common.Phone') }}<span class="text-danger">*</span> </label>
                            <input type="text" required name="phone" class="form-control ot-contact-input" id="phone" placeholder="{{ _trans('common.Enter here') }}">
                            @error('phone')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="ot-contact-form mb-2">
                            <label for="property_address" class="ot-contact-label text-black">{{ _trans('common.Property Address') }}<span class="text-danger">*</span> </label>
                            <input type="text" required name="property_address" class="form-control ot-contact-input" id="property_address" placeholder="{{ _trans('common.Enter here') }}">
                            @error('property_address')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="ot-contact-form mb-2">
                            <label class="ot-contact-label text-black">{{ _trans('common.Property Type') }}<span class="text-danger">*</span></label>
                            <select required class="select2" name="property_type">
                                <option value="letting">{{ _trans('common.Letting') }}</option>
                                <option value="sales">{{ _trans('common.Sales') }}</option>
                            </select>
                            @error('property_type')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="ot-contact-form mb-2">
                            <label class="ot-contact-label text-black">{{ _trans('common.Message') }}</label>
                            <textarea class="form-control ot-contact-input" name="message"></textarea>
                        </div>
                        <div class="ot-contact-form mb-2 row">
                            <div class="col-lg-6">
                                <label class="ot-contact-label text-black">{{ _trans('common.Date') }}</label>
                                <input type="date" class="form-control ot-contact-input" name="date" />
                            </div>
                            <div class="col-lg-6">
                                <label class="ot-contact-label text-black">{{ _trans('common.Time') }}</label>
                                <input type="time" class="form-control ot-contact-input" name="time" />
                            </div>

                        </div>
                        <div class="col-lg-12 mt-20 text-end">
                            <button type="submit" class="btn-primary-fill">{{ _trans('landlord.Book Free Valuation') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <!--  Request is for five properties for mega menu -->
    <script>
        const appendMegaMenuProperties = () => {
            const fivePropertiesContainer = $('#fiveProperties');
            fivePropertiesContainer.empty();
            $.ajax({
                url: "{{ route('property.five_properties') }}",
                type: 'GET',
                success: function (response) {
                    response.property.forEach(property => {
                        const propertyCard = `
                                <div class="col-xl-6 col-lg-6 col-md-6">
                                    <div class="single-best-product bg-none h-calc d-flex p-0">
                                        <a href="${property.details_url}" class="d-flex align-items-center justify-content-between gap-15 mb-15">
                                            <div class="d-flex align-items-start gap-20">
                                                <div class="icon">
                                                    <i class="ri-home-8-line"></i>
                                                </div>
                                                <div class="cat-caption">
                                                    <div class="cat-caption d-flex justify-content-between align-items-center mb-10  gap-15">
                                                        <h4 class="title  line-clamp-1 font-600 text-title text-capitalize">
                                                            ${property.name}
                                                        </h4>
                                                        <span class="product-tag font-700 text-capitalize">${property.category}</span>
                                                    </div>
                                                    <p class="pear line-clamp-2 mb-0">
                                                        ${property.description}
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            `;
                        fivePropertiesContainer.append(propertyCard);
                    });
                    const viewAllButton = `
                            <div class="col-xl-6 col-lg-6 col-md-6">
                                <div class="f-right mt-10">
                                    <a href="{{ route('properties') }}" class="btn-primary-fill big-btn primary-soft-btn">View All Properties <i class="ri-arrow-right-line"></i></a>
                                </div>
                            </div>
                            `;
                    fivePropertiesContainer.append(viewAllButton);
                },
                error: function (error) {
                    console.log('Error:', error);
                }
            });
        }

        appendMegaMenuProperties();
    </script>
@endpush

