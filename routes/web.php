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

Route::get('/', 'HomeController@index')->name("home");

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

Route::get('/admin/product', 'AdminProductController@product')->name("admin.product.adminOptions");
Route::get('/admin/product/adminCreate', 'AdminProductController@create')->name("admin.product.adminCreate");
Route::post('/admin/product/adminSave', 'AdminProductController@save')->name("admin.product.adminSave");
Route::get('/admin/product/adminList', 'AdminProductController@list')->name("admin.product.adminList");
Route::get('/admin/product/adminView/{id}', 'AdminProductController@view')->name("admin.product.adminView");
Route::delete('/admin/product/adminDelete/{id}', 'AdminProductController@delete')->name("admin.product.adminDelete");


/* Routes for Product clothing with User */
Route::get('/userProduct/userList', 'UserProductController@list')->name("product.userList");
Route::get('/userProduct/userView/{id}', 'UserProductController@view')->name("product.userView");


/*Routes for login/register of User */
Route::get('/', 'HomeController@index')->name("home.index");
Route::get('/admin/index', 'Admin\AdminHomeController@index')->name("admin.home.index");
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

/*Routes for Review with User*/
Route::get('review/userCreate','UserReviewController@create')->name("review.userCreate");
Route::post('/review/userSave', 'UserReviewController@save')->name("review.userSave");
Route::get('/review/userList', 'UserReviewController@list')->name("review.userList");
Route::get('/review/userShow/{id}', 'UserReviewController@show')->name("review.userShow");

//CAMBIAR DELETE Y UPDATE POR GET Y POST
Route::delete('/review/userDelete/{id}', 'UserReviewController@delete')->name("review.userDelete");
Route::get('/review/userEdit/{id}', 'UserReviewController@edit')->name("review.userEdit");
Route::post('/review/userUpdate/{id}', 'UserReviewController@update')->name("review.userUpdate");





