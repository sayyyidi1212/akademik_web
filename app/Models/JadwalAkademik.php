<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalAkademik extends Model
{
    use HasFactory;

    protected $table = 'jadwal_akademik';
    protected $primaryKey = 'id_jadwal';
    public $incrementing = true;
    public $timestamps = false;

    protected $fillable = [
        'hari',
        'Kode_mk',
        'id_ruang',
        'id_Gol',
    ];

    // Relationship: Jadwal belongs to Matakuliah
    public function matakuliah()
    {
        return $this->belongsTo(Matakuliah::class, 'Kode_mk', 'Kode_mk');
    }

    // Relationship: Jadwal belongs to Ruang
    public function ruang()
    {
        return $this->belongsTo(Ruang::class, 'id_ruang', 'id_ruang');
    }

    // Relationship: Jadwal belongs to Golongan
    public function golongan()
    {
        return $this->belongsTo(Golongan::class, 'id_Gol', 'id_Gol');
    }
}
