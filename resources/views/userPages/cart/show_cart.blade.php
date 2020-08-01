@extends('userLayout')
@section('content')
<section id="cart_items">
  <div class="container">
    <div class="breadcrumbs">
      <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Shopping Cart</li>
      </ol>
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
          @foreach (Session::get('cart') as $cart)
          @php
              $subtotal=$cart['product_price']*$cart['product_qty'];
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
            <td><button class="btn check_out">Update Cart</button></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</section> 
<section id="do_action">
  <div class="container">
    <div class="heading">
      <h3>What would you like to do next?</h3>
      <p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
    </div>
    <div class="row">
      <div class="col-sm-6">
        <div class="chose_area">
          <ul class="user_option">
            <li>
              <input type="checkbox">
              <label>Use Coupon Code</label>
            </li>
            <li>
              <input type="checkbox">
              <label>Use Gift Voucher</label>
            </li>
            <li>
              <input type="checkbox">
              <label>Estimate Shipping & Taxes</label>
            </li>
          </ul>
          <ul class="user_info">
            <li class="single_field">
              <label>Country:</label>
              <select>
                <option>United States</option>
                <option>Bangladesh</option>
                <option>UK</option>
                <option>India</option>
                <option>Pakistan</option>
                <option>Ucrane</option>
                <option>Canada</option>
                <option>Dubai</option>
              </select>
              
            </li>
            <li class="single_field">
              <label>Region / State:</label>
              <select>
                <option>Select</option>
                <option>Dhaka</option>
                <option>London</option>
                <option>Dillih</option>
                <option>Lahore</option>
                <option>Alaska</option>
                <option>Canada</option>
                <option>Dubai</option>
              </select>
            
            </li>
            <li class="single_field zip-field">
              <label>Zip Code:</label>
              <input type="text">
            </li>
          </ul>
          <a class="btn btn-default update" href="">Get Quotes</a>
          <a class="btn btn-default check_out" href="">Continue</a>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="total_area">
          <ul>
            <li>Cart Sub Total <span>$59</span></li>
            <li>Eco Tax <span>$2</span></li>
            <li>Shipping Cost <span>Free</span></li>
            <li>Total <span>$61</span></li>
          </ul>
            <a class="btn btn-default update" href="">Update</a>
            <a class="btn btn-default check_out" href="">Check Out</a>
        </div>
      </div>
    </div>
  </div>
</section><!--/#do_action-->
@endsection