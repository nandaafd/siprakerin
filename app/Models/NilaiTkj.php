<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiTkj extends Model
{
    use HasFactory;
    protected $table = 'nilai_tkj';
    protected $guarded = ['id'];
}
