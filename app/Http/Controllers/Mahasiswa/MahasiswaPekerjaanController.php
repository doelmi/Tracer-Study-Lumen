<?php
namespace App\Http\Controllers\Mahasiswa;

use Illuminate\Http\Request;
use App\Pekerjaan;

class MahasiswaPekerjaanController extends \App\Http\Controllers\Controller 
{

  public function index (Request $request) {
    $get_pekerjaan = Pekerjaan::all();
    if ($get_pekerjaan) {
      $res['success'] = true;
      $res['message'] = $get_pekerjaan;

      return response($res);
    } else {
      $res['success'] = false;
      $res['message'] = 'Cannot find Pekerjaan!';

      return response($res, 400);
    }
  }

  public function show (Request $request, $nim) {
    $get_pekerjaan = Pekerjaan::where('nim', $nim)->first();
    if ($get_pekerjaan) {
      $res['success'] = true;
      $res['message'] = $get_pekerjaan;

      return response($res);
    } else {
      $res['success'] = false;
      $res['message'] = 'Cannot find Pekerjaan!';

      return response($res, 400);
    }
  }

  public function store (Request $request) {
    $nim = $request->input('nim');
    $status_pekerjaan = $request->input('status_pekerjaan');
    $keterangan = $request->input('keterangan');

    $set = Pekerjaan::findOrNew($nim);

    $set->nim = $nim;
    $set->status_pekerjaan = $status_pekerjaan;
    $set->keterangan = json_encode($keterangan);
    $set->save();

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

  public function update (Request $request, $nim) {
    $status_pekerjaan = $request->input('status_pekerjaan');
    $keterangan = $request->input('keterangan');

    $put = Pekerjaan::find($nim);

    $put->status_pekerjaan = $status_pekerjaan;
    $put->keterangan = $keterangan;
    $put->save();

    if ($put->save()) {
      $res['success'] = true;
      $res['message'] = 'Sukses Memperbarui!';
      return response($res);
    } else {
      $res['success'] = false;
      $res['message'] = 'Gagal Memperbarui!';
      return response($res, 400);
    }
  }

  public function destroy (Request $request, $nim) {
    $mhs_pekerjaan = Pekerjaan::findOrFail($nim)->delete();

    if ($mhs_pekerjaan->delete()) {
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