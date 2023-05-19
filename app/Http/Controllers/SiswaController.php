<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\PembimbingLapangan;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index(Request $request)
    {   
        $filter_kelas = $request->kelas_id;
        $siswa = Siswa::where('kelas_id','like','%'.$filter_kelas.'%')
                        ->get();
        $kelas = Kelas::all();
        $pembimbing = PembimbingLapangan::all();
        return view('dashboard.siswa.index' ,compact('siswa','kelas','filter_kelas'));
    }

    public function create()
    {
        $kelas = Kelas::all();
        $pembimbing = PembimbingLapangan::all();
        return view('dashboard.siswa.create',compact('kelas','pembimbing'));
    }

    public function store(Request $request, Siswa $siswa)
    {
        $password = $request->password;
        $date = date('Y-m-d');
        $validatedData = $request->validate([
            'nama_lengkap'=>'required',
            'nama_panggilan'=>'required',
            'email'=>'required',
            'password'=>'required',
            'kelas'=>'required',
            'nisn'=>'required',
            'alamat'=>'required',
            'no_telpon'=>'required',
        ]);
        $user = User::create([
            'fullname'=>$request->nama_lengkap,
            'nickname'=>$request->nama_panggilan,
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
        return redirect('/siswa');
    }

    public function show(Siswa $siswa)
    {
        //
    }

    public function edit($id)
    {
        $siswa = Siswa::where('id',$id)->get();
        $kelas = Kelas::all();
        $pembimbing = PembimbingLapangan::all();
        return view('dashboard.siswa.edit',compact('siswa','kelas','pembimbing'));
    }

    public function update(Request $request)
    {
        User::where('id',$request->user_id)->update([
            'fullname'=>$request->nama_lengkap,
            'fullname'=>$request->nama_panggilan,
        ]);
        Siswa::where('id',$request->id)->update([
            'nisn'=>$request->nisn,
            'alamat'=>$request->alamat,
            'kelas_id'=>$request->kelas,
            'no_telpon'=>$request->no_telpon,
            'pembimbing_lapangan_id'=>$request->pembimbing_lapangan,
        ]);
        return redirect('/siswa');
    }

    public function destroy($id)
    {
        Siswa::where('user_id',$id)->delete();
        User::where('id',$id)->delete();
        return redirect('/siswa')->with('success', 'Data absensi berhasil dihapus');
    }
}
