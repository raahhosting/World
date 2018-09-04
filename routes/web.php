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

// Route::get('/', function () {
//     return view('home');
// });

Route::get('/','HomeController@index');

Route::get('/software/{download}','DownloadsController@show')->name('software.show');

Route::get('/cart','CartController@index')->name('cart.index');
Route::post('/cart','CartController@store')->name('cart.store');
Route::get('empty', function(){
  Cart::destroy();
});

Route::get('/checkout', function () {
    return view('software.checkout');
  });

  Route::get('/search','DownloadsController@search')->name('search');







Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
