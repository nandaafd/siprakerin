<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Laporan;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LaporanController extends Controller
{

    public function index()
    {
        $status = Status::get()->value('laporan');
        $laporan = Laporan::orderBy('created_at','desc')->paginate(10);
        return view('dashboard.laporan.index',compact('laporan','status'));
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
        $kelas = Kelas::all();
        $laporan = Laporan::where('id',$id)->get();
        return view('dashboard.laporan.edit',compact('laporan','kelas'));
    }

    public function update(Request $request, $id)
    {
        $oldPath =$request->oldPath;
        $validatedData = $request->validate([
            'nama'=>'required',
            'kelas'=>'required',
        ]);
        if ($request->hasFile('file')) {
            if ($oldPath) {
                Storage::delete($oldPath);
            }
            $path = $request->file('file')->store('laporan_akhir');
        }else{
            $path = $oldPath;
        }
        Laporan::where('id',$id)->update([
            'nama'=>$request->nama,
            'kelas'=>$request->kelas,
            'file'=>$oldPath
        ]);
        return redirect('/data-laporan');
    }

    public function destroy($id)
    {
        Laporan::where('id',$id)->delete();
        return redirect('/data-laporan')->with('success', 'Data berhasil dihapus');
    }
}
