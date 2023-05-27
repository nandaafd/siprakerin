<?php

namespace App\Http\Controllers\siprakerin;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Models\Kelas;
use App\Models\PembimbingLapangan;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfilController extends Controller
{

    public function index($id)
    {
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
        
        $guru = Guru::where('user_id',$id)->get();
        $pl = PembimbingLapangan::where('user_id',$id)->get();
        $siswa = Siswa::where('user_id',$id)->get();
        return view('siprakerin-page.profile.profile',compact('siswa','guru','pl'));
    }

    public function edit($id)
    {
        $guru = Guru::where('user_id',$id)->get();
        $pembimbing = PembimbingLapangan::all();
        $kelas = Kelas::all();
        $pl = PembimbingLapangan::where('user_id',$id)->get();
        $siswa = Siswa::where('user_id',$id)->get();
        return view('siprakerin-page.profile.edit',compact('siswa','guru','pl','pembimbing','kelas'));
    }


    public function update(Request $request, $id)
    {
        if ($request->has('pembimbing_lapangan_form')) {
            $old_image = $request->oldImage;
            $validatedData = $request->validate([
                'nama_lengkap'=>'required',
                'nama_panggilan'=>'required',
                'asal_perusahaan'=>'required',
                'no_telpon'=>'required',
                'email'=>'required',
                'foto_profil'=>'image|file|max:2048'
            ]);
            if ($request->hasFile('foto_profil')) {
                if ($request->oldImage) {
                    Storage::delete($request->oldImage);
                }
                $path = $request->file('foto_profil')->store('foto-profil');
            }else{
                $path = $old_image;
            }
            User::where('id',$request->user_id)->update([
                'fullname'=>$request->nama_lengkap,
                'nickname'=>$request->nama_panggilan,
                'email'=>$request->email,
            ]);
            PembimbingLapangan::where('id',$id)->update([
                'asal_perusahaan'=>$request->asal_perusahaan,
                'no_telpon'=>$request->no_telpon,
                'foto_profil'=>$path
            ]); 
        }elseif ($request->has('siswa_form')) {
            $old_image = $request->oldImage;
            $validatedData = $request->validate([
            'nama_lengkap'=>'required',
            'nama_panggilan'=>'required',
            'kelas'=>'required',
            'nisn'=>'required',
            'alamat'=>'required',
            'email'=>'required',
            'no_telpon'=>'required',
            'foto_profil'=>'image|file|max:2048'
            ]);
            if ($request->hasFile('foto_profil')) {
                if ($request->oldImage) {
                    Storage::delete($request->oldImage);
                }
                $path = $request->file('foto_profil')->store('foto-profil');
            }else{
                $path = $old_image;
            }
            User::where('id',$request->user_id)->update([
                'fullname'=>$request->nama_lengkap,
                'nickname'=>$request->nama_panggilan,
                'email'=>$request->email,
            ]);
            Siswa::where('id',$request->id)->update([
                'nisn'=>$request->nisn,
                'alamat'=>$request->alamat,
                'kelas_id'=>$request->kelas,
                'no_telpon'=>$request->no_telpon,
                'pembimbing_lapangan_id'=>$request->pembimbing_lapangan,
                'foto_profil'=>$path
            ]);
        }elseif ($request->has('guru_form')) {
            $old_image = $request->oldImage;
            $validatedData = $request->validate([
                'nama_lengkap'=>'required',
                'nama_panggilan'=>'required',
                'nip'=>'required',
                'no_telpon'=>'required',
                'email'=>'required',
                'foto_profil'=>'image|file|max:2048'
            ]);
            if ($request->hasFile('foto_profil')) {
                if ($request->oldImage) {
                    Storage::delete($request->oldImage);
                }
                $path = $request->file('foto_profil')->store('foto-profil');
            }else{
                $path = $old_image;
            }
            User::where('id',$request->user_id)->update([
                'fullname'=>$request->nama_lengkap,
                'nickname'=>$request->nama_panggilan,
                'email'=>$request->email,
            ]);
            Guru::where('id',$id)->update([
                'nip_niy'=>$request->nip,
                'no_telpon'=>$request->no_telpon,
                'foto_profil'=>$path
            ]);
        }
        return redirect()->route('profil.show',$request->user_id)->with('success','Data Berhasil Diedit!');
    }

    public function destroy($id)
    {
        //
    }
}
