@extends('backend.master')
@section('title',@$title)
@php
    $model = 'properties.categories';
@endphp
@section('content')
    <x-container title="{{ $title }}" :breadcrumbs="[['title' => 'Property'],['title' => $title]]">
        <x-tablecontent :title="$title" route="{{ route($model.'.create') }}">
            <x-table.basetable>
                <x-table.thead :items="['Parent','Name','Featured','Icon','Status']"></x-table.thead>
                <x-table.tbody>
                    @forelse($collection ?? [] as $row)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ @$row->parent->name }}</td>
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->is_featured ? _trans('common.Yes') : _trans('common.No') }}</td>
                            <td><i class="{{ $row->icon_class }}"></i></td>
                            <td>
                                <x-table.status>{{ $row->status }}</x-table.status>
                            </td>
                            <td>
                                <x-action.dropdown>
                                    <x-action.button
                                        text="Edit"
                                        route="{{ route($model.'.edit',$row->id) }}">
                                    </x-action.button>

                                    <x-action.button
                                        onclick="delete_row('{{ 'property/categories/delete' }}', '{{$row->id}}')"
                                        text="Delete"
                                        icon="fa-solid fa-trash-can">
                                    </x-action.button>
                                </x-action.dropdown>
                            </td>
                        </tr>
                    @empty
                        <x-emptytable></x-emptytable>
                    @endforelse
                </x-table.tbody>
            </x-table.basetable>
        </x-tablecontent>
    </x-container>
@endsection

@push('script')
    @include('backend.partials.delete-ajax')
@endpush
