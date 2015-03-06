<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/',function() {
	return view('home');
});


// Route::get('/invoice/')

Route::get('/customer', 'CustomerController@listAction');

Route::get('/invoice', 'InvoiceController@listAction');

Route::get('/item', 'ItemController@listAction');

Route::get('/invoice/{id}', "InvoiceController@detailAction");

Route::get('/customer/newInvoice/{customerId}', "InvoiceController@newInvoice");

Route::post('/invoice/{invoiceID}/addItem', "InvoiceController@addItemAction");

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
