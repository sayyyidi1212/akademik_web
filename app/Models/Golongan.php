<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Golongan extends Model
{
    use HasFactory;

    protected $table = 'golongan';
    protected $primaryKey = 'id_Gol';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'id_Gol',
        'nama_Gol',
    ];

    // Relationship: Golongan memiliki banyak Mahasiswa
    public function mahasiswas()
    {
        return $this->hasMany(MahasiswaAkademik::class, 'id_Gol', 'id_Gol');
    }

    // Relationship: Golongan memiliki banyak Jadwal Akademik
    public function jadwalAkademiks()
    {
        return $this->hasMany(JadwalAkademik::class, 'id_Gol', 'id_Gol');
    }
}
