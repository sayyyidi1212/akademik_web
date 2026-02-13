<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Dosen;
use App\Models\Golongan;
use App\Models\MahasiswaAkademik;
use App\Models\Matakuliah;
use App\Models\Ruang;
use App\Models\JadwalAkademik;
use App\Models\Krs;
use App\Models\PresensiAkademik;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function Index()
    {
        $totalMahasiswa = MahasiswaAkademik::count();
        $totalDosen = Dosen::count();
        $totalMatakuliah = Matakuliah::count();
        $totalRuang = Ruang::count();
        $totalGolongan = Golongan::count();
        $totalJadwal = JadwalAkademik::count();
        $totalKrs = Krs::count();
        $totalPresensi = PresensiAkademik::count();

        return view("admin.dashboard", compact(
            'totalMahasiswa',
            'totalDosen',
            'totalMatakuliah',
            'totalRuang',
            'totalGolongan',
            'totalJadwal',
            'totalKrs',
            'totalPresensi'
        ));
    }

    public function AdminLogout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public static function ubahAngkaToBulan($bulanAngka)
    {
        $bulanArray = [
            '0' => '',
            '1' => 'Januari',
            '2' => 'Februari',
            '3' => 'Maret',
            '4' => 'April',
            '5' => 'Mei',
            '6' => 'Juni',
            '7' => 'Juli',
            '8' => 'Agustus',
            '9' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember',
        ];
        return $bulanArray[$bulanAngka + 0];
    }
}
