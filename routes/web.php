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


//click sa reserve crop
Route::get('/reservation/start-reservation/{id}',
['uses' => 'ReservationController@startReservation',
'as' => 'reservation.startReservation', 'middleware' => 'auth']);

//click sa reservations
Route::get('/reservation/my-reservations',
['uses' => 'ReservationController@getReservations',
'as' => 'reservation.reservationCart']);

// //click navbar reservation
// Route::get('/reservation/navbar',
// ['uses' => 'ReservationController@getReservationsNavbar',
// 'as' => 'reservation.navbarReservation']);

//reduce one in reservation cart
Route::get('reduce/{id}',
    ['uses' => 'ReservationController@getReduceByOne',
    'as' => 'reservation.reduceByOne']);

//add crop in reservation cart
    Route::get('additional/{id}',
    ['uses' => 'ReservationController@getAddByOne',
    'as' => 'reservation.addByOne']);


//remove crop in reservation cart
Route::get('remove/{id}',
    ['uses' => 'ReservationController@getRemoveItem',
    'as' => 'reservation.removeItem']);

//click sa place-order
Route::get('/reservation/checkout',
['uses' => 'ReservationController@getCheckout',
'as' => 'checkout',
'middleware' => 'auth']);

//click sa place order
Route::post('/reservation/checkout',
['uses' => 'ReservationController@postCheckout',
'as' => 'checkout',
'middleware' => 'auth']);


Route::get('/reservation/confirm-reservations', ['uses' => 'ReservationController@confirmReservation', 'as' => 'placeorder']);

Route::post('/reservation/confirm-reservations', ['uses' => 'ReservationController@postConfirmReservation', 'as' => 'placeorder']);

// user profile
Route::get('/users/user-profile', ['uses' => 'MyAccountController@index', 'as' => 'myaccount']);
// my orders
Route::get('/users/my-orders', ['uses' => 'MyAccountController@myOrders', 'as' => 'myorders']);

// create profile
Route::get('/users/create-profile', ['uses' => 'MyAccountController@createprofile', 'as' => 'users.createprofile']);
// edit profile
Route::get('/users/edit-profile', ['uses' => 'MyAccountController@editprofile', 'as' => 'users.editprofile']);
// user lands
Route::get('/users/user-lands', ['uses' => 'MyLandsController@userlands', 'as' => 'users.userlands']);

// add new button user lands
Route::get('/users/add-lands/', ['uses' => 'MyLandsController@addlands', 'as' => 'users.addlands']);
// inside add-lands
Route::post('/users/user-lands/', ['uses' => 'MyLandsController@storelands']);
// view farmer
Route::get('/explore-farms/view-farmer/', ['uses' => 'ExploreFarmsController@viewFarmer', 'as' => 'farm.viewDFarmer']);


// product statistics
Route::get('/users/prod-statistics/', ['uses' => 'DashboardController@prodStat', 'as' => 'users.prod-stat']);

Route::get('/users/orders-confirmation/', ['uses' => 'DashboardController@getOrdersConfirmation', 'as' => 'users.orders-confirmation']);



Route::get('/', 'PagesController@index');
Route::get('/admin', 'PagesController@admin');
Route::get('/products', 'PagesController@products');
Route::get('/homepage', 'PagesController@homepage');

Route::resource('/explore-products', 'ExploreProductsController');
Route::resource('/explore-farms', 'ExploreFarmsController');
Route::resource('/users', 'MyAccountController');

Auth::routes();


Route::get('/dashboard', 'DashboardController@index');
