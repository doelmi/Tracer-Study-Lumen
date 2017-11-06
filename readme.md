# Lumen PHP Framework

[![Build Status](https://travis-ci.org/laravel/lumen-framework.svg)](https://travis-ci.org/laravel/lumen-framework)
[![Total Downloads](https://poser.pugx.org/laravel/lumen-framework/d/total.svg)](https://packagist.org/packages/laravel/lumen-framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/lumen-framework/v/stable.svg)](https://packagist.org/packages/laravel/lumen-framework)
[![Latest Unstable Version](https://poser.pugx.org/laravel/lumen-framework/v/unstable.svg)](https://packagist.org/packages/laravel/lumen-framework)
[![License](https://poser.pugx.org/laravel/lumen-framework/license.svg)](https://packagist.org/packages/laravel/lumen-framework)

Laravel Lumen is a stunningly fast PHP micro-framework for building web applications with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Lumen attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as routing, database abstraction, queueing, and caching.

## Official Documentation

Documentation for the framework can be found on the [Lumen website](http://lumen.laravel.com/docs).

## Security Vulnerabilities

If you discover a security vulnerability within Lumen, please send an e-mail to Taylor Otwell at taylor@laravel.com. All security vulnerabilities will be promptly addressed.

## License

The Lumen framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)



# Dokumentasi dari Doelmi
untuk menjalankan gunakan perintah berikut : 

```
php -S localhost:8000 -t public
```

## Database
edit pengaturan database di file .env

untuk migrasi database, jalankan perintah berikut:
```
php artisan migrate
```


## Routing
1. Login 
<br>Method : Post
<br>Parameter : Email, Password
```
http://localhost:8000/login
```

2. Register
<br>Method : Post
<br>Parameter : Username, Email, Password
```
http://localhost:8000/register
```

3. Get User Data berdasarkan ID
<br>Method : Get
<br>Parameter : 
```
http://localhost:8000/user/{id}?api_token={api_token}
```

4. Insert Mahasiswa
<br>Method : Post
<br>Parameter : nim, nama, alamat, no_telepon
```
http://localhost:8000/mahasiswa
```

5. Get Mahasiswa berdasarkan NIM
<br>Method : Get
<br>Parameter : 
```
http://localhost:8000/mahasiswa/{nim}?api_token={api_token}
```

6. Get Semua Mahasiswa
<br>Method : Get
<br>Parameter : 
```
http://localhost:8000/mahasiswa?api_token={api_token}
```

{api_token} didapatkan dari proses login


