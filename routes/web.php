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

Route::get('/danh-muc-san-pham/{category_product_id}','CategoryProduct@show_category_home');

Route::get('/nha-xuat-ban/{publisher_id}','Publisher@show_publisher_home');

Route::get('/chi-tiet-san-pham/{product_id}','ProductController@details_product');


// backend

//login admin
Route::get('/admin-login','AdminController@login');
//logout admin
Route::get('/logout','AdminController@logout');

Route::get('/dashboard','AdminController@index');
Route::post('/dashboard','AdminController@dashboard');

//category-product

Route::get('/add-category-product','CategoryProduct@add');
Route::post('/save-category-product','CategoryProduct@save');

Route::get('/all-category-product','CategoryProduct@all');

Route::get('/edit-category-product/{category_product_id}','CategoryProduct@edit');
Route::post('/update-category-product/{category_product_id}','CategoryProduct@update');

Route::get('/delete-category-product/{category_product_id}','CategoryProduct@delete');

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
Route::post('/add-cart/{product_id}','CartController@AddCart');