<?php

namespace App\Http\Controllers;

use App\Models\Prakerin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $user_id = Auth::user()->id;
        $validatedData = $request->validate([
            'nama'=>'required',
            'prodi'=>'required',
            'angkatan'=>'required',
            'tahun_ajaran'=>'required',
            'tanggal_mulai'=>'required',
            'tanggal_selesai'=>'required',
            'perusahaan'=>'required',
            'bidang'=>'required',
            'alamat'=>'required',
            'kontak'=>'required',
            'surat'=>'max:2048',
            'bukti'=>'max:2048'
        ]);
        if ($request->hasFile('surat')) {
            $path_surat = $request->file('surat')->store('surat_permohonan');
        }else{
            $path_surat = '';
        }
        if ($request->hasFile('bukti')) {
            $path_bukti = $request->file('bukti')->store('bukti_surat_balasan');
        }else{
            $path_bukti = '';
        }
        Prakerin::create([
            'nama'=>$request->nama,
            'prodi'=>$request->prodi,
            'angkatan'=>$request->angkatan,
            'tahun_ajaran'=>$request->tahun_ajaran,
            'tanggal_mulai'=>$request->tanggal_mulai,
            'tanggal_selesai'=>$request->tanggal_selesai,
            'mitra_perusahaan'=>$request->perusahaan,
            'bidang_mitra'=>$request->bidang,
            'alamat_mitra'=>$request->alamat,
            'kontak_perusahaan'=>$request->kontak,
            'surat_permohonan'=>$path_surat,
            'bukti_diterima'=>$path_bukti,
        ]);
        return redirect('/data-prakerin');
    }

    public function show($id)
    {
        $prakerin = Prakerin::where('id',$id)->get();
        return view('dashboard.prakerin.show', compact('prakerin'));
    }

    public function edit($id)
    {
        $prakerin = Prakerin::where('id',$id)->get();
        return view('dashboard.prakerin.edit',compact('prakerin'));
    }

    public function update(Request $request)
    {
        $old_surat = $request->oldSurat;
        $old_bukti = $request->oldBukti;
        $validatedData = $request->validate([
            'nama'=>'required',
            'prodi'=>'required',
            'angkatan'=>'required',
            'tahun_ajaran'=>'required',
            'tanggal_mulai'=>'required',
            'tanggal_selesai'=>'required',
            'perusahaan'=>'required',
            'bidang'=>'required',
            'alamat'=>'required',
            'kontak'=>'required',
            'surat'=>'max:2048',
            'bukti'=>'max:2048'
        ]);
        if ($request->hasFile('surat')) {
            if ($request->oldSurat) {
                Storage::delete($request->oldSurat);
            }
            $path_surat = $request->file('surat')->store('surat_permohonan');
        }else{
            $path_surat = $old_surat;
        }
        if ($request->hasFile('bukti')) {
            if ($request->oldBukti) {
                Storage::delete($request->oldBukti);
            }
            $path_bukti = $request->file('bukti')->store('bukti_surat_balasan');
        }else{
            $path_bukti = $old_bukti;
        }
        Prakerin::where('id',$request->id)->update([
            'nama'=>$request->nama,
            'prodi'=>$request->prodi,
            'angkatan'=>$request->angkatan,
            'tahun_ajaran'=>$request->tahun_ajaran,
            'tanggal_mulai'=>$request->tanggal_mulai,
            'tanggal_selesai'=>$request->tanggal_selesai,
            'mitra_perusahaan'=>$request->perusahaan,
            'bidang_mitra'=>$request->bidang,
            'alamat_mitra'=>$request->alamat,
            'kontak_perusahaan'=>$request->kontak,
            'surat_permohonan'=>$path_surat,
            'bukti_diterima'=>$path_bukti,
        ]);
        return redirect('/data-prakerin');
    }

    public function destroy($id)
    {
        Prakerin::where('id',$id)->delete();
        return redirect('/data-prakerin')->with('success', 'Data absensi berhasil dihapus');
    }
}
