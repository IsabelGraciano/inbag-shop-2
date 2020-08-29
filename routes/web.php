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
Route::get('/donation', 'HomeController@donation')->name("donation.donation");

//Routes to create, save and view a donation
Route::get('/donation/create', 'DonationController@create')->name("donation.create");
Route::post('/donation/save', 'DonationController@save')->name("donation.save");

Route::get('/donation/view', 'DonationController@view')->name("donation.view");


/*Changes made by Santiago Moreno */

/*Changes made by Camila Barona */
