<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            'gambar'=>'image|file|max:2048'
        ]);
        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('gambar-berita');
        }else{
            $path = null;
        }
        Berita::create([
            'judul'=>$request->judul,
            'tanggal_terbit'=>$request->terbit,
            'penulis'=>$request->penulis,
            'isi_berita'=>$request->isi_berita,
            'gambar'=>$path
        ]);
        return redirect('/data-berita');
    }

    public function show($id)
    {
        $gambar = Berita::where('id',$id)->value('gambar');
        $htmlCode = Berita::where('id',$id)->value('isi_berita');
        $berita = Berita::where('id',$id)->get();
        return view('dashboard.berita.show',compact('berita','htmlCode','gambar'));
    }

    public function edit($id)
    {
        $berita = Berita::where('id',$id)->get();
        return view('dashboard.berita.edit',compact('berita'));
    }

    public function update(Request $request, $id)
    {
        $old_image = $request->oldImage;
        $validatedData = $request->validate([
            'judul'=>'required',
            'terbit'=>'required',
            'penulis'=>'required',
            // 'isi_berita'=>'required',
            'gambar'=>'image|file|max:2048'
        ]);
        if ($request->hasFile('gambar')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $path = $request->file('gambar')->store('gambar-berita');
        }else{
            $path = $old_image;
        }
        Berita::where('id',$id)->update([
            'judul'=>$request->judul,
            'tanggal_terbit'=>$request->terbit,
            'penulis'=>$request->penulis,
            'isi_berita'=>$request->isi_berita,
            'gambar'=>$path
        ]);
        return redirect('/data-berita');
    }

    public function destroy($id)
    {
        Berita::where('id',$id)->delete();
        return redirect('/data-berita');
    }
}
