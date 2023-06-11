<?php

namespace App\Http\Controllers\siprakerin;

use App\Http\Controllers\Controller;
use App\Models\Nilai;
use App\Models\PembimbingLapangan;
use App\Models\Siswa;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class NilaiSiswaController extends Controller
{

    public function index()
    {
        $status = Status::get()->value('penilaian');
        if (Gate::allows('siswa')) {
            $siswa = Auth::user()->siswa->first();
            $nilais = Nilai::where('siswa_id', $siswa->id)->paginate(10);
        }
        elseif (Gate::allows('pembimbing-lapangan')) {
            $id = Auth::user()->id;
            $nilais = Nilai::where('pembimbing_lapangan_id',$id)->paginate(10);
        }
        elseif (Gate::allows('guru')) {
            $nilais = Nilai::paginate(10);
        }
        else {
            return view('siprakerin-page.nilai.index')->with('messageWarning', 'Maaf, anda tidak memiliki akses untuk melihat nilai');
        }
        return view('siprakerin-page.nilai.index', compact('nilais','status'));
    }

    public function create()
    {
        $pembimbing_lapangan = Auth::user()->pembimbingLapangan->first();

        if (!$pembimbing_lapangan) {
            return redirect('/nilai-siswa')->with('messageWarning', 'Maaf, anda bukan pembimbing lapangan');
        }
        
        $siswas = Siswa::where('pembimbing_lapangan_id', $pembimbing_lapangan->id)->get();
        if ($siswas->isEmpty()) {
            return redirect('/nilai-siswa')->with('messageWarning', 'Maaf, anda tidak memiliki mahasiswa bimbingan');
        }
        return view('siprakerin-page.nilai.create', [
            'siswas' => $siswas,
            'pembimbing_lapangan' => $pembimbing_lapangan
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'siswa' => 'required',
            'nilai_rata_rata' => 'required|numeric|min:0|max:100',
            'nilai_huruf'=> 'required',
        ]);

        $nilai = new Nilai;
        $nilai->siswa_id = $request->siswa;
        $nilai->pembimbing_lapangan_id = $request->pembimbing_lapangan;
        $nilai->nilai_rata_rata = $request->nilai_rata_rata;
        $nilai->nilai_huruf = $request->nilai_huruf;
        $nilai->save();

        return redirect('/nilai-siswa')->with('success', 'Data nilai berhasil disimpan');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $status = Status::get()->value('penilaian');
        $pembimbing_lapangan = PembimbingLapangan::all();
        $siswas = Siswa::all();
        $nilais = Nilai::where('id',$id)->get();
        // return $nilais;
        return view('siprakerin-page.nilai.edit', [
            'siswas' => $siswas,
            'nilais'=>$nilais,
            'status'=>$status,
            'pembimbing_lapangan' => $pembimbing_lapangan
        ]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nilai_rata_rata' => 'required|numeric|min:0|max:100',
            'nilai_huruf'=> 'required',
        ]);
        Nilai::where('id',$id)->update([
            'nilai_rata_rata'=>$request->nilai_rata_rata,
            'nilai_huruf'=>$request->nilai_huruf,
        ]);
        return redirect('/nilai-siswa');
    }

    public function destroy($id)
    {
        Nilai::where('id',$id)->delete();
        return redirect('/nilai-siswa')->with('success', 'Data nilai berhasil dihapus');
    }
}
