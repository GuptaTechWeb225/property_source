@extends('backend.master')

@section('title')
    {{ @$title }}
@endsection

@section('content')
    <div class="page-content">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h4 class="bradecrumb-title mb-1">{{ $title }}</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ _trans('landlord.home') }}</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page"><a
                                href="{{ route('committees.index') }}">{{ _trans('landlord.committees') }}</a>
                        </li>
                        <li class="breadcrumb-item active"
                            aria-current="page">{{ _trans('landlord.Edit Committee') }}</li>
                    </ol>
                </div>
            </div>
        </div>
        <form action="{{ route('committees.update', $committee->id) }}" enctype="multipart/form-data" method="post"
              id="visitForm">
            @csrf
            @method('put')
            <div class="card ot-card">
                <div class="card-body">
                    <div class="row mb-3">
                        <x-forms.input
                            name="name"
                            label="Name"
                            value="{{ $committee->name }}"
                            :required="true">
                        </x-forms.input>
                        <x-forms.select name="property_id" label="Property" :required="true">
                            <option value="">{{ _trans('landlord.Select One') }}</option>
                            @foreach ($properties as $property)
                                <option @if ($committee->property_id == $property->id) selected
                                        @endif value="{{ $property->id }}">
                                    {{ $property->name }}</option>
                            @endforeach
                        </x-forms.select>

                        <x-forms.input
                            name="phone"
                            label="Phone"
                            value="{{ $committee->phone }}"
                            :required="true">
                        </x-forms.input>
                        <x-forms.input
                            name="email"
                            label="Email"
                            value="{{ $committee->email }}"
                            type="email"
                            :required="true">
                        </x-forms.input>
                        <x-forms.file name="logo" label="Logo">
                        </x-forms.file>
                        <x-forms.select name="status" label="Status">
                            <option value="">{{ _trans('landlord.Select One') }}</option>
                            <option @if($committee->status == 'active') selected @endif value="active"
                                    selected>{{ _trans('landlord.Active') }}</option>
                            <option @if($committee->status == 'inactive') selected
                                    @endif value="inactive">{{ _trans('landlord.Inactive') }}</option>
                        </x-forms.select>
                    </div>
                </div>
            </div>
            <div class="card ot-card mt-5">
                <div class="d-flex justify-content-start gap-3 align-items-center mb-4">
                    <h2 class="mb-0">{{ _trans('landlord.Edit Member') }}</h2>
                    <a href="{{ route('users.create') }}" class="btn btn ot-btn-primary"><i class="fa fa-user"></i>
                        {{ _trans('landlord.Add User') }}</a>
                </div>
                @if ($errors->has('member_id.*'))
                    <div class="alert alert-danger">
                        @foreach ($errors->get('member_id.*') as $error)
                            {{ _trans('landlord.At least one member is required!') }}
                        @endforeach
                    </div>
                @endif

                <div id="form-container">
                    @if(old('member_id'))
                        @foreach(old('member_id') ?? [] as $key => $member_id)
                            <div class="row mb-4 align-items-center member-inputs">
                                <x-forms.select col="col-lg-5 mb-3" name="member_id[]" class="member-id">
                                    <option value="">{{ _trans('landlord.Select One') }}</option>
                                    @foreach ($users as $user)
                                        <option
                                            value="{{ $user->id }}" {{ $member_id == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                                    @endforeach
                                </x-forms.select>
                                <x-forms.select col="col-lg-5 mb-3" name="member_type[]" class="member-type">
                                    <option value="">{{ _trans('landlord.Select One') }}</option>
                                    <option
                                        value="is_president" {{ old('member_type')[$key] == 'is_president' ? 'selected' : '' }}>{{ _trans('landlord.Is President') }}</option>
                                    <option
                                        value="is_admin" {{ old('member_type')[$key] == 'is_admin' ? 'selected' : '' }}>{{ _trans('landlord.Is Admin') }}</option>
                                    <option
                                        value="is_manager" {{ old('member_type')[$key] == 'is_manager' ? 'selected' : '' }}>{{ _trans('landlord.Is Manager') }}</option>
                                </x-forms.select>
                                <div class="col-lg-2">
                                    @if(!$loop->first)
                                        <button type="button" class="btn mt-0 btn-sm btn-danger remove-button"
                                                onclick="removeMember(this)">
                                            <i class="fa fa-times-circle"></i>
                                        </button>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    @else
                        @forelse($committee->members as $member)
                            <div class="row mb-4 align-items-center member-inputs">
                                <x-forms.select col="col-lg-5 mb-3" name="member_id[]" :showLabel="$loop->first"
                                                label="User" class="member-id">
                                    <option value="">{{ _trans('landlord.Select One') }}</option>
                                    @foreach ($users as $user)
                                        <option @if($user->id == $member->user_id) selected
                                                @endif value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </x-forms.select>
                                <x-forms.select col="col-lg-5 mb-3" name="member_type[]"
                                                :showLabel="$loop->first" label="Membership Type" class="member-type">
                                    <option value="">{{ _trans('landlord.Select One') }}</option>
                                    <option @if($member->member_type == 'is_president') selected
                                            @endif value="is_president">{{ _trans('landlord.President') }}</option>
                                    <option @if($member->member_type == 'is_admin') selected
                                            @endif value="is_admin">{{ _trans('landlord.Admin') }}</option>
                                    <option @if($member->member_type == 'is_manager') selected
                                            @endif value="is_manager">{{ _trans('landlord.Manager') }}</option>
                                </x-forms.select>
                                <div class="col-lg-2">
                                    <button type="button" class="btn mt-3 btn-sm btn-danger remove-button"
                                            onclick="removeMember(this)">
                                        <i class="fa fa-times-circle"></i>
                                    </button>
                                </div>
                            </div>
                        @empty
                            <div class="row mb-4 align-items-center member-inputs">
                                <x-forms.select col="col-lg-5 mb-3" name="member_id[]"
                                                label="User" class="member-id">
                                    <option value="">{{ _trans('landlord.Select One') }}</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </x-forms.select>
                                <x-forms.select col="col-lg-5 mb-3" name="member_type[]"
                                                label="Membership Type" class="member-type">
                                    <option value="">{{ _trans('landlord.Select One') }}</option>
                                    <option value="is_president">{{ _trans('landlord.President') }}</option>
                                    <option value="is_admin">{{ _trans('landlord.Admin') }}</option>
                                    <option value="is_manager">{{ _trans('landlord.Manager') }}</option>
                                </x-forms.select>
                                <div class="col-lg-2">
                                    <button type="button" class="btn mt-3 btn-sm btn-danger remove-button"
                                            onclick="removeMember(this)">
                                        <i class="fa fa-times-circle"></i>
                                    </button>
                                </div>
                            </div>
                        @endforelse
                    @endif
                </div>
                <div class="card-footer">
                    <div class="col-lg-2">
                        <button type="button" class="btn mt-2 btn-sm btn-success add-more-button"
                                onclick="addMember()">
                            {{ _trans('landlord.Add More') }} <i class="fa fa-plus-circle"></i>
                        </button>
                    </div>
                    <x-button></x-button>
                </div>
            </div>
        </form>
    </div>
@endsection
@push('script')
    <script>
        const addMember = () => {
            $('#form-container').append(`
                <div class="row mb-4 align-items-center member-inputs">
                    <x-forms.select col="col-lg-5 mb-3" name="member_id[]" class="member-id">
                        <option value="">{{ _trans('landlord.Select One') }}</option>
                        @foreach ($users as $user)
            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
            </x-forms.select>
            <x-forms.select col="col-lg-5 mb-3" name="member_type[]" class="member-type">
                <option value="">{{ _trans('landlord.Select One') }}</option>
                        <option value="is_president">{{ _trans('landlord.President') }}</option>
                        <option value="is_admin">{{ _trans('landlord.Admin') }}</option>
                        <option value="is_manager">{{ _trans('landlord.Manager') }}</option>
                    </x-forms.select>
                    <div class="col-lg-2">
                        <button type="button" class="btn mt-3 btn-sm btn-danger remove-button" onclick="removeMember(this)">
                            <i class="fa fa-times-circle"></i>
                        </button>
                    </div>
                </div>
            `);
            reinitializeNiceSelect();
        }

        const removeMember = (obj) => {
            $(obj).closest('.member-inputs').remove();
        }

        // Check member ID existence

        const isMemberExist = (memberID) => {
            let count = 0;
            $('#form-container').find('.member-id').each(function () {
                if ($(this).val() && $(this).val() == memberID) {
                    count++;
                }
            });
            return count > 1 ? true : false;
        }

        $('#form-container').on('change', '.member-id', function () {
            let memberID = $(this).val();
            let isExist = isMemberExist(memberID);
            if (isExist) {
                toastr('warning', `{{ _trans('landlord.Member already taken') }}`);
                $(this).val('');
                reinitializeNiceSelect();
            }
        });

        // Check member Type existence
        const isMemberTypeExist = (memberType) => {
            let count = 0;
            $('#form-container').find('.member-type').each(function () {
                if ($(this).val() && $(this).val() == 'is_president') {
                    count++;
                }
            });
            return count > 1 ? true : false;
        }

        $('#form-container').on('change', '.member-type', function () {
            let memberType = $(this).val();
            let isExist = isMemberTypeExist(memberType);
            if (isExist) {
                toastr('warning', `{{ _trans('landlord.Member type already taken') }}`);
                $(this).val('');
                reinitializeNiceSelect();
            }
        });
    </script>
@endpush
