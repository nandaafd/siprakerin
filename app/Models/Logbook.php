<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logbook extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'logbook';

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
}
