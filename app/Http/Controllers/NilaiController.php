<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class NilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::allows('siswa')) {
            $siswa = Auth::user()->siswa->first();
            $nilais = Nilai::where('siswa_id', $siswa->id)->paginate(10);
        }
        elseif (Gate::allows('pembimbing-lapangan') || Gate::allows('guru')) {
            $nilais = Nilai::paginate(10);
        }
        else {
            return view('dashboard.nilai.index')->with('messageWarning', 'Maaf, anda tidak memiliki akses untuk melihat nilai');
        }
        return view('dashboard.nilai.index', ['nilais' => $nilais]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pembimbing_lapangan = Auth::user()->pembimbingLapangan->first();

        if (!$pembimbing_lapangan) {
            return redirect('/nilai')->with('messageWarning', 'Maaf, anda bukan pembimbing lapangan');
        }
        
        $siswas = Siswa::where('pembimbing_lapangan_id', $pembimbing_lapangan->id)->get();
        if ($siswas->isEmpty()) {
            return redirect('/nilai')->with('messageWarning', 'Maaf, anda tidak memiliki mahasiswa bimbingan');
        }

        return view('dashboard.nilai.create', [
            'siswas' => $siswas,
            'pl' => $pembimbing_lapangan->id
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'siswa' => 'required',
            'nilai_A' => 'required|numeric|min:0|max:100',
            'nilai_B' => 'required|numeric|min:0|max:100',
            'nilai_C' => 'required|numeric|min:0|max:100',
        ]);

        $nilai = new Nilai;
        $nilai->siswa_id = $request->siswa;
        $nilai->pembimbing_lapangan_id = $request->pembimbing_lapangan;
        $nilai->nilai_A = $request->nilai_A;
        $nilai->nilai_B = $request->nilai_B;
        $nilai->nilai_C = $request->nilai_C;
        $nilai->save();

        return redirect()->route('nilai.index')->with('success', 'Data nilai berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function show(Nilai $nilai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function edit(Nilai $nilai)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Nilai $nilai)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nilai $nilai)
    {
        $nilai->delete();
        return redirect('/nilai')->with('success', 'Data nilai berhasil dihapus');
    }
}
