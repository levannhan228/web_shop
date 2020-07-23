<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;

class BrandProduct extends Controller
{
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
}
