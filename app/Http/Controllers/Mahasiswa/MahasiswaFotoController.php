<?php
namespace App\Http\Controllers\Mahasiswa;

use Illuminate\Http\Request;
use App\Foto;

class MahasiswaFotoController extends \App\Http\Controllers\Controller 
{

  public function index (Request $request) {
    $get_foto = Foto::all();

    if ($get_foto) {
      $res['success'] = true;
      $res['message'] = $get_foto;

      return response($res);
    } else {
      $res['success'] = false;
      $res['message'] = 'Cannot find Foto!';

      return response($res, 400);
    }
  }

  public function show (Request $request, $nim) {
    $get_foto = Foto::where('nim', $nim)->get();
    if ($get_foto) {
      $res['success'] = true;
      $res['message'] = $get_foto;

      return response($res);
    } else {
      $res['success'] = false;
      $res['message'] = 'Cannot find Foto!';

      return response($res, 400);
    }
  }

  public function store (Request $request) {
    $nim = $request->input('nim');
    $foto = $request->input('foto');

    if (strlen($foto) != 0) {
      $foto = Foto::base64ToImage($foto, $nim);
    }

    $set = Foto::findOrNew($nim);

    $set->nim = $nim;
    $set->foto = $foto;
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
  }

  public function destroy (Request $request, $nim) {
    $mhs_foto = Foto::find($nim);

    if ($mhs_foto->delete()) {
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