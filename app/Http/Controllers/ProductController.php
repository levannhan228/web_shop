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
        $list_product = DB::table('product')->get();
        return view('adminPages.list-brand-product',['list_product'=>$list_product]);
    }
    public function save_product(Request $request)
    {
        $data = array();
        $data['name'] = $request->product_name;
        $data['desc'] = $request->product_description;
        $data['status'] = $request->product_status;

        DB::table('product')->insert($data);
        Session::put('message','add brand ok');
        return Redirect::to('./admin/brand/add-brand-product');
    }
    public function status_product ($id){
        $product = DB::table('product')
        ->where('id',$id)->first();
        if($product->status === 0){
            DB::table('product')->where('id',$id)->update(['status'=> 1]);
            Session::put('message','kích hoạt thành công');
        }else{
            DB::table('product')->where('id',$id)->update(['status'=> 0]);
            Session::put('message','không kích hoạt thành công');
        }
        return Redirect::to('./admin/brand/list-brand-product');
    }
    public function edit_product ($id){
        $edit_product = DB::table('product')->where('id',$id)->get();
        return view('adminPages.edit-brand-product',['edit_product'=>$edit_product]);
    }
    public function update_product (Request $request,$id){
        $data = array();
        $data['name'] = $request->product_name;
        $data['desc'] = $request->product_description;
        DB::table('product')->where('id',$id)->update($data);
        Session::put('message','Update thành công');
        return Redirect::to('./admin/brand/list-brand-product');
    }
    public function delete_product ($id){
        DB::table('product')->where('id',$id)->delete();
        Session::put('message','Xóa thành công');
        return Redirect::to('./admin/brand/list-brand-product');
    }
}
