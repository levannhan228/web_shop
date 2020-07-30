<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;

class BrandProduct extends Controller
{
    //Admin
    public function add_brand_product()
    {
        return view('adminPages.add-brand-product');
    }
    public function list_brand_product()
    {
        $list_brand_product = DB::table('brand_product')->get();
        return view('adminPages.list-brand-product',['list_brand_product'=>$list_brand_product]);
    }
    public function save_brand_product(Request $request)
    {
        $data = array();
        $data['brand_name'] = $request->brand_product_name;
        $data['brand_desc'] = $request->brand_product_description;
        $data['brand_status'] = $request->brand_product_status;

        DB::table('brand_product')->insert($data);
        Session::put('message','add brand ok');
        return Redirect::to('./admin/brand/add-brand-product');
    }
    public function status_brand_product ($id){
        $product = DB::table('brand_product')
        ->where('brand_id',$id)->first();
        if($product->brand_status === 0){
            DB::table('brand_product')->where('brand_id',$id)->update(['brand_status'=> 1]);
            Session::put('message','kích hoạt thành công');
        }else{
            DB::table('brand_product')->where('brand_id',$id)->update(['brand_status'=> 0]);
            Session::put('message','không kích hoạt thành công');
        }
        return Redirect::to('./admin/brand/list-brand-product');
    }
    public function edit_brand_product ($id){
        $edit_brand_product = DB::table('brand_product')->where('brand_id',$id)->get();
        return view('adminPages.edit-brand-product',['edit_brand_product'=>$edit_brand_product]);
    }
    public function update_brand_product (Request $request,$id){
        $data = array();
        $data['brand_name'] = $request->brand_product_name;
        $data['brand_desc'] = $request->brand_product_description;
        DB::table('brand_product')->where('brand_id',$id)->update($data);
        Session::put('message','Update thành công');
        return Redirect::to('./admin/brand/list-brand-product');
    }
    public function delete_brand_product ($id){
        DB::table('brand_product')->where('brand_id',$id)->delete();
        Session::put('message','Xóa thành công');
        return Redirect::to('./admin/brand/list-brand-product');
    }
    //Home Page
    public function show_BrandHome($id)
    {
        $list_category_product = DB::table('category_product')
        ->where('category_status','1')
        ->orderby('category_id','desc')->get();

        $list_brand_product = DB::table('brand_product')
        ->where('brand_status','1')
        ->orderby('brand_id','desc')->get();

        $list_product = DB::table('product')
        ->join('brand_product','product.brand_id','=','brand_product.brand_id')
        ->where('product.brand_id',$id)
        ->get();

        $brand_name = DB::table('brand_product')
        ->select('brand_name')
        ->where('brand_product.brand_id',$id)->first();

        return view('userPages.brand.show-brand',['list_product'=>$list_product,'list_brand_product'=>
        $list_brand_product,'list_category_product'=>$list_category_product,'brand_name'=>$brand_name]);
    }
}
