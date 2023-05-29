<?php

namespace App\Http\Controllers\siprakerin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Absensi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreAbsensiRequest;
use App\Http\Requests\UpdateAbsensiRequest;

class AbsensiSiswaController extends Controller
{

    public function index()
    {
        if (Gate::allows('pembimbing-lapangan')) {
            $pembimbing_lapangan = Auth::user()->pembimbingLapangan->first();
            if (!$pembimbing_lapangan) {
                return view('siprakerin-page.absensi.index')->with('messageWarning', 'Maaf, anda bukan pembimbing lapangan');
            }
            $siswas = Siswa::where('pembimbing_lapangan_id', $pembimbing_lapangan->id)->get();
            if ($siswas->isEmpty()) {
                return view('siprakerin-page.absensi.index')->with('message', 'Maaf, anda tidak memiliki mahasiswa bimbingan');
            }
            $absensis = Absensi::where('pembimbing_lapangan_id', $pembimbing_lapangan->id)->paginate(7);
            return view('siprakerin-page.absensi.index', ['absensis' => $absensis]);
        } else {
            $absensis = Absensi::paginate(10);
            return view('siprakerin-page.absensi.index', ['absensis' => $absensis]);
        }
    }

    public function create()
    {
        $pembimbing_lapangan = Auth::user()->pembimbingLapangan->first();

        if (!$pembimbing_lapangan) {
            return redirect('/absensi-siswa')->with('messageWarning', 'Maaf, anda bukan pembimbing lapangan');
        }
        
        $siswas = Siswa::where('pembimbing_lapangan_id', $pembimbing_lapangan->id)->get();
        if ($siswas->isEmpty()) {
            return redirect('/absensi-siswa')->with('messageWarning', 'Maaf, anda tidak memiliki mahasiswa bimbingan');
        }

        return view('siprakerin-page.absensi.create', [
            'siswas' => $siswas,
            'pl' => $pembimbing_lapangan->id
        ]);
    }

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

        return redirect('/absensi-siswa')->with('success', 'Data absensi berhasil disimpan');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
