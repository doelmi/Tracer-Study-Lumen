<?php

namespace App\Http\Controllers\Mahasiswa;

use Illuminate\Http\Request;
use App\Mahasiswa;
use App\Akademik;

class MahasiswaAkademikController extends \App\Http\Controllers\Controller {

  public function index()
  {
    $akademik = Akademik::all();
    if ($akademik) {
        $res['success'] = true;
        $res['message'] = $akademik;

        return response($res);
    } else {
        $res['success'] = false;
        $res['message'] = 'Cannot find Akademik!';

        return response($res, 400);
    }
  }

  public function store(Request $request)
  {
    $nim = $request->input('nim');
    $prodi = $request->input('prodi');
    $angkatan_wisuda = $request->input('angkatan_wisuda');
    $tanggal_lulus = $request->input('tanggal_lulus');
    $nilai_ipk = $request->input('nilai_ipk');

    $set = Akademik::create([
                'nim' => $nim,
                'prodi' => $prodi,
                'angkatan_wisuda' => $angkatan_wisuda,
                'tanggal_lulus' => $tanggal_lulus,
                'nilai_ipk' => $nilai_ipk
    ]);
    if ($set) {
        $res['success'] = true;
        $res['message'] = 'Sukses Menyimpan!';
        return response($res);
    } else {
        $res['success'] = false;
        $res['message'] = 'Gagal Menyimpan!';
        return response($res, 400);
    }
  }

  public function show($nim)
  {
    $akademik = Akademik::where('nim', $nim)->first();
    if ($akademik) {
        $res['success'] = true;
        $res['message'] = $akademik;

        return response($res);
    } else {
        $res['success'] = false;
        $res['message'] = 'Cannot find Akademik!';

        return response($res, 400);
    }
  }

  public function update(Request $request, $nim)
  {
    $nim = $request->input('nim');
    $prodi = $request->input('prodi');
    $angkatan_wisuda = $request->input('angkatan_wisuda');
    $tanggal_lulus = $request->input('tanggal_lulus');
    $nilai_ipk = $request->input('nilai_ipk');

    $set = Akademik::find($nim);
    $set->nim = $nim;
    $set->prodi = $prodi;
    $set->angkatan_wisuda = $angkatan_wisuda;
    $set->tanggal_lulus = $tanggal_lulus;
    $set->nilai_ipk = $nilai_ipk;
    $set->save();

    if ($set->save()) {
        $res['success'] = true;
        $res['message'] = 'Sukses Memperbarui!';
        return response($res);
    } else {
        $res['success'] = false;
        $res['message'] = 'Gagal Memperbarui!';
        return response($res, 400);
    }
  }

  public function destroy($nim)
  {
    $mhs = Akademik::findOrFail($nim)->delete();

    if ($mhs->delete()) {
        $res['success'] = true;
        $res['message'] = 'Sukses Menghapus!';
        return response($res);
    } else {
        $res['success'] = false;
        $res['message'] = 'Gagal Menghapus!';
        return response($res, 400);
    }
  }
}