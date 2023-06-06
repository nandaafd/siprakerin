<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{

    public function index()
    {
        $kelas = Kelas::all();
        return view('dashboard.kelas.index',compact('kelas'));
    }

    public function create()
    {
        return view('dashboard.kelas.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama'=>'required',
        ]);
        Kelas::create([
            'nama_kelas'=>$request->nama
        ]);
        return redirect('/kelas');
    }

    public function show(Kelas $kelas)
    {
        
    }

    public function edit($id)
    {
        $kelas = Kelas::where('id',$id)->get();
        return view('dashboard.kelas.edit',compact('kelas'));
    }


    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama'=>'required',
        ]);
        Kelas::where('id',$id)->update([
            'nama_kelas'=>$request->nama
        ]);
        return redirect('/kelas');
    }

    public function destroy($id)
    {
        Kelas::where('id',$id)->delete();
        return redirect('/kelas');
    }
}
