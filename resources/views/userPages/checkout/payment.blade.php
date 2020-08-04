@extends('userLayout')
@section('content')
<section id="cart_items">
  <div class="container">
    <div class="breadcrumbs">
      <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Check out</li>
      </ol>
    </div><!--/breadcrums-->

    <div class="review-payment">
      <h2>Review & Payment</h2>
    </div>
    <div class="table-responsive cart_info">
      <table class="table table-condensed">
        <thead>
          <tr class="cart_menu">
            <td class="image">Item</td>
            <td class="description">Name</td>
            <td class="price">Price</td>
            <td class="quantity">Quantity</td>
            <td class="total">Total</td>
            <td></td>
          </tr>
        </thead>
        <tbody>
          @php
            $total=0;   
          @endphp
          @if(Session::get('cart'))
          @foreach (Session::get('cart') as $cart)
          @php
              $subtotal=$cart['product_price']*$cart['product_qty'];
              $total += $subtotal;
          @endphp
          <tr id="product_tr_{{$cart['session_id']}}">

            <td class="cart_product">
              <a href=""><img src="uploads/product/{{$cart['product_image']}}" alt="" style="height:50px;width: 50px;object-fit: cover !important;"></a>
            </td>
            <td class="cart_description">
              <h4><a href="">{{$cart['product_name']}}</a></h4>
              <p>Web ID: {{$cart['product_id']}}</p>
            </td>
            <td class="cart_price">
              <p data-id="{{$cart['session_id']}}">${{number_format($cart['product_price'],0,',','.')}}</p>
            </td>
            <td class="cart_quantity">
              <div class="cart_quantity_button" >
                <button class="btn cart_quantity_down" data-id="{{$cart['session_id']}}" > - </button>
              <input class="cart_quantity_input" type="text" min="0" max="99" data-id="{{$cart['session_id']}}" name="quantity" value="{{$cart['product_qty']}}" autocomplete="off" size="2">
                <button class="btn cart_quantity_up" data-id="{{$cart['session_id']}}"> + </button>
              </div>
            </td>
            <td class="cart_total">
              <p class="cart_total_price" id="total_{{$cart['session_id']}}">${{number_format($subtotal,0,',','.')}}</p>
            </td>
            <td class="cart_delete">
              <a class="cart_quantity_delete" data-id="{{$cart['session_id']}}"><i class="fa fa-times"></i></a>
            </td>
          </tr>
          @endforeach
          <tr>
            <td><button class="btn check_out" id="update-to-cart">Update Cart(chưa làm)</button></td>
          </tr>
        @endif
        </tbody>
      </table>
    </div>
    <div class="payment-options">
      <h4>Payments</h4>
      <form action="./oder-place" method="POST">
        @csrf
        <span>
          <label><input name="payment_option" value="1" type="checkbox"> Trả bằng thể</label>
        </span>
        <span>
          <label><input name="payment_option" value="2" type="checkbox"> Nhân tiền mặt</label>
        </span>
        <span>
          <label><input name="payment_option" value="3" type="checkbox">Thẻ ghi nợ</label>
        </span>
        <input type="submit" value="oder" name="send_oder" class="btn btn-primary btn-sm">
      </div>
      </form>
  </div>
</section> <!--/#cart_items-->
@endsection