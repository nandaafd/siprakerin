<?php

namespace App\Http\Controllers;

use App\Models\NilaiTkro;
use App\Models\Siswa;
use Illuminate\Http\Request;

class NilaiTkroController extends Controller
{

    public function index()
    {
        $nilai = NilaiTkro::all();
        return view('dashboard.nilai-tkro.index',compact('nilai'));
    }

    public function create()
    {
        $siswa = Siswa::all();
        return view('dashboard.nilai-tkro.create',compact('siswa'));
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
            'engine'=>'required',
            'chasis'=>'required',
            'kelistrikan'=>'required',
            'kkk'=>'required',
            'rata'=>'required',
        ]);
        NilaiTkro::create([
            'siswa_id'=>$request->siswa,
            'prodi'=>$request->prodi,
            'mitra'=>$request->mitra,
            'disiplin'=>$request->disiplin,
            'kerjasama'=>$request->kerjasama,
            'tanggungjawab'=>$request->tanggungjawab,
            'inisiatif'=>$request->inisiatif,
            'kebersihan'=>$request->kebersihan,
            'keberhasilan'=>$request->keberhasilan,
            'perawatan_engine'=>$request->engine,
            'perawatan_chasis'=>$request->chasis,
            'perawatan_kelistrikan'=>$request->kelistrikan,
            'kkk'=>$request->kkk,
            'rata_rata'=>$request->rata,
            'teknis'=>$request->teknis,
        ]);
        return redirect('/nilai-tkro');
    }

    public function show($id)
    {
        $nilai = NilaiTkro::where('id',$id)->get();
        return view('dashboard.nilai-tkro.show',compact('nilai'));
    }

    public function edit($id)
    {
        $nilai = NilaiTkro::where('id',$id)->get();
        return view('dashboard.nilai-tkro.edit',compact('nilai'));
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
            'engine'=>'required',
            'chasis'=>'required',
            'kelistrikan'=>'required',
            'kkk'=>'required',
            'rata'=>'required',
        ]);
        NilaiTkro::where('id',$id)->update([
            'prodi'=>$request->prodi,
            'mitra'=>$request->mitra,
            'disiplin'=>$request->disiplin,
            'kerjasama'=>$request->kerjasama,
            'tanggungjawab'=>$request->tanggungjawab,
            'inisiatif'=>$request->inisiatif,
            'kebersihan'=>$request->kebersihan,
            'keberhasilan'=>$request->keberhasilan,
            'perawatan_engine'=>$request->engine,
            'perawatan_chasis'=>$request->chasis,
            'perawatan_kelistrikan'=>$request->kelistrikan,
            'kkk'=>$request->kkk,
            'rata_rata'=>$request->rata,
            'teknis'=>$request->teknis,
        ]);
        return redirect('/nilai-tkro');
    }

    public function destroy($id)
    {
        NilaiTkro::where('id',$id)->delete();
        return redirect('/nilai-tkro');
    }
}
