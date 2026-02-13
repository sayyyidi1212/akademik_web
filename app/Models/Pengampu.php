<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengampu extends Model
{
    use HasFactory;

    protected $table = 'pengampu';
    protected $primaryKey = null; // Composite key
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'Kode_mk',
        'NIP',
    ];

    // Override getKeyName for composite key
    public function getKeyName()
    {
        return ['Kode_mk', 'NIP'];
    }

    // Relationship: Pengampu belongs to Matakuliah
    public function matakuliah()
    {
        return $this->belongsTo(Matakuliah::class, 'Kode_mk', 'Kode_mk');
    }

    // Relationship: Pengampu belongs to Dosen
    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'NIP', 'NIP');
    }
}
