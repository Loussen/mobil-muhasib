crud.field('stores').subfield('type').onChange(function(field) {
    const priceField = crud.field('stores').subfield('price', field.rowNumber);

    if (field.value == 1 || !field.value) {
        priceField.hide();
    } else {
        priceField.show();
    }
}).change();

crud.field('workers').subfield('work_status').onChange(function(field) {
    const terminationDateField = crud.field('workers').subfield('termination_date', field.rowNumber);

    if (field.value == 1) {
        terminationDateField.hide();
    } else {
        terminationDateField.show();
    }
}).change();
