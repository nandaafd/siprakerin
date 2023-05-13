<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'nilai';
    
    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
    public function pembimbing_lapangan()
    {
        return $this->belongsTo(PembimbingLapangan::class);
    }
}
