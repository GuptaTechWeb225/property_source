        <script>
            $(document).ready(function() {
                $("#country").change(function() {
                    var countryId = $(this).val();

                    var baseUrl = $('meta[name="base-url"]').attr("content");

                    $.ajax({
                        url: baseUrl + "/fetch-states/" + countryId,
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

                    $.ajax({
                        url: "/properties/get-cities/" + stateId,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('#city_1').empty();
                            $.each(data.cities, function(key, value) {
                                $('#city_1').append('<option value="' + value
                                    .id + '">' + value.name + '</option>');
                            });
                            $('#city_1').niceSelect('destroy');
                            $('#city_1').niceSelect();
                        },
                        error: function(xhr, textStatus, errorThrown) {
                            console.error(xhr.responseText);
                        }
                    });
                });

            });
        </script>
