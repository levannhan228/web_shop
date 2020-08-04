@extends('userLayout')
@section('content')
<div class="features_items"><!--features_items-->
  <h2 class="title text-center">Search Results</h2>
  @foreach ($search_product as $item)
  <div class="col-sm-4">
    <div class="product-image-wrapper">
      <div class="single-products">
          <div class="productinfo text-center">
            <form>
              @csrf
            <input type="hidden" value="{{$item->product_id}}" class="cart_product_id_{{$item->product_id}}">
            <input type="hidden" value="{{$item->product_name}}" class="cart_product_name_{{$item->product_id}}">
            <input type="hidden" value="{{$item->product_image}}" class="cart_product_image_{{$item->product_id}}">
            <input type="hidden" value="{{$item->product_price}}" class="cart_product_price_{{$item->product_id}}">
            <input type="hidden" value="1" class="cart_product_qty_{{$item->product_id}}">
              <a href="./detail-product/{{$item->product_id}}">
                <img src="uploads/product/{{$item->product_image}}" alt="" height="300"/>
                <h2>${{number_format($item->product_price,0,',','.')}}</h2>
                <p>{{$item->product_name}}</p>
              </a>
              {{-- <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a> --}}
              <button type="button" class="btn btn-default add-to-cart" name="add-to-cart" data-id="{{$item->product_id}}"><i class="fa fa-shopping-cart"></i>Add to cart</button>
          </form>
          </div>
      </div>
      <div class="choose">
        <ul class="nav nav-pills nav-justified">
          <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
          <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
        </ul>
      </div>
    </div>
  </div>
  @endforeach
</div>
@endsection