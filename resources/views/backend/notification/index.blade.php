@extends('backend.master')
@section('title')
    {{ $title }}
@endsection
@section('content')
    <x-container title="{{ $title }}" :breadcrumbs="[['title' => 'Notifications'],['title' => $title]]">
        <div class="table-content table-basic mt-20">
            <div class="card">
                <div class="card-header border-0 py-2">
                    <div class="row align-items-center">
                        <div class="col-lg-2 bulk-action">
                            <div class="d-flex align-items-center gap-4 ms-2">
                                <input class="form-check-input" type="checkbox" id="select-all">
                                <div class="d-flex align-items-center gap-4">
                                    <a href="javascript:" onclick="cheledtedItemAction('delete')"
                                       data-bs-toggle="tooltip" data-bs-title="Delete" class="action-button disabled"><i
                                            class="fa fa-trash"></i></a>
                                    <a href="javascript:" onclick="cheledtedItemAction('read')" data-bs-toggle="tooltip"
                                       data-bs-title="Mark as read" class="action-button disabled"><i
                                            class="fa fa-envelope-circle-check"></i></a>
                                </div>
                                <div class="btn-group">
                                    <a href="javascript:" data-bs-toggle="dropdown" class="action-button">
                                        <i class="fa fa-ellipsis-vertical"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item" href="{{ route('notification.allread') }}"><i
                                                    class="fa fa-envelope-circle-check"></i> {{ _trans('common.All mark as read') }}
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="{{ route('notification.alldelete') }}"><i
                                                    class="fa fa-trash"></i> {{ _trans('common.All Delele') }}</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-10">
                            <form action="" class="row" id="filterForm">
                                <x-forms.select col="col-lg-2" name="limit" onchange="changeFilter()">
                                    <option
                                        value="10" {{ request('limit') == 10 ? 'selected':'' }}>{{ _trans('number.10') }}</option>
                                    <option
                                        value="20" {{ request('limit') == 20 ? 'selected':'' }}>{{ _trans('number.20') }}</option>
                                    <option
                                        value="50" {{ request('limit') == 50 ? 'selected':'' }}>{{ _trans('number.50') }}</option>
                                    <option
                                        value="100" {{ request('limit') == 100 ? 'selected':'' }}>{{ _trans('number.100') }}</option>
                                    <option
                                        value="200" {{ request('limit') == 200 ? 'selected':'' }}>{{ _trans('number.200') }}</option>
                                </x-forms.select>
                                <x-forms.select col="col-lg-2" name="status" onchange="changeFilter()">
                                    <option value="">{{ _trans('common.Status') }}</option>
                                    <option
                                        value="unread" {{ request('status') == 'unread' ? 'selected':'' }}>{{ _trans('common.Unread') }}</option>
                                    <option
                                        value="read" {{ request('status') == 'read' ? 'selected':'' }}>{{ _trans('common.Read') }}</option>
                                </x-forms.select>
                                <x-forms.select col="col-lg-2" name="sorting" onchange="changeFilter()">
                                    <option value="">{{ _trans('common.Sorting') }}</option>
                                    <option
                                        value="newest" {{ request('sorting') == 'newest' ? 'selected':'' }}>{{ _trans('common.Newest') }}</option>
                                    <option
                                        value="oldest" {{ request('sorting') == 'oldest' ? 'selected':'' }}>{{ _trans('common.Oldest') }}</option>
                                </x-forms.select>
                                <x-forms.input col="col-lg-5" value="{{ request('keyword') }}" name="keyword" placeholder="Search with title, message."></x-forms.input>
                                <div class="col-lg-1">
                                    <button type="submit" class="btn ot-btn-primary btn-lg"><i class="fa fa-search"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card-body ot-card">
                    <form action="{{ route('notification.selected_item_ation') }}" id="selected-items" method="post">
                        @csrf
                        <table class="table-borderless table">
                            @forelse($notifications as $notification)
                                <tr class="notification-message {{ $notification->is_read ? 'read':'' }}">
                                    <td>
                                        <div class="form-check" data-bs-toggle="tooltip" data-bs-title="Select">
                                            <input class="form-check-input" type="checkbox" name="notification_ids[]"
                                                   value="{{ $notification->id }}"
                                                   id="{{ $notification->id }}">
                                        </div>
                                    </td>
                                    <td>
                                        <a href="{{ route('notification.show', $notification->id) }}" class="d-flex justify-content-start align-items-center gap-3">
                                            <h5 class="m-0">{{ $notification->title }}</h5>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('notification.show', $notification->id) }}" class="d-flex justify-content-start align-items-center gap-3">
                                            <div>
                                                {!!  $notification->message !!}
                                            </div>
                                        </a>
                                    </td>
                                    <td>
                                        <span class="text-truncate">{{ date('M d', strtotime($notification->creatd_at)) }}</span>
                                    </td>
                                    <td class="d-flex align-items-center">
                                        <a href="javascript:"
                                           onclick="delete_row('notification/delete', {{ $notification->id }})"
                                           data-bs-toggle="tooltip" data-bs-title="Delete" class="action-button"><i
                                                class="fa fa-trash"></i></a>
                                        <a href="{{ route('notification.change_status',['id' => $notification->id,'status'=>$notification->is_read]) }}"
                                           data-bs-toggle="tooltip"
                                           data-bs-title="Mark as {{ $notification->is_read ? 'unread':'read' }}"
                                           class="action-button"><i class="fa fa-envelope-circle-check"></i></a>
                                    </td>
                                </tr>
                            @empty
                                <x-emptytable></x-emptytable>
                            @endforelse
                        </table>
                    </form>
                    <div
                        class="ot-pagination pagination-content d-flex justify-content-start align-content-center py-3">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                {!! $notifications->links() !!}
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </x-container>
@endsection
@push('script')
    <script>
        const changeFilter = () => {
            $('#filterForm').submit();
        }
        const cheledtedItemAction = (status) => {
            $('#selected-items').append(`
                <input type="hidden" name="status"  value="${status}" />
           `)
            $('#selected-items').submit();
        }
    </script>
    <script>
        const selectAllCheckbox = document.getElementById('select-all');
        const checkboxes = document.querySelectorAll('input[name="notification_ids[]"]');
        const actionButton = document.querySelectorAll('.bulk-action a.action-button');

        selectAllCheckbox.addEventListener('change', function () {
            checkboxes.forEach(checkbox => {
                checkbox.checked = selectAllCheckbox.checked;
            });

            if (selectAllCheckbox.checked) {
                actionButton.forEach(button => {
                    button.classList.remove('disabled');
                });
            } else {
                actionButton.forEach(button => {
                    button.classList.add('disabled');
                });
            }
        });

        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', function () {
                selectAllCheckbox.checked = checkbox.checked;

                if (selectAllCheckbox.checked) {
                    actionButton.forEach(button => {
                        button.classList.remove('disabled');
                    });
                } else {
                    actionButton.forEach(button => {
                        button.classList.add('disabled');
                    });
                }
            })
        });
    </script>
@endpush
@push('script')
    @include('backend.partials.delete-ajax')
@endpush
