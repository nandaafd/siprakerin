<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
 
    public function index()
    {
        $kelas = Kelas::all();
        return view('auth.register',compact('kelas'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $password = $request->password;
        $confirm_pass = $request->confirm_password;
        $date = date('Y-m-d');
        if ($request->has('guru')) {
            $validatedData = $request->validate([
                'nama_lengkap'=> 'required',
                'nama_panggilan'=> 'required',
                'nip_niy'=>'required|unique:guru',
                'no_telpon'=>'required',
                'email'=>'required|email|unique:user',
                'password'=>'required|min:8',
                'confirm_password'=>'required|min:8'
            ]);
            if ($password != $confirm_pass) {
                return 'pw gak podo';
            }else {     
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
                    'nip_niy'=>$request->nip_niy,
                    'no_telpon'=>$request->no_telpon,
                    
                ]);
            return redirect('/login');
        }
        }elseif ($request->has('siswa')) {
            $validatedData = $request->validate([
                'nama_lengkap'=> 'required',
                'nama_panggilan'=> 'required',
                'nisn'=>'required|unique:siswa',
                'kelas'=> 'required',
                'alamat'=> 'required',
                'no_telpon'=>'required',
                'email'=>'required|email|unique:user',
                'password'=>'required|min:8',
                'confirm_password'=>'required|min:8'
            ]);
            if ($password != $confirm_pass) {
                return redirect()->back()->with('error','Password tidak sama');
            }else {
                $user = User::create([
                    'fullname'=>$request->nama_lengkap,
                    'nickname'=>$request->nama_panggilan,
                    'email'=>$request->email,
                    'email_verified_at'=>$date,
                    'password'=>bcrypt($password),
                    'role_id'=>$request->role
                    
                ])->id;
                $siswas = Siswa::create([
                    'user_id'=>$user,
                    'kelas_id'=>$request->kelas,
                    'nisn'=>$request->nisn,
                    'no_telpon'=>$request->no_telpon,
                    'alamat'=>$request->alamat,
                ]);
            return redirect('/login');
        }
    }
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }

   
    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
