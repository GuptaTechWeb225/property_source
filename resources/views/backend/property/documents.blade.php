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
                            @include('backend.partials.property-profile-menu')
                            <!-- profile menu head end -->

                                <div class="profile-menu-body">
                                    @include('backend.property.propert_nav')
                                </div>
                            </div>
                            <!-- profile menu end -->
                        </div>
                    </div>
                </div>
                <!-- profile menu mobile end -->

                <!-- profile menu start -->
                <div class="profile-menu">
                    <!-- profile menu head start -->
                @include('backend.partials.property-profile-menu')
                <!-- profile menu head end -->

                    <!-- profile menu body start -->
                    <div class="profile-menu-body">

                        @include('backend.property.propert_nav')
                    </div>
                    <!-- profile menu body end -->
                </div>
                <!-- profile menu end -->

                <!-- profile body start -->
                <div class="profile-body">
                    <div class="emergency-header-edit mb-16">
                        <h2 class="m-0">{{ _trans('landlord.Property Documents') }}</h2>
                    </div>

                    <!-- profile body form start -->
                    <div class="profile-body-form style-2">

                        <div class="land-project-gallery">
                            <form class="property-add-gallery"
                                  action="{{ route('properties.update', [$data['property']->id, 'document']) }}"
                                  method="post" id="visitForm" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3">
                                    <div class="col-xl-12">
                                        <div class="title mb-10">
                                            <h3 class="">{{ _trans('common.Add Document') }}</h3>
                                        </div>
                                    </div>
                                    <x-forms.input
                                        name="title"
                                        label="Title"
                                        value="{{ @old('title') }}"
                                    ></x-forms.input>
                                    <x-forms.file
                                        accept="image/*,.pdf"
                                        col="col-lg-12"
                                        :required="true"
                                        name="file"
                                        label="File"
                                        placeholder="File"
                                    ></x-forms.file>

                                    <x-button title="Save"></x-button>
                                </div>
                            </form>


                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th class="w-25">{{_trans('landlord.Document')}}</th>
                                <th class="w-25">{{_trans('landlord.Attachement_Value')}}</th>
                                <th class="">{{_trans('common.status')}}</th>
                                <th class="">{{_trans('landlord.Note')}}</th>
                                @if(auth()->user()->role_id == 1)
                                    <th class="">{{_trans('landlord.Approved By')}}</th>
                                @endif
                                <th class="">{{_trans('landlord.Approved At')}}</th>
                            </tr>
                            </thead>
                            <tbody class="tbody">
                            <tr>
                                <td><h5>Video Verification</h5></td>
                                <td><a href="{{asset($data['property']->video_verification)}}" download> Download </a>
                                </td>
                                <td>
                                    @if($data['property']->video_verification_status == 1)
                                        <span class="badge badge-success">
                                                {{ _trans('landlord.Approved')}}
                                            </span>
                                    @elseif($data['property']->video_verification_status == 2)
                                        <span class="badge badge-danger">
                                                {{ _trans('landlord.Rejected')}}
                                            </span>
                                    @else
                                        <span class="badge badge-warning">
                                                {{ _trans('landlord.Pending')}}
                                            </span>
                                    @endif
                                    @if(auth()->user()->role_id == 1)
                                        @if($data['property']->video_verification_status == 0)
                                            <a class="btn btn-sm btn-success"
                                               @if(auth()->user()->role_id ==1) href=" {{route('verifyVideo',[$data['property']->id , 1])}} " @endif>Approve</a>
                                            <a class="btn btn-sm btn-danger"
                                               @if(auth()->user()->role_id ==1) href=" {{route('verifyVideo',[$data['property']->id , 2])}} " @endif>Reject</a>
                                        @elseif ($data['property']->video_verification_status == 1)
                                            <a class="btn btn-sm btn-danger"
                                               @if(auth()->user()->role_id ==1) href=" {{route('verifyVideo',[$data['property']->id , 2])}} " @endif>Reject</a>

                                        @elseif ($data['property']->video_verification_status == 2)
                                            <a class="btn btn-sm btn-success"
                                               @if(auth()->user()->role_id ==1) href=" {{route('verifyVideo',[$data['property']->id , 1])}}" @endif>Approve</a>
                                        @endif
                                    @endif
                                </td>
                            </tr>

                            @foreach ($data['documents'] as $key=> $document)
                                <tr>
                                    <td><h5>{{$key+1}} .{{$document->title}}</h5></td>
                                    <td>
                                        @if($document->attachment_id)
                                            @php $file_type= pathinfo($document->file->path, PATHINFO_EXTENSION);  @endphp
                                            @if($file_type == "png" || 'image' || 'jpg' || 'jpeg')
                                                <img class="img-fluid"
                                                     src="{{ @globalAsset($document->file->path) }}"
                                                     alt="document"/>
                                            @else
                                                <a target="_blank" href="{{asset($document->file->path)}}"
                                                   class="d-block">
                                                    Download
                                                </a>
                                            @endif
                                        @else
                                            {{$document->value}}
                                        @endif
                                    </td>
                                    <td>
                                        @if(auth()->user()->role_id == 1)
                                            <select class="form-control" id="document_status_{{$document->id}}"
                                                    name="status" onchange="changeStatus({{$document->id}})">
                                                <option value="">Select</option>
                                                <option @if($document->status == 1) selected
                                                        @endif  value="1"> {{_trans('common.Approve')}}</option>
                                                <option @if($document->status == 2) selected
                                                        @endif  value="2"> {{_trans('common.Reject')}}</option>
                                                <option @if($document->status == 0) selected
                                                        @endif  value="0"> {{_trans('common.Pending')}}</option>
                                            </select>
                                        @else

                                            @if($document->status == 1)
                                                <span class="badge badge-success">
                                                       {{ _trans('landlord.Approved')}}
                                                    </span>
                                            @elseif($document->status == 2)
                                                <span class="badge badge-danger">
                                                       {{ _trans('landlord.Rejected')}}
                                                    </span>
                                            @else
                                                <span class="badge badge-warning">
                                                        {{_trans('landlord.Pending')}}
                                                    </span>
                                            @endif


                                        @endif
                                    </td>
                                    <td>{{@$document->note}}</td>
                                    @if(auth()->user()->role_id == 1)
                                        <td>{{@$document->updator->name}}</td>
                                    @endif

                                    <td>{{$document->created_at->format('d-M-Y H:i A')}}</td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


        <div class="modal fade" id="rejectNotModal" data-bs-backdrop="static" tabindex="-1"
             aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-md">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <h1 class="modal-title fs-5 text-white" id="staticBackdropLabel">Document Reject Note</h1>
                        <button type="button" class="btn-close text-danger" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('changeDocStatus') }}" class="row" method="post">
                            @csrf
                            <input type="hidden" name="id" value="">
                            <input type="hidden" name="status" value="2">
                            @csrf
                            <div class="ot-contact-form mb-2">
                                <label for="name" class="form-label ">Note<span class="text-danger">*</span></label>
                                <input type="text" required class="form-control ot-contact-input" name="note" id="note"
                                       placeholder="Enter Reject Note Here">
                                @error('note')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-lg-12 mt-20 text-end">
                                <button type="submit" class="btn btn-lg ot-btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        @endsection

        @push('script')
            @include('backend.partials.delete-ajax')

            <script>
                function changeStatus(id) {
                    var selectElement = document.getElementById("document_status_" + id);
                    var selectedValue = selectElement.value;
                    if (selectedValue == 2) {
                        var modal = $("#rejectNotModal");
                        $('input[name="id"]').val(id);
                        modal.modal('show');
                    } else {
                        $.ajax({
                            url: "{{ route('changeDocStatus') }}",
                            type: 'POST',
                            data: {
                                id: id,
                                status: selectedValue,
                                _token: "{{ csrf_token() }}"
                            },
                            success: function (response) {
                                toastr('success', response.message);

                            },
                            error: function (error) {
                                toastr('error', response.message);
                            }
                        });
                    }
                }
            </script>
    @endpush
