<?php

namespace App\Http\Controllers;

use App\Models\PembimbingLapangan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

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
        ]);
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
        ]);
        return redirect('/pembimbing-lapangan');
    }

    public function show(PembimbingLapangan $pembimbingLapangan)
    {
        //
    }

    public function edit($id)
    {
        $pembimbing = PembimbingLapangan::where('id',$id)->get();
        return view('dashboard.pembimbing.edit',compact('pembimbing'));
    }


    public function update(Request $request)
    {
        User::where('id',$request->user_id)->update([
            'fullname'=>$request->nama_lengkap,
            'nickname'=>$request->nama_panggilan,
        ]);
        PembimbingLapangan::where('id',$request->id)->update([
            'asal_perusahaan'=>$request->asal_perusahaan,
            'no_telpon'=>$request->no_telpon
        ]);
        return redirect('pembimbing-lapangan');
    }

    public function destroy($id)
    {
        PembimbingLapangan::where('id',$id)->delete();
        return redirect('/pembimbing-lapangan')->with('success', 'Data berhasil dihapus');
    }
}
