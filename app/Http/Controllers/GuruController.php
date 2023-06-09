<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GuruController extends Controller
{
 
    public function index(Request $request)
    {
        $guru = Guru::all();
        return view('dashboard.guru.index',compact('guru'));
    }

    public function create()
    {
        return view('dashboard.guru.create');   
    }

    public function store(Request $request)
    {
        $password = $request->password;
        $date = date('Y-m-d');
        $validatedData = $request->validate([
            'nama_lengkap'=>'required',
            'nama_panggilan'=>'required',
            'email'=>'required',
            'password'=>'required',
            'nip'=>'required',
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
        $guru = Guru::create([
            'user_id'=>$user,
            'nip_niy'=>$request->nip,
            'no_telpon'=>$request->no_telpon,
            'foto_profil'=>$path
        ]);
        return redirect('/data-guru');
    }

    public function show($id)
    {
        $guru = Guru::where('id',$id)->get()->value('foto_profil');
        return view('dashboard.guru.show',compact('guru'));
    }

    public function edit($id)
    {
        $guru = Guru::where('id',$id)->get();
        return view('dashboard.guru.edit',compact('guru'));
    }

    public function update(Request $request,$id)
    {
        $old_image = $request->oldImage;
        $validatedData = $request->validate([
            'nama_lengkap'=>'required',
            'nama_panggilan'=>'required',
            'nip'=>'required',
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
        ]);
        Guru::where('id',$id)->update([
            'nip_niy'=>$request->nip,
            'no_telpon'=>$request->no_telpon,
            'foto_profil'=>$path
        ]);
        return redirect('/data-guru');
    }

    public function destroy($id)
    {
        Guru::where('user_id',$id)->delete();
        User::where('id',$id)->delete();
        return redirect('/data-guru')->with('success', 'Data absensi berhasil dihapus');
    }
}
