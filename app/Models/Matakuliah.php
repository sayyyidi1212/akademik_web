<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matakuliah extends Model
{
    use HasFactory;

    protected $table = 'matakuliah';
    protected $primaryKey = 'Kode_mk';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'Kode_mk',
        'Nama_mk',
        'sks',
        'semester',
    ];

    // Relationship: Matakuliah diampu oleh banyak Dosen (via pengampu pivot)
    public function dosens()
    {
        return $this->belongsToMany(Dosen::class, 'pengampu', 'Kode_mk', 'NIP');
    }

    // Direct relationship to pengampu
    public function pengampus()
    {
        return $this->hasMany(Pengampu::class, 'Kode_mk', 'Kode_mk');
    }

    // Relationship: Matakuliah memiliki banyak Jadwal
    public function jadwalAkademiks()
    {
        return $this->hasMany(JadwalAkademik::class, 'Kode_mk', 'Kode_mk');
    }

    // Relationship: Matakuliah diambil oleh banyak Mahasiswa (via KRS)
    public function mahasiswas()
    {
        return $this->belongsToMany(MahasiswaAkademik::class, 'krs', 'Kode_mk', 'NIM');
    }

    // Relationship: Matakuliah memiliki banyak Presensi
    public function presensiAkademiks()
    {
        return $this->hasMany(PresensiAkademik::class, 'Kode_mk', 'Kode_mk');
    }
}
