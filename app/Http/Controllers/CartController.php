<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;

class CartController extends Controller
{
    public function addCardAjax(Request $request)
    {
        $data = $request->all();
        print_r($data);
    }
    public function saveCart(Request $request)
    {
        $list_category_product = DB::table('category_product')
        ->where('category_status','1')
        ->orderby('category_id','desc')->get();

        $list_brand_product = DB::table('brand_product')
        ->where('brand_status','1')
        ->orderby('brand_id','desc')->get();

        $productId = $request->productid_hidden;
        $quantity = $request->qty;

        $data = DB::table('product')->where('product_id', $productId)->get();

        return view('userPages.cart.show_cart',['list_category_product'=>$list_category_product,
        'list_brand_product'=>$list_brand_product,'data'=>$data]);
    }

}
