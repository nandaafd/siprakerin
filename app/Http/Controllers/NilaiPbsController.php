<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use App\Models\NilaiPbs;
use App\Models\Siswa;
use Illuminate\Http\Request;

class NilaiPbsController extends Controller
{

    public function index()
    {
        $nilai = NilaiPbs::all();
        return view('dashboard.nilai-pbs.index',compact('nilai'));
    }

    public function create()
    {
        $siswa = Siswa::all();
        return view('dashboard.nilai-pbs.create',compact('siswa'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'siswa'=>'required',
            'prodi'=>'required',
            'mitra'=>'required',
            'disiplin'=>'required',
            'kerjasama'=>'required',
            'tanggungjawab'=>'required',
            'inisiatif'=>'required',
            'kebersihan'=>'required',
            'keberhasilan'=>'required',
            'marketing'=>'required',
            'cs'=>'required',
            'teller'=>'required',
            'administrasi'=>'required',
            'rata'=>'required',
        ]);
        NilaiPbs::create([
            'siswa_id'=>$request->siswa,
            'prodi'=>$request->prodi,
            'mitra'=>$request->mitra,
            'disiplin'=>$request->disiplin,
            'kerjasama'=>$request->kerjasama,
            'tanggungjawab'=>$request->tanggungjawab,
            'inisiatif'=>$request->inisiatif,
            'kebersihan'=>$request->kebersihan,
            'keberhasilan'=>$request->keberhasilan,
            'marketing'=>$request->marketing,
            'cs'=>$request->cs,
            'teller'=>$request->teller,
            'administrasi'=>$request->administrasi,
            'rata_rata'=>$request->rata,
            'teknis'=>$request->teknis,
        ]);
        return redirect('/nilai-pbs');
    }

    public function show($id)
    {
        $nilai = NilaiPbs::where('id',$id)->get();
        return view('dashboard.nilai-pbs.show',compact('nilai'));
    }

    public function edit($id)
    {
        $nilai = NilaiPbs::where('id',$id)->get();
        return view('dashboard.nilai-pbs.edit',compact('nilai'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'prodi'=>'required',
            'mitra'=>'required',
            'disiplin'=>'required',
            'kerjasama'=>'required',
            'tanggungjawab'=>'required',
            'inisiatif'=>'required',
            'kebersihan'=>'required',
            'keberhasilan'=>'required',
            'marketing'=>'required',
            'cs'=>'required',
            'teller'=>'required',
            'administrasi'=>'required',
            'rata'=>'required',
        ]);
        NilaiPbs::where('id',$id)->update([
            'prodi'=>$request->prodi,
            'mitra'=>$request->mitra,
            'disiplin'=>$request->disiplin,
            'kerjasama'=>$request->kerjasama,
            'tanggungjawab'=>$request->tanggungjawab,
            'inisiatif'=>$request->inisiatif,
            'kebersihan'=>$request->kebersihan,
            'keberhasilan'=>$request->keberhasilan,
            'marketing'=>$request->marketing,
            'cs'=>$request->cs,
            'teller'=>$request->teller,
            'administrasi'=>$request->administrasi,
            'rata_rata'=>$request->rata,
            'teknis'=>$request->teknis,
        ]);
        return redirect('/nilai-pbs');
    }

    public function destroy($id)
    {
        NilaiPbs::where('id',$id)->delete();
        return redirect('/nilai-pbs');
    }
}
