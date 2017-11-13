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
<ol>
   <li>
    Lumen Information 
    <br>Method : Get
    <br>Parameter : 
    <br>Address : http://localhost:8000/api/v1
  </li>
  <li>
    Login 
    <br>Method : Post
    <br>Parameter : email, password
    <br>Address : http://localhost:8000/api/v1/login
  </li>
  <li>
    Register
    <br>Method : Post
    <br>Parameter : username, email, password
    <br>Address : http://localhost:8000/api/v1/register
  </li>
  <li>
    Get User Data berdasarkan ID
    <br>Method : Get
    <br>Parameter : 
    <br>Address : http://localhost:8000/api/v1/user/{id}?api_token={api_token}
  </li>
  <li>
    Get Semua User Data
    <br>Method : Get
    <br>Parameter : 
    <br>Address : http://localhost:8000/api/v1/user?api_token={api_token}
  </li>
  <li>
    Get Loged in User Data
    <br>Method : Get
    <br>Parameter : 
    <br>Address : http://localhost:8000/api/v1/user/loged_in/{token}?api_token={api_token}
  </li>
  <li>
     Insert Mahasiswa Pribadi
    <br>Method : Post
    <br>Parameter : nim, nama, alamat, no_telepon, foto
    <br>Address : http://localhost:8000/api/v1/mahasiswa/pribadi?api_token={api_token}
  </li>
  <li>
     Update Mahasiswa Pribadi
    <br>Method : Put
    <br>Parameter : nim, nama, alamat, no_telepon, foto
    <br>Address : http://localhost:8000/api/v1/mahasiswa/pribadi/{nim}?api_token={api_token}
  </li>
  <li>
     Delete Mahasiswa Pribadi
    <br>Method : Delete
    <br>Parameter : 
    <br>Address : http://localhost:8000/api/v1/mahasiswa/pribadi/{nim}?api_token={api_token}
  </li>
  <li>
      Get Mahasiswa Pribadi berdasarkan NIM
      <br>Method : Get
      <br>Parameter : 
      <br>Address : http://localhost:8000/api/v1/mahasiswa/pribadi/{nim}?api_token={api_token}
  </li>
  <li>
      Get Semua Mahasiswa Pribadi
      <br>Method : Get
      <br>Parameter : 
      <br>Address : http://localhost:8000/api/v1/mahasiswa/pribadi?api_token={api_token}
  </li>
  <li>
     Insert Mahasiswa Akademik
    <br>Method : Post
    <br>Parameter : nim, prodi, angkatan_wisuda, tanggal_lulus, nilai_ipk
    <br>Address : http://localhost:8000/api/v1/mahasiswa/akademik?api_token={api_token}
  </li>
  <li>
     Update Mahasiswa Akademik
    <br>Method : Put
    <br>Parameter : nim, prodi, angkatan_wisuda, tanggal_lulus, nilai_ipk
    <br>Address : http://localhost:8000/api/v1/mahasiswa/akademik/{nim}?api_token={api_token}
  </li>
  <li>
     Delete Mahasiswa Akademik
    <br>Method : Delete
    <br>Parameter : 
    <br>Address : http://localhost:8000/api/v1/mahasiswa/akademik/{nim}?api_token={api_token}
  </li>
  <li>
      Get Mahasiswa Akademik berdasarkan NIM
      <br>Method : Get
      <br>Parameter : 
      <br>Address : http://localhost:8000/api/v1/mahasiswa/akademik/{nim}?api_token={api_token}
  </li>
  <li>
      Get Semua Mahasiswa Akademik
      <br>Method : Get
      <br>Parameter : 
      <br>Address : http://localhost:8000/api/v1/mahasiswa/akademik?api_token={api_token}
  </li>
</ol>

{api_token} didapatkan dari proses login


