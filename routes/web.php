<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvid?er within a group which
| contains the "web" mid?dleware group. Now create something great!
|
*/


/**Routes for langs */
Route::redirect('/','en');

Route::group(['prefix' => '{language}'], function() {

    /*Routes for login/register of User */
    Route::get('/', 'HomeController@index')->name("home.index");
    Route::get('/admin/index', 'Admin\AdminHomeController@index')->name("admin.home.index"); //ADMIN
    Auth::routes();
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/','UserProductController@bestSellers')->name("home.index");

    /* Route for top 5 best sellers */

    /* Routes for donation user */
    Route::get('/donation', 'UserDonationController@options')->name("donation.userOptions");
    Route::get('/donation/userCreate', 'UserDonationController@create')->name("donation.userCreate");
    Route::post('/donation/userSave', 'UserDonationController@save')->name("donation.userSave");
    Route::get('/donation/userList', 'UserDonationController@list')->name("donation.userList");
    Route::get('/donation/userView/{id?}', 'UserDonationController@viewdonation')->name("donation.userViewdonation");
    Route::delete('/donation/userDelete/{id?}', 'UserDonationController@delete')->name("donation.userDelete");

    //* Routes for donation admin */
    Route::get('/admin/donation/adminList', 'Admin\AdminDonationController@list')->name("admin.donation.adminList");
    Route::get('/admin/donation/adminView/{id?}', 'Admin\AdminDonationController@view')->name("admin.donation.adminView");

    /* Routes for Product clothing with User */
    Route::get('/userProduct/userList', 'UserProductController@list')->name("product.userList");
    Route::get('/userProduct/userView/{id?}', 'UserProductController@view')->name("product.userView");

    /* Routes for Product clothing with Admin */
    Route::get('/product/list', 'ProductController@list')->name("product.list");
    Route::get('/admin/product', 'Admin\AdminProductController@product')->name("admin.product.adminOptions");
    Route::get('/admin/product/adminCreate', 'Admin\AdminProductController@create')->name("admin.product.adminCreate");
    Route::post('/admin/product/adminSave', 'Admin\AdminProductController@save')->name("admin.product.adminSave");
    Route::get('/admin/product/adminList', 'Admin\AdminProductController@list')->name("admin.product.adminList");
    Route::get('/admin/product/adminView/{id?}', 'Admin\AdminProductController@view')->name("admin.product.adminView");
    Route::delete('/admin/product/adminDelete/{id?}', 'Admin\AdminProductController@delete')->name("admin.product.adminDelete");

    /*Routes for reviews*/
    Route::post('/userProduct/userSave/{id?}', 'UserReviewController@saveReview')->name("product.userSaveReview");  
    Route::delete('/userProduct/userDelete/{id?}', 'UserReviewController@deleteReview')->name("product.userDeleteReview");

    /**Routes for cart */
    Route::post('/cart/addToCart/{id?}', 'UserProductController@addToCart')->name("product.addToCart");
    Route::delete('/cart/remove', 'UserProductController@removeCart')->name("product.removeCart");
    Route::get('/cart/cart', 'UserProductController@cart')->name("product.cart");
    Route::post('/cart/buy', 'UserProductController@buy')->name("product.buy");
    Route::get('/cart/list', 'UserProductController@cartlist')->name("product.cartlist");
    Route::get('/cart/orders', 'UserProductController@cartlist')->name("product.cartlist");
    Route::get('/cart/order/{id?}', 'UserProductController@orderView')->name("product.orderView");

    /**Routes for wishlist */
    Route::get('/userProduct/wishList/{id?}', 'UserProductController@saveWishList')->name("product.userWishListSave");
    Route::get('/userProduct/wishListShowAll', 'UserProductController@userWishListShowAll')->name("product.userWishListShowAll");
    Route::delete('/userProduct/wishListDelete/{id?}', 'UserProductController@delete')->name("product.wishListDelete");

    Route::post('/pdf', 'UserProductController@pdf')->name("view.pdf");

    Route::get('/edit/profile', 'Auth\EditProfileController@edit')->name("auth.register");
    Route::post('/editProfile/userSave/{id}', 'Auth\EditProfileController@update')->name("auth.userUpdate");
    Route::get('/productsApi', 'ProductsApi@appi_rest_consum')->name("product.productsApi");
});

Route::get('/auth/redirect/{provider}', 'GoogleLoginController@redirect');
Route::get('/callback/{provider}', 'GoogleLoginController@callback');