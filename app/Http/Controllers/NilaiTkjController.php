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
        ]);
        if ($request->teknis == null) {
            $disiplin = intval($request->disiplin);
            $kerjasama = intval($request->kerjasama);
            $tanggungjawab = intval($request->tanggungjawab);
            $inisiatif = intval($request->inisiatif);
            $kebersihan = intval($request->kebersihan);
            $keberhasilan = intval($request->keberhasilan);
            $teknis_1 = intval($request->angka_teknis_1);
            $teknis_2 = intval($request->angka_teknis_2);
            $teknis_3 = intval($request->angka_teknis_3);
            $teknis_4 = intval($request->angka_teknis_4);
            $average = ($disiplin + $kerjasama + $tanggungjawab + $inisiatif + $kebersihan + $keberhasilan + $teknis_1 + $teknis_2 + $teknis_3 + $teknis_4) / 10; 
        }else {
            $disiplin = intval($request->disiplin);
            $kerjasama = intval($request->kerjasama);
            $tanggungjawab = intval($request->tanggungjawab);
            $inisiatif = intval($request->inisiatif);
            $kebersihan = intval($request->kebersihan);
            $keberhasilan = intval($request->keberhasilan);
            $teknis_1 = intval($request->angka_teknis_1);
            $teknis_2 = intval($request->angka_teknis_2);
            $teknis_3 = intval($request->angka_teknis_3);
            $teknis_4 = intval($request->angka_teknis_4);
            $angka = intval($request->angka_teknis);
            $average = ($disiplin + $kerjasama + $tanggungjawab + $inisiatif + $kebersihan + $keberhasilan + $teknis_1 + $teknis_2 + $teknis_3 + $teknis_4 + $angka) / 11;   
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
        $nilai_teknis_1 = $request->teknis_1 . ' : ' .$request->angka_teknis_1;
        $nilai_teknis_2 = $request->teknis_2 . ' : ' .$request->angka_teknis_2;
        $nilai_teknis_3 = $request->teknis_3 . ' : ' .$request->angka_teknis_3;
        $nilai_teknis_4 = $request->teknis_4 . ' : ' .$request->angka_teknis_4;
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
            'teknis_1'=>$nilai_teknis_1,
            'teknis_2'=>$nilai_teknis_2,
            'teknis_3'=>$nilai_teknis_3,
            'teknis_4'=>$nilai_teknis_4,
            'rata_rata'=>$average,
            'teknis_5'=>$nilai_teknis,
            'nilai_huruf'=>$grade
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
        ]);
        if ($request->teknis == null) {
            $disiplin = intval($request->disiplin);
            $kerjasama = intval($request->kerjasama);
            $tanggungjawab = intval($request->tanggungjawab);
            $inisiatif = intval($request->inisiatif);
            $kebersihan = intval($request->kebersihan);
            $keberhasilan = intval($request->keberhasilan);
            $teknis_1 = intval($request->angka_teknis_1);
            $teknis_2 = intval($request->angka_teknis_2);
            $teknis_3 = intval($request->angka_teknis_3);
            $teknis_4 = intval($request->angka_teknis_4);
            $average = ($disiplin + $kerjasama + $tanggungjawab + $inisiatif + $kebersihan + $keberhasilan + $teknis_1 + $teknis_2 + $teknis_3 + $teknis_4) / 10; 
        }else {
            $disiplin = intval($request->disiplin);
            $kerjasama = intval($request->kerjasama);
            $tanggungjawab = intval($request->tanggungjawab);
            $inisiatif = intval($request->inisiatif);
            $kebersihan = intval($request->kebersihan);
            $keberhasilan = intval($request->keberhasilan);
            $teknis_1 = intval($request->angka_teknis_1);
            $teknis_2 = intval($request->angka_teknis_2);
            $teknis_3 = intval($request->angka_teknis_3);
            $teknis_4 = intval($request->angka_teknis_4);
            $angka = intval($request->angka_teknis);
            $average = ($disiplin + $kerjasama + $tanggungjawab + $inisiatif + $kebersihan + $keberhasilan + $teknis_1 + $teknis_2 + $teknis_3 + $teknis_4 + $angka) / 11;   
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
        $nilai_teknis_1 = $request->teknis_1 . ' : ' .$request->angka_teknis_1;
        $nilai_teknis_2 = $request->teknis_2 . ' : ' .$request->angka_teknis_2;
        $nilai_teknis_3 = $request->teknis_3 . ' : ' .$request->angka_teknis_3;
        $nilai_teknis_4 = $request->teknis_4 . ' : ' .$request->angka_teknis_4;
        NilaiTkj::where('id',$id)->update([
            'prodi'=>$request->prodi,
            'mitra'=>$request->mitra,
            'disiplin'=>$request->disiplin,
            'kerjasama'=>$request->kerjasama,
            'tanggungjawab'=>$request->tanggungjawab,
            'inisiatif'=>$request->inisiatif,
            'kebersihan'=>$request->kebersihan,
            'keberhasilan'=>$request->keberhasilan,
            'teknis_1'=>$nilai_teknis_1,
            'teknis_2'=>$nilai_teknis_2,
            'teknis_3'=>$nilai_teknis_3,
            'teknis_4'=>$nilai_teknis_4,
            'rata_rata'=>$average,
            'teknis_5'=>$nilai_teknis,
            'nilai_huruf'=>$grade
        ]);
        return redirect('/nilai-tkj');
    }

    public function destroy($id)
    {
        NilaiTkj::where('id',$id)->delete();
        return redirect('/nilai-tkj');
    }
}
