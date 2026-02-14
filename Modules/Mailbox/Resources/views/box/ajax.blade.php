@include('mailbox::box._email_data')
<script>
    $('#pagination_select').on('change', function() {
        var paginationData = $(this).val();
        $.ajax({
            url: '/email/box',
            type: 'GET',
            data: {
                paginationData: paginationData
            },
            success: function(data) {
                $('#mailbox-data').html(data);
            }
        });
    });
</script>
@include('mailbox::box._common')

