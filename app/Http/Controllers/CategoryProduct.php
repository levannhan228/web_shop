<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;

class CategoryProduct extends Controller
{
    public function add_category_product()
    {
        return view('adminPages.add-category-product');
    }
    public function list_category_product()
    {
        $list_category_product = DB::table('category_product')->get();
        return view('adminPages.list-category-product',['list_category_product'=>$list_category_product]);
    }
    public function save_category_product(Request $request)
    {
        $data = array();
        $data['category_name'] = $request->category_product_name;
        $data['category_desc'] = $request->category_product_description;
        $data['category_status'] = $request->category_product_status;

        DB::table('category_product')->insert($data);
        Session::put('message','add product ok');
        return Redirect::to('./admin/product/add-category-product');
    }
    public function status_product ($id){
        $product = DB::table('category_product')
        ->where('category_id',$id)->first();
        if($product->category_status === 0){
            DB::table('category_product')->where('category_id',$id)->update(['category_status'=> 1]);
            Session::put('message','kích hoạt thành công');
        }else{
            DB::table('category_product')->where('category_id',$id)->update(['category_status'=> 0]);
            Session::put('message','không kích hoạt thành công');
        }
        return Redirect::to('./admin/product/list-category-product');
    }
    public function edit_product ($id){
        $edit_category_product = DB::table('category_product')->where('category_id',$id)->get();
        return view('adminPages.edit-category-product',['edit_category_product'=>$edit_category_product]);
    }
    public function update_product (Request $request,$id){
        $data = array();
        $data['category_name'] = $request->category_product_name;
        $data['category_desc'] = $request->category_product_description;
        DB::table('category_product')->where('category_id',$id)->update($data);
        Session::put('message','Update thành công');
        return Redirect::to('./admin/product/list-category-product');
    }
    public function delete_product ($id){
        DB::table('category_product')->where('category_id',$id)->delete();
        Session::put('message','Xóa thành công');
        return Redirect::to('./admin/product/list-category-product');
    }
}
