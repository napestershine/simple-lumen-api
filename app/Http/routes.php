<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$app->group(['prefix' => 'api/v1', 'namespace' => '\App\Http\Controllers\Api\v1'], function () use ($app) {
    
    $app->get('/products', ['uses' => 'ProductsController@index']);
    $app->get('/products/{id}', ['uses' => 'ProductsController@show']);
    $app->post('/products', ['uses' => 'ProductsController@store']);
    $app->put('/products/{id}', ['uses' => 'ProductsController@update']);
    $app->delete('/products/{id}', ['uses' => 'ProductsController@destroy']);

});
