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

Route::get('/', 'HomeController@index')->name("home.index");

/*Changes made by Isabel Graciano */
/* Routes for donation */
//Route::get('/carpeta', 'nombrecontroller@nombremetodo')->name("donation.userDonation");   alias

Route::get('/donation', 'HomeController@donation')->name("donation.userDonation");
Route::get('/donation/userCreate', 'UserDonationController@create')->name("donation.userCreate");
Route::post('/donation/userSave', 'UserDonationController@save')->name("donation.userSave");
Route::get('/donation/userList', 'UserDonationController@list')->name("donation.userList");
Route::get('/donation/userView/{id}', 'UserDonationController@viewdonation')->name("donation.userViewdonation");
Route::delete('/donation/userDelete/{id}', 'UserDonationController@delete')->name("donation.userDelete");


/* Routes for Product clothing with Admin */
Route::get('/product/list', 'ProductController@list')->name("product.list");

Route::get('/admin/product', 'HomeController@product')->name("admin.product.adminProduct");
Route::get('/admin/product/adminCreate', 'AdminProductController@create')->name("admin.product.adminCreate");

Route::post('/admin/product/adminSave', 'AdminProductController@save')->name("product.adminSave");
Route::get('/admin/product/adminList', 'AdminProductController@list')->name("product.adminList");
Route::get('/admin/product/adminView/{id}', 'AdminProductController@viewproduct')->name("product.");
Route::delete('/admin/product/adminDelete/{id}', 'AdminProductController@delete')->name("product.adminDelete");


/* Routes for Product clothing with User */
Route::get('/product/userList', 'UserProductController@list')->name("product.userList");



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
