@extends('userLayout')
@section('content')
<div class="features_items"><!--features_items-->
  <h2 class="title text-center">Product Of Brand {{$brand_name->brand_name}}</h2>
  @foreach ($list_product as $item)
  <div class="col-sm-4">
    <div class="product-image-wrapper">
      <div class="single-products">
          <div class="productinfo text-center">
          <img src="uploads/product/{{$item->product_image}}" alt="" height="300"/>
          <h2>${{number_format($item->product_price)}}</h2>
          <p>{{$item->product_name}}</p>
            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
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
</div
@endsection