<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class AdminController extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('/admin/dashboard');
        }else{
            return Redirect::to('/adminLogin')->send();
        }
    }
    public function loginAdmin(){
        return view('adminPages.adminLogin');
    }
    public function show_Dashboard(){
        $this->AuthLogin();
        return view('adminPages.dashboard');
    }
    public function login_Dashboard(Request $request){
        $admin_email = $request->admin_email;
        $admin_password = md5($request->admin_password);
        $result = DB::table('admin_table')
        ->where('admin_email',$admin_email)
        ->where('admin_password',$admin_password)->first();
        // print_r ($result); hàm check in ra biến $result
        if($result){
            Session::put('admin_name',$result->admin_name);
            Session::put('admin_id',$result->admin_id);
            return Redirect::to('/admin/dashboard');
        }
        Session::put('message','Please check email or password');
        return Redirect::to('/adminLogin');
    }
    public function logoutAdmin(Request $request){
        $this->AuthLogin();
        Session::put('admin_name',null);
        Session::put('admin_id',null);
        return Redirect::to('/adminLogin');
    }
}
