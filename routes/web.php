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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get("addAddress","AddressController@getAddAddress");
Route::post("addAddress","AddressController@postAddAddress");

Route::get("editAddress","AddressController@getEditAddress");
Route::post("editAddress","AddressController@postEditAddress");

Route::get("allAddress","AddressController@getAllAddress");
Route::get("allAddressData","AddressController@getAllAddressData");
Route::get("deleteAddress","AddressController@getDeleteAddress");
Route::get("addressDetail","AddressController@getAddressDetail");
Route::get("location","AddressController@getAddressLocation");