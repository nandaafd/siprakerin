<?php

namespace App\Http\Controllers\siprakerin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{

    public function index()
    {
        $berita = Berita::all()->sortByDesc('created_at');
        return view('siprakerin-page.berita.index',compact('berita'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        $gambar = Berita::where('id',$id)->value('gambar');
        $htmlCode = Berita::where('id',$id)->value('isi_berita');
        $berita = Berita::where('id',$id)->get();
        return view('siprakerin-page.berita.show',compact('berita','htmlCode','gambar'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
