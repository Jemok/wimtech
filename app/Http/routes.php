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

use Illuminate\Http\Request;

Route::get('/', function () {

    $products =\App\Product::latest()->paginate(6);

    $categories = \App\Category::all();

    return view('welcome', compact('products', 'categories'));
});

Route::auth();

//Route::get('/home', 'HomeController@index');

Route::get('/laptops', 'LaptopsController@index');

Route::post('product/store', 'ProductController@store');

Route::get('product/{product_id}', 'ProductController@show');

Route::post('product/update/{product_id}', 'ProductController@update');

Route::post('product/delete/{product_id}', 'ProductController@delete');

Route::get('product/edit/{product_id}', 'ProductController@edit');

Route::post('category/store', 'CategoriesController@store');

Route::get('category/create', 'CategoriesController@create');

Route::get('category/{category_id}', 'CategoriesController@index');

Route::post('/checkout', 'CheckOutController@store');

Route::get('checkout/success', 'CheckOutController@success');

Route::get('checkout/cancel', 'CheckOutController@cancel');

Route::get('orders', 'CheckOutController@orders');

Route::get('orders/{customer_id}', 'CheckOutController@orderItems');

Route::post('orders/delete/{customer_id}', 'CheckOutController@delete');

Route::get('/redirect', function () {
    $query = http_build_query([
        'client_id' => 1,
        'redirect_uri' => 'http://localhost:10000/callback',
        'response_type' => 'code',
        'scope' => '',
    ]);

    return redirect('http://localhost:8000/oauth/authorize?'.$query);
});



Route::get('/callback', function (Request $request) {

    $http = new GuzzleHttp\Client;

    $response = $http->post('http://localhost:8000/oauth/token', [
        'form_params' => [
            'grant_type' => 'authorization_code',
            'client_id' => 1,
            'client_secret' => 'soOkN59RG5KIS8GtorKTgzrjVlFndQfQj6F1HcgQ',
            'redirect_uri' => 'http://localhost:10000/callback',
            'code' => $request->code,
        ],
    ]);

    return json_decode((string) $response->getBody(), true);
});