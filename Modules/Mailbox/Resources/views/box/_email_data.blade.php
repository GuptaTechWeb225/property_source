<table class="table table-bordered" id="mailbox-data">
    <thead class="thead">
        <tr>
            <th><input class="form-check-input" type="checkbox" id="selectAllCheckbox" value="selectAll"></th>
            <th>{{ _trans('common.Sender') }}</th>
            <th>{{ _trans('common.Subject') }}</th>
            <th>{{ _trans('common.Date') }}</th>
            <th>&nbsp;</th>
        </tr>
    </thead>
    <tbody class="tbody">
        @forelse ($items as $key => $item)
            <tr>
                <td>
                    <input class="form-check-input checkMailClass" type="checkbox" value="{{ $item->id }}">
                    @if ($item->is_starred == 1)
                        <a href="#" data-id="{{ $item->id }}" data-type="not-starred" class="_manage_starred">
                            <i class="fa-solid fa-star"></i>
                        </a>
                    @else
                        <a href="#" data-id="{{ $item->id }}" data-type="starred" class="_manage_starred">
                            <i class="fa-regular fa-star"></i>
                        </a>
                    @endif
                    @if ($item->is_important == 1)
                        <a href="#" data-id="{{ $item->id }}" data-type="not-important"
                            class="_manage_important">
                            <i class="fa-solid fa-bookmark"></i>
                        </a>
                    @else
                        <a href="#" data-id="{{ $item->id }}" data-type="important" class="_manage_important">
                            <i class="fa-regular fa-bookmark"></i>
                        </a>
                    @endif
                </td>
                <td width="15%" class="cursor-pointer">
                    <div class="d-flex align-items-center gap-2">
                        <b class="text-dark">{{ $item->createdByUser->name ?? '' }}</b>
                    </div>
                </td>
                <td width="75%" class="cursor-pointer">
                    <a href="{{ route('email.box.show', $item->id)}}"
                        class="{{ $item->is_read == 0 ? 'fw-bold' : '' }}">{!! ($item->childrens_count != 0) ? '<i class="las la-reply"></i>' : '' !!} {{ Str::limit($item->subject, 200, '...') }} ({{$item->childrens_count}}) </a>
                </td>
                <td width="7%" class="text-end cursor-pointer">
                    {{ $item->created_at->diffForHumans() }}
                </td>
                <td>
                    @if ($item->status == 'trash')
                        <button onclick="permanentDelete({{ $item->id }})" class="dropdown-item">
                            <i class="fa-regular fa-circle-xmark text-danger"></i>
                        </button>
                    @elseif ($item->is_trash != 'trash')
                        <button onclick="deleteMailData({{ $item->id }})" class="dropdown-item">
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
<div class="ot-pagination pagination-content d-flex justify-content-end align-content-center py-3">
    <ul class="pagination justify-content-between">
        {{-- {{ $items->appends(request()->input())->links('pagination::bootstrap-4') }} --}}
    </ul>
</div>
