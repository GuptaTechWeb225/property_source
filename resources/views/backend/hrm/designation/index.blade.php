@extends('backend.master')
@php
    $model = 'designation';
@endphp
@section('title', $title)
@section('content')
    <x-container title="{{ $title }}" :breadcrumbs="[['title' => 'HRM'],['title' => $title]]">
        <x-tablecontent :title="$title" route="{{ route($model.'.create') }}">
            <x-table.basetable>
                <x-table.thead :items="['Title','Status']"></x-table.thead>
                <x-table.tbody>
                    @forelse($collection ?? [] as $row)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $row->title }}</td>
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
                                            onclick="delete_row('{{ $model.'/destroy' }}', '{{$row->id}}')"
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
