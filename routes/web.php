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

$router->group([
    'middleware' => 'auth'
], function () use ($router) {
    $router->get('/books', 'BookController@findAll');
    $router->get('/books/{id}', 'BookController@findOne');
    $router->post('/books', 'BookController@create');
    $router->patch('/books/{id}', 'BookController@update');
    $router->delete('/books/{id}', 'BookController@remove');

    $router->get('/firebase-books', 'FirebaseBookController@findAll');
    $router->get('/firebase-books/{id}', 'FirebaseBookController@findOne');
    $router->post('/firebase-books', 'FirebaseBookController@create');
    $router->patch('/firebase-books/{id}', 'FirebaseBookController@update');
    $router->delete('/firebase-books/{id}', 'FirebaseBookController@remove');
});


$router->group([
    'prefix' => 'auth'
], function () use ($router) {
    $router->post('login', 'AuthController@login');
    $router->post('register', 'AuthController@register');
    $router->post('logout', 'AuthController@logout');
    $router->post('me', 'AuthController@me');
});

$router->get('/soal-7', 'SoalController@no7');
$router->get('/debug-sentry', function () {
    throw new Exception('My first Sentry error!');
});
