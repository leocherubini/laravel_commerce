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

Route::get('', 'StoreController@index');
Route::get('category/{id}', ['as'=>'store.category', 'uses'=>'StoreController@category']);
Route::get('product/{id}', ['as'=>'store.product', 'uses'=>'StoreController@product']);
Route::get('tag/{id}', ['as'=>'tag', 'uses'=>'StoreController@tag']); 
Route::get('cart', ['as'=>'cart', 'uses'=>'CartController@index']);
Route::get('cart/add/{id}', ['as'=>'cart.add', 'uses'=>'CartController@add']);
Route::get('cart/destroy/{id}', ['as'=>'cart.destroy', 'uses'=>'CartController@destroy']);
Route::get('checkout/placeOrder', ['as'=>'checkout.place', 'uses'=>'CheckoutController@place']);
//Route::get('admin/categories', 'AdminCategoriesController@index');

//Route::get('admin/products', 'AdminProductsController@index');

/**
 * Rotas de account
 */
Route::group(['prefix'=>'api'], function() {

	Route::get('item/{id}', [
		'as'=>'carrinho.item',
		'uses'=>'API\CartController@item'
	]); // item

	Route::get('itens', [
		'as'=>'carrinho.item.all',
		'uses'=>'API\CartController@itens'
	]); // item all

	Route::delete('item/delete/{id}', [
		'as'=>'carrinho.item.delete',
		'uses'=>'API\CartController@delete'
	]); // item delete

	Route::get('itens/total', [
		'as'=>'carrinho.item.total',
		'uses'=>'API\CartController@total'
	]); // item total

	Route::post('itens/insere', [
		'as'=>'carrinho.item.insere',
		'uses'=>'API\CartController@insere'
	]); // item total

	Route::get('itens/imagem/{id}', [
		'as'=>'carrinho.item.imagem',
		'uses'=>'API\CartController@imagem'
	]); // item total

}); // rota api rest

/*
 * Grupo de rotas para o prefixo admin
 */
Route::group(['prefix'=>'admin', 'where' => ['id'=>'[0-9]+']], function() {

	/*
	 * Rota inicial para o admin
	 */
	Route::get(
		'',
		['as'=>'admin.index', 'uses'=>'WelcomeController@index']
	);

	/*
	 * Grupo de rotas para o prefixo categories
	 */
	Route::group(['prefix'=>'categories'], function() {

		Route::get(
			'',
			['as' => 'categories', 'uses' => 'CategoriesController@index']
		);

		Route::post(
			'',
			['as' => 'categories.store', 'uses' => 'CategoriesController@store']
		);

		Route::get(
			'create',
			['as' => 'categories.create', 'uses' => 'CategoriesController@create']
		);

		Route::get(
			'{id}/destroy',
			['as' => 'categories.destroy', 'uses' => 'CategoriesController@destroy']
		);

		Route::get(
			'{id}/edit',
			['as' => 'categories.edit', 'uses' => 'CategoriesController@edit']
		);

		Route::put(
			'{id}/update',
			['as' => 'categories.update', 'uses' => 'CategoriesController@update']
		);

	}); // Grupo categories

	/*
	 * Grupo de rotas para o prefixo products
	 */
	Route::group(['prefix'=>'products'], function() {

		Route::get(
			'',
			['as' => 'products', 'uses' => 'ProductsController@index']
		);

		Route::post(
			'',
			['as' => 'products.store', 'uses' => 'ProductsController@store']
		);

		Route::get(
			'create',
			['as' => 'products.create', 'uses' => 'ProductsController@create']
		);

		Route::get(
			'{id}/destroy',
			['as' => 'products.destroy', 'uses' => 'ProductsController@destroy']
		);

		Route::get(
			'{id}/edit',
			['as' => 'products.edit', 'uses' => 'ProductsController@edit']
		);

		Route::put(
			'{id}/update',
			['as' => 'products.update', 'uses' => 'ProductsController@update']
		);

		Route::group(['prefix'=>'images'], function() {

			Route::get(
				'{id}/product', 
				['as'=>'products.images', 'uses'=>'ProductsController@images']
			);

			Route::get(
				'create/{id}/product', 
				['as'=>'products.images.create', 'uses'=>'ProductsController@createImage']
			);

			Route::post(
				'store/{id}/product', 
				['as'=>'products.images.store', 'uses'=>'ProductsController@storeImage']
			);

			Route::get(
				'destroy/{id}/product', 
				['as'=>'products.images.destroy', 'uses'=>'ProductsController@destroyImage']
			);

		}); // Grupo images

	}); // Grupo products

}); // Grupo admin
