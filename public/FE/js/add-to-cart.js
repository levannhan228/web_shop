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
        swal({
          title: "Add product to cart successfully",
          text: "Into the cart to check",
          icon: "success",
          buttons: {
            cancel: true,
            cart: {
              text: "To cart",
              value: "cart"
            }
          }
        }).then((value)=>{
          if(value=="cart"){
            window.location.href='./show-cart'
          }
        })
      }
    })
  })

  $('.cart_quantity_down').bind('click',function () {
    let targetId = $(this).data('id');    //id
    let value_price = $(".cart_price").find('p[data-id="' + targetId + '"]').html().substr(1).replace('.','');//gia
    let value_quaty = +$('input[data-id="' + targetId + '"]').val();//+ cover thanh number // so luong
    let value_price_total = $('#total_'+targetId).html().substr(1).replace('.','');//tong gia
    let total_price = +$('#total').html().substr(1).replace('.','');// tong tat ca total_price_product

    if(value_quaty>1)
    {
      value_quaty -=1;
      $('input[data-id="' + targetId + '"]').val(value_quaty)
      value_price_total_new = +value_price*+value_quaty;
      total_price -= (value_price_total - value_price_total_new);
      $('#total_'+targetId).html('$'+number_format(value_price_total_new,0,',','.'));
      $('#total').html('$'+number_format(total_price,0,',','.'));
    }
  })

  $('.cart_quantity_up').bind('click',function () {
    let targetId = $(this).data('id');    
    let value_price = $(".cart_price").find('p[data-id="' + targetId + '"]').html().substr(1).replace('.','');//gia
    let value_quaty = +$('input[data-id="' + targetId + '"]').val();//+ cover thanh number
    let value_price_total = $('#total_'+targetId).html().substr(1).replace('.','');//tong gia

    let total_price = +$('#total').html().substr(1).replace('.','');// tong tat ca total_price_product

    if(value_quaty<99)
    {
      value_quaty +=1;
      $('input[data-id="' + targetId + '"]').val(value_quaty)
      value_price_total_new = +value_price*+value_quaty;
      total_price += (value_price_total_new - value_price_total);
      $('#total_'+targetId).html('$'+number_format(value_price_total_new,0,',','.'));
      $('#total').html('$'+number_format(total_price,0,',','.'));
    }
  })

  $(document).on('input', '#qty_detail', function(){
    var qty_detail = $('#qty_detail').val();
    $('#qty_detail_change').val(qty_detail)
})
});