<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\PresensiAkademik;
use App\Models\MahasiswaAkademik;
use App\Models\Matakuliah;
use Illuminate\Http\Request;

class PresensiAkademikController extends Controller
{
    public function Index()
    {
        $presensi = PresensiAkademik::with(['mahasiswa', 'matakuliah'])->orderBy('tanggal', 'desc')->get();
        return view("admin.allpresensi", compact('presensi'));
    }

    public function AddPresensi()
    {
        $mahasiswa = MahasiswaAkademik::all();
        $matakuliah = Matakuliah::all();
        return view("admin.addpresensi", compact('mahasiswa', 'matakuliah'));
    }

    public function StorePresensi(Request $request)
    {
        $request->validate([
            'hari' => 'required|max:10',
            'tanggal' => 'required|date',
            'status_kehadiran' => 'required|in:Hadir,Izin,Sakit,Alpa',
            'NIM' => 'required|exists:mahasiswa,NIM',
            'Kode_mk' => 'required|exists:matakuliah,Kode_mk',
        ]);

        PresensiAkademik::create([
            'hari' => $request->hari,
            'tanggal' => $request->tanggal,
            'status_kehadiran' => $request->status_kehadiran,
            'NIM' => $request->NIM,
            'Kode_mk' => $request->Kode_mk,
        ]);

        return redirect()->route('allpresensi')->with('message', 'Presensi berhasil ditambahkan!');
    }

    public function EditPresensi($id_presensi)
    {
        $presensiinfo = PresensiAkademik::findOrFail($id_presensi);
        $mahasiswa = MahasiswaAkademik::all();
        $matakuliah = Matakuliah::all();
        return view('admin.editpresensi', compact('presensiinfo', 'mahasiswa', 'matakuliah'));
    }

    public function UpdatePresensi(Request $request)
    {
        $request->validate([
            'id_presensi' => 'required|exists:presensi_akademik,id_presensi',
            'hari' => 'required|max:10',
            'tanggal' => 'required|date',
            'status_kehadiran' => 'required|in:Hadir,Izin,Sakit,Alpa',
            'NIM' => 'required|exists:mahasiswa,NIM',
            'Kode_mk' => 'required|exists:matakuliah,Kode_mk',
        ]);

        PresensiAkademik::where('id_presensi', $request->id_presensi)->update([
            'hari' => $request->hari,
            'tanggal' => $request->tanggal,
            'status_kehadiran' => $request->status_kehadiran,
            'NIM' => $request->NIM,
            'Kode_mk' => $request->Kode_mk,
        ]);

        return redirect()->route('allpresensi')->with('message', 'Update Presensi Berhasil!');
    }

    public function DeletePresensi($id_presensi)
    {
        PresensiAkademik::findOrFail($id_presensi)->delete();
        return redirect()->route('allpresensi')->with('message', 'Penghapusan Presensi Berhasil!');
    }
}
