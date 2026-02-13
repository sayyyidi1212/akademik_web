<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\JadwalAkademik;
use App\Models\Matakuliah;
use App\Models\Ruang;
use App\Models\Golongan;
use Illuminate\Http\Request;

class JadwalAkademikController extends Controller
{
    public function Index()
    {
        $jadwal = JadwalAkademik::with(['matakuliah', 'ruang', 'golongan'])->get();
        return view("admin.alljadwal", compact('jadwal'));
    }

    public function AddJadwal()
    {
        $matakuliah = Matakuliah::all();
        $ruang = Ruang::all();
        $golongan = Golongan::all();
        return view("admin.addjadwal", compact('matakuliah', 'ruang', 'golongan'));
    }

    public function StoreJadwal(Request $request)
    {
        $request->validate([
            'hari' => 'required|max:10',
            'Kode_mk' => 'nullable|exists:matakuliah,Kode_mk',
            'id_ruang' => 'nullable|exists:ruang,id_ruang',
            'id_Gol' => 'nullable|exists:golongan,id_Gol',
        ]);

        JadwalAkademik::create([
            'hari' => $request->hari,
            'Kode_mk' => $request->Kode_mk,
            'id_ruang' => $request->id_ruang,
            'id_Gol' => $request->id_Gol,
        ]);

        return redirect()->route('alljadwal')->with('message', 'Jadwal berhasil ditambahkan!');
    }

    public function EditJadwal($id_jadwal)
    {
        $jadwalinfo = JadwalAkademik::findOrFail($id_jadwal);
        $matakuliah = Matakuliah::all();
        $ruang = Ruang::all();
        $golongan = Golongan::all();
        return view('admin.editjadwal', compact('jadwalinfo', 'matakuliah', 'ruang', 'golongan'));
    }

    public function UpdateJadwal(Request $request)
    {
        $request->validate([
            'id_jadwal' => 'required|exists:jadwal_akademik,id_jadwal',
            'hari' => 'required|max:10',
            'Kode_mk' => 'nullable|exists:matakuliah,Kode_mk',
            'id_ruang' => 'nullable|exists:ruang,id_ruang',
            'id_Gol' => 'nullable|exists:golongan,id_Gol',
        ]);

        JadwalAkademik::where('id_jadwal', $request->id_jadwal)->update([
            'hari' => $request->hari,
            'Kode_mk' => $request->Kode_mk,
            'id_ruang' => $request->id_ruang,
            'id_Gol' => $request->id_Gol,
        ]);

        return redirect()->route('alljadwal')->with('message', 'Update Jadwal Berhasil!');
    }

    public function DeleteJadwal($id_jadwal)
    {
        JadwalAkademik::findOrFail($id_jadwal)->delete();
        return redirect()->route('alljadwal')->with('message', 'Penghapusan Jadwal Berhasil!');
    }
}
