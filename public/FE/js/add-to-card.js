$(document).ready(function () {
  $('.add-to-cart').click(function () {
    var id = $(this).data('id');
    var car_product_id = $('.cart_product_id_' + id).val();
    var car_product_name = $('.cart_product_name_' + id).val();
    var car_product_image = $('.cart_product_image_' + id).val();
    var car_product_price = $('.cart_product_price_' + id).val();
    var car_product_qty = $('.cart_product_qty_' + id).val();
    var _token = $('input[name="_token"').val();
    $.ajax({
      url: './add-card-ajax',
      method:'POST',
      data:{
        id:car_product_id,
        name:car_product_name,
        image:car_product_image,
        price:car_product_price,
        qty:car_product_qty,
        _token:_token
      },
      success: function (data) {
        console.log(data)
        swal("Success", "Add to cart successfully!", "success");
      }
    })
  })
});
