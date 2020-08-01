$(document).on('click','.cart_quantity_delete',function(){
  let Ss_Id = $(this).data('id');  
  $.ajax({
    url: './delete_itemCart/'+Ss_Id,
    method: 'GET',
    data: {
      product_id:Ss_Id
    },
    success: function (data) {
      $("#product_tr_"+Ss_Id).remove();
      swal("success", "Successfully deleted the product", "success");
    }
  })
})