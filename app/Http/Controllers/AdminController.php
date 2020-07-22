<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function loginAdmin(){
        return view('adminPages.adminLogin');
    }
    public function show_Dashboard(){
        return view('adminLayout');
    }
}
