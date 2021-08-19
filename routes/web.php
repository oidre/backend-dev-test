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

$router->get('/', function () use ($router) {
    return $router->app->version();
});
$router->get('/books', 'BookController@findAll');
$router->get('/books/{id}', 'BookController@findOne');
$router->post('/books', 'BookController@create');
$router->patch('/books/{id}', 'BookController@update');
$router->delete('/books/{id}', 'BookController@remove');
