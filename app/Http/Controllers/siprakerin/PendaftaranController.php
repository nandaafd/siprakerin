<?php

namespace App\Http\Controllers\siprakerin;

use App\Http\Controllers\Controller;
use App\Models\Prakerin;
use App\Models\Siswa;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PendaftaranController extends Controller
{

    public function index()
    {
        $status = Status::get()->value('pendaftaran');
        $user_id = Auth::user()->id;
        $prakerin = Prakerin::where('user_id',$user_id)->get();
        $surat = Prakerin::where('user_id',$user_id)->value('surat_permohonan');
        $bukti = Prakerin::where('user_id',$user_id)->value('bukti_diterima');
        return view('siprakerin-page.prakerin.index',compact('prakerin','status','bukti','surat'));
    }

    public function create()
    {
        //
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
        ]);
        if ($request->hasFile('bukti')) {
            $path = $request->file('bukti')->store('bukti_surat_balasan');
        }else{
            $path = '';
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
            'user_id'=>$user_id
        ]);
        return redirect('/daftar-prakerin');
    }

    public function show($id)
    {
        $prakerin = Prakerin::where('id',$id)->get();
        $user_id = Auth::user()->id;
        $surat = Prakerin::where('user_id',$user_id)->value('surat_permohonan');
        $bukti = Prakerin::where('user_id',$user_id)->value('bukti_diterima');
        return view('siprakerin-page.prakerin.show', compact('prakerin','surat','bukti'));
    }

    public function edit($id)
    {
        $prakerin = Prakerin::where('id',$id)->get();
        return view('siprakerin-page.prakerin.edit',compact('prakerin'));
    }

    public function update(Request $request, $id)
    {
        $old_image = $request->oldImage;
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
            'bukti'=>'max:2048'
        ]);
        if ($request->hasFile('bukti')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $path = $request->file('bukti')->store('bukti_surat_balasan');
        }else{
            $path = $old_image;
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
            'bukti_diterima'=>$path,
            'user_id'=>$user_id
        ]);
        return redirect('/daftar-prakerin');
    }

    public function destroy($id)
    {
        Prakerin::where('id',$id)->delete();
        return redirect('/daftar-prakerin')->with('success', 'Data absensi berhasil dihapus');
    }
}
