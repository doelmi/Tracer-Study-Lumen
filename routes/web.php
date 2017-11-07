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

//$router->get('/', function () use ($router) {
//    return $router->app->version();
//});

$router->options('{all:.*}', function () {
  return '';
});

$router->get('/', function () use ($router) {
    $res['success'] = true;
    $res['result'] = "Hello there welcome to web api using lumen for Tracer Study! ";
    $res['version'] = $router->app->version();
    return response($res);
});

//User
$router->post('/login', 'LoginController@index');
$router->post('/register', 'UserController@register');
$router->get('/user/{id}', ['middleware' => 'auth', 'uses' => 'UserController@get_user']);
$router->get('/user', ['middleware' => 'auth', 'uses' => 'UserController@get_all_user']);

//Mahasiswa
$router->post('/mahasiswa', ['middleware' => 'auth', 'uses' => 'MahasiswaController@set_mhs']);
$router->get('/mahasiswa/{nim}', ['middleware' => 'auth', 'uses' => 'MahasiswaController@get_mhs']);
$router->get('/mahasiswa', ['middleware' => 'auth', 'uses' => 'MahasiswaController@get_all_mhs']);
