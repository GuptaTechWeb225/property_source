@extends('backend.master')
@section('title', $title)

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
                    @include('mailbox::box._sidebar')
                </div>
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-body">
                            <div
                                class="table-toolbar d-flex flex-wrap gap-2 flex-xl-row justify-content-center justify-content-xxl-between align-content-center pb-3">
                                <div class="align-self-center">
                                    <div
                                        class="d-flex flex-wrap gap-2  flex-lg-row justify-content-center align-content-center">
                                        <form action="{{ url()->current() }}" method="GET" class="d-flex">
                                            <div class="align-self-center">
                                                <div class="search-box">

                                                    <input class="form-control" value="{{ request('search') }}"
                                                        placeholder="{{ _trans('common.Type keyword and hit enter') }}"
                                                        name="search">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="align-self-center">
                                    <div class="onclick-tools-th"></div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="mailbox-data">
                                    <thead class="thead">
                                        <tr>
                                            <th>
                                                <input class="form-check-input" type="checkbox" id="selectAllCheckbox"
                                                    value="selectAll">
                                            </th>
                                            <th>{{ _trans('common.Sender') }}</th>
                                            <th>{{ _trans('common.Subject') }}</th>
                                            <th>{{ _trans('common.Date') }}</th>
                                            <th>{{ _trans('common.Action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody class="tbody">
                                        @forelse ($items as $key => $item)
                                            <tr>
                                                <td>
                                                    <input class="form-check-input checkMailClass me-2" type="checkbox"
                                                        value="{{ $item->id }}">
                                                    @if ($item->is_starred == 1)
                                                        <a href="#" data-id="{{ $item->id }}"
                                                            data-type="not-starred" class="_manage_starred">
                                                            <i class="fa-solid fa-star text-warning"></i>
                                                        </a>
                                                    @else
                                                        <a href="#" data-id="{{ $item->id }}" data-type="starred"
                                                            class="_manage_starred">
                                                            <i class="fa-regular fa-star"></i>
                                                        </a>
                                                    @endif
                                                    @if ($item->is_important == 1)
                                                        <a href="#" data-id="{{ $item->id }}"
                                                            data-type="not-important" class="_manage_important">
                                                            <i class="fa-solid fa-bookmark text-dark"></i>
                                                        </a>
                                                    @else
                                                        <a href="#" data-id="{{ $item->id }}"
                                                            data-type="important" class="_manage_important">
                                                            <i class="fa-regular fa-bookmark"></i>
                                                        </a>
                                                    @endif
                                                </td>
                                                <td width="15%" class="cursor-pointer">
                                                    <div class="d-flex align-items-center gap-2">
                                                        <b class="text-dark">{{ $item->createdByUser->name ?? $item->sender_email }}</b>
                                                    </div>
                                                </td>
                                                <td width="75%" class="cursor-pointer">
                                                    <a href="{{ $item->status != 'draft' && $item->status != 'trash' ? route('email.box.show', $item->id) : '#' }}"
                                                        class="{{ $item->is_read == 0 ? 'fw-bold' : '' }}">{!! $item->childrens_count != 0 ? '<i class="las la-reply"></i>' : '' !!}
                                                        {{ Str::limit($item->subject, 200, '...') }}
                                                        @if ($item->childrens_count > 0)
                                                            ({{ $item->childrens_count ?? '' }})
                                                        @endif
                                                    </a>
                                                </td>
                                                <td width="7%" class="text-end cursor-pointer">
                                                    {{ $item->created_at->diffForHumans() }}
                                                </td>
                                                <td class="d-flex">
                                                    @if ($item->status == 'draft')
                                                        <a href="{{ route('email.box.draft.reply', $item['id']) }}">
                                                            <i class="las la-reply"></i>
                                                        </a>
                                                    @endif
                                                    @if ($item->deleted_at)
                                                        <button onclick="permanentDelete({{ $item->id }})"
                                                            class="dropdown-item">
                                                            <i class="fa-regular fa-circle-xmark text-danger"></i>
                                                        </button>
                                                    @elseif ($item->deleted_at == null)
                                                        <button onclick="deleteMailData({{ $item->id }})"
                                                            class="dropdown-item">
                                                            <span class="icon mr-8"><i class="fa-solid fa-trash"></i></span>
                                                        </button>
                                                    @endif
                                                </td>
                                            </tr>
                                        @empty
                                            @if (Request::is('email/box/trash/list') || Request::is('email/box'))
                                                <tr>
                                                    <td colspan="100%">
                                                        <p class="text-center">{{ _trans('common.No data found') }}</p>
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
                <div class="modal fade lead-modal" id="exportCsvModal" tabindex="-1" aria-labelledby="exportCsvModalLabel"
                    aria-hidden="true">
                    @include('mailbox::box._modal')
                </div>
            </div>
        </div>
    </div>
@endsection


@section('script')
    @include('mailbox::box._common')
@endsection
