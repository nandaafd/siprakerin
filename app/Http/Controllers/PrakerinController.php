<?php

namespace App\Http\Controllers;

use App\Models\Prakerin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PrakerinController extends Controller
{

    public function index()
    {
        $prakerin = Prakerin::all();
        return view('dashboard.prakerin.index',compact('prakerin'));
    }

    public function create()
    {
        return view('dashboard.prakerin.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama'=>'required',
            'prodi'=>'required',
            'angkatan'=>'required',
            'perusahaan'=>'required',
            'bidang'=>'required',
            'alamat'=>'required',
            'kontak'=>'required',
            'bukti'=>'image|file|max:2048'
        ]);
        if ($request->hasFile('bukti')) {
            $path = $request->file('bukti')->store('bukti');
        }else{
            $path = '';
        }
        Prakerin::create([
            'nama'=>$request->nama,
            'prodi'=>$request->prodi,
            'angkatan'=>$request->angkatan,
            'mitra_perusahaan'=>$request->perusahaan,
            'bidang_mitra'=>$request->bidang,
            'alamat_mitra'=>$request->alamat,
            'kontak_perusahaan'=>$request->kontak,
            'bukti_diterima'=>$path
        ]);
        return redirect('/data-prakerin');
    }

    public function show($id)
    {
        $prakerin = Prakerin::where('id',$id)->value('bukti_diterima');
        return view('dashboard.prakerin.show', compact('prakerin'));
    }

    public function edit($id)
    {
        $prakerin = Prakerin::where('id',$id)->get();
        return view('dashboard.prakerin.edit',compact('prakerin'));
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'nama'=>'required',
            'prodi'=>'required',
            'angkatan'=>'required',
            'perusahaan'=>'required',
            'bidang'=>'required',
            'alamat'=>'required',
            'kontak'=>'required',
            'bukti'=>'image|file|max:2048'
        ]);
        if ($request->hasFile('bukti')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $path = $request->file('bukti')->store('bukti');
        }else{
            $path = null;
        }
        Prakerin::where('id',$request->id)->update([
            'nama'=>$request->nama,
            'prodi'=>$request->prodi,
            'angkatan'=>$request->angkatan,
            'mitra_perusahaan'=>$request->perusahaan,
            'bidang_mitra'=>$request->bidang,
            'alamat_mitra'=>$request->alamat,
            'kontak_perusahaan'=>$request->kontak,
            'bukti_diterima'=>$path
        ]);
        return redirect('/data-prakerin');
    }

    public function destroy($id)
    {
        Prakerin::where('id',$id)->delete();
        return redirect('/data-prakerin')->with('success', 'Data absensi berhasil dihapus');
    }
}
