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

// Route::get('/checkout', function () {
//     return view('software.checkout2');
// });

Route::get('/','HomeController@index')->name('download.index');

Route::get('/software/{download}','DownloadsController@show')->name('software.show');

Route::get('/alldownloads','DownloadsController@index')->name('all.index');


Route::get('/cart','CartController@index')->name('cart.index');
Route::post('/cart','CartController@store')->name('cart.store');
Route::delete('/cart/{id}','CartController@destroy')->name('cart.destroy');
Route::get('empty', function(){
  Cart::destroy();
});

Route::post('/coupon','CouponsController@store')->name('coupon.store');
Route::delete('/coupon','CouponsController@destroy')->name('coupon.destroy');

Route::get('/profile','ProfileController@index')->name('user.index');
Route::get('/upload','UploadController@index')->name('user.upload');

Route::get('/checkout','CheckoutController@index')->name('checkout.index')->middleware('auth');
Route::post('/checkout','CheckoutController@store')->name('checkout.store');

  Route::get('/search','DownloadsController@search')->name('search');

  Route::get('/mailable',function(){

    $order = App\Order::find(1);
    return new App\Mail\OrderPlaced($order);
  });







Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
