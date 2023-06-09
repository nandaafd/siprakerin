<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LaporanController extends Controller
{

    public function index()
    {
        $laporan = Laporan::orderBy('created_at','desc')->paginate(10);
        return view('dashboard.laporan.index',compact('laporan'));
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
        //
    }

    public function edit($id)
    {
        $laporan = Laporan::where('id',$id)->get();
        return view('dashboard.laporan.edit',compact('laporan'));
    }

    public function update(Request $request, $id)
    {
        $oldPath =$request->oldPath;
        $validatedData = $request->validate([
            'nama'=>'required',
        ]);
        if ($request->hasFile('file')) {
            if ($request->oldImage) {
                Storage::delete($request->oldPath);
            }
            $path = $request->file('file')->store('laporan_akhir');
        }else{
            $path = $oldPath;
        }
        Laporan::where('id',$id)->update([
            'nama'=>$request->nama,
            'link'=>$oldPath
        ]);
    }

    public function destroy($id)
    {
        Laporan::where('id',$id)->delete();
        return redirect('/data-laporan')->with('success', 'Data berhasil dihapus');
    }
}
