$(document).ready(function(){
    $(function () {
        $('.select2').select2();
        $('#products').DataTable();
        $('#category').DataTable();
    });

    $('.btn-del-product').click(function() {

        if (confirm('You are sure?')) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var productId = $(this).data('product-id');
            var url = '/admin/products/' + productId;
            $.ajax({
                url: url,
                type: 'DELETE',

                success: function(result) {
                    if (result.status) {
                        // Removing row from HTML Table
                        $('.row_' + productId).css('background','tomato');
                        $('.row_' + productId).fadeOut(800, function(){ 
                           $(this).remove();
                        });
                        $('.alert-success').show().html('<p>' +  result.message + '</p>');
                    } else {
                        $('.alert-warning').show().html('<p>' +  result.message + '</p>');
                    }
                },
                error: function(result) {
                    $('.alert-warning').show().html('<p>' +  result.message + '</p>');
                }
            });
        }
    });
});
