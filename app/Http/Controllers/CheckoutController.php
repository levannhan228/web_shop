<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;

class CheckoutController extends Controller
{
    public function loginCheckout()
    {
        $list_category_product = DB::table('category_product')
        ->where('category_status','1')
        ->orderby('category_id','desc')->get();

        $list_brand_product = DB::table('brand_product')
        ->where('brand_status','1')
        ->orderby('brand_id','desc')->get();

        return view('userPages.checkout.loginCheckout',['list_category_product'=>$list_category_product,
        'list_brand_product'=>$list_brand_product]);
    }
    public function addCustomer(Request $request)
    {
        $data = array();
        $data['customer_name']= $request->customer_name;
        $data['customer_email']= $request->customer_email;
        $data['customer_password']= md5($request->customer_password);
        $data['customer_phone']= $request->customer_phone;

        $customer_id = DB::table('customer')->insertGetId($data);
        Session::put('customer_id',$customer_id);
        Session::put('customer_name',$request->customer_name);
        return Redirect::to('./checkout');
    }
    public function checkout()
    {
        $list_category_product = DB::table('category_product')
        ->where('category_status','1')
        ->orderby('category_id','desc')->get();

        $list_brand_product = DB::table('brand_product')
        ->where('brand_status','1')
        ->orderby('brand_id','desc')->get();

        return view('userPages.checkout.showcheckout',['list_category_product'=>$list_category_product,
        'list_brand_product'=>$list_brand_product]);
    }

    public function save_checkout_customer(Request $request)
    {
        $data = array();
        $data['shipping_name']= $request->shipping_name;
        $data['shipping_email']= $request->shipping_email;
        $data['shipping_address']= $request->shipping_address;
        $data['shipping_phone']= $request->shipping_phone;
        $data['shipping_note']= $request->shipping_note;

        $shipping_id = DB::table('shipping')->insertGetId($data);
        Session::put('shipping_id',$shipping_id);
        return Redirect::to('./payment');
    }
    public function payment()
    {
        $list_category_product = DB::table('category_product')
        ->where('category_status','1')
        ->orderby('category_id','desc')->get();

        $list_brand_product = DB::table('brand_product')
        ->where('brand_status','1')
        ->orderby('brand_id','desc')->get();

        return view('userPages.checkout.payment',['list_category_product'=>$list_category_product,
        'list_brand_product'=>$list_brand_product]);
    }
    public function logout_checkout()
    {
        Session::flush();
        return Redirect('./login-checkout');
    }
    public function login_customer(Request $request)
    {
        $email = $request->email_account;
        $password = md5($request->password_account);
        $result = DB::table('customer')
        ->where('customer_email',$email)
        ->where('customer_password',$password)->first();
        if($result){
            Session::put('customer_id',$result->customer_id);
            return Redirect::to('./checkout');
        }else{
            return Redirect::to('./login-checkout');
        }
    }
    public function oder_place(Request $request)
    {
        //insert payment
        $data = array();
        $data['payment_menthod']= $request->payment_option;
        $data['payment_status']= 'đang xử lý';

        $payment_id = DB::table('payment')->insertGetId($data);
        
        //insert oder
        $oder_data = array();
        $oder_data['customer_id']= Session::get('customer_id');
        $oder_data['shipping_id']= Session::get('shipping_id');
        $oder_data['payment_id']= $payment_id;
        $oder_data['oder_total']= 'đang xử lý';
        $oder_data['shipping_id']= 'đang xử lý';
        $oder_data['shipping_id']= 'đang xử lý';

        $payment_id = DB::table('payment')->insertGetId($data);
        return Redirect::to('./payment');
    }
}
