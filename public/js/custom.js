$('select[name="city_id"]').on('select2:select', function() {
    let cityId = $(this).val();

    if (cityId) {
        $.get('/admin/get-country-id-by-city/' + cityId, function(data) {
            $('input[name="country_id"]').val(data.country_id);
        });
    }
});
