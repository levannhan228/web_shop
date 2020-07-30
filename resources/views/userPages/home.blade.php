@extends('userLayout')
@section('content')
<div class="features_items"><!--features_items-->
  <h2 class="title text-center">New Items</h2>
  @foreach ($all_product as $item)
  <div class="col-sm-4">
    <div class="product-image-wrapper">
      <div class="single-products">
      <a href="./detail-product/{{$item->product_id}}">
          <div class="productinfo text-center">
          <img src="uploads/product/{{$item->product_image}}" alt="" height="300"/>
          <h2>${{number_format($item->product_price)}}</h2>
          <p>{{$item->product_name}}</p>
            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
          </div>
        </a>
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
</div><!--features_items-->
<div class="category-tab"><!--category-tab-->
  <div class="col-sm-12">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#tshirt" data-toggle="tab">T-Shirt</a></li>
      <li><a href="#blazers" data-toggle="tab">Blazers</a></li>
      <li><a href="#sunglass" data-toggle="tab">Sunglass</a></li>
      <li><a href="#kids" data-toggle="tab">Kids</a></li>
      <li><a href="#poloshirt" data-toggle="tab">Polo shirt</a></li>
    </ul>
  </div>
  <div class="tab-content">
    <div class="tab-pane fade active in" id="tshirt" >
      <div class="col-sm-3">
        <div class="product-image-wrapper">
          <div class="single-products">
            <div class="productinfo text-center">
              <img src="FE/images/home/gallery1.jpg" alt="" />
              <h2>$56</h2>
              <p>Easy Polo Black Edition</p>
              <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    {{-- /////////////// --}}
  </div>
</div><!--/category-tab-->
<div class="recommended_items"><!--recommended_items-->
  <h2 class="title text-center">recommended items</h2>
  
  <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div class="item active">
        @foreach ($product_random as $item)
        <a href="">
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
          </div>
        </div>
      </a>
        @endforeach	
      </div>
    </div>
      <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
      <i class="fa fa-angle-left"></i>
      </a>
      <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
      <i class="fa fa-angle-right"></i>
      </a>			
  </div>
</div><!--/recommended_items-->
@endsection