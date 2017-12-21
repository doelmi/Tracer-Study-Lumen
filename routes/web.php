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
    $router->get('/user/logged_in/{token}', ['middleware' => 'auth', 'uses' => 'UserController@get_logged_in_user']);
    $router->get('/user', ['middleware' => 'auth', 'uses' => 'UserController@get_all_user']);

    # yang fitur cari mahasiswa ini nggak perlu login
    $router->group(['prefix' => 'mahasiswa'], function($router) {
        # get detail mahasiswa, sak fotonya, sak data-data lainnya
        $router->get('/detail/{nim}', 'MahasiswaController@get_detail');
    });

    $router->group(['prefix' => 'mahasiswa', 'middleware' => 'auth'], function($router) {

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

        //Pekerjaan
        $router->post('/pekerjaan', ['uses' => 'MahasiswaController@set_pekerjaan']);
        $router->put('/pekerjaan/{nim}', ['uses' => 'MahasiswaController@put_pekerjaan']);
        $router->delete('/pekerjaan/{nim}', ['uses' => 'MahasiswaController@del_pekerjaan']);
        $router->get('/pekerjaan/{nim}', ['uses' => 'MahasiswaController@get_pekerjaan']);
        $router->get('/pekerjaan', ['uses' => 'MahasiswaController@get_all_pekerjaan']);

        //Foto
        $router->post('/foto', ['uses' => 'MahasiswaController@set_foto']);
        $router->put('/foto/{nim}', ['uses' => 'MahasiswaController@put_foto']);
        $router->delete('/foto/{nim}', ['uses' => 'MahasiswaController@del_foto']);
        $router->get('/foto/{nim}', ['uses' => 'MahasiswaController@get_foto']);
        $router->get('/foto', ['uses' => 'MahasiswaController@get_all_foto']);

        # import excel
        $router->post('import-excel', 'MahasiswaController@import_excel');
    });
});
