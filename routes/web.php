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
	$products = \App\Product::find_products_with_api($status_id=2, $page=1, $items_per_page=5, $items_total_count=5);
	return view('index', compact('products'));
});

Route::get('/products/listed_products/{page}', ['uses' => 'ProductsController@index']);

Route::get('/products/show/{listing_id}', ['uses' => 'ProductsController@show']);

Route::get('/products/add', ['uses' => 'ProductsController@create']);

Route::post('products/add', ['as'=>'products.store','uses'=>'ProductsController@store']);

Route::get('/contact', function () {
	return view('contact/index');
});

Route::get('/admin', 'AdminController@index')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('contact-us', ['as'=>'contactus.store','uses'=>'ContactUSController@contactUSPost']);
