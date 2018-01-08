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
    
    $router->group(['prefix' => 'prodi', 'middleware' => 'auth'], function($router) {
        $router->post('/', ['uses' => 'ProdiController@set_prodi']); 
        $router->put('/{id}', ['uses' => 'ProdiController@put_prodi']); 
        $router->delete('/{id}', ['uses' => 'ProdiController@del_prodi']);
        $router->get('/{id}', ['uses' => 'ProdiController@get_prodi']);
        $router->get('/', ['uses' => 'ProdiController@get_all_prodi']);
    });
    
    $router->group(['prefix' => 'mahasiswa', 'middleware' => 'auth'], function($router) {

        # get semua data
        $router->get('/semua', 'MahasiswaController@semua');
        //Pribadi
        $router->post('/pribadi', ['uses' => 'MahasiswaController@set_mhs']); 
        $router->put('/pribadi/{nim}', ['uses' => 'MahasiswaController@put_mhs']); 
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
        
        //Krisar
        $router->post('/krisar', ['uses' => 'MahasiswaController@set_krisar']);
        $router->put('/krisar/{nim}', ['uses' => 'MahasiswaController@put_krisar']);
        $router->delete('/krisar/{nim}', ['uses' => 'MahasiswaController@del_krisar']);
        $router->get('/krisar/{nim}', ['uses' => 'MahasiswaController@get_krisar']);
        $router->get('/krisar', ['uses' => 'MahasiswaController@get_all_krisar']);

        //Akun
        $router->put('/auth/{nim}', ['uses' => 'MahasiswaController@put_akun']);
        $router->delete('/auth/{nim}', ['uses' => 'MahasiswaController@del_akun']);
        $router->get('/auth/{nim}', ['uses' => 'MahasiswaController@get_akun']);
        $router->get('/auth', ['uses' => 'MahasiswaController@get_all_akun']);
    });

    $router->group(['prefix' => 'mahasiswa/akun'], function($router) {
        $router->post('/login', 'MahasiswaAkunController@login');
        $router->get('/cek_token', 'MahasiswaAkunController@cek_token_mhs');
        $router->group(['middleware' => 'auth_mhs'], function($router) {
            $router->get('/detail', ['uses' => 'MahasiswaAkunController@get_mhs_akun']);
            $router->put('/password', ['uses' => 'MahasiswaAkunController@put_mhs_akun']);
            $router->put('/pribadi', ['uses' => 'MahasiswaAkunController@put_mhs']);
            $router->put('/akademik', ['uses' => 'MahasiswaAkunController@put_akademik']);
            $router->put('/foto', ['uses' => 'MahasiswaAkunController@put_foto']);
            $router->put('/krisar', ['uses' => 'MahasiswaAkunController@put_krisar']);
            $router->put('/pekerjaan', ['uses' => 'MahasiswaAkunController@put_pekerjaan']);
        });
    });
});
