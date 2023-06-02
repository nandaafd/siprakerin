<?php

namespace App\Http\Controllers\siprakerin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\Mitra;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $jumlah = 5;
        $berita = Berita::take($jumlah)->orderBy('created_at','desc')->get();
        $mitra = Mitra::all();
        return view('index',compact('berita','mitra'));
    }
}
