<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Krs;
use App\Models\MahasiswaAkademik;
use App\Models\PresensiAkademik;
use Illuminate\Support\Facades\Auth;

class MahasiswaPortalController extends Controller
{
    public function Dashboard()
    {
        $user = Auth::user();

        if (!$user->NIM) {
            // Jika kolom NIM di tabel users kosong
            return redirect()->route('login')->with('error', 'Akun Anda tidak memiliki NIM yang terautentikasi.');
        }

        $mahasiswa = MahasiswaAkademik::with('golongan')->where('NIM', $user->NIM)->first();

        if (!$mahasiswa) {
            // Jika NIM ada di user, tapi tidak ditemukan di tabel mahasiswa
            return redirect()->route('login')->with('error', 'Data Mahasiswa dengan NIM ' . $user->NIM . ' tidak ditemukan.');
        }

        // Get total SKS enrolled
        $sks_total = Krs::where('krs.NIM', $user->NIM)
            ->join('matakuliah', 'krs.Kode_mk', '=', 'matakuliah.Kode_mk')
            ->sum('matakuliah.sks');

        // Get attendance count (Hadir only)
        $kehadiran_count = PresensiAkademik::where('NIM', $user->NIM)
            ->where('status_kehadiran', 'Hadir')
            ->count();

        return view('user.dashboard', compact('mahasiswa', 'sks_total', 'kehadiran_count'));
    }

    public function Krs()
    {
        $user = Auth::user();

        if (!$user->NIM) {
            return redirect()->route('admindashboard')->with('error', 'Akun Anda tidak terhubung dengan data mahasiswa.');
        }

        $krs = Krs::where('krs.NIM', $user->NIM)
            ->with('matakuliah')
            ->get();

        return view('user.krs', compact('krs'));
    }

    public function Presensi()
    {
        $user = Auth::user();

        if (!$user->NIM) {
            return redirect()->route('admindashboard')->with('error', 'Akun Anda tidak terhubung dengan data mahasiswa.');
        }

        $presensi = PresensiAkademik::where('NIM', $user->NIM)
            ->with('matakuliah')
            ->orderBy('tanggal', 'desc')
            ->get();

        return view('user.presensi', compact('presensi'));
    }
}
