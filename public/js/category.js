
$(document).ready(function() {
    $('#category').change(function() {
        var categoryId = $(this).val();
        console.log(categoryId);
       
       
        $.ajax({
            url: categoryStoreRoute,
            type: 'GET',
            data: { category_id: categoryId },
            success: function(response) {
                $('#sub_category').empty().append('<option value="">Select SubCategory</option>');
                $.each(response, function(index, subcategory) {
                    $('#sub_category').append('<option value="' + subcategory.id + '">' + subcategory.name + '</option>');
                });
            },
            error:function(error){
                console.log(error);
            }
        });

    });
});
