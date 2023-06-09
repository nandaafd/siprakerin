<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Siswa extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];
    protected $table = 'siswa';

    public function absensi()
    {
        return $this->hasMany(Absensi::class);
    }
    public function kelas(){
        return $this->belongsTo(Kelas::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pembimbingLapangan()
    {
        return $this->belongsTo(PembimbingLapangan::class);
    }

    public function nilai()
    {
        return $this->hasMany(Nilai::class);
    }
    public function nilaipbs()
    {
        return $this->hasMany(NilaiPbs::class);
    }
    public function nilaitkr()
    {
        return $this->hasMany(NilaiTkro::class);
    }
    public function nilaitkj()
    {
        return $this->hasMany(NilaiTkj::class);
    }

    public function logbook()
    {
        return $this->hasMany(Logbook::class);
    }
    

}
