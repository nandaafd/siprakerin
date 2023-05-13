<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'absensi';

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }

    public function pembimbingLapangan()
    {
        return $this->belongsTo(PembimbingLapangan::class);
    }
}
