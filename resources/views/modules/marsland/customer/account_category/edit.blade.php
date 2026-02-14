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
                                <form action="{{ route('customer.account_category.update', $category->id) }}" class="row align-items-center" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('put')
                                    <div class="col-lg-6 ot-contact-form mb-24">
                                        <label class="ot-contact-label">{{ _trans('common.Name') }}<span class="text-danger">*</span></label>
                                        <input class="form-control ot-contact-input" value="{{ $category->name }}" name="name" type="text" placeholder="{{ _trans('common.Enter Here') }}">
                                        @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6 ot-contact-form mb-24">
                                        <label  class="ot-contact-label">{{ _trans('landlord.Type') }}<span class="text-danger">*</span></label>
                                        <select class="select2 ot-input" name="type">
                                            <option {{ $category->type == 'credit' ? 'selected' : '' }} value="credit">{{ _trans('common.Credit') }}</option>
                                            <option {{ $category->type == 'debit' ? 'selected' : '' }} value="debit">{{ _trans('common.Debit') }}</option>
                                        </select>
                                        @error('type')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-lg-6 ot-contact-form mb-24">
                                        <label  class="ot-contact-label">{{ _trans('landlord.Status') }}<span class="text-danger">*</span></label>
                                        <select class="select2 ot-input" name="status">
                                            <option {{ $category->status == 'active' ? 'selected' : '' }}  value="active">{{ _trans('common.Active') }}</option>
                                            <option {{ $category->status == 'inactive' ? 'selected' : '' }}  value="inactive">{{ _trans('common.Inactive') }}</option>
                                        </select>
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
