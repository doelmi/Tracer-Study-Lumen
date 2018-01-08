<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Prodi;

class ProdiController extends Controller {

    public function set_prodi(Request $request) {
        $prodi = $request->input('nama_prodi');

        $set = Prodi::create([
                    'nama_prodi' => $prodi
        ]);

        if ($set) {
            $res['success'] = true;
            $res['message'] = 'Sukses Menyimpan!';
            $res['content']= $set;
            return response($res);
        } else {
            $res['success'] = false;
            $res['message'] = 'Gagal Menyimpan!';
            return response($res, 400);
        }
    }

    public function put_prodi(Request $request, $id) {
        $prodi = $request->input('nama_prodi');

        $put = Prodi::find($id);

        $put->nama_prodi = $prodi;
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

    public function del_prodi(Request $request, $id) {
        $del = Prodi::find($id);

        if ($del->delete()) {
            $res['success'] = true;
            $res['message'] = 'Sukses Menghapus!';
            return response($res);
        } else {
            $res['success'] = false;
            $res['message'] = 'Gagal Menghapus!';
            return response($res, 400);
        }
    }

    public function get_prodi(Request $request, $id) {
        $get = Prodi::where('id', $id)->get();
        if ($get) {
            $res['success'] = true;
            $res['message'] = $get;

            return response($res);
        } else {
            $res['success'] = false;
            $res['message'] = 'Cannot find Mahasiswa!';

            return response($res, 400);
        }
    }

    public function get_all_prodi(Request $request) {
        $get = Prodi::all();
        if ($get) {
            $res['success'] = true;
            $res['message'] = $get;

            return response($res);
        } else {
            $res['success'] = false;
            $res['message'] = 'Cannot find Mahasiswa!';

            return response($res, 400);
        }
    }

}
