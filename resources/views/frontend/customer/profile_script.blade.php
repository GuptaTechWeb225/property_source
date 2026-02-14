    <script>
        var fileInp = document.getElementById("fileBrouse");

        if (fileInp) {
            fileInp.addEventListener("change", showFileName);

            function showFileName(event) {
                var fileInp = event.srcElement;
                var fileName = fileInp.files[0].name;
                document.getElementById("placeholder").placeholder = fileName;
            }
        }
        $(document).ready(function() {
            //Update Address
            $('.editModalAddress').on('click', function(event) {
                event.preventDefault();
                let id = $(this).attr('data-id');
                let fordIdData = $('#editForm-' + id).serialize();


                let url = $('#editForm-' + id).attr('action');

                $.ajax({
                    url: url,
                    type: 'post',
                    data: fordIdData,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        // Handle success response
                        $('#editModal').modal('hide');
                        location.reload();
                    },
                    error: function(xhr) {
                        // Handle error response
                    }
                });
            });
            // Update Emergency Contact
            $('.editEmergencyModalBtn').on('click', function(event) {
                event.preventDefault();
                let id = $(this).attr('data-id');
                let fordIdData = $('#editEmergencyForm-' + id).serialize();

                let url = $('#editEmergencyForm-' + id).attr('action');

                $.ajax({
                    url: url,
                    type: 'post',
                    data: fordIdData,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        // Handle success response
                        // $('#emergencyContactEditModal-' + response.id).modal('hide');
                        location.reload();
                    },
                    error: function(xhr) {
                        // Handle error response
                    }
                });
            });
        });
    </script>
