<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{

    public function index()
    {
        $status = Status::all();
        return view('dashboard.status.index',compact('status'));
    }

    public function create()
    {
        return view('dashboard.status.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'pendaftaran'=>'required',
            'penilaian'=>'required',
            'logbook'=>'required',
            'absensi'=>'required',
            'laporan'=>'required',
        ]);
        Status::create([
            'pendaftaran'=>$request->pendaftaran,
            'penilaian'=>$request->penilaian,
            'logbook'=>$request->logbook,
            'absensi'=>$request->absensi,
            'laporan'=>$request->laporan,
        ]);
        return redirect('/status');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $status = Status::where('id',$id)->get();
        return view('dashboard.status.edit',compact('status'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'pendaftaran'=>'required',
            'penilaian'=>'required',
            'logbook'=>'required',
            'absensi'=>'required',
            'laporan'=>'required',
        ]);
        Status::where('id',$id)->update([
            'pendaftaran'=>$request->pendaftaran,
            'penilaian'=>$request->penilaian,
            'logbook'=>$request->logbook,
            'absensi'=>$request->absensi,
            'laporan'=>$request->laporan,
        ]);
        return redirect('/status');
    }

    public function destroy($id)
    {
        Status::where('id',$id)->delete();
        return redirect('/status');
    }
}
