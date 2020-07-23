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
        return view('adminPages.list-category-product');
    }
    public function save_category_product(Request $request)
    {
        $data = array();
        $data['category_name'] = $request->category_product_name;
        $data['category_desc'] = $request->category_product_description;
        $data['category_status'] = $request->category_product_status;

        DB::table('category_product')->insert($data);
        Session::put('message','add product ok');
        return Redirect::to('./admin/add-category-product');
    }
}
