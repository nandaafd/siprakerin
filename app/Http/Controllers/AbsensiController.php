<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Absensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreAbsensiRequest;
use App\Http\Requests\UpdateAbsensiRequest;

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::allows('pembimbing-lapangan')) {
            $pembimbing_lapangan = Auth::user()->pembimbingLapangan->first();
            if (!$pembimbing_lapangan) {
                return view('dashboard.absensi.index')->with('messageWarning', 'Maaf, anda bukan pembimbing lapangan');
            }
            $siswas = Siswa::where('pembimbing_lapangan_id', $pembimbing_lapangan->id)->get();
            if ($siswas->isEmpty()) {
                return view('dashboard.absensi.index')->with('message', 'Maaf, anda tidak memiliki mahasiswa bimbingan');
            }
            $absensis = Absensi::where('pembimbing_lapangan_id', $pembimbing_lapangan->id)->paginate(7);
            return view('dashboard.absensi.index', ['absensis' => $absensis]);
        } else {
            $absensis = Absensi::paginate(10);
            return view('dashboard.absensi.index', ['absensis' => $absensis]);
        }
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
            return redirect('/absensi')->with('messageWarning', 'Maaf, anda bukan pembimbing lapangan');
        }
        
        $siswas = Siswa::where('pembimbing_lapangan_id', $pembimbing_lapangan->id)->get();
        if ($siswas->isEmpty()) {
            return redirect('/absensi')->with('messageWarning', 'Maaf, anda tidak memiliki mahasiswa bimbingan');
        }

        return view('dashboard.absensi.create', [
            'siswas' => $siswas,
            'pl' => $pembimbing_lapangan->id
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAbsensiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'siswa' => 'required',
            'ket_kehadiran' => 'required',
            'tanggal' => 'required'
        ]);

        $absensi = new Absensi;
        $absensi->siswa_id = $request->siswa;
        $absensi->pembimbing_lapangan_id = $request->pembimbing_lapangan;
        $absensi->ket_kehadiran = $request->ket_kehadiran;
        $absensi->tanggal = $request->tanggal;
        $absensi->save();

        return redirect()->route('absensi.index')->with('success', 'Data absensi berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    public function show(Absensi $absensi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    public function edit(Absensi $absensi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAbsensiRequest  $request
     * @param  \App\Models\Absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Absensi $absensi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Absensi $absensi)
    {
        $absensi->delete();
        return redirect('/absensi')->with('success', 'Data absensi berhasil dihapus');
    }
}
