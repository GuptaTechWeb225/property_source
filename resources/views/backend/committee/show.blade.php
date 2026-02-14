@extends('backend.master')
@section('title')
    {{ @$title }}
@endsection
@php
    $president = null;
    $manager = null;
@endphp
@section('content')
    <div class="page-content">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h4 class="bradecrumb-title mb-1">{{ $title }}</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ _trans('common.Home') }}</a>
                        </li>
                        <li class="breadcrumb-item"><a
                                href="{{ route('committees.index') }}">{{ _trans('common.Committees') }}</a>
                        </li>
                        <li class="breadcrumb-item">{{ $title }}</li>
                    </ol>
                </div>
            </div>
        </div>

        <div class="table-content table-basic mt-20">
            <div class="row flex-row-reverse">
                <div class="col-lg-9">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4 class="mb-0">{{ _trans('common.Committee Members') }}</h4>
                            @if(hasPermission('committee_member_create'))
                                <button type="button" class="btn btn-lg ot-btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#addMemberModal">
                                    <span><i class="fa-solid fa-user-plus"></i> </span>
                                    <span class="">{{ _trans('common.add_member') }}</span>
                                </button>
                            @endif

                        </div>
                        <div class="card-body ot-card">
                            <div class="table-responsive">
                                <table class="table table-bordered ot-table-bg language-table">
                                    <thead class="thead">
                                    <tr>
                                        <th class="serial">{{ _trans('common.SR No') }}</th>
                                        <th class="purchase">{{ _trans('common.Name') }}</th>
                                        <th class="purchase">{{ _trans('common.Email') }}</th>
                                        <th class="purchase">{{ _trans('common.Phone') }}</th>
                                        <th class="purchase">{{ _trans('common.Member type') }}</th>
                                        <th class="action">{{ _trans('common.Action') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody class="tbody">
                                    @forelse($committee->members as $member)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $member->user->name }}</td>
                                            <td>{{ $member->user->email }}</td>
                                            <td>{{ $member->user->phone }}</td>
                                            <td><span class="text-capitalize">{{ str_replace('is_','',$member->member_type) }}</span></td>
                                            <td class="action">
                                                <div class="dropdown dropdown-action">
                                                    <button type="button" class="btn-dropdown" data-bs-toggle="dropdown"
                                                            aria-expanded="false">
                                                        <i class="fa-solid fa-ellipsis"></i>
                                                    </button>
                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                        <li>
                                                            <a class="dropdown-item" href="{{ route('committees.edit', $committee->id) }}">
                                                                    <span class="icon mr-12"><i
                                                                            class="fa-solid fa-edit"></i></span>
                                                                <span>{{ _trans('landlord.Edit') }}</span>
                                                            </a>
                                                        </li>
                                                        @if(hasPermission('committee_member_delete'))
                                                            <li>
                                                                <a class="dropdown-item" href="javascript:void(0);"
                                                                   onclick="delete_row('committee-member/destroy', {{ $member->id }})">
                                                            <span class="icon mr-12"><i
                                                                    class="fa-solid fa-trash-can"></i></span>
                                                                    <span>{{ _trans('landlord.delete') }}</span>
                                                                </a>
                                                            </li>
                                                        @endif
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                        @php
                                            if ($member->member_type == 'is_president'){
                                                $president = $member->user->name;
                                            }
                                            if ($member->member_type == 'is_manager'){
                                                $manager = $member->user->name;
                                            }
                                        @endphp
                                    @empty
                                        <tr>
                                            <td colspan="100%" class="text-center gray-color">
                                                <img src="{{ asset('images/no_data.svg') }}" alt=""
                                                     class="mb-primary" width="100">
                                                <p class="mb-0 text-center">{{ _trans('landlord.No data available') }}
                                                </p>
                                                <p class="mb-0 text-center text-secondary font-size-90">
                                                    {{ _trans('landlord.Please add new entity regarding this table') }}
                                                </p>
                                            </td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 mb-3">
                    <div class="card">
                        <div class="card-body d-flex flex-column gap-4 ot-card">
                            <div
                                class="position-relative d-flex flex-column align-items-center justify-space-center gap-1">
                                <img src="{{  @globalAsset($committee->logo->path) }}" alt="{{ $committee->name }}" width="150">
                                <span class="fs-3 fw-bold">{{ $committee->name }}</span>
                                <span class="fs-6 fw-bold">{{ $committee->phone }}</span>
                                    <a class="position-absolute end-0"
                                       href="{{ route('committees.edit', $committee->id) }}">
                                        <span class="icon mr-8">
                                            <i class="las la-edit fs-5"></i>
                                        </span>
                                    </a>
                            </div>
                            <table class="table table-bordered ot-table-bg language-table">
                                <tr>
                                    <th>{{ _trans('landlord.President') }}</th>
                                    <th>{{ $president ?? '-' }}</th>
                                </tr>
                                <tr>
                                    <th>{{ _trans('landlord.Manager') }}</th>
                                    <th>{{ $manager ?? '-' }}</th>
                                </tr>
                                <tr>
                                    <th>{{ _trans('landlord.Members') }}</th>
                                    <th>{{ $committee->total_member }}</th>
                                </tr>
                                <tr>
                                    <th>{{ _trans('landlord.Admins') }} </th>
                                    <th>{{ $committee->total_admin }}</th>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal modal-lg fade " data-bs-backdrop="static" data-bs-keyboard="false" id="addMemberModal"
         tabindex="-1"
         aria-labelledby="addMemberModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">{{ _trans('landlord.Add New Member') }}</h1>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fa-solid fa-times"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('committee-member.store') }}" enctype="multipart/form-data" method="post"
                          id="visitForm">
                        @csrf
                        <input type="hidden" value="{{ $committee->id }}" name="committee_id">
                        <div class="row mb-3">
                            <x-forms.select col="col-lg-6 mb-3" :required="true" name="user_id"  label="User">
                                <option value="">{{ _trans('landlord.Select One') }}</option>
                                @foreach($users as $user)
                                    <option {{ old('user_id') == $user->id ? 'selected' :'' }} value="{{ $user->id }}">{{ $user->name  }}</option>
                                @endforeach
                            </x-forms.select>
                            <x-forms.select col="col-lg-6 mb-3" :required="true" name="member_type" label="Membership type">
                                <option value="">{{ _trans('landlord.Select One') }}</option>
                                <option {{ old('member_type') == 'is_president' ? 'selected' :'' }}  value="is_president">{{ _trans('landlord.President') }}</option>
                                <option {{ old('member_type') == 'is_admin' ? 'selected' :'' }}  value="is_admin">{{ _trans('landlord.Admin') }}</option>
                                <option {{ old('member_type') == 'is_manager' ? 'selected' :'' }}  value="is_manager">{{ _trans('landlord.Manager') }}</option>
                            </x-forms.select>
                        </div>
                        <x-button></x-button>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        @if ($errors->any())
        // If there are validation errors, display the modal
        $(document).ready(function () {
            $('#addMemberModal').modal('show');
        });
        @endif
    </script>
@endpush
@push('script')
    @include('backend.partials.delete-ajax')
@endpush
