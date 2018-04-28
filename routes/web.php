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

    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

    Route::get('/parkingspots', 'ParkingSpotController@index')->name('parkingspot_index');
    Route::post('/parkingspost', 'ParkingSpotController@store')->name('parkingspot_create');
    Route::get('/parkingspots/edit/{parkingspot}', 'ParkingSpotController@edit')->name('parkingspot_edit');
    Route::put('/parkingspots/{parkingspot}', 'ParkingSpotController@update')->name('parkingspot_update');
    Route::delete('/parkingspots/{parkingspot}', 'ParkingSpotController@destroy')->name('parkingspot_delete');

    Route::get('/reservations', 'ReservationController@show_reservations')->name('dashboard_reservations');
    Route::get('/logreservations', 'LogReservationController@index')->name('log_reservations');
    Route::get('/members', 'MemberController@index')->name('member_index');
    Route::get('/members/create', 'MemberController@create')->name('member_create');
    Route::post('/members', 'MemberController@store')->name('member_store');
    Route::delete('/members/{member}', 'MemberController@destroy')->name('member_delete');

    Route::get('/home', 'ReservationController@index')->name('reservation_home');
    Route::get('/reservation/create', 'ReservationController@reserve')->name('reservation_create');
    Route::delete('/reservation/spot/{reservation}', 'ReservationController@cancel')->name('reservation_cancel');
    Route::put('/reservation/spot/{reservation}', 'ReservationController@Reserved_validation')->name('reservation_validate');
    Route::delete('/reservation/checkout/{reservation}', 'ReservationController@checkout')->name('reservation_checkout');

    Route::get('/checkout', function(){
      return view('checkout');});
});
