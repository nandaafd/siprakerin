<?php

namespace App\Http\Controllers;

use App\Models\Prakerin;
use Illuminate\Http\Request;

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
        ]);
        Prakerin::create([
            'nama'=>$request->nama,
            'prodi'=>$request->prodi,
            'angkatan'=>$request->angkatan,
            'mitra_perusahaan'=>$request->perusahaan,
            'bidang_mitra'=>$request->bidang,
            'alamat_mitra'=>$request->alamat,
            'kontak_perusahaan'=>$request->kontak,
        ]);
        return redirect('/data-prakerin');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $prakerin = Prakerin::where('id',$id)->get();
        return view('dashboard.prakerin.edit',compact('prakerin'));
    }

    public function update(Request $request)
    {
        Prakerin::where('id',$request->id)->update([
            'nama'=>$request->nama,
            'prodi'=>$request->prodi,
            'angkatan'=>$request->angkatan,
            'mitra_perusahaan'=>$request->perusahaan,
            'bidang_mitra'=>$request->bidang,
            'alamat_mitra'=>$request->alamat,
            'kontak_perusahaan'=>$request->kontak,
        ]);
        return redirect('/data-prakerin');
    }

    public function destroy($id)
    {
        Prakerin::where('id',$id)->delete();
        return redirect('/data-prakerin')->with('success', 'Data absensi berhasil dihapus');
    }
}
