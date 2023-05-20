<?php

namespace App\Http\Controllers;

use App\Models\Mitra;
use Illuminate\Http\Request;

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
        ]);
        Mitra::create([
            'nama_mitra'=>$request->nama,
            'alamat'=>$request->alamat,
            'bidang'=>$request->bidang,
            'kuota'=>$request->kuota,
        ]);
        return redirect('/data-mitra');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $mitra = Mitra::where('id',$id)->get();
        return view('dashboard.mitra.edit',compact('mitra'));
    }

    public function update(Request $request, $id)
    {
        Mitra::where('id',$id)->update([
            'nama_mitra'=>$request->nama,
            'alamat'=>$request->alamat,
            'bidang'=>$request->bidang,
            'kuota'=>$request->kuota,
        ]);
        return redirect('data-mitra');
    }


    public function destroy($id)
    {
        Mitra::where('id',$id)->delete();
        return redirect('/data-mitra')->with('success', 'Data berhasil dihapus');
    }
}
