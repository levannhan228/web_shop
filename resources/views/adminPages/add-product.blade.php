@extends('adminLayout')
@section('adminContent')
<div class="row">
<div class="col-lg-12">
<section class="panel">
    <header class="panel-heading">
        Create Product 
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
            <form role="form" action="./admin/product/save-product" method="post">
                {{ csrf_field() }}
            <div class="form-group">
                <label for="exampleInputEmail1">Product Name</label>
                <input type="text" name="product_name" class="form-control" placeholder="Product Name">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Product Price</label>
                <input type="text" name="product_price" class="form-control" placeholder="Product Name">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Product Image</label>
                <input type="file" name="product_image" class="form-control">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Product Description</label>
                <textarea style="resize:none" rows="5" class="form-control" name="product_description" placeholder="content"></textarea>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Product Content</label>
                <textarea style="resize:none" rows="5" class="form-control" name="product_content" placeholder="description"></textarea>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Category Product</label>
                <select name="productt_status" class="form-control input-sm m-bot15">
                    @foreach ($list_category_product as $item)
                        <option value="{{$item->category_id}}">{{$item->category_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Product Brand</label>
                <select name="productt_status" class="form-control input-sm m-bot15">
                    @foreach ($list_brand_product as $item)
                        <option value="{{$item->brand_id}}">{{$item->brand_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Status</label>
                <select name="productt_status" class="form-control input-sm m-bot15">
                    <option value="0">Hide</option>
                    <option value="1">Show</option>
                </select>
            </div>
            <button type="submit" name="add_product" class="btn btn-info">Add product</button>
        </form>
        </div>
    </div>
</section>
</div>
</div>
@endsection