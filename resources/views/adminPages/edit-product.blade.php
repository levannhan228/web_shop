@extends('adminLayout')
@section('adminContent')
<div class="row">
<div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Edit Product
            </header>
            <div class="panel-body">
                @php
                $message = Session::get('message');
                if($message){
                    echo $message;
                    Session::put('message',null);
                }
                @endphp
                <div class="position-center">
                  @foreach ($edit_product as $item)
                    <form role="form" action="./admin/product/update_product/{{$item->product_id}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                      <div class="form-group">
                          <label for="exampleInputEmail1">Product Name</label>
                          <input type="text" name="product_name" value="{{$item->product_name}}" class="form-control" placeholder="Product Name">
                      </div>
                      <div class="form-group">
                          <label for="exampleInputEmail1">Product Price</label>
                          <input type="text" name="product_price" value="{{$item->product_price}}" class="form-control" placeholder="Product Name">
                      </div>
                      <div class="form-group">
                          <label for="exampleInputEmail1">Product Image</label>
                          <input type="file" name="product_image" class="form-control">
                          <img src="./uploads/product/{{$item->product_image}}" alt="" height="100" width="100">
                      </div>
                      <div class="form-group">
                          <label for="exampleInputPassword1">Product Description</label>
                          <textarea style="resize:none" rows="5" class="form-control" name="product_description" placeholder="content"> {{$item->product_desc}}</textarea>
                      </div>
                      <div class="form-group">
                          <label for="exampleInputPassword1">Product Content</label>
                          <textarea style="resize:none" rows="5" class="form-control" name="product_content" placeholder="description"> {{$item->product_content}}</textarea>
                      </div>
                      <div class="form-group">
                          <label for="exampleInputPassword1">Category Product</label>
                          <select name="product_category" class="form-control input-sm m-bot15">
                              @foreach ($list_category_product as $cate)
                                  @if($cate->category_id == $item->category_id)
                                  <option selected value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                  @else
                                  <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                  @endif
                              @endforeach
                          </select>
                      </div>
                      <div class="form-group">
                          <label for="exampleInputPassword1">Product Brand</label>
                          <select name="product_brand" class="form-control input-sm m-bot15">
                              @foreach ($list_brand_product as $brand)
                                @if($brand->brand_id == $item->brand_id)
                                  <option selected value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                                @else
                                  <option value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                                @endif
                              @endforeach
                          </select>
                      </div>
                      <button type="submit" name="add_product" class="btn btn-info">Update Product</button>
                    </form>
                    @endforeach
                </div>
                
            </div>
        </section>

</div>
</div>
@endsection