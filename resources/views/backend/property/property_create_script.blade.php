    <script>
        $(document).ready(function() {
            $("#country").change(function() {
                var countryId = $(this).val();
                var baseUrl = $('meta[name="base-url"]').attr("content");

                $.ajax({
                    url: baseUrl + "/properties/get-states/" + countryId,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('#state_2').empty();

                        $.each(data.states, function(key, value) {
                            $('#state_2').append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                        $('#state_2').niceSelect('destroy');
                        $('#state_2').niceSelect();


                    },
                    error: function(xhr, textStatus, errorThrown) {
                        console.error(xhr.responseText);
                    }
                });
            });

            $('#state_2').on('change', function() {
                var stateId = $(this).val();

                // Find all city dropdowns and update them
                $(".city-dropdown").each(function(index) {
                    var cityDropdown = $(this);
                    var cityId = "city_" + (index + 1); // Generate dynamic ID
                    cityDropdown.attr("id", cityId);


                    $.ajax({
                        url: "/properties/get-cities/" + stateId,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            cityDropdown.empty();
                            $.each(data.cities, function(key, value) {
                                cityDropdown.append('<option value="' + value
                                    .id + '">' + value.name + '</option>');
                            });

                            // Destroy any previous instance of niceSelect and reinitialize for the current dropdown
                            cityDropdown.niceSelect('destroy');
                            cityDropdown.niceSelect();
                        },
                        error: function(xhr, textStatus, errorThrown) {
                            console.error(xhr.responseText);
                        }
                    });
                });
            });

        });
    </script>
