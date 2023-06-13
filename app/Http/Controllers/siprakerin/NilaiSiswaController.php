<?php

namespace App\Http\Controllers\siprakerin;

use App\Http\Controllers\Controller;
use App\Models\Nilai;
use App\Models\NilaiPbs;
use App\Models\NilaiTkj;
use App\Models\NilaiTkro;
use App\Models\PembimbingLapangan;
use App\Models\Siswa;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class NilaiSiswaController extends Controller
{

    public function index(Request $request)
    {
        $status = Status::get()->value('penilaian');
        $filter = $request->filter;
        $id = Auth::user()->id;
        $pl_siswa = Siswa::where('user_id',$id)->value('pembimbing_lapangan_id');
        if (Gate::allows('siswa')) {
            if ($pl_siswa == null) {
                return view('siprakerin-page.nilai.error');
            }else{
                $siswa = Auth::user()->siswa->first();
                $nilai_tkj = NilaiTkj::where('siswa_id',$siswa->id)->get();
                $nilai_tkr = NilaiTkro::where('siswa_id',$siswa->id)->get();
                $nilai_pbs = NilaiPbs::where('siswa_id',$siswa->id)->get();
                $nilai = $nilai_tkj->concat($nilai_tkr)->concat($nilai_pbs);
            }
        }
        elseif (Gate::allows('pembimbing-lapangan')) {
            $id = Auth::user()->id;
            $pl = PembimbingLapangan::where('user_id',$id)->value('id');
            $sis = Siswa::where('pembimbing_lapangan_id',$pl)->get(['id']); 
            $nilai_tkj = NilaiTkj::whereIn('siswa_id',$sis)->get();
            $nilai_tkr = NilaiTkro::whereIn('siswa_id',$sis)->get();
            $nilai_pbs = NilaiPbs::whereIn('siswa_id',$sis)->get();
            $nilai = $nilai_tkj->concat($nilai_tkr)->concat($nilai_pbs);
        }
        elseif (Gate::allows('guru')) {
            if ($filter) {
                $nilai_tkj = NilaiTkj::where('prodi',$filter)->get();
                $nilai_tkr = NilaiTkro::where('prodi',$filter)->get();
                $nilai_pbs = NilaiPbs::where('prodi',$filter)->get();
                $nilai = $nilai_tkj->concat($nilai_tkr)->concat($nilai_pbs);
            } else {
                $nilai_tkj = NilaiTkj::all();
                $nilai_tkr = NilaiTkro::all();
                $nilai_pbs = NilaiPbs::all();
                $nilai = $nilai_tkj->concat($nilai_tkr)->concat($nilai_pbs);
            }
            
        }
        else {
            return view('siprakerin-page.nilai.index')->with('messageWarning', 'Maaf, anda tidak memiliki akses untuk melihat nilai');
        }
        return view('siprakerin-page.nilai.index', compact('nilai','status','filter'));
    }

    public function create()
    {
        $pembimbing_lapangan = Auth::user()->pembimbingLapangan->first();
        $id = Auth::user()->id;
        if (!$pembimbing_lapangan) {
            return redirect('/nilai-siswa')->with('messageWarning', 'Maaf, anda bukan pembimbing lapangan');
        }
        $pl = PembimbingLapangan::where('user_id',$id)->value('id');
        $siswa = Siswa::where('pembimbing_lapangan_id',$pl)->get(); ;
        $tkj = $siswa->where('kelas_id','2');
        $pbs = $siswa->where('kelas_id','5');
        $tkr = $siswa->where('kelas_id','8');
        return view('siprakerin-page.nilai.create',compact('siswa','tkj','tkr','pbs'));
    }

    public function store(Request $request)
    {
        if ($request->has('tkj')) {
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
        }elseif ($request->has('pbs')) {
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
        }elseif ($request->has('tkr')) {
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
        }

        return redirect('/nilai-siswa')->with('success', 'Data nilai berhasil disimpan');
    }

    public function show($id)
    {
            $status = Status::get()->value('penilaian');
            $nilai_tkj = NilaiTkj::where('siswa_id',$id)->get();
            $nilai_tkr = NilaiTkro::where('siswa_id',$id)->get();
            $nilai_pbs = NilaiPbs::where('siswa_id',$id)->get();
            $nilai = $nilai_tkj->concat($nilai_tkr)->concat($nilai_pbs);
            $prodi = $nilai_tkj->concat($nilai_tkr)->concat($nilai_pbs)->value('prodi');
            // return view('siprakerin-page.nilai.show',compact('nilai','prodi','nilai_tkj','nilai_tkr','nilai_pbs','status'));
        
        // return $nilai;
        return view('siprakerin-page.nilai.show',compact('nilai','prodi','nilai_tkj','nilai_tkr','nilai_pbs','status'));
    }

    public function edit($id)
    {
            $status = Status::get()->value('penilaian');
            $nilai_tkj = NilaiTkj::where('siswa_id',$id)->get();
            $nilai_tkr = NilaiTkro::where('siswa_id',$id)->get();
            $nilai_pbs = NilaiPbs::where('siswa_id',$id)->get();
            $nilai = $nilai_tkj->concat($nilai_tkr)->concat($nilai_pbs);
            $prodi = $nilai_tkj->concat($nilai_tkr)->concat($nilai_pbs)->value('prodi');
            // return view('siprakerin-page.nilai.show',compact('nilai','prodi','nilai_tkj','nilai_tkr','nilai_pbs','status'));
        
        // return $nilai;
        return view('siprakerin-page.nilai.edit',compact('nilai','prodi','nilai_tkj','nilai_tkr','nilai_pbs','status'));
    }

    public function update(Request $request, $id)
    {
        if ($request->has('tkj')) {
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
        }elseif ($request->has('tkr')) {
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
        }elseif ($request->has('pbs')) {
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
        }
        return redirect('/nilai-siswa');
    }

    public function destroy($id)
    {
        Nilai::where('id',$id)->delete();
        return redirect('/nilai-siswa')->with('success', 'Data nilai berhasil dihapus');
    }
}
