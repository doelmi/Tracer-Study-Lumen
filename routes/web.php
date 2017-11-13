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

$router->group(['prefix' => 'api/v1'], function($router) {
    //User
    $router->post('/login', 'LoginController@index');
    $router->post('/register', 'UserController@register');
    $router->get('/user/{id}', ['middleware' => 'auth', 'uses' => 'UserController@get_user']);
    $router->get('/user', ['middleware' => 'auth', 'uses' => 'UserController@get_all_user']);

    $router->group(['prefix' => 'mahasiswa',], function($router) {
        //Pribadi
        $router->post('/pribadi', ['uses' => 'MahasiswaController@set_mhs']); //belum fix upload file
        $router->put('/pribadi/{nim}', ['uses' => 'MahasiswaController@put_mhs']); //belum fix upload file
        $router->delete('/pribadi/{nim}', ['uses' => 'MahasiswaController@del_mhs']);
        $router->get('/pribadi/{nim}', ['uses' => 'MahasiswaController@get_mhs']);
        $router->get('/pribadi', ['uses' => 'MahasiswaController@get_all_mhs']);

        //Akademik
        $router->post('/akademik', ['uses' => 'MahasiswaController@set_akademik']);
        $router->put('/akademik/{nim}', ['uses' => 'MahasiswaController@put_akademik']);
        $router->delete('/akademik/{nim}', ['uses' => 'MahasiswaController@del_akademik']);
        $router->get('/akademik/{nim}', ['uses' => 'MahasiswaController@get_akademik']);
        $router->get('/akademik', ['uses' => 'MahasiswaController@get_all_akademik']);
    });
});
