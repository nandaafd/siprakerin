<?php

namespace App\Http\Controllers;

use App\Models\PembimbingLapangan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;

class PembimbingLapanganController extends Controller
{

    public function index(Request $request)
    {
        $filter_perusahaan = $request->perusahaan;
        $pembimbing = PembimbingLapangan::where('asal_perusahaan','like','%'.$filter_perusahaan.'%')->get();
        return view('dashboard.pembimbing.index',compact('pembimbing','filter_perusahaan'));
    }

    public function create()
    {
        return view('dashboard.pembimbing.create');
    }

    public function store(Request $request, PembimbingLapangan $pembimbing)
    {
        
        $password = $request->password;
        $date = date('Y-m-d');
        $validatedData = $request->validate([
            'nama_lengkap'=>'required',
            'nama_panggilan'=>'required',
            'email'=>'required',
            'password'=>'required',
            'asal_perusahaan'=>'required',
            'no_telpon'=>'required',
            'foto_profil'=>'image|file|max:2048'
        ]);
        if ($request->hasFile('foto_profil')) {
            $path = $request->file('foto_profil')->store('foto-profil');
        }else{
            $path = null;
        }
        $user = User::create([
            'fullname'=>$request->nama_lengkap,
            'nickname'=>$request->nama_panggilan,
            'email'=>$request->email,
            'email_verified_at'=>$date,
            'password'=>bcrypt($password),
            'role_id'=>$request->role
        ])->id;
        $pl = $pembimbing->create([
            'user_id'=>$user,
            'asal_perusahaan'=>$request->asal_perusahaan,
            'no_telpon'=>$request->no_telpon,
            'foto_profil'=>$path
        ]);
        return redirect('/pembimbing-lapangan');
    }

    public function show($id)
    {
        $pembimbing = PembimbingLapangan::where('id',$id)->get();
        $pl = PembimbingLapangan::where('id',$id)->get()->value('foto_profil');
        return view('dashboard.pembimbing.show',compact('pl','pembimbing'));
    }

    public function edit($id)
    {
        $pembimbing = PembimbingLapangan::where('id',$id)->get();
        return view('dashboard.pembimbing.edit',compact('pembimbing'));
    }


    public function update(Request $request,$id)
    {
        $validatedData = $request->validate([
            'nama_lengkap'=>'required',
            'nama_panggilan'=>'required',
            'asal_perusahaan'=>'required',
            'no_telpon'=>'required',
            'foto_profil'=>'image|file|max:2048'
        ]);
        if ($request->hasFile('foto_profil')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $path = $request->file('foto_profil')->store('foto-profil');
        }else{
            $path = null;
        }
        User::where('id',$request->user_id)->update([
            'fullname'=>$request->nama_lengkap,
            'nickname'=>$request->nama_panggilan,
        ]);
        PembimbingLapangan::where('id',$id)->update([
            'asal_perusahaan'=>$request->asal_perusahaan,
            'no_telpon'=>$request->no_telpon,
            'foto_profil'=>$path
        ]);
        return redirect('pembimbing-lapangan');
    }

    public function destroy($id)
    {   
        PembimbingLapangan::where('user_id',$id)->delete();
        User::where('id',$id)->delete();                     
        return redirect('/pembimbing-lapangan')->with('success', 'Data berhasil dihapus');
    }
}
