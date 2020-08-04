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
    <div class="col-sm-10 register-req">
      <p>Please use Register And Checkout to easily get access to your order history, or use Checkout as Guest</p>
    </div><!--/register-req-->

    <div class="shopper-informations">
      <div class="row">
        <div class="col-sm-10">
          <div class="shopper-info">
            <p>Shopper Information</p>
            <form action="./save-checkout-customer" method="POST">
              @csrf
              <input type="text" name="shipping_email" placeholder="Email">
              <input type="text" name="shipping_name" placeholder="Name">
              <input type="text" name="shipping_address" placeholder="Address">
              <input type="text" name="shipping_phone" placeholder="Phone">
              <textarea name="shipping_note"  placeholder="Notes about your order, Special Notes for Delivery" rows="16"></textarea>
              <input type="submit" name="sender_oder" value="Send" class="btn btn-primary btn-sm">
            </form>
          </div>
        </div>					
      </div>
    </div>
    <div class="review-payment">
      <h2>Review & Payment</h2>
    </div>

    <div class="payment-options">
        <span>
          <label><input type="checkbox"> Direct Bank Transfer</label>
        </span>
        <span>
          <label><input type="checkbox"> Check Payment</label>
        </span>
        <span>
          <label><input type="checkbox"> Paypal</label>
        </span>
      </div>
  </div>
</section> <!--/#cart_items-->
@endsection