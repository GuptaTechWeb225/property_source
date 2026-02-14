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
                                        <th>{{ _trans('common.Type') }}</th>
                                        <th>{{ _trans('common.Status') }}</th>
                                        <th>{{ _trans('common.Action') }}</th>
                                    </tr>
                                    @forelse($accountCategories as $category)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ @$category->name }}</td>
                                            <td>{{ @$category->type }}</td>
                                            <td>
                                                <span class="text-capitalize badge bg-{{ $category->status == 'active'?'success':'danger' }}">{{ @$category->status }}</span>
                                            </td>
                                            <td><a onclick="return confirm('Are you sure.?')" href="{{ route('users.accountCategory.delete', $category->id) }}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a></td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center"><h4 class="py-4">{{ _trans('common.No data available') }}!</h4></td>
                                        </tr>
                                    @endforelse
                                </table>
                            </div>
                            <div class="col-lg-4 mb-20">
                                <div class="card ot-card mb-24">
                                    <form action="{{ route('users.profileDetailsStore',[$data['id'], 'accountCategory']) }}"
                                          class="row align-items-center" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <x-forms.input
                                            col="col-lg-12 mb-3"
                                            :required="true"
                                            name="name"
                                            value="{{ @old('name') }}"
                                            label="Name">
                                        </x-forms.input>

                                        <x-forms.select name="type" value="{{ @old('type') }}" label="Type" col="col-lg-12  mb-3">
                                            <option value="credit">{{ _trans('common.Credit') }}</option>
                                            <option value="debit">{{ _trans('common.Debit') }}</option>
                                        </x-forms.select>

                                        <x-forms.select name="status" value="{{ @old('status') }}" label="Status" col="col-lg-12  mb-3">
                                            <option selected value="active">{{ _trans('common.Active') }}</option>
                                            <option value="inactive">{{ _trans('common.Inactive') }}</option>
                                        </x-forms.select>

                                        <div class="col-md-12 mt-3">
                                            <div class="text-end">
                                                <button class="btn btn-lg ot-btn-primary"><span><i class="fa-solid fa-save"></i>
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
