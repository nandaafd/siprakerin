<?php

namespace App\Http\Controllers;

use App\Models\Berkas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BerkasController extends Controller
{

    public function index()
    {
        $berkas = Berkas::paginate(10);
        return view('dashboard.berkas.index',compact('berkas'));
    }

    public function create()
    {
        return view('dashboard.berkas.create');
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama'=>'required',
            'berkas'=>'required'
        ]);
        if ($request->hasFile('berkas')) {
            $path = $request->file('berkas')->store('berkas');
        }else{
            $path = null;
        }
        Berkas::create([
            'nama'=>$request->nama,
            'link'=>$path
        ]);
        return redirect('/berkas');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $berkas = Berkas::where('id',$id)->get();
        return view('dashboard.berkas.edit',compact('berkas'));
    }

    public function update(Request $request, $id)
    {
        $oldPath =$request->oldPath;
        $validatedData = $request->validate([
            'nama'=>'required',
        ]);
        if ($request->hasFile('berkas')) {
            if ($request->oldImage) {
                Storage::delete($request->oldPath);
            }
            $path = $request->file('berkas')->store('berkas');
        }else{
            $path = $oldPath;
        }
        Berkas::where('id',$id)->update([
            'nama'=>$request->nama,
            'link'=>$oldPath
        ]);
        return redirect('/berkas');
    }

    public function destroy($id)
    {
        Berkas::where('id',$id)->delete();
        return redirect('/berkas')->with('success', 'Data berhasil dihapus');
    }
}
