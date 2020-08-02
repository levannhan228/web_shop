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
        if($cart){
            $is_avaiable = 0;
            foreach($cart as $key => $val){
                if($val['product_id']==$data['cart_id']){
                    $cart[$key]['product_qty'] = $val['product_qty']+=1;
                    Session::put('cart',$cart);
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
    public function showCart()
    {
        $list_category_product = DB::table('category_product')
        ->where('category_status','1')
        ->orderby('category_id','desc')->get();

        $list_brand_product = DB::table('brand_product')
        ->where('brand_status','1')
        ->orderby('brand_id','desc')->get();

        return view('userPages.cart.show_cart',['list_category_product'=>$list_category_product,
        'list_brand_product'=>$list_brand_product]);
    }
    public function delete_itemCart($session_id)
    {
        
        $cart = Session::get('cart');
        if($cart==true){
            foreach($cart as $key => $val){
                if($val['session_id']==$session_id){
                    unset($cart[$key]);
                }
            }
            Session::put('cart',$cart);
        }
    }
    // public function updateCartAjax(Request $request)
    // {
    //     $data = $request->all();
    //     $cart = Session::get('cart');
        
    // }
}
