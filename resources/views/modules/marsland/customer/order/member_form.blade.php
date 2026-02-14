@extends('marsland::layouts.customer')
@section('title', _trans('common.Order details'))

@section('customer-content')
    <div class="sidebar-content-wrap flex-fill ot-card white-bg border-0">
        <section class="my-orders">
            <div class="row">
                <div class="col-xl-12">
                    <div class="page-content">
                        @if(session()->has('max_member_warning'))
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <i class="ri-error-warning-line"></i> {{ session('max_member_warning') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                            </div>
                        @endif
                        <div class="page-header">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h4 class="bradecrumb-title mb-1">{{ $title }}</h4>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a
                                                href="{{ route('dashboard') }}">{{ _trans('common.home') }}</a>
                                        </li>
                                        <li class="breadcrumb-item">{{ $title }}</li>
                                    </ol>
                                </div>
                                <div class="col-lg-6 text-end">
                                    <a href="{{ route('customer.property.details', request('id')) }}"
                                       class="btn-primary-fill big-btn primary-soft-btn">
                                        <i class="ri-arrow-left-line"></i> {{ _trans('common.Back') }}
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@push('script')
    <script>
        const addMember = () => {
            const index = $(".contact-field").length;

            const form = `
            <div class="row align-items-center contact-field mt-2">
                <div class="col-lg-5 mb-3">
                    <label class="ot-contact-label">{{ _trans('common.Name') }}<span class="text-danger">*</span></label>
                    <input class="form-control ot-contact-input" required name="members[${index}][name]" type="text" placeholder="{{ _trans('common.Enter Here') }}">
                </div>
                <div class="col-lg-5 mb-3">
                    <label class="ot-contact-label">{{ _trans('common.Relation') }}</label>
                    <input class="form-control ot-contact-input" name="members[${index}][relation]" type="text" placeholder="{{ _trans('common.Enter Here') }}">
                </div>
                <div class="col-lg-2 text-end pe-4">
                    <a href="" class="btn btn-sm btn-danger remove-field"> <i class="ri-delete-bin-line"></i> Remove</a>
                </div>
                <div class="col-lg-4 mb-3">
                    <label class="ot-contact-label">{{ _trans('common.Phone') }}</label>
                    <input class="form-control ot-contact-input" name="members[${index}][phone]" type="text" placeholder="{{ _trans('common.Enter Here') }}">
                </div>
                <div class="col-lg-4 mb-3">
                    <label class="ot-contact-label">{{ _trans('common.Photo') }}</label>
                    <input class="form-control ot-contact-input" name="members[${index}][photo]" type="file" placeholder="{{ _trans('common.Enter Here') }}">
                </div>
                <div class="col-lg-4 mb-3">
                    <label class="ot-contact-label">{{ _trans('common.Document') }}</label>
                    <input class="form-control ot-contact-input" name="members[${index}][document]" type="file" placeholder="{{ _trans('common.Enter Here') }}">
                </div>
            </div>
        `;

            $(".contact-fields-container").append(form);
        }

        $(".contact-fields-container").on("click", ".remove-field", function () {
            if ($(".contact-field").length > 1) {
                $(this).closest(".contact-field").remove();
            }
            return false;
        });
    </script>
@endpush
