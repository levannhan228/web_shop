$(document).ready(function () {
  $('#update-to-cart').click(function () {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    value_quaty = $("input[name='quantity']").map(function () { return $(this).val() }).get();
    $.ajax({
      url: './update-cart-ajax',
      method: 'POST',
      data: {
        value_quaty: value_quaty
      },
      success: function (data) {
        console.log(data)
      }
    })
  })
});