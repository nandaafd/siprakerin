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
        ]);
        if ($request->teknis == null) {
            $disiplin = intval($request->disiplin);
            $kerjasama = intval($request->kerjasama);
            $tanggungjawab = intval($request->tanggungjawab);
            $inisiatif = intval($request->inisiatif);
            $kebersihan = intval($request->kebersihan);
            $keberhasilan = intval($request->keberhasilan);
            $marketing = intval($request->marketing);
            $cs = intval($request->cs);
            $teller = intval($request->teller);
            $administrasi = intval($request->administrasi);
            $average = ($disiplin + $kerjasama + $tanggungjawab + $inisiatif + $kebersihan + $keberhasilan + $marketing + $cs + $teller + $administrasi) / 10; 
        }else {
            $disiplin = intval($request->disiplin);
            $kerjasama = intval($request->kerjasama);
            $tanggungjawab = intval($request->tanggungjawab);
            $inisiatif = intval($request->inisiatif);
            $kebersihan = intval($request->kebersihan);
            $keberhasilan = intval($request->keberhasilan);
            $marketing = intval($request->marketing);
            $cs = intval($request->cs);
            $teller = intval($request->teller);
            $administrasi = intval($request->administrasi);
            $angka = intval($request->angka_teknis);
            $average = ($disiplin + $kerjasama + $tanggungjawab + $inisiatif + $kebersihan + $keberhasilan + $marketing + $cs + $teller + $administrasi + $angka) / 11;   
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
            'rata_rata'=>$average,
            'teknis'=>$nilai_teknis,
            'nilai_huruf'=>$grade
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
        ]);
        if ($request->teknis == null) {
            $disiplin = intval($request->disiplin);
            $kerjasama = intval($request->kerjasama);
            $tanggungjawab = intval($request->tanggungjawab);
            $inisiatif = intval($request->inisiatif);
            $kebersihan = intval($request->kebersihan);
            $keberhasilan = intval($request->keberhasilan);
            $marketing = intval($request->marketing);
            $cs = intval($request->cs);
            $teller = intval($request->teller);
            $administrasi = intval($request->administrasi);
            $average = ($disiplin + $kerjasama + $tanggungjawab + $inisiatif + $kebersihan + $keberhasilan + $marketing + $cs + $teller + $administrasi) / 10; 
        }else {
            $disiplin = intval($request->disiplin);
            $kerjasama = intval($request->kerjasama);
            $tanggungjawab = intval($request->tanggungjawab);
            $inisiatif = intval($request->inisiatif);
            $kebersihan = intval($request->kebersihan);
            $keberhasilan = intval($request->keberhasilan);
            $marketing = intval($request->marketing);
            $cs = intval($request->cs);
            $teller = intval($request->teller);
            $administrasi = intval($request->administrasi);
            $angka = intval($request->angka_teknis);
            $average = ($disiplin + $kerjasama + $tanggungjawab + $inisiatif + $kebersihan + $keberhasilan + $marketing + $cs + $teller + $administrasi + $angka) / 11;   
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
            'rata_rata'=>$average,
            'teknis'=>$nilai_teknis,
            'nilai_huruf'=>$grade
        ]);
        return redirect('/nilai-pbs');
    }

    public function destroy($id)
    {
        NilaiPbs::where('id',$id)->delete();
        return redirect('/nilai-pbs');
    }
}
