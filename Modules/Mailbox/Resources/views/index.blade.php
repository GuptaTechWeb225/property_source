@extends('backend.master')
@section('title', $title)

@section('content')
    {!! breadcrumb([
        'title' => $title,
        route('dashboard') => _trans('common.Dashboard'),
        '#' => $title,
    ]) !!}

    <div class="table-content table-basic">
        <div class="card">
            <div class="card-body">
                <div id="mailboxList">
                    <form id="bulkDeleteForm" action="{{ route('mailboxes.delete') }}" method="POST">
                        @csrf
                        <div class="table-toolbar d-flex gap-2 justify-content-between align-items-center">
                            <div class="d-flex gap-4 justify-content-between align-items-center">
                                @if (count($mailboxes))
                                    <input class="form-check-input ms-3 fs-6 cursor-pointer" type="checkbox" id="checkAll">
                                    <button type="button" onclick="confirmDelete()" class="d-none btn btn-sm btn-danger border-0 rounded-3" id="delete-btn">Delete Selected (<span id="count">0</span>)</button>
                                @endif
                            </div>
                            <a href="{{ route('mailboxes.create') }}" class="d-flex align-items-center gap-2 crm_theme_btn">
                                <i class="las la-pen fs-5"></i>
                                <span class="fs-6">{{ _trans('common.Compose') }}</span>
                            </a>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tbody class="tbody">
                                    @forelse($mailboxes ?? [] as $mailbox)
                                        <tr>
                                            <td width="3%">
                                                <input class="form-check-input mailbox-checkbox ms-3 fs-6 cursor-pointer" name="mailbox_ids[]" type="checkbox" value="{{ $mailbox->id }}">
                                            </td>
                                            <td width="15%" class="cursor-pointer" onclick="showDetails(`{{ $mailbox->id }}`)">
                                                <div class="d-flex align-items-center gap-2">
                                                    @if (count(@$mailbox->mailboxRecipients) > 1)
                                                        @foreach ($mailbox->mailboxRecipients ?? [] as $recipient)
                                                            <img src="{{ uploaded_asset(@$recipient->emailUser->avatar_id) }}" class="staff-profile-image-small {{ !$loop->first ? 'next-image' : '' }}" data-bs-toggle="tooltip" data-bs-title="{{ @$recipient->emailUser->name . ' (' . @$recipient->email . ')' }}">
                                                        @endforeach
                                                    @else
                                                        <img src="{{ uploaded_asset(@$mailbox->mailboxRecipients[0]->emailUser->avatar_id) }}" class="staff-profile-image-small" data-bs-toggle="tooltip" data-bs-title="{{ @$mailbox->mailboxRecipients[0]->email }}">
                                                        <b class="text-dark">{{ @$mailbox->mailboxRecipients[0]->emailUser->name }}</b>
                                                    @endif
                                                </div>
                                            </td>
                                            <td width="75%" class="cursor-pointer" onclick="showDetails(`{{ $mailbox->id }}`)">
                                                {{ Str::limit($mailbox->subject, 200, '...') }}
                                            </td>
                                            <td width="7%" class="text-end cursor-pointer" onclick="showDetails(`{{ $mailbox->id }}`)">
                                                {{ $mailbox->created_at->diffForHumans() }}
                                            </td>
                                        </tr>
                                    @empty
                                       
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </form>
                    <div class="ot-pagination pagination-content d-flex justify-content-end align-content-center py-3">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-between">
                                {{ $mailboxes->appends(request()->input())->links('pagination::bootstrap-4') }}
                            </ul>
                        </nav>
                    </div>
                </div>
                <div id="mailboxDetails">
                    
                </div>
            </div>
        </div>
    </div>
@endsection


@section('script')
    <script>
        const confirmDelete = () => {
            Swal.fire({
                title: `{{ _trans('common.Are you sure') }}`,
                text: `{{ _trans('common.You wont be able to revert this') }}`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: `{{ _trans('common.Yes, delete it') }}`
            }).then((confirmed) => {
                if (confirmed.isConfirmed) {
                    $('#bulkDeleteForm').submit();
                }
            });
        }
        
        const showDetails = async (id) => {
            $('#mailboxList').hide();
            $('#mailboxDetails').html(`
                <div class="text-center">
                    <div class="spinner-border spinner-border-sm" role="status">
                        <span class="visually-hidden">{{ _trans('common.Loading') }}...</span>
                    </div>
                    <span>{{ _trans('common.Loading') }}...</span>
                </div>
            `);
            $('#mailboxDetails').show();


            let url = `{{ route('mailboxes.show', ':id') }}`;
            url     = url.replace(':id', id);

            await $.ajax({
                url,
                method: "GET",
                success: function ({status, html}) {
                    if (status) {
                        $('#mailboxDetails').html(html);
                    }
                },
                error: function (error) {
                    console.log(error)
                },
            });

            $('[data-bs-toggle="tooltip"]').tooltip();
        }


        const hideDetails = () => {
            $('#mailboxList').show();
            $('#mailboxDetails').hide();
        }


        const toggleDeleteBtn = () => {
            let count = 0;

            $('.mailbox-checkbox').each(function () {
                if ($(this).is(":checked")) {
                    count++;
                }
            });

            $('#count').text(count);

            if (count) {
                $('#delete-btn').removeClass('d-none');
            } else {
                $('#delete-btn').addClass('d-none');
            }

            if ($('.mailbox-checkbox')?.length == count) {
                $('#checkAll').prop('checked', true);
            } else {
                $('#checkAll').prop('checked', false);
            }
        }


        $('#checkAll').on('click', function () {
            $('.mailbox-checkbox').prop('checked', $(this).is(":checked"));
            toggleDeleteBtn();
        });


        $('.mailbox-checkbox').on('click', function () {
            toggleDeleteBtn();
        });
    </script>
@endsection