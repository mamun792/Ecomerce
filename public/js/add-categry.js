// Code for adding category
        $(document).ready(function() {
            $('#addCategoryForm').on('submit', function(e) {
                e.preventDefault();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "POST",
                   // url: "{{ route('category.store') }}",
                    url: categoryStoreRoute,
                    data: new FormData(this),
                    processData: false,
                    contentType: false,
                    success: function(res) {
                        console.log(res);
                        $('#addCategoryModal').modal('hide');
                        $('#addCategoryForm')[0].reset();

                    },
                    error: function(err) {
                        console.log(err);

                    }
                });
            });
        });
