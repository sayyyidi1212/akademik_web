<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Pengampu;
use App\Models\Matakuliah;
use App\Models\Dosen;
use Illuminate\Http\Request;

class PengampuController extends Controller
{
    public function Index()
    {
        $pengampu = Pengampu::with(['matakuliah', 'dosen'])->get();
        return view("admin.allpengampu", compact('pengampu'));
    }

    public function AddPengampu()
    {
        $matakuliah = Matakuliah::all();
        $dosen = Dosen::all();
        return view("admin.addpengampu", compact('matakuliah', 'dosen'));
    }

    public function StorePengampu(Request $request)
    {
        $request->validate([
            'Kode_mk' => 'required|exists:matakuliah,Kode_mk',
            'NIP' => 'required|exists:dosen,NIP',
        ]);

        // Check if combination already exists
        $exists = Pengampu::where('Kode_mk', $request->Kode_mk)
            ->where('NIP', $request->NIP)
            ->exists();

        if ($exists) {
            return redirect()->back()->withErrors(['error' => 'Pengampu sudah ada!'])->withInput();
        }

        Pengampu::create([
            'Kode_mk' => $request->Kode_mk,
            'NIP' => $request->NIP,
        ]);

        return redirect()->route('allpengampu')->with('message', 'Pengampu berhasil ditambahkan!');
    }

    public function DeletePengampu($Kode_mk, $NIP)
    {
        Pengampu::where('Kode_mk', $Kode_mk)->where('NIP', $NIP)->delete();
        return redirect()->route('allpengampu')->with('message', 'Penghapusan Pengampu Berhasil!');
    }
}
