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
        ]);
        if ($request->teknis == null) {
            $disiplin = intval($request->disiplin);
            $kerjasama = intval($request->kerjasama);
            $tanggungjawab = intval($request->tanggungjawab);
            $inisiatif = intval($request->inisiatif);
            $kebersihan = intval($request->kebersihan);
            $keberhasilan = intval($request->keberhasilan);
            $engine = intval($request->engine);
            $chasis = intval($request->chasis);
            $kelistrikan = intval($request->kelistrikan);
            $kkk = intval($request->kkk);
            $average = ($disiplin + $kerjasama + $tanggungjawab + $inisiatif + $kebersihan + $keberhasilan + $engine + $chasis + $kelistrikan + $kkk) / 10; 
        }else {
            $disiplin = intval($request->disiplin);
            $kerjasama = intval($request->kerjasama);
            $tanggungjawab = intval($request->tanggungjawab);
            $inisiatif = intval($request->inisiatif);
            $kebersihan = intval($request->kebersihan);
            $keberhasilan = intval($request->keberhasilan);
            $engine = intval($request->engine);
            $chasis = intval($request->chasis);
            $kelistrikan = intval($request->kelistrikan);
            $kkk = intval($request->kkk);
            $angka = intval($request->angka_teknis);
            $average = ($disiplin + $kerjasama + $tanggungjawab + $inisiatif + $kebersihan + $keberhasilan + $engine + $chasis + $kelistrikan + $kkk + $angka) / 11;   
        }
        $average = number_format($average, 1);
        $grade = '';
        if ($average >= 90) {
            $grade = 'A';
        } elseif ($average >= 80) {
            $grade = 'B';
        } elseif ($average >= 70) {
            $grade = 'C';
        } else {
            $grade = 'D';
        }

        if ($request->teknis == null) {
            $nilai_teknis = null;
        }else {
            $nilai_teknis = $request->teknis . ' : ' .$request->angka_teknis;
        }
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
            'rata_rata'=>$average,
            'teknis'=>$nilai_teknis,
            'nilai_huruf'=>$grade
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
        ]);
        if ($request->teknis == null) {
            $disiplin = intval($request->disiplin);
            $kerjasama = intval($request->kerjasama);
            $tanggungjawab = intval($request->tanggungjawab);
            $inisiatif = intval($request->inisiatif);
            $kebersihan = intval($request->kebersihan);
            $keberhasilan = intval($request->keberhasilan);
            $engine = intval($request->engine);
            $chasis = intval($request->chasis);
            $kelistrikan = intval($request->kelistrikan);
            $kkk = intval($request->kkk);
            $average = ($disiplin + $kerjasama + $tanggungjawab + $inisiatif + $kebersihan + $keberhasilan + $engine + $chasis + $kelistrikan + $kkk) / 10; 
        }else {
            $disiplin = intval($request->disiplin);
            $kerjasama = intval($request->kerjasama);
            $tanggungjawab = intval($request->tanggungjawab);
            $inisiatif = intval($request->inisiatif);
            $kebersihan = intval($request->kebersihan);
            $keberhasilan = intval($request->keberhasilan);
            $engine = intval($request->engine);
            $chasis = intval($request->chasis);
            $kelistrikan = intval($request->kelistrikan);
            $kkk = intval($request->kkk);
            $angka = intval($request->angka_teknis);
            $average = ($disiplin + $kerjasama + $tanggungjawab + $inisiatif + $kebersihan + $keberhasilan + $engine + $chasis + $kelistrikan + $kkk + $angka) / 11;   
        }
        $average = number_format($average, 1);
        $grade = '';
        if ($average >= 90) {
            $grade = 'A';
        } elseif ($average >= 80) {
            $grade = 'B';
        } elseif ($average >= 70) {
            $grade = 'C';
        } else {
            $grade = 'D';
        }
        
        if ($request->teknis == null) {
            $nilai_teknis = null;
        }else {
            $nilai_teknis = $request->teknis . ' : ' .$request->angka_teknis;
        }
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
            'rata_rata'=>$average,
            'teknis'=>$nilai_teknis,
            'nilai_huruf'=>$grade
        ]);
        return redirect('/nilai-tkro');
    }

    public function destroy($id)
    {
        NilaiTkro::where('id',$id)->delete();
        return redirect('/nilai-tkro');
    }
}
