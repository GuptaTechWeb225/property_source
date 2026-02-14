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
                <div class="profile-body">
                    <h2 class="title">{{ _trans('landlord.File Attachment')}}</h2>

                    <div class="file-attachment-data">
                        @forelse ($documents as $key => $row)
                            <div class="file-attachment">
                                <div class="attached-file">
                                    <img class="img-fluid"
                                         src="http://land-lord-saas.test/backend/assets/images/profile/file.jpg"
                                         alt="">
                                    <div class="attached-info">
                                        <b>{{ @$row->filename }}</b>
                                        <span class="text-muted"> {{ now()->diffInDays($row->created_at) }} {{ _trans('landlord.days ago')}}</span>
                                    </div>
                                </div>
                                <div class="attached-file-size">
                                    <p>{{ @$row->size }}  {{ _trans('landlord.kb')}}</p>
                                </div>



                                    <div class="attached-file">
                                        <img class="img-fluid"
                                            src="{{ asset('backend/assets/images/profile/file.jpg')}}"
                                            alt="">
                                        <div class="attached-info">
                                            <b>{{ @$row->filename }}</b>
                                            <span class="text-muted"> {{ now()->diffInDays($row->created_at) }} {{ _trans('landlord.days ago')}}</span>
                                        </div>
                                    </div>


                                    <div class="attached-file-size">
                                        <p>{{ @$row->size }}  {{ _trans('landlord.kb')}}</p>
                                    </div>

                                    <div class="dropdown dropdown-action file-dropdown-action">
                                        <button type="button" class="btn-dropdown" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                        <i class="fa-solid fa-ellipsis-vertical"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end ">
                                        <li>
                                            <a class="dropdown-item" href="{{route('users.deleteAttachment', $row->attachment_id)}}"  type="submit" >
                                                <span class="icon mr-8"><i class="fa-solid fa-trash-can"></i></span>
                                                <span>{{ _trans('landlord.Delete')}}</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                            </div>
                            @empty
                            <strong>Sorry!</strong> No Data Found.
                        @endforelse


                        <form action="{{ route('users.profileDetailsStore', [$data['id'], 'documents']) }}"
                            enctype="multipart/form-data" method="post" id="visitForm">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-md-12 mb-3">
                                    {{-- File Uplode --}}
                                    <label class="form-label" for="inputImage">{{ _trans('landlord.image') }}</label>
                                    <div class="ot_fileUploader left-side mb-3">
                                        <input class="form-control" type="text" placeholder="Image" readonly=""
                                            id="placeholder">
                                        <button class="primary-btn-small-input" type="button">
                                            <label class="btn btn-lg ot-btn-primary" for="fileBrouse">{{ _trans('landlord.Browse')}}</label>
                                            <input type="file" class="d-none form-control" name="image" id="fileBrouse"
                                                accept="image/*">
                                        </button>
                                    </div>
                                </div>
                                <div class="col-md-12 mt-3">
                                    <div class="text-end">
                                        <button class="btn btn-lg ot-btn-primary"><span><i class="fa-solid fa-save"></i>
                                            </span>{{ _trans('landlord.submit') }}</button>
                                    </div>
                                </div>
                            </div>
                        </form>


                    </div>
                </div>
                <!-- profile body form end -->
            </div>
            <!-- profile body end -->
        </div>

    </div>
@endsection

@push('script')
    @include('backend.partials.delete-ajax')
@endpush
