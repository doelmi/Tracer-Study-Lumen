<?php

namespace App\Http\Controllers\Mahasiswa;

use Illuminate\Http\Request;
use App\Mahasiswa;
use App\Akademik;
use App\Foto;
use App\Pekerjaan;
use App\Mahasiswa_Login;

class MahasiswaAkunController extends \App\Http\Controllers\Controller {

    public function base64ToImage($imageData, $nim) {
        list($type, $imageData) = explode(';', $imageData);
        list(, $extension) = explode('/', $type);
        list(, $imageData) = explode(',', $imageData);
        $fileName = $nim . '_' . uniqid() . '.' . $extension;
        $path = "assets/img/$fileName";
        $imageData = base64_decode($imageData);
        file_put_contents($path, $imageData);

        $link_path = $path;
        return $link_path;
    }

    public function login(Request $request) {
        $hasher = app()->make('hash');
        $nim = $request->input('nim');
        $password = $request->input('password');
        $login = Mahasiswa_Login::where('nim', $nim)->first();
        if (!$login) {
            $res['success'] = false;
            $res['message'] = 'NIM tidak dapat ditemukan!';
            return response($res, 401);
        } else {
            if ($hasher->check($password, $login->password)) {
                if ($login->api_token_mhs == NULL) {
                    $api_token = sha1($nim . time() . $password);
                    $create_token = Mahasiswa_Login::where('id', $login->id)->update(['api_token_mhs' => $api_token]);
                    if ($create_token) {
                        $res['success'] = true;
                        $res['api_token_mhs'] = $api_token;
                        $res['message'] = $login;
                        $res['first_login'] = 0;
                        return response($res);
                    }
                } else {
                    $res['success'] = true;
                    $res['api_token_mhs'] = $login->api_token_mhs;
                    $res['message'] = $login;
                    $res['first_login'] = 0;
                    return response($res);
                }
            } else if ($login->password == NULL && $password == $login->nim) {
                if ($login->api_token_mhs == NULL) {
                    $api_token = sha1($nim . time());
                    $create_token = Mahasiswa_Login::where('id', $login->id)->update(['api_token_mhs' => $api_token]);
                    if ($create_token) {
                        $res['success'] = true;
                        $res['api_token_mhs'] = $api_token;
                        $res['message'] = $login;
                        $res['first_login'] = 1;
                        $res['pesan'] = "Silakan Ganti Password!";
                        return response($res);
                    }
                } else {
                    $res['success'] = true;
                    $res['api_token_mhs'] = $login->api_token_mhs;
                    $res['message'] = $login;
                    $res['first_login'] = 1;
                    $res['pesan'] = "Silakan Ganti Password!";
                    return response($res);
                }
            } else {
                $res['success'] = false;
                $res['message'] = 'Password salah!';
                return response($res, 401);
            }
        }
    }

    public function cek_token_mhs(Request $request) {
        if ($request->has('api_token_mhs')) {
            $token = $request->input('api_token_mhs');
            $check_token = Mahasiswa_Login::where('api_token_mhs', $token)->first();
            if ($check_token) {
                $res['success'] = true;
                return response($res);
            } else {
                $res['success'] = false;
                return response($res, 401);
            }
        } else {
            $res['success'] = false;
            $res['message'] = "Masukkan parameter token! ?api_token_mhs={api_token_mhs}";
            return response($res, 405);
        }
    }

    public function get_mhs_akun(Request $request) {
        $token = $request->input('api_token_mhs');
        $check_token = Mahasiswa_Login::where('api_token_mhs', $token)->first();
        if ($check_token) {
            $mhs = Mahasiswa::with('mahasiswa_login', 'akademik', 'pekerjaan', 'foto', 'krisar')->where('nim', $check_token->nim)->firstOrFail();
            if ($mhs) {
                $res['success'] = true;
                $res['message'] = $mhs;

                return response($res);
            } else {
                $res['success'] = false;
                $res['message'] = 'Cannot find Mahasiswa!';

                return response($res, 400);
            }
        } else {
            $res['success'] = false;
            $res['message'] = 'Permission not allowed!';
            return response($res, 401);
        }
    }

    public function put_mhs_akun(Request $request) {
        $token = $request->input('api_token_mhs');
        $check_token = Mahasiswa_Login::where('api_token_mhs', $token)->first();
        if ($check_token) {
            $hasher = app()->make('hash');
            $nim = $check_token->nim;
            $old_password = $request->input('old_password');
            $new_password = $request->input('new_password');

            if (($hasher->check($old_password, $check_token->password)) || ($check_token->password == NULL && $old_password == $nim)) {
                $mhs = Mahasiswa_Login::find($nim);

                $mhs->password = $hasher->make($new_password);

                if ($mhs->save()) {
                    $res['success'] = true;
                    $res['message'] = 'Sukses Memperbarui!';
                    return response($res);
                } else {
                    $res['success'] = false;
                    $res['message'] = 'Gagal Memperbarui!';
                    return response($res, 400);
                }
            } else {
                $res['success'] = false;
                $res['message'] = 'Password lama tidak sesuai!';
                return response($res, 400);
            }
        } else {
            $res['success'] = false;
            $res['message'] = 'Permission not allowed!';
            return response($res, 401);
        }
    }

    public function put_mhs(Request $request) {
        $token = $request->input('api_token_mhs');
        $check_token = Mahasiswa_Login::where('api_token_mhs', $token)->first();
        if ($check_token) {
            $nim = $check_token->nim;
            $nama = $request->input('nama');
            $alamat = $request->input('alamat');
            $no_telepon = $request->input('no_telepon');
            $tempat_lahir = $request->input('tempat_lahir');
            $tanggal_lahir = $request->input('tanggal_lahir');
            $email = $request->input('email');

            $mhs = Mahasiswa::find($nim);

            $mhs->nama = $nama;
            $mhs->alamat = $alamat;
            $mhs->no_telepon = $no_telepon;
            $mhs->email = $email;
            $mhs->tempat_lahir = $tempat_lahir;
            $mhs->tanggal_lahir = $tanggal_lahir;

            if ($mhs->save()) {
                $res['success'] = true;
                $res['message'] = 'Sukses Memperbarui!';
                return response($res);
            } else {
                $res['success'] = false;
                $res['message'] = 'Gagal Memperbarui!';
                return response($res, 400);
            }
        } else {
            $res['success'] = false;
            $res['message'] = 'Permission not allowed!';
            return response($res, 401);
        }
    }

    public function put_akademik(Request $request) {
//        'id', 'nim', 'prodi', 'angkatan_wisuda', 'tanggal_lulus', 'nilai_ipk'
        $token = $request->input('api_token_mhs');
        $check_token = Mahasiswa_Login::where('api_token_mhs', $token)->first();
        if ($check_token) {
            $nim = $check_token->nim;
            $prodi = $request->input('prodi');
            $angkatan_wisuda = $request->input('angkatan_wisuda');
            $tanggal_lulus = $request->input('tanggal_lulus');
            $nilai_ipk = $request->input('nilai_ipk');

            $set = Akademik::find($nim);

            $set->prodi = $prodi;
            $set->angkatan_wisuda = $angkatan_wisuda;
            $set->tanggal_lulus = $tanggal_lulus;
            $set->nilai_ipk = $nilai_ipk;

            if ($set->save()) {
                $res['success'] = true;
                $res['message'] = 'Sukses Memperbarui!';
                return response($res);
            } else {
                $res['success'] = false;
                $res['message'] = 'Gagal Memperbarui!';
                return response($res, 400);
            }
        } else {
            $res['success'] = false;
            $res['message'] = 'Permission not allowed!';
            return response($res, 401);
        }
    }

    public function put_foto(Request $request) {
        $token = $request->input('api_token_mhs');
        $check_token = Mahasiswa_Login::where('api_token_mhs', $token)->first();
        if ($check_token) {
            $nim = $check_token->nim;
            $foto = $request->input('foto');

            if (strlen($foto) != 0) {
                $foto = $this->base64ToImage($foto, $nim);
            }

            $put = Foto::find($nim);

            $put->foto = $foto;

            if ($put->save()) {
                $res['success'] = true;
                $res['message'] = 'Sukses Memperbarui!';
                return response($res);
            } else {
                $res['success'] = false;
                $res['message'] = 'Gagal Memperbarui!';
                return response($res, 400);
            }
        } else {
            $res['success'] = false;
            $res['message'] = 'Permission not allowed!';
            return response($res, 401);
        }
    }

    public function put_pekerjaan(Request $request) {
        $token = $request->input('api_token_mhs');
        $check_token = Mahasiswa_Login::where('api_token_mhs', $token)->first();
        if ($check_token) {
            $nim = $check_token->nim;
            $status_pekerjaan = $request->input('status_pekerjaan');
            $keterangan = $request->input('keterangan');

            $put = Pekerjaan::find($nim);

            $put->status_pekerjaan = $status_pekerjaan;
            $put->keterangan = $keterangan;

            if ($put->save()) {
                $res['success'] = true;
                $res['message'] = 'Sukses Memperbarui!';
                return response($res);
            } else {
                $res['success'] = false;
                $res['message'] = 'Gagal Memperbarui!';
                return response($res, 400);
            }
        } else {
            $res['success'] = false;
            $res['message'] = 'Permission not allowed!';
            return response($res, 401);
        }
    }

    public function put_krisar(Request $request) {
        $token = $request->input('api_token_mhs');
        $check_token = Mahasiswa_Login::where('api_token_mhs', $token)->first();
        if ($check_token) {
            $nim = $check_token->nim;

            $isi_krisar = $request->input('isi_krisar');

            $put = Krisar::find($nim);

            $put->isi_krisar = $isi_krisar;

            if ($put->save()) {
                $res['success'] = true;
                $res['message'] = 'Sukses Memperbarui!';
                return response($res);
            } else {
                $res['success'] = false;
                $res['message'] = 'Gagal Memperbarui!';
                return response($res, 400);
            }
        } else {
            $res['success'] = false;
            $res['message'] = 'Permission not allowed!';
            return response($res, 401);
        }
    }

}
