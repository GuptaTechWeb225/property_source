<script>
    function manageStarred(item_id, item_type) {
        $.ajax({
            url: '/email/box/manage/starred/ajax',
            type: 'GET',
            data: {
                item_id,
                item_type,
            },
            success: function({status, message}) {
                if (status) {
                    toastr('success', message);
                    setTimeout(() => {
                        location.reload();
                    }, 1000);
                } else {
                    toastr('error', message);
                }
            }
        });
    }

    $('._manage_starred').click(function() {
        var itemId = $(this).data('id');
        var itemType = $(this).data('type');
        manageStarred(itemId, itemType);
    });

    function manageImportant(itemId, itemType) {
        sendAjaxRequest(itemId, itemType);
    }

    $('._manage_important').click(function() {
        var itemId = $(this).data('id');
        var itemType = $(this).data('type');
        sendAjaxRequest(itemId, itemType);
    });

    function sendAjaxRequest(item_id, item_type) {
        $.ajax({
            url: '/email/box/manage/important/ajax',
            type: 'GET',
            data: {
                item_id,
                item_type,
            },
            success: function({status, message}) {
                if (status) {
                    toastr('success', message);
                    setTimeout(() => {
                        location.reload();
                    }, 1000);
                } else {
                    toastr('error', message);
                }
            }
        });
    }
    // Delete Data 
    function permanentDelete(itemId) {
        Swal.fire({
            title: `{{ _trans('alert.Are you sure?') }}`,
            text: `{{ _trans('alert.Are sure to delete this item.') }}`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: `{{ _trans('alert.Yes, delete it!') }}`,
        }).then((result) => {
            if (result.isConfirmed) {
                trashDataRemoveFinally(itemId);
            }
        });
    }

    function trashDataRemoveFinally(itemId) {
        $.ajax({
            url: `/email/box/trash/remove/${itemId}`,
            type: 'GET',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                Swal.fire({
                    title: `{{ _trans('alert.Success') }}`,
                    text: `{{ _trans('alert.The item has been moved to trash.') }}`,
                    icon: 'success'

                }).then(() => {
                    window.location.reload();
                });
            },
        });
    }

    function deleteMailData(itemId) {
        Swal.fire({
            title: `{{ _trans('alert.Are you sure?') }}`,
            text: `{{ _trans('alert.Are sure to trash this item.') }}`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: `{{ _trans('alert.Yes, trash it!') }}`,
        }).then((result) => {
            if (result.isConfirmed) {
                finallyDeleteData(itemId);
            }
        });
    }

    function finallyDeleteData(itemId) {
        $.ajax({
            url: `/email/box/delete/${itemId}`,
            type: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                Swal.fire({
                    title: `{{ _trans('alert.Success') }}`,
                    text: `{{ _trans('alert.The item has been moved to trash.') }}`,
                    icon: 'success'

                }).then(() => {
                    window.location.reload();
                });
            },
        });
    }

    var iconGroup = '<div class="btn-group" role="group" aria-label="Basic outlined example">' +
        '<button type="button" class="btn btn-outline-secondary" onclick="selectedDataStarred()" title="Make Star"><i class="fa-solid fa-star text-warning"></i></button>' +
        '<button type="button" class="btn btn-outline-secondary" onclick="selectedDataNotStarred()" title="Remove Star"><i class="fa-regular fa-star"></i></button>' +
        '<button type="button" class="btn btn-outline-secondary" onclick="selectedDataBookmarked()" title="Make Important"><i class="fa-solid fa-bookmark text-dark"></i></button>' +
        '<button type="button" class="btn btn-outline-secondary" onclick="selectedDataNotBookmarked()" title="Remove Important"><i class="fa-regular fa-bookmark"></i></button>' +
        '<button type="button" class="btn btn-outline-secondary" onclick="selectedDataMarkAsRead()" title="Set Read"><i class="fa-solid fa-comment"></i></button>' +
        '<button type="button" class="btn btn-outline-secondary" onclick="selectedDataMarkUnread()" title="Set Unread"><i class="fa-regular fa-comment"></i></button>' +
        '<a type="button" class="btn btn-outline-secondary" onclick="groupTrash()" title="Delete"><i class="fa-solid fa-trash text-danger"></i></a>' +
        '</div>';
    const selectedEmailIds = [];
    $('.checkMailClass').on('change', function() {
        var checkedCheckboxes = $('.checkMailClass:checked');
        var $divToToggle = $('.onclick-tools-th');
        selectedEmailIds.length = 0;

        checkedCheckboxes.each(function() {
            selectedEmailIds.push($(this).val());
        });

        if (selectedEmailIds.length > 0) {
            const mailIds = selectedEmailIds.join(',');
            $('.onclick-tools-th').html(iconGroup.replace("mailIds", mailIds));
            initializeTooltips();
        } else {
            $divToToggle.empty();
        }
    });

    $('#selectAllCheckbox').click(function() {
        var isChecked = $(this).prop('checked');
        $('.checkMailClass').prop('checked', isChecked);
        if (isChecked) {

            $('.checkMailClass:checked').each(function() {
                selectedEmailIds.push($(this).val());
            });
            if (selectedEmailIds.length > 0) {
                const mailIds = selectedEmailIds.join(',');
                $('.onclick-tools-th').html(iconGroup.replace("mailIds", mailIds));
            } else {
                $('.onclick-tools-th').empty();
            }
        } else {
            selectedEmailIds.length = 0;
            $('.onclick-tools-th').empty();
        }
    });

    function selectedDataStarred() {
        const mailIds = selectedEmailIds.join(',');
        $.ajax({
            url: `/email/box/group/starred`,
            type: 'GET',
            data: {
                ids: mailIds,
                type: 'starred',
            },
            success: function({status, message}) {
                if (status) {
                    toastr('success', message);
                    setTimeout(() => {
                        location.reload();
                    }, 1000);
                } else {
                    toastr('error', message);
                }
            }
        });
    }

    function selectedDataNotStarred() {
        const mailIds = selectedEmailIds.join(',');
        $.ajax({
            url: `/email/box/group/not/starred`,
            type: 'GET',
            data: {
                ids: mailIds,
                type: 'not-starred',
            },
            success: function({status, message}) {
                if (status) {
                    toastr('success', message);
                    setTimeout(() => {
                        location.reload();
                    }, 1000);
                } else {
                    toastr('error', message);
                }
            }
        });
    }

    function selectedDataBookmarked() {
        const mailIds = selectedEmailIds.join(',');
        $.ajax({
            url: `/email/box/group/bookmarked`,
            type: 'GET',
            data: {
                ids: mailIds,
                type: 'bookmarked',
            },
            success: function({status, message}) {
                if (status) {
                    toastr('success', message);
                    setTimeout(() => {
                        location.reload();
                    }, 1000);
                } else {
                    toastr('error', message);
                }
            }
        });
    }

    function selectedDataNotBookmarked() {
        const mailIds = selectedEmailIds.join(',');
        $.ajax({
            url: `/email/box/group/not/bookmarked`,
            type: 'GET',
            data: {
                ids: mailIds,
                type: 'not-bookmarked',
            },
            success: function({status, message}) {
                if (status) {
                    toastr('success', message);
                    setTimeout(() => {
                        location.reload();
                    }, 1000);
                } else {
                    toastr('error', message);
                }
            }
        });
    }

    function selectedDataMarkAsRead() {
        const mailIds = selectedEmailIds.join(',');
        $.ajax({
            url: `/email/box/group/mark/read`,
            type: 'GET',
            data: {
                ids: mailIds,
                type: 'read',
            },
            success: function({status, message}) {
                if (status) {
                    toastr('success', message);
                    setTimeout(() => {
                        location.reload();
                    }, 1000);
                } else {
                    toastr('error', message);
                }
            }
        });
    }

    function selectedDataMarkRead() {
        const mailIds = selectedEmailIds.join(',');
        $.ajax({
            url: `/email/box/group/mark/read`,
            type: 'GET',
            data: {
                ids: mailIds,
                type: 'read',
            },
            success: function(response) {
                toastr.success('{{ _trans('Item updated successfully') }}', 'Success');
                location.reload();
            },
        });
    }

    function selectedDataMarkUnread() {
        const mailIds = selectedEmailIds.join(',');
        $.ajax({
            url: `/email/box/group/unread`,
            type: 'GET',
            data: {
                ids: mailIds,
                type: 'unread',
            },
            success: function({status, message}) {
                if (status) {
                    toastr('success', message);
                    setTimeout(() => {
                        location.reload();
                    }, 1000);
                } else {
                    toastr('error', message);
                }
            }
        });
    }

    function groupTrash() {
        const mailIds = selectedEmailIds.join(',');
        $.ajax({
            url: `/email/box/mark/group/trash`,
            type: 'GET',
            data: {
                ids: mailIds
            },
            success: function({status, message}) {
                if (status) {
                    toastr('success', message);
                    setTimeout(() => {
                        location.reload();
                    }, 1000);
                } else {
                    toastr('error', message);
                }
            }
        });
    }
</script>
