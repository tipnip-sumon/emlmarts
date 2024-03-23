function change_product(img) {
    jQuery(".product-image-slider").html(
        '<div class="slick-list draggable"><div class="slick-track" style="opacity: 1; width: 308px; transform: translate3d(0px, 0px, 0px);"><figure class="border-radius-10 slick-slide slick-current slick-active" data-slick-index="0" aria-hidden="false" tabindex="0" style="width: 308px;"><img src="' +
            img +
            '" alt="product image"></figure></div></div>'
    );
}
function color_name(color) {
    jQuery("#color_id").val(color);
}
function showColor(size) {
    jQuery(".product_color").hide();
    jQuery("#size_id").val(size);
    jQuery("." + size).show();
}
function home_add_to_cart(id, size_str_id, color_str_id) {
    // alert(size_str_id);
    jQuery("#size_id").val(size_str_id);
    jQuery("#color_id").val(color_str_id);
    add_to_cart(id, size_str_id, color_str_id);
}
function updateQty(pid, size, color, attr_id, price) {
    jQuery("#color_id").val(color);
    jQuery("#size_id").val(size);
    var qty = jQuery("#qty" + attr_id).val();
    if (qty > 1) {
        jQuery("#qty").val(qty);
    } else {
        qty = 1;
    }
    jQuery("#total_price_" + attr_id).html("$" + qty * price);
    add_to_cart(pid, size, color);
}
function deleteAddToCart(pid, size, color, attr_id) {
    jQuery("#color_id").val(color);
    jQuery("#size_id").val(size);
    jQuery("#qty").val(0);
    add_to_cart(pid, size, color);
    jQuery("#AdToCartBox" + attr_id).remove();
}

function add_to_cart(id, size_str_id, color_str_id) {
    jQuery("#add_to_cart_msg").html("");
    jQuery("#product_id").val(id);
    var qty = jQuery("#qty").val();
    jQuery("#pqty").val(qty);
    var size_id = jQuery("#size_id").val();
    var color_id = jQuery("#color_id").val();
    if (size_str_id == 0) {
        size_id = "no";
    }
    if (color_str_id == 0) {
        color_id = "no";
    }
    if (size_id == "" && size_id != "no") {
        jQuery("#add_to_cart_msg").show();
        jQuery("#add_to_cart_msg").html("Please Select Size");
    } else if (color_id == "" && color_id != "no") {
        jQuery("#add_to_cart_msg").show();
        jQuery("#add_to_cart_msg").html("Please Select Color");
    } else {
        jQuery("#add_to_cart_msg").hide();
        jQuery.ajax({
            url: "/add_to_cart",
            data: jQuery("#fromAddToCart").serialize(),
            type: "POST",
            success: function (res) {
                // console.log(res);
                totalPrice = 0;
                if (res.totalItem == 0) {
                    jQuery(".pro-count").html("0");
                    jQuery("#cartBox").remove();
                } else {
                    jQuery(".pro-count").html(res.totalItem);
                    var html = "<ul>";
                    jQuery.each(res.data, function (key, list) {
                        totalPrice =
                            totalPrice +
                            parseInt(list.qty) * parseInt(list.price);
                        html +=
                            '<li><div class="shopping-cart-img"><a href="shop-product-right.html"><img alt="Nest" src="' +
                            PRODUCT_IMAGE +
                            "/" +
                            list.attr_image +
                            '" /></a></div><div class="shopping-cart-title"><h4><a href="shop-product-right.html">' +
                            list.name +
                            "</a></h4><h4><span>" +
                            list.qty +
                            " × </span>" +
                            list.price +
                            "</h4></div></a></div></li>";
                    });
                }
                html +=
                    '<div class="shopping-cart-footer"><div class="shopping-cart-total"><h4>Total <span>৳' +
                    totalPrice +
                    '</span></h4></div><div class="shopping-cart-button"><a href="{{route("frontend.cart")}}" class="outline">View cart</a><a href="{{route("frontend.cart")}}">Checkout</a></div></div>';
                html += "</ul>";
                jQuery(".cart_sub_ttl").html(
                    '<h4 class="text-brand text-end">৳' + totalPrice + "</h4>"
                );
                // console.log(html);
                jQuery("#cartBox").html(html);
            },
        });
    }
    setTimeout(() => {
        jQuery("#add_to_cart_msg").fadeOut();
    }, 5000);
}
function sort_by() {
    var sort_by_value = jQuery("#sort_by_value").val();
    jQuery("#sort").val(sort_by_value);
    jQuery("#categoryFilter").submit();
}

function sort_price_filter(v1, v2) {
    jQuery("#filter_price_start").val(
        jQuery("#slider-range-value1").html().slice(1)
    );
    jQuery("#filter_price_end").val(
        jQuery("#slider-range-value2").html().slice(1)
    );
    jQuery("#categoryFilter").submit();
}
function fun_search() {
    var search_str = jQuery("#search_str").val();
    if (search_str != "" && search_str.length > 3) {
        window.location.href = "/search/" + search_str;
    }
}

jQuery("#formRegister").submit(function (e) {
    e.preventDefault();
    jQuery(".field_error").html("");
    jQuery.ajax({
        type: "POST",
        url: "register_process",
        data: jQuery("#formRegister").serialize(),
        success: function (res) {
            if (res.status == "error") {
                jQuery.each(res.error, function (key, val) {
                    jQuery("#" + key + "_error").html(val[0]);
                });
            }
            if (res.status == "success") {
                jQuery("#formRegister")[0].reset();
                jQuery("#success_msg").html(res.msg);
                setTimeout(() => {
                    jQuery("#success_msg").fadeOut();
                }, 2000);
            }
        },
    });
});
jQuery("#frmLogin").submit(function (e) {
    e.preventDefault();
    jQuery.ajax({
        type: "POST",
        url: "login_process",
        data: jQuery("#frmLogin").serialize(),
        success: function (result) {
            // console.log(result.msg);
            if(result.status=='success'){
                window.location.href=window.location.href;
                jQuery('#login_success_msg').html(result.msg);
                setTimeout(() => {
                    jQuery('#login_success_msg').fadeOut();
                }, 1000);
            } else {
                jQuery('#login_error_msg').html(result.msg);
                setTimeout(() => {
                    jQuery('#login_error_msg').fadeOut();
                }, 1000);
            }
        },
    });
});

jQuery("#frmForgot").submit(function (e) {
    e.preventDefault();
    let ForgetData = jQuery("#frmForgot").serialize();
    jQuery.ajax({
        type: "POST",
        url: "forgot_process",
        data: ForgetData,
        beforeSend:function(){
            $('.btn-heading').prop('disabled',true);
        },
        complete: function(){
            $('.btn-heading').prop('disabled',false);
        },
        success: function (res) {
            // console.log(res);
            if(res.status=='success'){
                $('#forgot_success_msg').html(res.msg);
                setTimeout(() => {
                    $('#forgot_success_msg').fadeOut();
                    // location.reload(true);
                }, 5000);
            }
            if(res.status=='error'){
                $('#forgot_error_msg').html(res.msg);
                setTimeout(() => {
                    $('#forgot_error_msg').fadeOut();
                    // location.reload(true);
                }, 5000);
            }
            $('#frmForgot')[0].reset();
            
        }
    });
});
function forgot_password(){
    $('#popup_forgot').show();
    $('#popup_login').hide();
}
function show_login_popup(){
    $('#popup_forgot').hide();
    $('#popup_login').show();
}
$('#frmResetPass').submit(function(e){
    e.preventDefault();
    $(".field_error").html("");
    $.ajax({
        type: "POST",
        url: "/forgot_password_verify",
        data: jQuery("#frmResetPass").serialize(),
        beforeSend:function(){
            $('.btn-heading').prop('disabled',true);
        },
        complete: function(){
            // $('.btn-heading').prop('disabled',false);
        },
        success: function (res) {
            if(res.status=='error'){
                $.each(res.error,function(key,val){
                    $('#' + key + '_error').html(val[0]);
                });
            }
            if(res.status=='success'){
                $('#frmResetPass')[0].reset();
                $('#reset_success_msg').html(res.msg);
                setTimeout(() => {
                    $('#reset_success_msg').fadeOut();
                    window.location.href = '/login';
                }, 5000);
            }
        }
    });
});
$('#apply_coupon').submit(function(e){
    e.preventDefault();
    $.ajax({
        url:'apply_coupon_code',
        type:'POST',
        data: $('#apply_coupon').serialize(),
        success:function(result){
            if(result.status === 'success'){
                $('#coupon_code_msg').show();
                $('.coupon_apply_code').show();
                $('#coupon_price').html('- ৳'+result.coupon_price);
                $('#total_price').html('- ৳'+result.cart_price);
                $('#coupon_code_msg').html(result.msg);
                setTimeout(() => {
                    $('#coupon_code_msg').fadeOut();
                    $('#apply_coupon')[0].reset();
                }, 5000);
            }
            if(result.status === 'error'){
                $('#coupon_code_error_msg').show();
                $('#coupon_code_error_msg').html(result.msg);
                setTimeout(() => {
                    $('#coupon_code_error_msg').fadeOut();
                    $('#apply_coupon')[0].reset();
                }, 5000);
            }
        }
    })
});


// function increment_quantity(cart_id) {
//     var inputQuantityElement = $("#input-quantity-"+cart_id);
//     var newQuantity = parseInt($(inputQuantityElement).val())+1;
//     save_to_db(cart_id, newQuantity);
// }

// function decrement_quantity(cart_id) {
//     var inputQuantityElement = $("#input-quantity-"+cart_id);
//     if($(inputQuantityElement).val() > 1)
//     {
//     var newQuantity = parseInt($(inputQuantityElement).val()) - 1;
//     save_to_db(cart_id, newQuantity);
//     }
// }

// function save_to_db(cart_id, new_quantity) {
// 	var inputQuantityElement = $("#input-quantity-"+cart_id);
//     $.ajax({
// 		url : "update_cart_quantity.php",
// 		data : "cart_id="+cart_id+"&new_quantity="+new_quantity,
// 		type : 'post',
// 		success : function(response) {
// 			$(inputQuantityElement).val(new_quantity);
// 		}
// 	});
// }
