@extends('adminLayout')
@section('adminContent')
<div class="row">
<div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Edit Product Brand
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
                @foreach ($edit_brand_product as $item)
                    <form role="form" action="./admin/brand/update_brand_product/{{$item->brand_id}}" method="post">
                        {{ csrf_field() }}
                    <div class="form-group">
                        <label for="exampleInputEmail1">Product Name</label>
                        <input type="text" name="brand_product_name" value={{$item->brand_name}} class="form-control" placeholder="Product Name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Product Description</label>
                        <textarea style="resize:none" rows="5" class="form-control" name="brand_product_description" placeholder="description">{{$item->brand_desc}}</textarea>
                    </div>
                    <button type="submit" name="add_brand_product" class="btn btn-info">Update</button>
                    </form>
                @endforeach
                </div>
                
            </div>
        </section>

</div>
</div>
@endsection