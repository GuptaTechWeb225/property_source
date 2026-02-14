@extends('backend.master')
@section('title')
    {{ $title }}
@endsection
@section('content')
    <x-container title="{{ $title }}" :breadcrumbs="[['title' => 'page_title'],['title' => $title]]">
        <div class="table-content table-basic mt-20">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">{{ _trans('common.page_title') }}</h4>
                </div>
                <div class="card-body ot-card">
                    <div class="table-responsive">
                        <table class="table table-bordered ot-table-bg">
                            <thead class="thead">
                            <tr>
                                <th class="serial">{{ _trans('common.SR No') }}</th>
                                <th>{{ _trans('common.Name') }}</th>
                                <th>{{ _trans('common.Type') }}</th>
                                <th>{{ _trans('common.Status') }}</th>
                                <th class="action">{{ _trans('common.Action') }}</th>
                            </tr>
                            </thead>
                            <tbody class="tbody">
                            @forelse($collection as $row)
                                <tr>
                                    <th>{{ $loop->iteration }}</th>
                                    <td>{{ $row->name }}</td>
                                    <td class="text-capitalize">{{ $row->type }}</td>
                                    <td>
                                        @if ($row->status == 'active')
                                            <span
                                                class="badge-basic-success-text">{{ _trans('landlord.active') }}</span>
                                        @else
                                            <span
                                                class="badge-basic-danger-text">{{ _trans('landlord.inactive') }}</span>
                                        @endif
                                    </td>
                                    <td class="action">
                                        <x-action.dropdown>
                                            <x-action.button
                                                text="Edit"
                                                route="{{ route('account_category.edit',$row->id) }}">
                                            </x-action.button>

                                            <x-action.button
                                                onclick="delete_row('account-category/destroy', '{{$row->id}}')"
                                                text="Delete"
                                                icon="fa-solid fa-trash-can">
                                            </x-action.button>
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
