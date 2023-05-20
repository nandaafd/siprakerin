<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{

    public function index()
    {
        $berita = Berita::all()->sortByDesc('created_at');
        return view('dashboard.berita.index',compact('berita'));
    }

    public function create()
    {
        return view('dashboard.berita.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul'=>'required',
            'terbit'=>'required',
            'penulis'=>'required',
            // 'isi_berita'=>'required',
        ]);
        Berita::create([
            'judul'=>$request->judul,
            'tanggal_terbit'=>$request->terbit,
            'penulis'=>$request->penulis,
            'isi_berita'=>$request->isi_berita,
        ]);
        return redirect('/data-berita');
    }

    public function show($id)
    {
        $htmlCode = Berita::where('id',$id)->value('isi_berita');
        $berita = Berita::where('id',$id)->get();
        return view('dashboard.berita.show',compact('berita','htmlCode'));
    }

    public function edit($id)
    {
        $berita = Berita::where('id',$id)->get();
        return view('dashboard.berita.edit',compact('berita'));
    }

    public function update(Request $request, $id)
    {
        Berita::where('id',$id)->update([
            'judul'=>$request->judul,
            'tanggal_terbit'=>$request->terbit,
            'penulis'=>$request->penulis,
            'isi_berita'=>$request->isi_berita,
        ]);
        return redirect('/data-berita');
    }

    public function destroy($id)
    {
        Berita::where('id',$id)->delete();
        return redirect('/data-berita');
    }
}
