$(document).ready(function () {
            $('#cityDropdown').change(function () {
                const cityId = $(this).val();
                if (cityId) {
                    $.ajax({
                        url: 'fetch_city_details.php', 
                        method: 'POST',
                        data: { geonameId: cityId },
                        success: function (data) {
                            $('#cityDetails').html(data);
                        },
                        error: function (err) {
                            console.error("Error fetching city details:", err);
                        }
                    });
                } else {
                    $('#cityDetails').html('');
                }
            });
        });
