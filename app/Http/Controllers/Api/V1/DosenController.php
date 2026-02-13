<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Dosen;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function Index()
    {
        $dosen = Dosen::all();
        return view("admin.alldosen", compact('dosen'));
    }

    public function AddDosen()
    {
        return view("admin.adddosen");
    }

    public function StoreDosen(Request $request)
    {
        $request->validate([
            'NIP' => 'required|unique:dosen,NIP|max:20',
            'Nama' => 'required|max:100',
            'Alamat' => 'nullable',
            'Nohp' => 'nullable|max:15',
        ]);

        Dosen::create([
            'NIP' => $request->NIP,
            'Nama' => $request->Nama,
            'Alamat' => $request->Alamat,
            'Nohp' => $request->Nohp,
        ]);

        return redirect()->route('alldosen')->with('message', 'Dosen berhasil ditambahkan!');
    }

    public function EditDosen($NIP)
    {
        $doseninfo = Dosen::findOrFail($NIP);
        return view('admin.editdosen', compact('doseninfo'));
    }

    public function UpdateDosen(Request $request)
    {
        $request->validate([
            'NIP' => 'required|max:20',
            'Nama' => 'required|max:100',
            'Alamat' => 'nullable',
            'Nohp' => 'nullable|max:15',
        ]);

        Dosen::where('NIP', $request->original_nip)->update([
            'NIP' => $request->NIP,
            'Nama' => $request->Nama,
            'Alamat' => $request->Alamat,
            'Nohp' => $request->Nohp,
        ]);

        return redirect()->route('alldosen')->with('message', 'Update Informasi Dosen Berhasil!');
    }

    public function DeleteDosen($NIP)
    {
        Dosen::findOrFail($NIP)->delete();
        return redirect()->route('alldosen')->with('message', 'Penghapusan Dosen Berhasil!');
    }
}
