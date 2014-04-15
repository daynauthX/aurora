<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

//this will eventually route to the frontend dash board
Route::get('/', function()
{
	return 'hello world';
});

//Routes for Standing Orders
Route::resource('standingorders', 'StandingOrdersController');
Route::resource('standingorders.items', 'StandingOrdersItemsController');
Route::resource('orders', 'Orders');
Route::get('/customers/{id}/standingorder/limit/{limit}', 'CustomersStandingOrdersController@index');
Route::resource('customers', 'CustomersController');
Route::resource('customers.standingorder', 'CustomersStandingOrdersController');
Route::resource('products', 'ProductsController');
Route::resource('products.standingorder', 'ProductsStandingOrdersController');

///// IORDER APP SERVICES
Route::get('orders/{custId}','OrderController@showOrders');
Route::get('searchOrder/{orderId}','OrderController@searchOrder');
Route::get('orderDetails/{custId}/{orderId}','OrderController@getOrderDetails');
Route::get('insertNewOrder/customer/{custNo}','OrderController@insertNewOrder');
Route::get('changeDate/{standingOrderDay}/{productionDay}','OrderController@changeDate');
Route::get('deleteAllItems/{productionDay}','OrderController@deleteAll');