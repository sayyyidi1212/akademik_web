<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Ruang;
use Illuminate\Http\Request;

class RuangController extends Controller
{
    public function Index()
    {
        $ruang = Ruang::all();
        return view("admin.allruang", compact('ruang'));
    }

    public function AddRuang()
    {
        return view("admin.addruang");
    }

    public function StoreRuang(Request $request)
    {
        $request->validate([
            'id_ruang' => 'required|unique:ruang,id_ruang|max:10',
            'nama_ruang' => 'required|max:50',
        ]);

        Ruang::create([
            'id_ruang' => $request->id_ruang,
            'nama_ruang' => $request->nama_ruang,
        ]);

        return redirect()->route('allruang')->with('message', 'Ruang berhasil ditambahkan!');
    }

    public function EditRuang($id_ruang)
    {
        $ruanginfo = Ruang::findOrFail($id_ruang);
        return view('admin.editruang', compact('ruanginfo'));
    }

    public function UpdateRuang(Request $request)
    {
        $request->validate([
            'id_ruang' => 'required|max:10',
            'nama_ruang' => 'required|max:50',
        ]);

        Ruang::where('id_ruang', $request->original_id)->update([
            'id_ruang' => $request->id_ruang,
            'nama_ruang' => $request->nama_ruang,
        ]);

        return redirect()->route('allruang')->with('message', 'Update Ruang Berhasil!');
    }

    public function DeleteRuang($id_ruang)
    {
        Ruang::findOrFail($id_ruang)->delete();
        return redirect()->route('allruang')->with('message', 'Penghapusan Ruang Berhasil!');
    }
}
