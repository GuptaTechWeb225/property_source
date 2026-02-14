@extends('backend.master')
@section('title', $title)

@section('content')
    {!! breadcrumb([
        'title' => $title,
        route('dashboard') => _trans('common.Dashboard'),
        '#' => $title,
    ]) !!}
    <div class="table-content table-basic">
        <div class="row">
            <div class="col-md-2">
                @include('mailbox::box._sidebar')
            </div>
            <div class="col-md-10">
                <div class="card">
                    <div class="card-body">
                        <!-- toolbar table start -->
                        <div
                            class="table-toolbar d-flex flex-wrap gap-2 flex-xl-row justify-content-center justify-content-xxl-between align-content-center pb-3">
                            <div class="align-self-center">
                                <div class="d-flex flex-wrap gap-2  flex-lg-row justify-content-center align-content-center">
                                    <div class="align-self-center">
                                        <label>
                                            <span class="mr-8">{{ _trans('common.Show') }}</span>
                                            <select class="form-select d-inline-block" id="pagination_select">
                                                <option value="20">{{ _trans('20') }}</option>
                                                <option value="25">{{ _trans('25') }}</option>
                                                <option value="50">{{ _trans('50') }}</option>
                                                <option value="100">{{ _trans('100') }}</option>
                                            </select>
                                            <span class="ml-8">{{ _trans('common.Mail') }}</span>
                                        </label>
                                    </div>
                                    <!-- search -->
                                    <div class="align-self-center">
                                        <div class="search-box d-flex">
                                            <input id="search-input" class="form-control" value="{{ request('search') }}"
                                                placeholder="{{ _trans('common.Search') }}" name="search">
                                        </div>
                                    </div>
                                    <div class="align-self-center d-flex flex-wrap gap-2">
                                        <!-- add btn -->
                                        <div class="align-self-center">
                                            <a href="#" role="button" class="btn-add" data-bs-toggle="modal"
                                                data-bs-target="#exportCsvModal" data-bs-placement="right"
                                                data-bs-title="{{ _trans('common.CSV') }}">
                                                <span><i class="fa-solid fa-file-csv"></i></span>
                                                <span class="d-none d-xl-inline">{{ _trans('common.CSV') }}</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="align-self-center d-flex flex-wrap gap-2">
                                        <!-- add btn -->
                                        <div class="align-self-center">
                                            <a href="#" role="button" class="btn-add" data-bs-toggle="tooltip"
                                                data-bs-placement="right" data-bs-title="{{ _trans('common.Print') }}">
                                                <span><i class="fa-solid fa-print"></i> </span>
                                                <span class="d-none d-xl-inline">
                                                    {{ _trans('common.Print') }}</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="align-self-center">
                                <div class="onclick-tools-th"></div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <!--  table start -->
                            @include('mailbox::box._email_data')
                        </div>
                        <!--  pagination start -->
                        <div class="ot-pagination pagination-content d-flex justify-content-end align-content-center py-3">
                            <ul class="pagination justify-content-between">
                                {{ $items->appends(request()->input())->links('pagination::bootstrap-4') }}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Add this modal structure to your HTML -->
            <div class="modal fade lead-modal" id="exportCsvModal" tabindex="-1" aria-labelledby="exportCsvModalLabel"
                aria-hidden="true">
                @include('mailbox::box._modal')
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        function appendDataInMailBoxId(data) {
            var resultsContainer = $('#mailbox-data');
            resultsContainer.empty();
            if (data.length === 0) {
                resultsContainer.append(`
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="thead">
                            <tr>
                                <th>&nbsp;</th>
                                <th>{{ _trans('common.Sender') }}</th>
                                <th>{{ _trans('common.Subject') }}</th>
                                <th>{{ _trans('common.Date') }}</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>

                        <tbody class="tbody">
                            <tr>
                                <td colspan="100%" class="text-center">{{ _trans('common.No data found') }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            `);
            } else {
                data.forEach(function(result) {
                    const starredIcon = result.is_starred === 1 ? 'fa-solid' : 'fa-regular';
                    const bookmarkIcon = result.is_important === 1 ? 'fa-solid fa-bookmark' :
                        'fa-regular fa-bookmark';
                    const starType = result.is_starred === 1 ? 'not-starred' : 'starred';
                    const importantType = result.is_important === 1 ? 'not-important' : 'important';
                    resultsContainer.append(`
                        <tr>
                            <td>
                                <a href="#" class="star-icon" data-result-id="${result.id}" onclick="manageStarred(${result.id}, '${starType}')">
                                    <i class="${starredIcon} fa-star"></i>
                                </a>

                                <a href="#" data-result-id="${result.id}" onclick="manageImportant(${result.id}, '${importantType}')">
                                    <i class="${bookmarkIcon} fa-bookmark"></i>
                                </a>
                            </td>
                            <td>${result.subject}</td>
                            <td>From</td>
                            <td>
                                <button onclick="deleteMailData(${result.id})" class="dropdown-item">
                                    <span class="icon mr-8"><i class="fa-solid fa-trash"></i></span>
                                </button>
                            </td>
                        </tr>
                    `);
                });

            }
        }

        $('._filter_mailbox_status').click(function() {
            var dataValue = $(this).data('value');
            $.ajax({
                url: '/email/box/mailbox/live-search',
                type: 'GET',
                data: {
                    filter_status: dataValue
                },
                success: appendDataInMailBoxId
            });
        });

        $('#recipient_type').change(function() {
            var dataValue = $('#recipient_type').find(":selected").val();
            $.ajax({
                url: '/email/box/type/filter',
                type: 'GET',
                data: {
                    recipient_type: dataValue
                },
                success: appendDataInMailBoxId
            });
        });
    </script>
    @include('mailbox::box._common')
@endsection
