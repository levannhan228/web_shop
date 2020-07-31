<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;

class CartController extends Controller
{
    public function addCartAjax(Request $request)
    {
        // session::flush();
        $data = $request->all();
        $session_id = substr(md5(microtime()),rand(0,26),5);
        $cart = Session::get('cart');
        if($cart==true){
            $is_avaiable = 0;
            foreach($cart as $key => $val){
                if($val['product_id']==$data['cart_id']){
                    $is_avaiable++;
                }
            }
            if($is_avaiable == 0){
                $cart[] = array(
                    'session_id'=> $session_id, 
                    'product_name'=> $data['cart_name'],
                    'product_id'=> $data['cart_id'],
                    'product_image'=> $data['cart_image'],
                    'product_qty'=> $data['cart_qty'],
                    'product_price'=> $data['cart_price'],
                );
                Session::put('cart',$cart);
            }
        }else{
            $cart[] = array(
                'session_id'=> $session_id, 
                'product_name'=> $data['cart_name'],
                'product_id'=> $data['cart_id'],
                'product_image'=> $data['cart_image'],
                'product_qty'=> $data['cart_qty'],
                'product_price'=> $data['cart_price'],
            );
            Session::put('cart',$cart);
        }
        Session::save();
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
    public function showCart()
    {
        $list_category_product = DB::table('category_product')
        ->where('category_status','1')
        ->orderby('category_id','desc')->get();

        $list_brand_product = DB::table('brand_product')
        ->where('brand_status','1')
        ->orderby('brand_id','desc')->get();

        // $data = DB::table('product')->where('product_id', $productId)->get();

        return view('userPages.cart.show_cart',['list_category_product'=>$list_category_product,
        'list_brand_product'=>$list_brand_product]);
    }

}
