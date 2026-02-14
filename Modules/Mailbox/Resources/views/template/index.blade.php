@extends('backend.master')
@section('title', @$title)

@section('content')
    {!! breadcrumb([
        'title' => @$title,
        route('dashboard') => _trans('common.Dashboard'),
        '#' => @$title,
    ]) !!}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="table-content table-basic">
                        <!-- toolbar table start -->
                        <div
                            class="table-toolbar d-flex flex-wrap gap-2 flex-xl-row justify-content-center justify-content-xxl-between align-content-center pb-3">
                            <div class="align-self-center">
                                <div class="d-flex flex-wrap gap-2  flex-lg-row justify-content-center align-content-center">

                                    <div class="align-self-center d-flex flex-wrap gap-2">
                                        <!-- add btn -->
                                        <form action="{{ url()->current() }}" method="GET" class="d-flex">
                                            <div class="align-self-center">
                                                <div class="search-box d-flex">
                                                    <input class="form-control" placeholder="{{ _trans('common.Search') }}"
                                                        name="search">
                                                </div>
                                            </div>
                                            <div class="align-self-center d-flex flex-wrap gap-4 nml">
                                                <div class="align-self-center">
                                                    @if (hasPermission('mailbox_template_search'))
                                                        <button type="submit" class="btn-add" data-bs-toggle="tooltip"
                                                            data-bs-placement="right"
                                                            data-bs-title="{{ _trans('common.Search') }}">
                                                            <span class="icon"><i
                                                                    class="fa-solid fa-magnifying-glass"></i></span>
                                                            <span class="d-none d-xl-inline">
                                                                {{ _trans('common.Search') }}</span>
                                                        </button>
                                                    @endif
                                                </div>
                                            </div>
                                        </form>
                                        <div class="align-self-center">
                                            @if (hasPermission('mailbox_template_create'))
                                                <a href="{{ url('mailbox/template/create') }}" class="btn-add"
                                                    data-bs-toggle="tooltip" data-bs-placement="right"
                                                    data-bs-title="{{ _trans('common.Create') }}">
                                                    <span><i class="fa-solid fa-plus"></i> </span>
                                                    <span class="d-none d-xl-inline">
                                                        {{ _trans('common.Create') }}</span>
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--  table start -->
                        <div class="table-responsive">
                            <table class="table table-bordered" id="folder_file_table">
                                <thead class="thead">
                                    <tr>
                                        <th>{{ _trans('common.SL.') }}</th>
                                        <th>{{ _trans('common.Title') }}</th>
                                        <th>{{ _trans('common.Description') }}</th>
                                        <th>{{ _trans('common.Created Date') }}</th>
                                        <th>{{ _trans('common.Action') }}</th>
                                    </tr>
                                </thead>
                                <tbody class="tbody">
                                    @forelse ($items as $key => $item)
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td>{{ $item['title'] ?? '' }} </td>
                                            <td>{!! $item['description'] ?? '' !!} </td>
                                            <td>{{ date('Y-m-d h:i:s A', strtotime($item['created_at'])) }}</td>
                                            <td>
                                                <div class="dropdown dropdown-action">
                                                    <button type="button" class="btn-dropdown" data-bs-toggle="dropdown"
                                                        aria-expanded="false">
                                                        <i class="fa-solid fa-ellipsis"></i>
                                                    </button>
                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                        <a href="{{ url('/mailbox/template/edit', $item['id']) }}"
                                                            class="dropdown-item">
                                                            <span class="icon mr-8"><i
                                                                    class="fa-solid fa-edit"></i></span>{{ _trans('common.Edit') }}</a>

                                                        <button onclick="confirmDelete('{{ $item['id'] }}')"
                                                            class="dropdown-item">
                                                            <span class="icon mr-8"><i
                                                                    class="fa-solid fa-trash"></i></span>{{ _trans('common.Delete') }}</button>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="100%" class="text-center">
                                                {{ $no_data }}
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <!--  table end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        function confirmDelete(itemId) {
            showDeleteConfirmation().then(result => {
                if (result.isConfirmed) {
                    deleteTemplate(itemId);
                }
            });
        }

        function showDeleteConfirmation() {
            return new Promise((resolve) => {
                Swal.fire({
                    title: `{{ _trans('Are you sure?') }}`,
                    text: `{{ _trans('alert.You are about to delete this item.') }}`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: `{{ _trans('alert.Yes, delete it!') }}`,
                }).then((result) => {
                    resolve(result);
                });
            });
        }

        function deleteTemplate(itemId) {
            sendDeleteRequest(itemId)
                .then(response => {
                    handleDeleteResponse(response);
                })
                .catch(() => {
                    handleDeleteError();
                });
        }

        function sendDeleteRequest(itemId) {
            return new Promise((resolve, reject) => {
                $.ajax({
                    url: `/mailbox/template/delete/${itemId}`,
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        resolve(response);
                    },
                    error: function() {
                        reject();
                    }
                });
            });
        }

        function handleDeleteResponse(response) {
            if (response.success) {
                showSuccessMessage();
            } else {
                showErrorMessage();
            }
        }

        function showSuccessMessage() {
            Swal.fire({
                title: 'Deleted!',
                text: `{{ _trans('alert.The item has been deleted') }}`,
                icon: 'success'
            }).then(() => {
                window.location.reload();
            });
        }

        function showErrorMessage() {
            Swal.fire({
                title: 'Error!',
                text: `{{ _trans('alert.An error occurred while deleting the item.') }}`,
                icon: 'error'
            });
        }

        function handleDeleteError() {
            showErrorMessage();
        }
    </script>
@endsection
