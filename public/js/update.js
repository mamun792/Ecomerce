$(document).ready(function(){
    $('[data-form-id]').on('submit', function(e){
        e.preventDefault();

        var formData = $(this).serialize(); 

        $.ajax({
            url: $(this).attr('action'),
            type: "POST", 
            data: formData,
            success: function(response){
                console.log(response); 
                var modalId = $(e.target).data('form-id'); 
                $('#editProductModal' + modalId).modal('hide');
            },
            error: function(xhr, status, error){
                console.error(xhr.responseText); 
            }
        });
    });
});
