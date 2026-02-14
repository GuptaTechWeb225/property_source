@extends('backend.master')

@section('title')
    {{ $title }}
@endsection

@section('content')
    <x-container title="{{ $title }}" :breadcrumbs="[['title' => 'Time Slot']]">
        <div class="table-content table-basic mt-20">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">{{ _trans('common.Time Slot') }}</h4>
                    <a href="{{ route('backend.timeslot.create') }}" class="btn btn-lg ot-btn-primary">
                        <i class="las la-plus"></i> {{ _trans('common.Add New') }}
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered role-table">
                            <thead class="thead">
                            <tr>
                                <th class="serial">{{ _trans('landlord.SR No') }}</th>
                                <th class="purchase">{{ _trans('landlord.Start Time') }}</th>
                                <th class="purchase">{{ _trans('landlord.End Time') }}</th>
                                <th class="purchase">{{ _trans('landlord.Duration') }}</th>
                                <th class="purchase">{{ _trans('landlord.Capacity') }}</th>
                                <th class="action">{{ _trans('landlord.action') }}</th>
                            </tr>
                            </thead>
                            <tbody class="tbody">
                            @forelse($timeslots as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $row->start_time }}</td>
                                    <td>{{ $row->end_time }}</td>
                                    <td>{{ $row->duration }}</td>
                                    <td>{{ $row->capacity }}</td>
                                    <td class="action">
                                        <x-action.dropdown>
                                            <x-action.button
                                                route="{{ route('backend.timeslot.edit', $row->id) }}"
                                                text="Edit"
                                                icon="fa-solid fa-edit"
                                            ></x-action.button>
                                            <x-action.button
                                                text="Delete"
                                                icon="fa-solid fa-trash-can"
                                                onclick="delete_row('backend/timeslot/destroy', {{ $row->id }})"
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
