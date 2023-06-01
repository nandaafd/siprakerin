<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use App\Models\PembimbingLapangan;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class NilaiController extends Controller
{

    public function index()
    {
        // if (Gate::allows('siswa')) {
        //     $siswa = Auth::user()->siswa->first();
        //     $nilais = Nilai::where('siswa_id', $siswa->id)->paginate(10);
        // }
        // elseif (Gate::allows('pembimbing-lapangan') || Gate::allows('guru')) {
        //     $nilais = Nilai::paginate(10);
        // }
        // else {
        //     return view('dashboard.nilai.index')->with('messageWarning', 'Maaf, anda tidak memiliki akses untuk melihat nilai');
        // }
        $nilais = Nilai::paginate(10);
        return view('dashboard.nilai.index', ['nilais' => $nilais]);
    }

    public function create()
    {
        $pembimbing_lapangan = Auth::user()->pembimbingLapangan->first();

        // if (!$pembimbing_lapangan) {
        //     return redirect('/nilai')->with('messageWarning', 'Maaf, anda bukan pembimbing lapangan');
        // }
        
        // $siswas = Siswa::where('pembimbing_lapangan_id', $pembimbing_lapangan->id)->get();
        // if ($siswas->isEmpty()) {
        //     return redirect('/nilai')->with('messageWarning', 'Maaf, anda tidak memiliki mahasiswa bimbingan');
        // }
        $pembimbing_lapangan = PembimbingLapangan::all();
        $siswas = Siswa::all();
        return view('dashboard.nilai.create', [
            'siswas' => $siswas,
            'pembimbing_lapangan' => $pembimbing_lapangan
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'siswa' => 'required',
            'pembimbing'=> 'required',
            'nilai_rata_rata' => 'required|numeric|min:0|max:100',
            'nilai_huruf'=> 'required',
        ]);

        $nilai = new Nilai;
        $nilai->siswa_id = $request->siswa;
        $nilai->pembimbing_lapangan_id = $request->pembimbing;
        $nilai->nilai_rata_rata = $request->nilai_rata_rata;
        $nilai->nilai_huruf = $request->nilai_huruf;
        $nilai->save();

        return redirect()->route('nilai.index')->with('success', 'Data nilai berhasil disimpan');
    }

    public function show(Nilai $nilai)
    {
        //
    }

    public function edit($id)
    {
        $pembimbing_lapangan = PembimbingLapangan::all();
        $siswas = Siswa::all();
        $nilais = Nilai::where('id',$id)->get();
        // return $nilais;
        return view('dashboard.nilai.edit', [
            'siswas' => $siswas,
            'nilais'=>$nilais,
            'pembimbing_lapangan' => $pembimbing_lapangan
        ]);
    }

    public function update(Request $request,$id)
    {
        $validatedData = $request->validate([
            'siswa' => 'required',
            'pembimbing'=> 'required',
            'nilai_rata_rata' => 'required|numeric|min:0|max:100',
            'nilai_huruf'=> 'required',
        ]);
        Nilai::where('id',$id)->update([
            'siswa_id'=>$request->siswa,
            'pembimbing_lapangan_id'=>$request->pembimbing,
            'nilai_rata_rata'=>$request->nilai_rata_rata,
            'nilai_huruf'=>$request->nilai_huruf,
        ]);
        return redirect('/nilai');
    }

    public function destroy($id)
    {
        Nilai::where('id',$id)->delete();
        return redirect('/nilai')->with('success', 'Data nilai berhasil dihapus');
    }
}
