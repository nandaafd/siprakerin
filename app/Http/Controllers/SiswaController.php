<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {   
        $siswa = Siswa::all();
        return view('dashboard.siswa.x-tkj' ,compact('siswa'));
        $kelas = Kelas::all();

    }

    public function create()
    {
        return view('dashboard.siswa.create');
    }

    public function store(Request $request, Siswa $siswa)
    {
        $password = $request->password;
        $date = date('Y-m-d');
        // $validatedData = $request->validate([
        //     'nama'=>'required',
        //     'nisn'=>'required',
        //     'alamat'=>'required',
        //     'no_telpon'=>'required',
        //     'pembimbing_lapangan'=>'required',
        // ]);
        $user = User::create([
            'fullname'=>$request->nama_lengkap,
            'nickname'=>$request->nama_panggilan,
            'fullname'=>$request->nama_lengkap,
            'email'=>$request->email,
            'email_verified_at'=>$date,
            'password'=>bcrypt($password),
            'role_id'=>$request->role
            
        ])->id;
        $siswas = $siswa->create([
            'user_id'=>$user,
            'kelas_id'=>$request->kelas,
            'nisn'=>$request->nisn,
            'no_telpon'=>$request->no_telpon,
            'alamat'=>$request->alamat,
            'pembimbing_lapangan_id'=>$request->pembimbing_lapangan,
        ]);
        return redirect('/x-tkj');
    }

    public function show(Siswa $siswa)
    {
        //
    }

    public function edit(Siswa $siswa,$id)
    {
        $siswa = Siswa::where('id',$id)->get();
        return view('dashboard.siswa.edit',compact('siswa'));
    }

    public function update(Request $request)
    {
        User::where('id',$request->user_id)->update([
            'fullname'=>$request->nama,
        ]);
        Siswa::where('id',$request->id)->update([
            'nisn'=>$request->nisn,
            'alamat'=>$request->alamat,
            'no_telpon'=>$request->no_telpon,
            'pembimbing_lapangan_id'=>$request->pembimbing_lapangan,
        ]);
        return redirect('/x-tkj');
    }

    public function destroy($id)
    {
        Siswa::where('id',$id)->delete();
        return redirect('/x-tkj')->with('success', 'Data absensi berhasil dihapus');
    }
}
