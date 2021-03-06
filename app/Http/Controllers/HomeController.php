<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    public function homePage(){
        $list_category_product = DB::table('category_product')
        ->where('category_status','1')
        ->orderby('category_id','desc')->get();

        $list_brand_product = DB::table('brand_product')
        ->where('brand_status','1')
        ->orderby('brand_id','desc')->get();

        $all_product = DB::table('product')
        ->where('product_status','1')->orderby('product_id','desc')->limit(6)->get();

        $product_random = DB::table('product')
        ->where('product_status','1')
        ->whereNotIn('product_id',$all_product->pluck('product_id')->toArray())
        ->get()->random(3);

        return view('userPages.home')->with(['list_category_product'=>$list_category_product,
        'list_brand_product'=>$list_brand_product,'all_product'=>$all_product,'product_random'=>$product_random]);
        // return view('userPages.home')->with(compact('list_category_product','list_brand_product')); //cach 2
    }
    public function search(Request $request)
    {
        $keywords=$request->keywords_submit;

        $list_category_product = DB::table('category_product')
        ->where('category_status','1')
        ->orderby('category_id','desc')->get();

        $list_brand_product = DB::table('brand_product')
        ->where('brand_status','1')
        ->orderby('brand_id','desc')->get();

        $search_product = DB::table('product')
        ->where('product_status','1')
        ->where('product_name','like','%'.$keywords.'%')
        ->orderby('product_id','desc')->get();

        return view('userPages.product.search')->with(['list_category_product'=>$list_category_product,
        'list_brand_product'=>$list_brand_product,'search_product'=>$search_product]);
    }
}
