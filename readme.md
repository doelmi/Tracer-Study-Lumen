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
  <li id="logged_in">
    Get Logged in User Data
    <br>Method : Get
    <br>Parameter : 
    <br>Address : http://localhost:8000/api/v1/user/logged_in/{token}?api_token={api_token}
  </li>
  <li>
     Insert Mahasiswa Pribadi
    <br>Method : Post
    <br>Parameter : nim, nama, alamat, no_telepon, email, tempat_lahir, tanggal_lahir
    <br>Address : http://localhost:8000/api/v1/mahasiswa/pribadi?api_token={api_token}
  </li>
  <li>
     Update Mahasiswa Pribadi
    <br>Method : Put
    <br>Parameter : nim, nama, alamat, no_telepon, email, tempat_lahir, tanggal_lahir
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
  <li>
     Insert Mahasiswa Foto
    <br>Method : Post
    <br>Parameter : nim, foto
    <br>Address : http://localhost:8000/api/v1/mahasiswa/foto?api_token={api_token}
  </li>
  <li>
     Update Mahasiswa Foto
    <br>Method : Put
    <br>Parameter : foto
    <br>Address : http://localhost:8000/api/v1/mahasiswa/foto/{nim}?api_token={api_token}
  </li>
  <li>
     Delete Mahasiswa Foto
    <br>Method : Delete
    <br>Parameter : 
    <br>Address : http://localhost:8000/api/v1/mahasiswa/foto/{nim}?api_token={api_token}
  </li>
  <li>
      Get Mahasiswa Foto berdasarkan NIM
      <br>Method : Get
      <br>Parameter : 
      <br>Address : http://localhost:8000/api/v1/mahasiswa/foto/{nim}?api_token={api_token}
  </li>
  <li>
      Get Semua Mahasiswa Foto
      <br>Method : Get
      <br>Parameter : 
      <br>Address : http://localhost:8000/api/v1/mahasiswa/foto?api_token={api_token}
  </li>
  <li>
     Insert Mahasiswa Pekerjaan
    <br>Method : Post
    <br>Parameter : nim, status_pekerjaan, keterangan
    <br>Address : http://localhost:8000/api/v1/mahasiswa/pekerjaan?api_token={api_token}
  </li>
  <li>
     Update Mahasiswa Pekerjaan
    <br>Method : Put
    <br>Parameter : status_pekerjaan, keterangan
    <br>Address : http://localhost:8000/api/v1/mahasiswa/pekerjaan/{nim}?api_token={api_token}
  </li>
  <li>
     Delete Mahasiswa Pekerjaan
    <br>Method : Delete
    <br>Parameter : 
    <br>Address : http://localhost:8000/api/v1/mahasiswa/pekerjaan/{nim}?api_token={api_token}
  </li>
  <li>
      Get Mahasiswa Pekerjaan berdasarkan NIM
      <br>Method : Get
      <br>Parameter : 
      <br>Address : http://localhost:8000/api/v1/mahasiswa/pekerjaan/{nim}?api_token={api_token}
  </li>
  <li>
     Get Semua Mahasiswa Pekerjaan
      <br>Method : Get
      <br>Parameter : 
      <br>Address : http://localhost:8000/api/v1/mahasiswa/pekerjaan?api_token={api_token}
  </li>
  <li>
     Update Mahasiswa Auth
    <br>Method : Put
    <br>Parameter : password
    <br>Address : http://localhost:8000/api/v1/mahasiswa/auth/{nim}?api_token={api_token}
  </li>
  <li>
     Delete Mahasiswa Auth
    <br>Method : Delete
    <br>Parameter : 
    <br>Address : http://localhost:8000/api/v1/mahasiswa/auth/{nim}?api_token={api_token}
  </li>
  <li>
      Get Mahasiswa Auth berdasarkan NIM
      <br>Method : Get
      <br>Parameter : 
      <br>Address : http://localhost:8000/api/v1/mahasiswa/auth/{nim}?api_token={api_token}
  </li>
  <li>
     Get Semua Mahasiswa Auth
      <br>Method : Get
      <br>Parameter : 
      <br>Address : http://localhost:8000/api/v1/mahasiswa/auth?api_token={api_token}
  </li>
  <li>
     Get Mahasiswa Semua Detail berdasarkan NIM
      <br>Method : Get
      <br>Parameter : 
      <br>Address : http://localhost:8000/api/v1/mahasiswa/detail/{nim}
  </li>
  </li>
  <li>
      Get Detail Semua Mahasiswa
      <br>Method : Get
      <br>Parameter : 
      <br>Address : http://localhost:8000/api/v1/mahasiswa/semua?api_token={api_token}
  </li>
  <li>
      Insert Prodi
      <br>Method : Post
      <br>Parameter : nama_prodi
      <br>Address : http://localhost:8000/api/v1/prodi?api_token={api_token}
  </li>
  <li>
      Update Prodi
      <br>Method : Put
      <br>Parameter : 
      <br>Address : http://localhost:8000/api/v1/prodi/{id}?api_token={api_token}
  </li>
  <li>
      Delete Prodi
      <br>Method : Delete
      <br>Parameter : 
      <br>Address : http://localhost:8000/api/v1/prodi/{id}?api_token={api_token}
  </li>
  <li>
      Get Prodi berdasarkan ID
      <br>Method : Get
      <br>Parameter : 
      <br>Address : http://localhost:8000/api/v1/prodi/{id}?api_token={api_token}
  </li>
  <li>
      Get Semua Prodi
      <br>Method : Get
      <br>Parameter : 
      <br>Address : http://localhost:8000/api/v1/prodi?api_token={api_token}
  </li>
  <li>
      Login Akun Mahasiswa
      <br>Method : Post
      <br>Parameter : nim, password
      <br>Address : http://localhost:8000/api/v1/mahasiswa/akun/login
  </li>
  <li>
      Cek Token Akun Mahasiswa
      <br>Keterangan : Mengecek apakah token ini masih berfungsi atau tidak.
      <br>Method : Get
      <br>Parameter : 
      <br>Address : http://localhost:8000/api/v1/mahasiswa/akun/cek_token?api_token_mhs={api_token_mhs}
  </li>
  <li>
      Get Detail Mahasiswa yang Login
      <br>Method : Get
      <br>Parameter : 
      <br>Address : http://localhost:8000/api/v1/mahasiswa/akun/detail?api_token_mhs={api_token_mhs}
  </li>
  <li>
      Ganti Password Mahasiswa yang Login
      <br>Method : Put
      <br>Parameter : old_password, new_password
      <br>Address : http://localhost:8000/api/v1/mahasiswa/akun/password?api_token_mhs={api_token_mhs}
  </li>
  <li>
      Update Pribadi Mahasiswa yang Login
      <br>Method : Put
      <br>Parameter : nim, nama, alamat, no_telepon, tempat_lahir, tanggal_lahir
      <br>Address : http://localhost:8000/api/v1/mahasiswa/akun/pribadi?api_token_mhs={api_token_mhs}
  </li>
  <li>
      Update Akademik Mahasiswa yang Login
      <br>Method : Put
      <br>Parameter : nim, prodi, angkatan_wisuda, tanggal_lulus, nilai_ipk
      <br>Address : http://localhost:8000/api/v1/mahasiswa/akun/akademik?api_token_mhs={api_token_mhs}
  </li>
  <li>
      Update Foto Mahasiswa yang Login
      <br>Method : Put
      <br>Parameter : foto
      <br>Address : http://localhost:8000/api/v1/mahasiswa/akun/foto?api_token_mhs={api_token_mhs}
  </li>
  <li>
      Update Pekerjaan Mahasiswa yang Login
      <br>Method : Put
      <br>Parameter : status_pekerjaan, keterangan
      <br>Address : http://localhost:8000/api/v1/mahasiswa/akun/pekerjaan?api_token_mhs={api_token_mhs}
  </li>
  <li>
      Update Email Mahasiswa yang Login
      <br>Method : Put
      <br>Parameter : email
      <br>Address : http://localhost:8000/api/v1/mahasiswa/akun/email?api_token_mhs={api_token_mhs}
  </li>
</ol>

{api_token} didapatkan dari proses "Login" <br>
{api_token_mhs} didapatkan dari proses "Login Akun Mahasiswa"


