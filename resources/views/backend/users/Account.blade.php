@extends('backend.master')
@section('title')
    {{ @$data['title'] }}
@endsection
@section('content')
    <div class="page-content">
        <!-- profile content start -->
        <div class="profile-content">
            <div class="d-flex flex-column flex-lg-row gap-4 gap-lg-0">
                <!-- profile menu mobile start -->
                <div class="profile-menu-mobile">
                    <button class="btn-menu-mobile" type="button" data-bs-toggle="offcanvas"
                            data-bs-target="#offcanvasWithBothOptionsMenuMobile"
                            aria-controls="offcanvasWithBothOptionsMenuMobile">
                        <span class="icon"><i class="fa-solid fa-bars"></i></span>
                    </button>

                    <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1"
                         id="offcanvasWithBothOptionsMenuMobile">
                        <div class="offcanvas-header">
                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close">
                                <span class="icon"><i class="fa-solid fa-xmark"></i></span>
                            </button>
                        </div>
                        <div class="offcanvas-body">
                            <!-- profile menu start -->
                            <div class="profile-menu">
                                <!-- profile menu head start -->
                            @include('backend.partials.user_profile-menu')
                            <!-- profile menu head end -->

                                <!-- profile menu body start -->
                                <div class="profile-menu-body">
                                    @include('backend.partials.profile_nav')

                                </div>
                                <!-- profile menu body end -->
                            </div>
                            <!-- profile menu end -->
                        </div>
                    </div>
                </div>
                <!-- profile menu mobile end -->


                <!-- profile menu start -->
                <div class="profile-menu">
                    <!-- profile menu head start -->
                @include('backend.partials.user_profile-menu')
                <!-- profile menu head end -->

                    <!-- profile menu body start -->
                    <div class="profile-menu-body">
                        @include('backend.partials.profile_nav')
                    </div>
                    <!-- profile menu body end -->
                </div>
                <!-- profile menu end -->

                <!-- profile body start -->
                <div class="profile-body ">
                    <div class="load-data mb-5">
                        <div class="row">
                            <div class="col-lg-8 mb-20">
                                <table class="table">
                                    <tr>
                                        <th>#</th>
                                        <th>{{ _trans('common.Name') }}</th>
                                        <th>{{ _trans('common.Account Category') }}</th>
                                        <th>{{ _trans('common.Account No') }}</th>
                                        <th>{{ _trans('common.Balance') }}</th>
                                        <th>{{ _trans('common.Is default') }}</th>
                                        <th>{{ _trans('common.Action') }}</th>
                                    </tr>
                                    @forelse($accounts as $account)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ @$account->name }}</td>
                                            <td>{{ @$account->category->name }}</td>
                                            <td>{{ @$account->account_no }}</td>
                                            <td>{{ @$account->balance }}</td>
                                            <td>{{ @$account->is_default ? 'Yes' : 'No' }}</td>
                                            <td>
                                                <a onclick="return confirm('Are you sure.?')"
                                                   href="{{ route('users.account.delete', $account->id) }}"
                                                   class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center"><h4 class="py-4">{{ _trans('common.No data available') }}!</h4></td>
                                        </tr>
                                    @endforelse
                                </table>
                            </div>
                            <div class="col-lg-4 mb-20">
                                <div class="card ot-card mb-24">
                                    <form
                                        action="{{ route('users.profileDetailsStore',[$data['id'], 'accounts']) }}"
                                        class="row align-items-center" method="post" enctype="multipart/form-data">
                                        @csrf

                                        <x-forms.select name="account_category_id" label="Category" col="col-lg-12  mb-3">
                                            @foreach($accountCategories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </x-forms.select>

                                        <x-forms.input
                                            col="col-lg-12 mb-3"
                                            :required="true"
                                            name="name"
                                            value="{{ @old('name') }}"
                                            label="Account Name">
                                        </x-forms.input>

                                        <x-forms.input
                                            col="col-lg-12 mb-3"
                                            :required="true"
                                            name="account_no"
                                            value="{{ @old('account_no') }}"
                                            label="Account Number">
                                        </x-forms.input>

                                        <x-forms.input
                                            col="col-lg-12 mb-3"
                                            type="number"
                                            :required="true"
                                            name="balance"
                                            value="{{ @old('balance') }}"
                                            label="Balance">
                                        </x-forms.input>

                                        <div class="col-lg-12 mb-3">
                                            <div class="form-check pt-3">
                                                <input name="is_default" type="hidden" value="1">
                                                <input class="form-check-input" name="is_default" type="checkbox"
                                                       value="1" id="is_default">
                                                <label class="form-check-label" for="is_default">
                                                    {{ _trans('common.Set as default') }}
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-lg-12 mb-3">
                                            <label class="ot-contact-label">{{ _trans('common.Details') }}</label>
                                            <textarea class="form-control ot-contact-input" name="details"></textarea>
                                        </div>

                                        <div class="col-md-12 mt-3">
                                            <div class="text-end">
                                                <button class="btn btn-lg ot-btn-primary"><span><i
                                                            class="fa-solid fa-save"></i>
                                        </span>{{ _trans('landlord.submit') }}</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
