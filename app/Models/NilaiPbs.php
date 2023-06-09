<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiPbs extends Model
{
    use HasFactory;
    protected $table = 'nilai_pbs';
    protected $guarded = ['id'];
    
    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
}
