<?php

namespace App\Http\Controllers;

use App\Models\Mitra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MitraController extends Controller
{
  
    public function index()
    {
        $mitra = Mitra::all();
        return view('dashboard.mitra.index',compact('mitra'));
    }

    public function create()
    {
        return view('dashboard.mitra.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama'=>'required',
            'alamat'=>'required',
            'bidang'=>'required',
            'kuota'=>'required',
            'gambar'=>'image|file|max:2048'
        ]);
        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('gambar-mitra');
        }else{
            $path = null;
        }
        Mitra::create([
            'nama_mitra'=>$request->nama,
            'alamat'=>$request->alamat,
            'bidang'=>$request->bidang,
            'kuota'=>$request->kuota,
            'foto_mitra'=>$path
        ]);
        return redirect('/data-mitra');
    }

    public function show($id)
    {
        $gambar = Mitra::where('id',$id)->get()->value('foto_mitra');
        $mitra = Mitra::where('id',$id)->get();
        return view('dashboard.mitra.show',compact('mitra','gambar'));
    }

    public function edit($id)
    {
        $mitra = Mitra::where('id',$id)->get();
        return view('dashboard.mitra.edit',compact('mitra'));
    }

    public function update(Request $request, $id)
    {
        $old_image = $request->oldImage;
        $validatedData = $request->validate([
            'nama'=>'required',
            'alamat'=>'required',
            'bidang'=>'required',
            'kuota'=>'required',
            'gambar'=>'image|file|max:2048'
        ]);
        if ($request->hasFile('gambar')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $path = $request->file('gambar')->store('gambar-mitra');
        }else{
            $path = $old_image;
        }
        Mitra::where('id',$id)->update([
            'nama_mitra'=>$request->nama,
            'alamat'=>$request->alamat,
            'bidang'=>$request->bidang,
            'kuota'=>$request->kuota,
            'foto_mitra'=>$path
        ]);
        return redirect('data-mitra');
    }


    public function destroy($id)
    {   
        Mitra::where('id',$id)->delete();
        return redirect('/data-mitra')->with('success', 'Data berhasil dihapus');
    }
}
