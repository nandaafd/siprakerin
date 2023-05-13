<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembimbingLapangan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'pembimbing_lapangan';

    public function absensi()
    {
        return $this->hasManyThrough(Absensi::class, Siswa::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function siswa()
    {
        return $this->hasMany(Siswa::class);
    }
}
