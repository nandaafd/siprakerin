<?php

namespace App\Http\Controllers\siprakerin;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\Laporan;
use App\Models\Siswa;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class LaporanController extends Controller
{

    public function index(Request $request)
    {
        $user_id = Auth::user()->id;
        $kls_filter = $request->kls_filter;
        $kelas = Kelas::all();
        $pl_siswa = Siswa::where('user_id',$user_id)->value('pembimbing_lapangan_id');
        $status = Status::get()->value('laporan');
        if (Gate::allows('siswa')) {
           if ($pl_siswa == null) {
            return view('siprakerin-page.laporan.error');
           }else {
            $query = Laporan::query(); 
            $laporan = Laporan::where('user_id',$user_id)->value('user_id');
           
            if ($kls_filter) {
                $query->where('kelas',$kls_filter);
            }
            $laporan_akhir = $query->orderBy('created_at','desc')->paginate(10);
            return view('siprakerin-page.laporan.index',compact('kelas','laporan','laporan_akhir','status','pl_siswa'));
           } 
        }else {
            $query = Laporan::query(); 
            $laporan = Laporan::where('user_id',$user_id)->value('user_id');
           
            if ($kls_filter) {
                $query->where('kelas',$kls_filter);
            }
            $laporan_akhir = $query->orderBy('created_at','desc')->paginate(10);
            return view('siprakerin-page.laporan.index',compact('kelas','laporan','laporan_akhir','status','pl_siswa'));
        }
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
            'kelas'=>'required',
            'file'=>'max:2048'
        ]);
        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('laporan_akhir');
        }else{
            $path = '';
        }
        Laporan::create([
            'nama'=>$request->nama,
            'kelas'=>$request->kelas,
            'user_id'=>$user_id,
            'file'=>$path
        ]);
        return redirect('/laporan-akhir')->with('success','berkas laporan berhasil diupload');
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
