# Dokumentasi Tracer Study
## Dependencies Composer
Untuk update dependencies, jalankan perintah berikut:
```
composer update
```
*diperlukan sambungan internet

## Database
edit pengaturan database di file .env

untuk migrasi database, jalankan perintah berikut:
```
php artisan migrate
```

## Running
untuk menjalankan gunakan perintah berikut : 

```
php -S 0.0.0.0:8000 -t public
```


## Routing
1. Login 
<br>Method : Post
<br>Parameter : email, password
```
http://localhost:8000/login
```

2. Register
<br>Method : Post
<br>Parameter : username, email, password
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
http://localhost:8000/mahasiswa?api_token={api_token}
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

7. Get Semua User Data
<br>Method : Get
<br>Parameter : 
```
http://localhost:8000/user?api_token={api_token}
```

{api_token} didapatkan dari proses login


