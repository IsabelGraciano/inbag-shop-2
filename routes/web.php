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
Route::get('/donation', 'HomeController@donation')->name("donation.donation");

Route::get('/donation/create', 'DonationController@create')->name("donation.create");
Route::post('/donation/save', 'DonationController@save')->name("donation.save");

Route::get('/donation/view', 'DonationController@view')->name("donation.view");
Route::get('/donation/view/{id}', 'DonationController@viewdonation')->name("donation.viewdonation");

Route::delete('/donation/delete/{id}', 'DonationController@delete')->name("donation.delete");
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
