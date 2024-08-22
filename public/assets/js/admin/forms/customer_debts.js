crud.field('status').onChange(function(field) {
    crud.field('payed_date').show(field.value == 1);
}).change();