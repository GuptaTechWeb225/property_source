@extends('backend.master')
@section('title')
    {{ @$title }}
@endsection

@section('content')
    <x-container title="{{ $title }}" :breadcrumbs="[['title' => 'Settings'],['title' => $title]]">
        <div class="table-content table-basic mt-20">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">{{ _trans('common.Database Backups') }}</h4>
                    @if(hasPermission('db_backup_create'))
                    <form action="{{ route('settings.database-backup-process') }}" method="get">
                        @csrf
                        <button type="submit" class="btn btn-lg ot-btn-primary">
                            <span><i class="las la-download"></i></span>
                            <span class="">{{ _trans('common.Backup Database') }}</span>
                        </button>
                    </form>
                    @endif
                </div>
                <div class="card-body ot-card">
                    <div class="table-responsive">
                        <table class="table table-bordered ot-table-bg language-table">
                            <thead class="thead">
                            <tr>
                                <th class="serial">{{ _trans('common.SR No.') }}</th>
                                <th class="purchase">{{ _trans('common.File name') }}</th>
                                <th class="purchase">{{ _trans('common.File Size') }}</th>
                                <th class="purchase">{{ _trans('common.Date') }}</th>
                                <th class="purchase">{{ _trans('common.Backup By') }}</th>
                                @if(hasPermission('db_backup_delete'))
                                <th class="purchase">{{ _trans('common.Action') }}</th>
                                @endif
                            </tr>
                            </thead>
                            <tbody class="tbody">
                            @forelse($logs as $log)
                                <tr>
                                    <td>{{  $loop->iteration }}</td>
                                    <td><span class="text-capitalize">{{ $log->file_name }}</span></td>
                                    <td>{{ formatFileSize($log->file_size) }}</td>
                                    <td>{{ formatDate($log->created_at) }}</td>
                                    <td>{{ $log->user->name}}</td>
                                    @if(hasPermission('db_backup_delete'))
                                    <td class="action">
                                        <a class="btn ot-btn-primary trash-button" href="javascript:void(0);"
                                           onclick="delete_row('database-backups/delete', {{ $log->id }})">
                                            <span class="icon mr-12"><i class="fa-solid fa-trash-can"></i></span>
                                        </a>
                                    </td>
                                    @endif
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
