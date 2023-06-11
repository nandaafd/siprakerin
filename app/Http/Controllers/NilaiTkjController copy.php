<?php

namespace App\Http\Controllers;

use App\Models\NilaiTkj;
use App\Models\Siswa;
use Illuminate\Http\Request;

class NilaiTkjController extends Controller
{

    public function index()
    {
        $nilai = NilaiTkj::all();
        return view('dashboard.nilai-tkj.index',compact('nilai'));
    }

    public function create()
    {
        $siswa = Siswa::all();
        return view('dashboard.nilai-tkj.create',compact('siswa'));
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
            'teknis_1'=>'required',
            'teknis_2'=>'required',
            'teknis_3'=>'required',
            'teknis_4'=>'required',
            'rata'=>'required',
        ]);
        NilaiTkj::create([
            'siswa_id'=>$request->siswa,
            'prodi'=>$request->prodi,
            'mitra'=>$request->mitra,
            'disiplin'=>$request->disiplin,
            'kerjasama'=>$request->kerjasama,
            'tanggungjawab'=>$request->tanggungjawab,
            'inisiatif'=>$request->inisiatif,
            'kebersihan'=>$request->kebersihan,
            'keberhasilan'=>$request->keberhasilan,
            'teknis_1'=>$request->teknis_1,
            'teknis_2'=>$request->teknis_2,
            'teknis_3'=>$request->teknis_3,
            'teknis_4'=>$request->teknis_4,
            'rata_rata'=>$request->rata,
            'teknis_5'=>$request->teknis_5,
        ]);
        return redirect('/nilai-tkj');
    }

    public function show($id)
    {
        $nilai = NilaiTkj::where('id',$id)->get();
        return view('dashboard.nilai-tkj.show',compact('nilai'));
    }

    public function edit($id)
    {
        $nilai = NilaiTkj::where('id',$id)->get();
        return view('dashboard.nilai-tkj.edit',compact('nilai'));
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
            'teknis_1'=>'required',
            'teknis_2'=>'required',
            'teknis_3'=>'required',
            'teknis_4'=>'required',
            'rata'=>'required',
        ]);
        NilaiTkj::where('id',$id)->update([
            'prodi'=>$request->prodi,
            'mitra'=>$request->mitra,
            'disiplin'=>$request->disiplin,
            'kerjasama'=>$request->kerjasama,
            'tanggungjawab'=>$request->tanggungjawab,
            'inisiatif'=>$request->inisiatif,
            'kebersihan'=>$request->kebersihan,
            'keberhasilan'=>$request->keberhasilan,
            'teknis_1'=>$request->teknis_1,
            'teknis_2'=>$request->teknis_2,
            'teknis_3'=>$request->teknis_3,
            'teknis_4'=>$request->teknis_4,
            'rata_rata'=>$request->rata,
            'teknis_5'=>$request->teknis_5,
        ]);
        return redirect('/nilai-tkro');
    }

    public function destroy($id)
    {
        NilaiTkj::where('id',$id)->delete();
        return redirect('/nilai-tkj');
    }
}
