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

Route::get('/categories', 'CategoriesController@index');

Route::get('/', function () {
    return view('welcome');
});

Route::get('exemplo', 'WelcomeController@exemplo');

Route::get('admin/categories', 'AdminCategoriesController@index');

Route::get('admin/products', 'AdminProductsController@index');

/*
 * Grupo de rotas para o prefixo admin
 */
Route::group(['prefix'=>'admin'], function() {

	/*
	 * Rota de visualizacao de todas Categories
	 */
	Route::get(
		'categories',
		['as'=>'categories', 'uses'=>'AdminCategoriesController@index']
	);

	/*
	 * Rota de visualizacao da Category do parametro id
	 */
	Route::get(
		'categories/{id}',
		['as'=>'categories.show', 'uses'=>'AdminCategoriesController@show']
	);

	/*
	 * Rota de insersao da Category
	 */
	Route::post(
		'categories',
		['as'=>'categories.store', 'uses'=>'AdminCategoriesController@store']
	);

	/*
	 * Rota de atualizacao da Category
	 */
	Route::put(
		'categories/{id}',
		['as'=>'categories.update', 'uses'=>'AdminCategoriesController@update']
	);

	/*
	 * Rota de remocao da Category
	 */
	Route::get(
		'categories/remove/{id}',
		['as'=>'categories.update', 'uses'=>'AdminCategoriesController@update']
	);

	/*
	 * Rota de visualizacao de todas Products
	 */
	Route::get(
		'products',
		['as'=>'products', 'uses'=>'AdminProductsController@index']
	);

	/*
	 * Rota de visualizacao da Product do parametro id
	 */
	Route::get(
		'products/{id}',
		['as'=>'products.show', 'uses'=>'AdminProductsController@show']
	);

	/*
	 * Rota de insersao da Product
	 */
	Route::post(
		'products',
		['as'=>'products.store', 'uses'=>'AdminProductsController@store']
	);

	/*
	 * Rota de atualizacao da Product
	 */
	Route::put(
		'products/{id}',
		['as'=>'products.update', 'uses'=>'AdminProductsController@update']
	);

	/*
	 * Rota de remocao da Product
	 */
	Route::get(
		'products/remove/{id}',
		['as'=>'products.update', 'uses'=>'AdminProductsController@update']
	);

});
