@extends('backend.master')

@section('title')
    {{ $title }}
@endsection

@section('content')
    <x-container title="{{ $title }}" :breadcrumbs="[['title' => 'Home page'], ['title' => 'Faqs']]">
        <div class="table-content table-basic mt-20">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">{{ _trans('common.Faqs') }}</h4>
                    <a href="{{ route('faq.create') }}" class="btn ot-btn-primary"><i
                            class="fa fa-plus-circle"></i> {{ _trans('common.Add New') }}</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered role-table">
                            <thead class="thead">
                            <tr>
                                <th class="serial">{{ _trans('landlord.SR No') }}</th>
                                <th class="purchase">{{ _trans('landlord.Title') }}</th>
                                <th class="purchase">{{ _trans('landlord.Status') }}</th>
                                <th class="purchase">{{ _trans('landlord.Serial') }}</th>
                                <th class="purchase">{{ _trans('landlord.Created At') }}</th>
                                <th class="action">{{ _trans('landlord.action') }}</th>
                            </tr>
                            </thead>
                            <tbody class="tbody">
                            @forelse($faqs as $faq)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $faq->title }}</td>
                                    <td><x-table.status>{{ $faq->status }}</x-table.status></td>
                                    <td>{{ $faq->serial }}</td>
                                    <td>{{ date('Y-m-d', strtotime($faq->created_at)) }}</td>
                                    <td class="action">
                                        <x-action.dropdown>
                                            <x-action.button route="{{ route('faq.edit',$faq->id) }}" text="Edit"></x-action.button>
                                            <x-action.button
                                                text="Delete"
                                                icon="fa-solid fa-trash-can"
                                                onclick="delete_row('homepage/faqs/delete', {{ $faq->id }})"
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
