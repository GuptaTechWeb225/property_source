@extends('backend.master')

@section('title')
    {{ $title }}
@endsection

@section('content')
    <x-container title="{{ $title }}" :breadcrumbs="[['title' => 'Appointment']]">
        <div class="table-content table-basic mt-20">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">{{ _trans('common.Appointments') }}</h4>
                    <a href="{{ route('backend.appointment.create') }}" class="btn btn-lg ot-btn-primary">
                        <i class="las la-plus"></i> {{ _trans('common.Add New') }}
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered role-table">
                            <thead class="thead">
                            <tr>
                                <th class="serial">{{ _trans('landlord.SR No') }}</th>
                                <th class="purchase">{{ _trans('landlord.Type') }}</th>
                                <th class="purchase">{{ _trans('landlord.Date') }}</th>
                                <th class="purchase">{{ _trans('landlord.Time') }}</th>
                                <th class="purchase">{{ _trans('landlord.Name') }}</th>
                                <th class="purchase">{{ _trans('landlord.Email') }}</th>
                                <th class="purchase">{{ _trans('landlord.Phone') }}</th>
                                <th class="purchase">{{ _trans('landlord.Property') }}</th>
                                <th class="purchase">{{ _trans('landlord.Property type') }}</th>
                                <th class="purchase">{{ _trans('landlord.Property address') }}</th>
                                <th class="purchase">{{ _trans('landlord.Message') }}</th>
                                <th class="action">{{ _trans('landlord.action') }}</th>
                            </tr>
                            </thead>
                            <tbody class="tbody">
                            @forelse($appointments as $appointment)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td class="text-capitalize">{{ str_replace('_',' ', $appointment->type) }}</td>
                                    <td class="fw-bold">{{ date('F d Y', strtotime($appointment->date)) }}</td>
                                    @if($appointment->type == 'book_viewing')
                                        <td class="fw-bold">{{ @$appointment->timeSlot->start_time }} - {{ @$appointment->timeSlot->end_time }}</td>
                                    @else
                                        <td class="fw-bold">{{ $appointment->time }}</td>
                                    @endif
                                    <td>{{ $appointment->name }}</td>
                                    <td><a href="mailto:{{ $appointment->email }}">{{ $appointment->email }}</a></td>
                                    <td>{{ $appointment->phone }}</td>
                                    <td>{{ @$appointment->property->name }}</td>
                                    <td>{{ $appointment->property_type }}</td>
                                    <td>{{ $appointment->message }}</td>
                                    <td>{{ $appointment->property_address }}</td>
                                    <td class="action">
                                        <x-action.dropdown>
                                            <a class="dropdown-item mb-3" href="tel:{{ $appointment->email }}">
                                                <span class="icon mr-8"><i class="las la-phone"></i> </span>{{ _trans('common.Make a call') }}
                                            </a>
                                            <a class="dropdown-item mb-3" href="mailto:{{ $appointment->email }}">
                                               <span class="icon mr-8"><i class="fa-solid fa-envelope text-ot-"></i> </span>{{ _trans('common.Send Mail') }}
                                            </a>
                                            <x-action.button
                                                route="{{ route('backend.appointment.edit', $appointment->id) }}"
                                                text="Edit"
                                                icon="fa-solid fa-edit"
                                            ></x-action.button>
                                            <x-action.button
                                                text="Delete"
                                                icon="fa-solid fa-trash-can"
                                                onclick="delete_row('backend/appointment/destroy', {{ $appointment->id }})"
                                            ></x-action.button>
                                        </x-action.dropdown>
                                    </td>
                                </tr>
                            @empty
                                <x-emptytable></x-emptytable>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </x-container>
@endsection
@push('script')
    @include('backend.partials.delete-ajax')
@endpush
