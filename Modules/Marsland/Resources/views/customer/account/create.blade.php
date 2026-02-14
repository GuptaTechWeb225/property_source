@extends('marsland::layouts.customer')
@section('title', _trans('common.Order details'))

@section('customer-content')
    <div class="sidebar-content-wrap flex-fill ot-card white-bg border-0">
        <section class="my-orders">
            <div class="row">
                <div class="col-xl-12">
                    <div class="page-content">
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
                            </div>
                        </div>
                        <div class="card mb-16 border-0 shadow-sm">
                            <div class="card-body">
                                <form action="{{ route('customer.account.store', request('id')) }}" class="row align-items-center" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="col-lg-6 ot-contact-form mb-24">
                                        <label  class="ot-contact-label">{{ _trans('landlord.Category') }}<span class="text-danger">*</span></label>
                                        <select class="select2 ot-input" name="account_category_id">
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('account_category_id')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-lg-6 ot-contact-form mb-24">
                                        <label class="ot-contact-label">{{ _trans('common.Account Name') }}<span class="text-danger">*</span></label>
                                        <input class="form-control ot-contact-input" required name="name" type="text" placeholder="{{ _trans('common.Enter Here') }}">
                                        @error('account_category_id')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-lg-5 ot-contact-form mb-3">
                                        <label class="ot-contact-label">{{ _trans('common.Account Number') }}<span class="text-danger">*</span></label>
                                        <input class="form-control ot-contact-input" name="account_no" type="text" placeholder="{{ _trans('common.Enter Here') }}">
                                        @error('account_category_id')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-lg-4 ot-contact-form mb-3">
                                        <label class="ot-contact-label">{{ _trans('common.Balance') }}<span class="text-danger">*</span></label>
                                        <input class="form-control ot-contact-input" name="balance" type="number" placeholder="{{ _trans('common.Enter Here') }}">
                                        @error('account_category_id')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-lg-2">
                                        <div class="form-check pt-3">
                                            <input name="is_default" type="hidden" value="1">
                                            <input class="form-check-input" name="is_default" type="checkbox" value="1" id="is_default">
                                            <label class="form-check-label" for="is_default">
                                                {{ _trans('common.Set as default') }}
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <label class="ot-contact-label">{{ _trans('common.Details') }}</label>
                                        <textarea class="form-control ot-contact-input" name="details"></textarea>
                                    </div>

                                    <div class="col-lg-12 text-end mt-50">
                                        <button class="btn-primary-fill"> {{ _trans('common.Submit') }} <i class="ri-arrow-right-line"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
