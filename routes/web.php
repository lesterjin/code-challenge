<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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

$router->get('/', function () use ($router) {
    return $router->app->version();
});


$router->group(['prefix' => 'api'], function () use ($router) {
    $router->get('customers',  ['uses' => 'CustomerController@customers']);
    $router->get('customers/{id}', ['uses' => 'CustomerController@customer']);
    $router->get('seed_customer',  ['uses' => 'CustomerController@seed_customer']); //this is just an example that the import can be access in controller
});
