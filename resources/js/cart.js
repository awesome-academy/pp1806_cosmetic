$(document).ready(function(){
    $('.cart_quantity_delete').click(function() {
        if (confirm('You are sure?')) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var productId = $(this).data('product-id');
            var url = '/delete-cart-item/' + productId;
            $.ajax({
                url: url,
                type: 'DELETE',

                success: function(result) {
                    if (result.status) {
                        $('.row_' + productId).css('background','tomato');
                        $('.row_' + productId).fadeOut(800, function(){ 
                           $(this).remove();
                           if (result.itemEmpty) {
                                location.reload();
                           }
                        });
                        $('.alert-success').show().html('<p>' +  result.message + '</p>');
                        $('.alert-warning').hide();
                    } else {
                        $('.alert-warning').show().html('<p>' +  result.message + '</p>');
                        $('.alert-success').hide();
                    }
                },
                error: function(result) {
                    $('.alert-warning').show().html('<p>' +  result.message + '</p>');
                }
            });
        }
    });

    $('.cart_quantity_up').click(function() {
        $(this).addClass( "clicked" );
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var productId = $(this).data('product-id');
        var url = '/up-cart-qty/' + productId;
        var oldQty = parseInt($( "input[name='quantity_" + productId + "']" ).val());
        $.ajax({
            url: url,
            type: 'GET',

            success: function(result) {
                 $(".cart_quantity_up[data-product-id= " + productId + "]").fadeOut(300, function(){ 
                           $(this).removeClass("clicked").css("display","block");
                        });
                if (result.status) {
                    $( "input[name='quantity_" + productId + "']" ).val(++oldQty);
                    $(".cart_total_price[data-product-id= " + productId + "]").text(result.itemPrice + ' VND');
                    $('.cart_sum_total_price').text(result.totalPrice + ' VND');
                    $('.alert-success').show().html('<p>' +  result.message + '</p>');
                    $('.alert-warning').hide();
                } else {
                    $('.alert-warning').show().html('<p>' +  result.message + '</p>');
                    $('.alert-success').hide();
                }
            },
            error: function(result) {
                $(".cart_quantity_up[data-product-id= " + productId + "]").fadeOut(300, function(){ 
                           $(this).removeClass("clicked").css("display","block");
                        });
                $('.alert-warning').show().html('<p>' +  result.message + '</p>');
                $('.alert-success').hide();
            }
        });
    });

    $('.cart_quantity_down').click(function() {
        $(this).addClass( "clicked" );
        var productId = $(this).data('product-id');
        var oldQty = parseInt($( "input[name='quantity_" + productId + "']" ).val());
        if (oldQty === 1) {
            $('.alert-warning').show().html('<p> The quantity must be more than 0. </p>');
            $('.alert-success').hide();
            $(".cart_quantity_down[data-product-id= " + productId + "]").fadeOut(300, function(){ 
                               $(this).removeClass("clicked").css("display","block");
                            });
        } else {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var url = '/down-cart-qty/' + productId;
            $.ajax({
                url: url,
                type: 'GET',

                success: function(result) {
                    $(".cart_quantity_down[data-product-id= " + productId + "]").fadeOut(300, function(){ 
                               $(this).removeClass("clicked").css("display","block");
                            });
                    if (result.status) {
                        $( "input[name='quantity_" + productId + "']" ).val(--oldQty);
                        $(".cart_total_price[data-product-id= " + productId + "]").text(result.itemPrice + ' VND');
                        $('.cart_sum_total_price').text(result.totalPrice + ' VND');
                        $('.alert-success').show().html('<p>' +  result.message + '</p>');
                        $('.alert-warning').hide();
                    } else {
                        $('.alert-warning').show().html('<p>' +  result.message + '</p>');
                        $('.alert-success').hide();
                    }
                },
                error: function(result) {
                    $(".cart_quantity_down[data-product-id= " + productId + "]").fadeOut(300, function(){ 
                               $(this).removeClass("clicked").css("display","block");
                            });
                    $('.alert-warning').show().html('<p>' +  result.message + '</p>');
                    $('.alert-success').hide();
                }
            });
        }
    });
});
