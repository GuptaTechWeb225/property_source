<script>
    adlist();

    function adlist() {
        let adTypeVal = $('#advertisementType').val();
        if (adTypeVal === 'rent') {
            $('#rent').css('display', 'block');
            $('#sell').css('display', 'none');
        } else if (adTypeVal === 'sell') {
            $('#sell').css('display', 'block');
            $('#rent').css('display', 'none');
        }
    }
</script>
