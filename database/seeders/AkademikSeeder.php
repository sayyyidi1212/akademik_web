<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AkademikSeeder extends Seeder
{
    /**
     * Seed the SIAKAD academic tables.
     */
    public function run(): void
    {
        // 1. Golongan
        $golongan = [
            ['id_Gol' => 'G001', 'nama_Gol' => 'TI-1A'],
            ['id_Gol' => 'G002', 'nama_Gol' => 'TI-1B'],
            ['id_Gol' => 'G003', 'nama_Gol' => 'TI-2A'],
            ['id_Gol' => 'G004', 'nama_Gol' => 'TI-2B'],
        ];
        foreach ($golongan as $g) {
            DB::table('golongan')->updateOrInsert(['id_Gol' => $g['id_Gol']], $g);
        }

        // 2. Ruang
        $ruang = [
            ['id_ruang' => 'R001', 'nama_ruang' => 'Lab Komputer 1'],
            ['id_ruang' => 'R002', 'nama_ruang' => 'Lab Komputer 2'],
            ['id_ruang' => 'R003', 'nama_ruang' => 'Ruang Teori 1'],
            ['id_ruang' => 'R004', 'nama_ruang' => 'Ruang Teori 2'],
            ['id_ruang' => 'R005', 'nama_ruang' => 'Aula Utama'],
        ];
        foreach ($ruang as $r) {
            DB::table('ruang')->updateOrInsert(['id_ruang' => $r['id_ruang']], $r);
        }

        // 3. Dosen
        $dosen = [
            ['NIP' => '198001010001', 'Nama' => 'Dr. Budi Santoso, M.Kom'],
            ['NIP' => '198502020002', 'Nama' => 'Siti Aminah, S.T., M.T.'],
            ['NIP' => '199003030003', 'Nama' => 'Ahmad Fauzi, S.Kom., M.Cs.'],
            ['NIP' => '198704040004', 'Nama' => 'Dewi Lestari, S.Si., M.Sc.'],
            ['NIP' => '199205050005', 'Nama' => 'Rudi Hermawan, S.Kom., M.Eng.'],
        ];
        foreach ($dosen as $d) {
            DB::table('dosen')->updateOrInsert(['NIP' => $d['NIP']], $d);
        }

        // 4. Matakuliah
        $matakuliah = [
            ['Kode_mk' => 'MK001', 'Nama_mk' => 'Pemrograman Web', 'sks' => 3, 'semester' => 3],
            ['Kode_mk' => 'MK002', 'Nama_mk' => 'Basis Data', 'sks' => 3, 'semester' => 2],
            ['Kode_mk' => 'MK003', 'Nama_mk' => 'Algoritma & Struktur Data', 'sks' => 4, 'semester' => 2],
            ['Kode_mk' => 'MK004', 'Nama_mk' => 'Jaringan Komputer', 'sks' => 3, 'semester' => 4],
            ['Kode_mk' => 'MK005', 'Nama_mk' => 'Sistem Operasi', 'sks' => 3, 'semester' => 3],
            ['Kode_mk' => 'MK006', 'Nama_mk' => 'Rekayasa Perangkat Lunak', 'sks' => 3, 'semester' => 5],
            ['Kode_mk' => 'MK007', 'Nama_mk' => 'Kecerdasan Buatan', 'sks' => 3, 'semester' => 6],
            ['Kode_mk' => 'MK008', 'Nama_mk' => 'Matematika Diskrit', 'sks' => 2, 'semester' => 1],
        ];
        foreach ($matakuliah as $mk) {
            DB::table('matakuliah')->updateOrInsert(['Kode_mk' => $mk['Kode_mk']], $mk);
        }

        // 5. Mahasiswa
        $mahasiswa = [
            ['NIM' => 'E41211001', 'Nama' => 'Andi Pratama', 'Alamat' => 'Jl. Mawar No. 1, Jember', 'Nohp' => '081234567890', 'Semester' => 4, 'id_Gol' => 'G001'],
            ['NIM' => 'E41211002', 'Nama' => 'Budi Setiawan', 'Alamat' => 'Jl. Melati No. 5, Jember', 'Nohp' => '081234567891', 'Semester' => 4, 'id_Gol' => 'G001'],
            ['NIM' => 'E41211003', 'Nama' => 'Citra Dewi', 'Alamat' => 'Jl. Kenanga No. 10, Jember', 'Nohp' => '081234567892', 'Semester' => 4, 'id_Gol' => 'G002'],
            ['NIM' => 'E41211004', 'Nama' => 'Dika Maulana', 'Alamat' => 'Jl. Anggrek No. 3, Jember', 'Nohp' => '081234567893', 'Semester' => 2, 'id_Gol' => 'G003'],
            ['NIM' => 'E41211005', 'Nama' => 'Eka Fitriani', 'Alamat' => 'Jl. Dahlia No. 7, Jember', 'Nohp' => '081234567894', 'Semester' => 2, 'id_Gol' => 'G003'],
        ];
        foreach ($mahasiswa as $m) {
            DB::table('mahasiswa')->updateOrInsert(['NIM' => $m['NIM']], $m);
        }

        // 6. Pengampu (Dosen – Matakuliah assignments)
        $pengampu = [
            ['Kode_mk' => 'MK001', 'NIP' => '198001010001'],
            ['Kode_mk' => 'MK002', 'NIP' => '198502020002'],
            ['Kode_mk' => 'MK003', 'NIP' => '199003030003'],
            ['Kode_mk' => 'MK004', 'NIP' => '198704040004'],
            ['Kode_mk' => 'MK005', 'NIP' => '199205050005'],
            ['Kode_mk' => 'MK006', 'NIP' => '198001010001'],
            ['Kode_mk' => 'MK007', 'NIP' => '199003030003'],
            ['Kode_mk' => 'MK008', 'NIP' => '198502020002'],
        ];
        foreach ($pengampu as $p) {
            DB::table('pengampu')->updateOrInsert(
                ['Kode_mk' => $p['Kode_mk'], 'NIP' => $p['NIP']],
                $p
            );
        }

        // 7. Jadwal Akademik
        $jadwal = [
            ['hari' => 'Senin', 'Kode_mk' => 'MK001', 'id_ruang' => 'R001', 'id_Gol' => 'G001'],
            ['hari' => 'Senin', 'Kode_mk' => 'MK002', 'id_ruang' => 'R003', 'id_Gol' => 'G003'],
            ['hari' => 'Selasa', 'Kode_mk' => 'MK003', 'id_ruang' => 'R002', 'id_Gol' => 'G001'],
            ['hari' => 'Rabu', 'Kode_mk' => 'MK004', 'id_ruang' => 'R001', 'id_Gol' => 'G002'],
            ['hari' => 'Kamis', 'Kode_mk' => 'MK005', 'id_ruang' => 'R003', 'id_Gol' => 'G001'],
            ['hari' => 'Jumat', 'Kode_mk' => 'MK006', 'id_ruang' => 'R002', 'id_Gol' => 'G002'],
        ];
        foreach ($jadwal as $j) {
            DB::table('jadwal_akademik')->updateOrInsert(
                ['hari' => $j['hari'], 'Kode_mk' => $j['Kode_mk'], 'id_Gol' => $j['id_Gol']],
                $j
            );
        }

        // 8. KRS (Student course enrollment)
        $krs = [
            ['NIM' => 'E41211001', 'Kode_mk' => 'MK001'],
            ['NIM' => 'E41211001', 'Kode_mk' => 'MK002'],
            ['NIM' => 'E41211001', 'Kode_mk' => 'MK005'],
            ['NIM' => 'E41211002', 'Kode_mk' => 'MK001'],
            ['NIM' => 'E41211002', 'Kode_mk' => 'MK003'],
            ['NIM' => 'E41211003', 'Kode_mk' => 'MK004'],
            ['NIM' => 'E41211003', 'Kode_mk' => 'MK006'],
            ['NIM' => 'E41211004', 'Kode_mk' => 'MK002'],
            ['NIM' => 'E41211004', 'Kode_mk' => 'MK003'],
            ['NIM' => 'E41211005', 'Kode_mk' => 'MK002'],
            ['NIM' => 'E41211005', 'Kode_mk' => 'MK008'],
        ];
        foreach ($krs as $k) {
            DB::table('krs')->updateOrInsert(
                ['NIM' => $k['NIM'], 'Kode_mk' => $k['Kode_mk']],
                $k
            );
        }

        // 9. Presensi Akademik
        $presensi = [
            ['hari' => 'Senin', 'tanggal' => '2026-02-03', 'status_kehadiran' => 'Hadir', 'NIM' => 'E41211001', 'Kode_mk' => 'MK001'],
            ['hari' => 'Senin', 'tanggal' => '2026-02-03', 'status_kehadiran' => 'Hadir', 'NIM' => 'E41211002', 'Kode_mk' => 'MK001'],
            ['hari' => 'Selasa', 'tanggal' => '2026-02-04', 'status_kehadiran' => 'Hadir', 'NIM' => 'E41211001', 'Kode_mk' => 'MK002'],
            ['hari' => 'Selasa', 'tanggal' => '2026-02-04', 'status_kehadiran' => 'Izin', 'NIM' => 'E41211004', 'Kode_mk' => 'MK002'],
            ['hari' => 'Rabu', 'tanggal' => '2026-02-05', 'status_kehadiran' => 'Hadir', 'NIM' => 'E41211003', 'Kode_mk' => 'MK004'],
            ['hari' => 'Kamis', 'tanggal' => '2026-02-06', 'status_kehadiran' => 'Sakit', 'NIM' => 'E41211001', 'Kode_mk' => 'MK005'],
            ['hari' => 'Kamis', 'tanggal' => '2026-02-06', 'status_kehadiran' => 'Hadir', 'NIM' => 'E41211002', 'Kode_mk' => 'MK003'],
            ['hari' => 'Jumat', 'tanggal' => '2026-02-07', 'status_kehadiran' => 'Alpa', 'NIM' => 'E41211003', 'Kode_mk' => 'MK006'],
            ['hari' => 'Senin', 'tanggal' => '2026-02-10', 'status_kehadiran' => 'Hadir', 'NIM' => 'E41211001', 'Kode_mk' => 'MK001'],
            ['hari' => 'Senin', 'tanggal' => '2026-02-10', 'status_kehadiran' => 'Hadir', 'NIM' => 'E41211002', 'Kode_mk' => 'MK001'],
            ['hari' => 'Selasa', 'tanggal' => '2026-02-11', 'status_kehadiran' => 'Hadir', 'NIM' => 'E41211005', 'Kode_mk' => 'MK002'],
            ['hari' => 'Selasa', 'tanggal' => '2026-02-11', 'status_kehadiran' => 'Hadir', 'NIM' => 'E41211004', 'Kode_mk' => 'MK003'],
        ];
        foreach ($presensi as $p) {
            DB::table('presensi_akademik')->insert($p);
        }
    }
}
