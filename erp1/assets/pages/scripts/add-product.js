
jQuery(document).ready(function() {

    $("#category_id").select2({
        placeholder: 'select the category',
    });
    $("#supplier_id").select2({
        placeholder:'select...',
        multiple:true,
    });
});