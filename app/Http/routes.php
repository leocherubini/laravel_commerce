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

Route::get(
	'/categories',
	['as' => 'categories', 'uses' => 'CategoriesController@index']
);

Route::get(
	'categories/create',
	['as' => 'categories.create', 'uses' => 'CategoriesController@create']
);

Route::post(
	'categories',
	['as' => 'categories.store', 'uses' => 'CategoriesController@store']
);

Route::get(
	'categories/{id}/destroy',
	['as' => 'categories.destroy', 'uses' => 'CategoriesController@destroy']
);

Route::get(
	'categories/{id}/edit',
	['as' => 'categories.edit', 'uses' => 'CategoriesController@edit']
);

Route::put(
	'categories/{id}/update',
	['as' => 'categories.update', 'uses' => 'CategoriesController@update']
);

Route::get(
	'/products',
	['as' => 'products', 'uses' => 'ProductsController@index']
);

Route::get(
	'products/create',
	['as' => 'products.create', 'uses' => 'ProductsController@create']
);

Route::post(
	'products',
	['as' => 'products.store', 'uses' => 'ProductsController@store']
);

Route::get(
	'products/{id}/destroy',
	['as' => 'products.destroy', 'uses' => 'ProductsController@destroy']
);

Route::get(
	'products/{id}/edit',
	['as' => 'products.edit', 'uses' => 'ProductsController@edit']
);

Route::put(
	'products/{id}/update',
	['as' => 'products.update', 'uses' => 'ProductsController@update']
);

Route::get('/', function () {
    return view('welcome');
});

Route::get('exemplo', 'WelcomeController@exemplo');

//Route::get('admin/categories', 'AdminCategoriesController@index');

//Route::get('admin/products', 'AdminProductsController@index');

/*
 * Grupo de rotas para o prefixo admin
 */
Route::group(['prefix'=>'admin'], function() {

	/*
	 * Rota de visualizacao de todas Categories
	 */
	Route::get(
		'categories',
		['as'=>'admin.categories', 'uses'=>'AdminCategoriesController@index']
	);

	/*
	 * Rota de visualizacao da Category do parametro id
	 */
	Route::get(
		'categories/{id}',
		['as'=>'admin.categories.show', 'uses'=>'AdminCategoriesController@show']
	);

	/*
	 * Rota de insersao da Category
	 */
	Route::post(
		'categories',
		['as'=>'admin.categories.store', 'uses'=>'AdminCategoriesController@store']
	);

	/*
	 * Rota de atualizacao da Category
	 */
	Route::put(
		'categories/{id}',
		['as'=>'admin.categories.update', 'uses'=>'AdminCategoriesController@update']
	);

	/*
	 * Rota de remocao da Category
	 */
	Route::get(
		'categories/remove/{id}',
		['as'=>'admin.categories.update', 'uses'=>'AdminCategoriesController@update']
	);

	/*
	 * Rota de visualizacao de todas Products
	 */
	Route::get(
		'products',
		['as'=>'admin.products', 'uses'=>'AdminProductsController@index']
	);

	/*
	 * Rota de visualizacao da Product do parametro id
	 */
	Route::get(
		'products/{id}',
		['as'=>'admin.products.show', 'uses'=>'AdminProductsController@show']
	);

	/*
	 * Rota de insersao da Product
	 */
	Route::post(
		'products',
		['as'=>'admin.products.store', 'uses'=>'AdminProductsController@store']
	);

	/*
	 * Rota de atualizacao da Product
	 */
	Route::put(
		'products/{id}',
		['as'=>'admin.products.update', 'uses'=>'AdminProductsController@update']
	);

	/*
	 * Rota de remocao da Product
	 */
	Route::get(
		'products/remove/{id}',
		['as'=>'admin.products.update', 'uses'=>'AdminProductsController@update']
	);

});
