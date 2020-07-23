<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/','HomeController@homePage');

Route::get('/adminLogin','AdminController@loginAdmin');

Route::get('/adminLogout','AdminController@logoutAdmin');

Route::group(['prefix'=>'admin'],function(){
    Route::get('/dashboard','AdminController@show_Dashboard');
    Route::post('/dashboard','AdminController@login_Dashboard');
    Route::get('/add-category-product','CategoryProduct@add_category_product');
    Route::get('/list-category-product','CategoryProduct@list_category_product');
    Route::post('/save-category-product','CategoryProduct@save_category_product');
});	
