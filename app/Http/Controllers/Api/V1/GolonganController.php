<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Golongan;
use Illuminate\Http\Request;

class GolonganController extends Controller
{
    public function Index()
    {
        $golongan = Golongan::all();
        return view("admin.allgolongan", compact('golongan'));
    }

    public function AddGolongan()
    {
        return view("admin.addgolongan");
    }

    public function StoreGolongan(Request $request)
    {
        $request->validate([
            'id_Gol' => 'required|unique:golongan,id_Gol|max:10',
            'nama_Gol' => 'required|max:50',
        ]);

        Golongan::create([
            'id_Gol' => $request->id_Gol,
            'nama_Gol' => $request->nama_Gol,
        ]);

        return redirect()->route('allgolongan')->with('message', 'Golongan berhasil ditambahkan!');
    }

    public function EditGolongan($id_Gol)
    {
        $golonganinfo = Golongan::findOrFail($id_Gol);
        return view('admin.editgolongan', compact('golonganinfo'));
    }

    public function UpdateGolongan(Request $request)
    {
        $request->validate([
            'id_Gol' => 'required|max:10',
            'nama_Gol' => 'required|max:50',
        ]);

        Golongan::where('id_Gol', $request->original_id)->update([
            'id_Gol' => $request->id_Gol,
            'nama_Gol' => $request->nama_Gol,
        ]);

        return redirect()->route('allgolongan')->with('message', 'Update Golongan Berhasil!');
    }

    public function DeleteGolongan($id_Gol)
    {
        Golongan::findOrFail($id_Gol)->delete();
        return redirect()->route('allgolongan')->with('message', 'Penghapusan Golongan Berhasil!');
    }
}
