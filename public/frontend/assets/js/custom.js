function change_product(img){
    jQuery('.product-image-slider').html('<div class="slick-list draggable"><div class="slick-track" style="opacity: 1; width: 308px; transform: translate3d(0px, 0px, 0px);"><figure class="border-radius-10 slick-slide slick-current slick-active" data-slick-index="0" aria-hidden="false" tabindex="0" style="width: 308px;"><img src="'+img+'" alt="product image"></figure></div></div>');
}
function color_name(color)
{
    jQuery('#color_id').val(color);
}
function showColor(size){
    jQuery('.product_color').hide();
    jQuery('#size_id').val(size);
    jQuery('.'+size).show();
}
function home_add_to_cart(id,size_str_id,color_str_id){
    alert(size_str_id);
    jQuery('#size_id').val(size_str_id);
    jQuery('#color_id').val(color_str_id);
    add_to_cart(id,size_str_id,color_str_id);
}
function updateQty(pid,size,color,attr_id,price){
    jQuery('#color_id').val(color);
    jQuery('#size_id').val(size);
    var qty=jQuery('#qty'+attr_id).val();
    if (qty > 1) {
        jQuery('#qty').val(qty);
    } else {
        qty = 1;
    }
    jQuery('#total_price_'+attr_id).html('$'+qty*price);
    add_to_cart(pid,size,color);
    
  }
function deleteAddToCart(pid,size,color,attr_id){
    jQuery('#color_id').val(color);
    jQuery('#size_id').val(size);
    jQuery('#qty').val(0);
    add_to_cart(pid,size,color);
    jQuery('#AdToCartBox'+attr_id).remove();
}

function add_to_cart(id,size_str_id,color_str_id){
    jQuery('#add_to_cart_msg').html('');
    jQuery('#product_id').val(id);
    var qty = jQuery('#qty').val();
    jQuery('#pqty').val(qty);
    var size_id = jQuery('#size_id').val();
    var color_id = jQuery('#color_id').val();
    if(size_str_id==0){
        size_id = "no";
    }
    if(color_str_id==0){
        color_id = "no";
    }
    if(size_id=='' && size_id!='no'){
        jQuery('#add_to_cart_msg').show();
        jQuery('#add_to_cart_msg').html('Please Select Size');
    }else if(color_id=='' && color_id!='no'){
        jQuery('#add_to_cart_msg').show();
        jQuery('#add_to_cart_msg').html('Please Select Color');
    }else{
        jQuery('#add_to_cart_msg').hide();
        jQuery.ajax({
            url:'/add_to_cart',
            data:jQuery('#fromAddToCart').serialize(),
            type:'POST',
            success: function(res){
                console.log(res);
                totalPrice=0;
                if(res.totalItem==0){
                    jQuery('.pro-count').html('0');
                    jQuery('#cartBox').remove();
                }else{
                    jQuery('.pro-count').html(res.totalItem);
                    var html = '<ul>';
                    jQuery.each(res.data,function(key,list){
                        totalPrice = totalPrice+(parseInt(list.qty)*parseInt(list.price));
                        html+='<li><div class="shopping-cart-img"><a href="shop-product-right.html"><img alt="Nest" src="'+PRODUCT_IMAGE+'/'+list.attr_image+'" /></a></div><div class="shopping-cart-title"><h4><a href="shop-product-right.html">'+list.name+'</a></h4><h4><span>'+list.qty+' × </span>'+list.price+'</h4></div></a></div></li>';
                    });
                }
                    html += '<div class="shopping-cart-footer"><div class="shopping-cart-total"><h4>Total <span>$'+totalPrice+'</span></h4></div><div class="shopping-cart-button"><a href="{{route("frontend.cart")}}" class="outline">View cart</a><a href="shop-checkout.html">Checkout</a></div></div>';
                    html += '</ul>';
                    jQuery('.cart_sub_ttl').html('<h4 class="text-brand text-end">$'+totalPrice+'</h4>');
                    // console.log(html);
                    jQuery('#cartBox').html(html);
                
            }
        });
    }
    setTimeout(() => {
        jQuery('#add_to_cart_msg').fadeOut();
    }, 5000);

    
}

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
