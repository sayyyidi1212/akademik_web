<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Matakuliah;
use Illuminate\Http\Request;

class MatakuliahController extends Controller
{
    public function Index()
    {
        $matakuliah = Matakuliah::all();
        return view("admin.allmatakuliah", compact('matakuliah'));
    }

    public function AddMatakuliah()
    {
        return view("admin.addmatakuliah");
    }

    public function StoreMatakuliah(Request $request)
    {
        $request->validate([
            'Kode_mk' => 'required|unique:matakuliah,Kode_mk|max:10',
            'Nama_mk' => 'required|max:100',
            'sks' => 'nullable|integer|min:1|max:6',
            'semester' => 'nullable|integer|min:1|max:8',
        ]);

        Matakuliah::create([
            'Kode_mk' => $request->Kode_mk,
            'Nama_mk' => $request->Nama_mk,
            'sks' => $request->sks,
            'semester' => $request->semester,
        ]);

        return redirect()->route('allmatakuliah')->with('message', 'Matakuliah berhasil ditambahkan!');
    }

    public function EditMatakuliah($Kode_mk)
    {
        $matakuliahinfo = Matakuliah::findOrFail($Kode_mk);
        return view('admin.editmatakuliah', compact('matakuliahinfo'));
    }

    public function UpdateMatakuliah(Request $request)
    {
        $request->validate([
            'Kode_mk' => 'required|max:10',
            'Nama_mk' => 'required|max:100',
            'sks' => 'nullable|integer|min:1|max:6',
            'semester' => 'nullable|integer|min:1|max:8',
        ]);

        Matakuliah::where('Kode_mk', $request->original_kode)->update([
            'Kode_mk' => $request->Kode_mk,
            'Nama_mk' => $request->Nama_mk,
            'sks' => $request->sks,
            'semester' => $request->semester,
        ]);

        return redirect()->route('allmatakuliah')->with('message', 'Update Matakuliah Berhasil!');
    }

    public function DeleteMatakuliah($Kode_mk)
    {
        Matakuliah::findOrFail($Kode_mk)->delete();
        return redirect()->route('allmatakuliah')->with('message', 'Penghapusan Matakuliah Berhasil!');
    }
}
