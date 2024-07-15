
    $(document).ready(function() {
        $('#deleteProductForm{{ $product->id }}').on('submit', function(e) {
            e.preventDefault();
            var form = $(this);
            $.ajax({
                url: form.attr('action'),
                type: 'DELETE',
                data: form.serialize(),
                success: function(response) {
                    console.log(response); 
                    $('#deleteConfirmationModal{{ $product->id }}').modal('hide'); 
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText); 
                }
            });
        });
    });

