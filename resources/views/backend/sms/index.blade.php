@extends('backend.master')
@section('title', $title)
@section('style')
    <link rel="stylesheet" href="{{ url('backend/vendors/summernote/summernote-bs5.min.css') }}">
@endsection
@section('content')
    <div class="page-content">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h4 class="bradecrumb-title mb-1">{{ $title }}</h1>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ _trans('common.home') }}</a>
                            </li>
                            <li class="breadcrumb-item">{{ $title }}</li>
                        </ol>
                </div>
            </div>
        </div>
        <div class="table-content table-basic">
            <div class="row">
                <div class="col-md-2">
                    @include('backend.sms._sidebar')
                </div>
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-content table-basic mt-20">
                                <div class="card">
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <h4 class="mb-0">{{ _trans('common.SMS Logs') }}</h4>
                                    </div>
                                    <div class="card-body ot-card">
                                        <div class="table-responsive">
                                            <table class="table table-bordered ot-table-bg language-table">
                                                <thead class="thead">
                                                    <tr>
                                                        <th class="serial">{{ _trans('common.sr no') }}</th>
                                                        <th class="purchase">{{ _trans('common.Receiver Name') }}</th>
                                                        <th class="purchase">{{ _trans('common.Receiver Phone') }}</th>
                                                        <th class="purchase">{{ _trans('common.Is Sent') }}</th>
                                                        <th class="purchase">{{ _trans('common.Message') }}</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="tbody">
                                                    @forelse ($items as $key => $item)
                                                        <tr>
                                                            <td>{{ $key + 1 }}</td>
                                                            <td>{{ @$item->name }}</td>
                                                            <td>{{ @$item->phone }}</td>
                                                            <td><span
                                                                    class="badge badge-pill {{ @$item->is_sent == 1 ? 'badge-basic-primary-text' : 'badge-basic-warning-text' }}">{{ @$item->is_sent == 1 ? 'Sent' : 'Pending' }}</span>
                                                            </td>
                                                            <td>{{ @$item->message }}</td>
                                                        </tr>
                                                    @empty
                                                        @if (Request::is('sms/box'))
                                                            <tr>
                                                                <td colspan="100%">
                                                                    <p class="text-center">
                                                                        {{ _trans('common.No data found') }}</p>
                                                                </td>
                                                            </tr>
                                                        @endif
                                                    @endforelse
                                                </tbody>
                                            </table>
                                            <div
                                                class="ot-pagination pagination-content d-flex justify-content-end align-content-center py-3">
                                                <ul class="pagination justify-content-between">
                                                    {{ $items->appends(request()->input())->links('pagination::bootstrap-4') }}
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('script')

@endsection
