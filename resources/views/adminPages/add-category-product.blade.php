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
                    <form role="form" action="./admin/save-category-product" method="post">
                        {{ csrf_field() }}
                    <div class="form-group">
                        <label for="exampleInputEmail1">Product Name</label>
                        <input type="text" name="category_product_name" class="form-control" placeholder="Product Name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Product Description</label>
                        <textarea style="resize:none" rows="5" class="form-control" name="category_product_description" placeholder="description"></textarea>
                    </div>
                    <div class="form-group">
                        <select name="category_product_status" class="form-control input-sm m-bot15">
                            <option value="0">Hide</option>
                            <option value="1">Show</option>
                        </select>
                    </div>
                    <button type="submit" name="add_category_product" class="btn btn-info">Add</button>
                </form>
                </div>

            </div>
        </section>

</div>
</div>
@endsection