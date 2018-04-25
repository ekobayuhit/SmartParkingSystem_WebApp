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
})->name('welcome');

Route::get('/about', function(){
    return view('about');
})->name('about');

Auth::routes();

Route::group(['middleware'=>'auth'], function () {

    Route::get('/dashboard', 'DashboardController@show_parkingspots')->name('dashboard_parkingspots');

    Route::post('/dashboard/create', 'DashboardController@store')->name('add_spot');

    Route::get('/dashboard/edit', 'DashboardController@edit')->name('edit_spots');

    Route::get('/dashboard/reservations', 'DashboardController@show_reservations')->name('dashboard_reservations');

    Route::get('/dashboard/logreservation', 'DashboardController@log_reservations')->name('log_reservations');

    Route::get('/home', 'ReservationController@index')->name('reservation_home');

    Route::get('/reservation/create', 'ReservationController@reserve')->name('reservation_create');

    Route::delete('/reservation/spot/{reservation}', 'ReservationController@cancel')->name('reservation_cancel');

    Route::put('/reservation/spot/{reservation}', 'ReservationController@Reserved_validation')->name('reservation_validate');

    Route::delete('/reservation/checkout/{reservation}', 'ReservationController@checkout')->name('reservation_checkout');

    Route::get('/checkout', function(){
      return view('checkout');});
});
