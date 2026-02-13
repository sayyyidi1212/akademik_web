<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Krs;
use App\Models\MahasiswaAkademik;
use App\Models\Matakuliah;
use Illuminate\Http\Request;

class KrsController extends Controller
{
    public function Index()
    {
        $krs = Krs::with(['mahasiswa', 'matakuliah'])->get();
        return view("admin.allkrs", compact('krs'));
    }

    public function AddKrs()
    {
        $mahasiswa = MahasiswaAkademik::all();
        $matakuliah = Matakuliah::all();
        return view("admin.addkrs", compact('mahasiswa', 'matakuliah'));
    }

    public function StoreKrs(Request $request)
    {
        $request->validate([
            'NIM' => 'required|exists:mahasiswa,NIM',
            'Kode_mk' => 'required|exists:matakuliah,Kode_mk',
        ]);

        // Check if combination already exists
        $exists = Krs::where('NIM', $request->NIM)
            ->where('Kode_mk', $request->Kode_mk)
            ->exists();

        if ($exists) {
            return redirect()->back()->withErrors(['error' => 'KRS sudah ada!'])->withInput();
        }

        Krs::create([
            'NIM' => $request->NIM,
            'Kode_mk' => $request->Kode_mk,
        ]);

        return redirect()->route('allkrs')->with('message', 'KRS berhasil ditambahkan!');
    }

    public function DeleteKrs($NIM, $Kode_mk)
    {
        Krs::where('NIM', $NIM)->where('Kode_mk', $Kode_mk)->delete();
        return redirect()->route('allkrs')->with('message', 'Penghapusan KRS Berhasil!');
    }
}
