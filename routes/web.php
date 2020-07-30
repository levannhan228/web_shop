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


Route::get('/list-category/{id}','CategoryProduct@show_CategoryHome');

Route::get('/list-brand/{id}','BrandProduct@show_BrandHome');
Route::get('/detail-product/{id}','ProductController@detailProduct');
Route::post('/save-cart','CartController@saveCart');
Route::post('/add-card-ajax','CartController@addCardAjax');

Route::get('/adminLogin','AdminController@loginAdmin');

Route::get('/adminLogout','AdminController@logoutAdmin');

Route::group(['prefix'=>'admin'],function(){
    Route::get('/dashboard','AdminController@show_Dashboard');
    Route::post('/dashboard','AdminController@login_Dashboard');
    Route::group(['prefix'=>'product'],function(){
        Route::get('/add-category-product','CategoryProduct@add_category_product');
        Route::post('/save-category-product','CategoryProduct@save_category_product');
        Route::get('/list-category-product','CategoryProduct@list_category_product');
        Route::get('/product_category_status/{id}','CategoryProduct@status_category_product');
        Route::get('/edit_category_product/{id}','CategoryProduct@edit_category_product');
        Route::post('/update_category_product/{id}','CategoryProduct@update_category_product');
        Route::get('/delete_category_product/{id}','CategoryProduct@delete_category_product');
    });
    Route::group(['prefix'=>'brand'],function(){
        Route::get('/add-brand-product','BrandProduct@add_brand_product');
        Route::post('/save-brand-product','BrandProduct@save_brand_product');
        Route::get('/list-brand-product','BrandProduct@list_brand_product');
        Route::get('/brand_status_product/{id}','BrandProduct@status_brand_product');
        Route::get('/edit_brand_product/{id}','BrandProduct@edit_brand_product');
        Route::post('/update_brand_product/{id}','BrandProduct@update_brand_product');
        Route::get('/delete_brand_product/{id}','BrandProduct@delete_brand_product');
    });
    Route::group(['prefix'=>'product'],function(){
        Route::get('/add-product','ProductController@add_product');
        Route::post('/save-product','ProductController@save_product');
        Route::get('/list-product','ProductController@list_product');
        Route::get('/product_status/{id}','ProductController@status_product');
        Route::get('/edit_product/{id}','ProductController@edit_product');
        Route::post('/update_product/{id}','ProductController@update_product');
        Route::get('/delete_product/{id}','ProductController@delete_product');
    });
});	
