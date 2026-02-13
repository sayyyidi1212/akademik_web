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
            return redirect()->route('admindashboard')->with('error', 'Akun Anda tidak terhubung dengan data mahasiswa.');
        }

        $mahasiswa = MahasiswaAkademik::with('golongan')->where('NIM', $user->NIM)->firstOrFail();

        // Get total SKS enrolled
        $sks_total = Krs::where('krs.NIM', $user->NIM)
            ->join('matakuliah', 'krs.Kode_mk', '=', 'matakuliah.Kode_mk')
            ->sum('matakuliah.sks');

        // Get attendance count (Hadir only)
        $kehadiran_count = PresensiAkademik::where('NIM', $user->NIM)
            ->where('status_kehadiran', 'Hadir')
            ->count();

        return view('mahasiswa.dashboard', compact('mahasiswa', 'sks_total', 'kehadiran_count'));
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

        return view('mahasiswa.krs', compact('krs'));
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

        return view('mahasiswa.presensi', compact('presensi'));
    }
}
