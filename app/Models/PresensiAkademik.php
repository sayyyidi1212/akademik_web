<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PresensiAkademik extends Model
{
    use HasFactory;

    protected $table = 'presensi_akademik';
    protected $primaryKey = 'id_presensi';
    public $incrementing = true;
    public $timestamps = false;

    protected $fillable = [
        'hari',
        'tanggal',
        'status_kehadiran',
        'NIM',
        'Kode_mk',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];

    // Relationship: Presensi belongs to Mahasiswa
    public function mahasiswa()
    {
        return $this->belongsTo(MahasiswaAkademik::class, 'NIM', 'NIM');
    }

    // Relationship: Presensi belongs to Matakuliah
    public function matakuliah()
    {
        return $this->belongsTo(Matakuliah::class, 'Kode_mk', 'Kode_mk');
    }
}
