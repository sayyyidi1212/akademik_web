<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MahasiswaAkademik extends Model
{
    use HasFactory;

    protected $table = 'mahasiswa';
    protected $primaryKey = 'NIM';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'NIM',
        'Nama',
        'Alamat',
        'Nohp',
        'Semester',
        'id_Gol',
    ];

    // Relationship: Mahasiswa belongs to Golongan
    public function golongan()
    {
        return $this->belongsTo(Golongan::class, 'id_Gol', 'id_Gol');
    }

    // Relationship: Mahasiswa mengambil banyak Matakuliah (via KRS)
    public function matakuliahs()
    {
        return $this->belongsToMany(Matakuliah::class, 'krs', 'NIM', 'Kode_mk');
    }

    // Direct relationship to KRS
    public function krs()
    {
        return $this->hasMany(Krs::class, 'NIM', 'NIM');
    }

    // Relationship: Mahasiswa memiliki banyak Presensi
    public function presensiAkademiks()
    {
        return $this->hasMany(PresensiAkademik::class, 'NIM', 'NIM');
    }
}
