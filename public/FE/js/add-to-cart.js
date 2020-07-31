$(document).ready(function () {
  $('.add-to-cart').click(function () {
    var id = $(this).data('id');
    var cart_product_id = $('.cart_product_id_' + id).val();
    var cart_product_name = $('.cart_product_name_' + id).val();
    var cart_product_image = $('.cart_product_image_' + id).val();
    var cart_product_price = $('.cart_product_price_' + id).val();
    var cart_product_qty = $('.cart_product_qty_' + id).val();
    var _token = $('input[name="_token"').val();
    $.ajax({
      url: './add-cart-ajax',
      method: 'POST',
      data: {
        cart_id: cart_product_id,
        cart_name: cart_product_name,
        cart_image: cart_product_image,
        cart_price: cart_product_price,
        cart_qty: cart_product_qty,
        _token: _token
      },
      success: function (data) {
        console.log(data);
        swal("Success", "Add to cart successfully!", "success");
      }
    })
  })

  $('.cart_quantity_down').bind('click',function () {
    let targetId = $(this).data('id');    //id
    let value_price = $(".cart_price").find('p[data-id="' + targetId + '"]').html().substr(1).replace('.','');//gia
    let value_quaty = +$('input[data-id="' + targetId + '"]').val();//+ cover thanh number // so luong
    let value_price_total = $('#total_'+targetId).html().substr(1).replace('.','');//tong gia

    if(value_quaty>1)
    {
      value_quaty -=1;
      $('input[data-id="' + targetId + '"]').val(value_quaty)
      value_price_total = +value_price*+value_quaty;
      $('#total_'+targetId).html('$'+number_format(value_price_total,0,',','.'));
    }
  })

  $('.cart_quantity_up').bind('click',function () {
    let targetId = $(this).data('id');    
    let value_price = $(".cart_price").find('p[data-id="' + targetId + '"]').html().substr(1).replace('.','');//gia
    let value_quaty = +$('input[data-id="' + targetId + '"]').val();//+ cover thanh number
    let value_price_total = $('#total_'+targetId).html().substr(1).replace('.','');//tong gia

    if(value_quaty<99)
    {
      value_quaty +=1;
      $('input[data-id="' + targetId + '"]').val(value_quaty)
      value_price_total = +value_price*+value_quaty;
      $('#total_'+targetId).html('$'+number_format(value_price_total,0,',','.'));
    }
  })
});
