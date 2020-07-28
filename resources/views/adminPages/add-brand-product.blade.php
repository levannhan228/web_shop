@extends('adminLayout')
@section('adminContent')
<div class="row">
<div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Create Product Brand
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
                    <form role="form" action="./admin/brand/save-brand-product" method="post">
                        {{ csrf_field() }}
                    <div class="form-group">
                        <label for="exampleInputEmail1">Product Brand Name</label>
                        <input type="text" name="brand_product_name" class="form-control" placeholder="Product Name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Product Brand Description</label>
                        <textarea style="resize:none" rows="5" class="form-control" name="brand_product_description" placeholder="description"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Status</label>
                        <select name="brand_product_status" class="form-control input-sm m-bot15">
                            <option value="0">Hide</option>
                            <option selected value="1">Show</option>
                        </select>
                    </div>
                    <button type="submit" name="add_brand_product" class="btn btn-info">Add Brand</button>
                </form>
                </div>

            </div>
        </section>

</div>
</div>
@endsection