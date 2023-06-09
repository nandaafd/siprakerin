<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiTkro extends Model
{
    use HasFactory;
    protected $table = 'nilai_tkro';
    protected $guarded = ['id'];
}
