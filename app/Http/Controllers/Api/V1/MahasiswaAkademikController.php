<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\MahasiswaAkademik;
use App\Models\Golongan;
use Illuminate\Http\Request;

class MahasiswaAkademikController extends Controller
{
    public function Index()
    {
        $mahasiswa = MahasiswaAkademik::with('golongan')->get();
        return view("admin.allmahasiswa", compact('mahasiswa'));
    }

    public function AddMahasiswa()
    {
        $golongan = Golongan::all();
        return view("admin.addmahasiswa", compact('golongan'));
    }

    public function StoreMahasiswa(Request $request)
    {
        $request->validate([
            'NIM' => 'required|unique:mahasiswa,NIM|max:15',
            'Nama' => 'required|max:100',
            'Alamat' => 'nullable',
            'Nohp' => 'nullable|max:15',
            'Semester' => 'nullable|integer|min:1|max:14',
            'id_Gol' => 'nullable|exists:golongan,id_Gol',
        ]);

        MahasiswaAkademik::create([
            'NIM' => $request->NIM,
            'Nama' => $request->Nama,
            'Alamat' => $request->Alamat,
            'Nohp' => $request->Nohp,
            'Semester' => $request->Semester,
            'id_Gol' => $request->id_Gol,
        ]);

        return redirect()->route('allmahasiswa')->with('message', 'Mahasiswa berhasil ditambahkan!');
    }

    public function EditMahasiswa($NIM)
    {
        $mahasiswainfo = MahasiswaAkademik::findOrFail($NIM);
        $golongan = Golongan::all();
        return view('admin.editmahasiswa', compact('mahasiswainfo', 'golongan'));
    }

    public function UpdateMahasiswa(Request $request)
    {
        $request->validate([
            'NIM' => 'required|max:15',
            'Nama' => 'required|max:100',
            'Alamat' => 'nullable',
            'Nohp' => 'nullable|max:15',
            'Semester' => 'nullable|integer|min:1|max:14',
            'id_Gol' => 'nullable|exists:golongan,id_Gol',
        ]);

        MahasiswaAkademik::where('NIM', $request->original_nim)->update([
            'NIM' => $request->NIM,
            'Nama' => $request->Nama,
            'Alamat' => $request->Alamat,
            'Nohp' => $request->Nohp,
            'Semester' => $request->Semester,
            'id_Gol' => $request->id_Gol,
        ]);

        return redirect()->route('allmahasiswa')->with('message', 'Update Mahasiswa Berhasil!');
    }

    public function DeleteMahasiswa($NIM)
    {
        MahasiswaAkademik::findOrFail($NIM)->delete();
        return redirect()->route('allmahasiswa')->with('message', 'Penghapusan Mahasiswa Berhasil!');
    }
}
