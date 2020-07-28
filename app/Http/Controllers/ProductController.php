<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
class ProductController extends Controller
{
    public function add_product()
    {
        $list_category_product = DB::table('category_product')
        ->orderby('category_id','desc')->get();

        $list_brand_product = DB::table('brand_product')
        ->orderby('brand_id','desc')->get();
        return view('adminPages.add-product',['list_category_product'=>$list_category_product,'list_brand_product'=>$list_brand_product]);
    }
    public function list_product()
    {
        $list_product = DB::table('product')
        ->join('category_product','category_product.category_id','=','product.category_id')
        ->join('brand_product','brand_product.brand_id','=','product.brand_id')
        ->orderby('product.product_id','desc')
        ->get();
        return view('adminPages.list-product',['list_product'=>$list_product]);
    }
    public function save_product(Request $request)
    {
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_price'] = $request->product_price;
        $data['product_desc'] = $request->product_description;
        $data['product_content'] = $request->product_content;
        $data['category_id'] = $request->product_category;
        $data['brand_id'] = $request->product_brand;
        $data['product_status'] = $request->product_status;
        if($request->file('product_image')){
            // $this->validate($request,[
            //     'imageteam' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            // ]);
            $image = $request->file('product_image');
            $filename = time().$image->getClientOriginalName();
            $image->move('./uploads/product',$filename);
            $data['product_image'] = $filename;
        }
        DB::table('product')->insert($data);
        Session::put('message','add product ok');
        return Redirect::to('./admin/product/add-product');
    }
    public function status_product ($id){
        $product = DB::table('product')
        ->where('product_id',$id)->first();
        if($product->product_status === 0){
            DB::table('product')->where('product_id',$id)->update(['product_status'=> 1]);
            Session::put('message','kích hoạt thành công');
        }else{
            DB::table('product')->where('product_id',$id)->update(['product_status'=> 0]);
            Session::put('message','không kích hoạt thành công');
        }
        return Redirect::to('./admin/product/list-product');
    }
    public function edit_product ($id){
        $list_category_product = DB::table('category_product')
        ->orderby('category_id','desc')->get();

        $list_brand_product = DB::table('brand_product')
        ->orderby('brand_id','desc')->get();

        $edit_product = DB::table('product')->where('product_id',$id)->get();

        return view('adminPages.edit-product',['edit_product'=>$edit_product,'list_category_product'=>$list_category_product,'list_brand_product'=>$list_brand_product]);
    }
    public function update_product (Request $request,$id){
        // dd($request);
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_price'] = $request->product_price;
        $data['product_desc'] = $request->product_description;
        $data['product_content'] = $request->product_content;
        $data['category_id'] = $request->product_category;
        $data['brand_id'] = $request->product_brand;
        if($request->file('product_image')){
            // $this->validate($request,[
            //     'imageteam' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            // ]);
            $image = $request->file('product_image');
            $filename = time().$image->getClientOriginalName();
            $image->move('./uploads/product',$filename);
            $data['product_image'] = $filename;
        }
        DB::table('product')
        ->where('product_id',$id)
        ->update($data);
        Session::put('message','add product ok');
        return Redirect::to('./admin/product/list-product');
    }
    public function delete_product ($id){
        DB::table('product')->where('product_id',$id)->delete();
        Session::put('message','Xóa thành công');
        return Redirect::to('./admin/product/list-product');
    }
}
