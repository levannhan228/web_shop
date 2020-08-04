@extends('userLayout')
@section('content')
<div class="features_items"><!--features_items-->
  <h2 class="title text-center">Product Of Category {{$category_name->category_name}}</h2>
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
          {{-- <div class="product-overlay">
            <div class="overlay-content">
              <h2>$56</h2>
              <p>Easy Polo Black Edition</p>
              <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
            </div>
          </div> --}}
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
  <div class="fb-comments" data-href="http://localhost{{$_SERVER['REQUEST_URI']}}" data-numposts="10" data-width=""></div>
</div
@endsection