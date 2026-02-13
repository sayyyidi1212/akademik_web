<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruang extends Model
{
    use HasFactory;

    protected $table = 'ruang';
    protected $primaryKey = 'id_ruang';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'id_ruang',
        'nama_ruang',
    ];

    // Relationship: Ruang digunakan untuk banyak Jadwal
    public function jadwalAkademiks()
    {
        return $this->hasMany(JadwalAkademik::class, 'id_ruang', 'id_ruang');
    }
}
