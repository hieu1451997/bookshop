<?php

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
// frontend
Route::get('','HomeController@index');
Route::get('/danh-muc-san-pham/{category_product_id}','CategoryProductController@show_category_home');
Route::get('/nha-xuat-ban/{publisher_id}','Publisher@show_publisher_home');
Route::get('/chi-tiet-san-pham/{product_id}','ProductController@details_product');


// backend

//login admin
Route::get('/admin-login','AdminController@login');
//logout admin
Route::get('/logout','AdminController@logout');
Route::get('/dashboard','AdminController@index');
Route::post('/dashboard','AdminController@dashboard');

//order
Route::get('/all-order','OrderController@manage_order');
Route::get('/view-order/{order_id}','OrderController@view_order');

//category-product

Route::get('/add-category-product','CategoryProductController@add');
Route::post('/save-category-product','CategoryProductController@save');

Route::get('/all-category-product','CategoryProductController@all');

Route::get('/edit-category-product/{category_product_id}','CategoryProductController@edit');
Route::post('/update-category-product/{category_product_id}','CategoryProductController@update');

Route::get('/delete-category-product/{category_product_id}','CategoryProductController@delete');

//Publisher-- nha xuat ban

Route::get('/all-publisher','Publisher@all');

Route::get('/add-publisher','Publisher@add');
Route::post('/save-publisher','Publisher@save');

Route::get('/edit-publisher/{publisher_id}','Publisher@edit');
Route::post('/update-publisher/{publisher_id}','Publisher@update');

Route::get('/delete-publisher/{publisher_id}','Publisher@delete');

// Product-- san pham

Route::get('/all-product','ProductController@all');

Route::get('/add-product','ProductController@add');
Route::post('/save-product','ProductController@save');

Route::get('/edit-product/{product_id}','ProductController@edit');
Route::post('/update-product/{product_id}','ProductController@update');

Route::get('/delete-product/{product_id}','ProductController@delete');
// cart
//cart header
Route::get('/add-cart/{product_id}','CartController@AddCart');
Route::get('/delete-item-cart/{product_id}','CartController@DeleteItemCart');
//page view_cart.blade.php
Route::get('/view-cart','CartController@ViewCart');
Route::get('/delete-item-list-cart/{product_id}','CartController@DeleteItemListCart');
Route::get('/save-item-list-cart/{product_id}/{quanty}','CartController@SaveItemListCart');

// Customer
Route::get('/view-login-customer','CustomerController@view_login_customer');
Route::post('/add-customer','CustomerController@add_customer');
Route::post('/login-customer','CustomerController@login_customer');
Route::get('/logout-customer','CustomerController@logout_customer');
//Route::get('/checkout','CheckoutController@checkout');
//Checkout
Route::get('/view-checkout','CheckoutController@checkout');
Route::post('/login-checkout','CheckoutController@login_checkout');
Route::post('/check-out','CheckoutController@check_out');
