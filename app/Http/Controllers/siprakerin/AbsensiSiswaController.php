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
use App\Models\PembimbingLapangan;
use App\Models\Status;

class AbsensiSiswaController extends Controller
{

    public function index(Request $request)
    {
        $tanggal = $request->tanggal;
        $ket = $request->ket;
        $status = Status::get()->value('absensi');
        $pl = PembimbingLapangan::all();
        $pemb = $request->pl;
        if (Gate::allows('pembimbing-lapangan')) {
            $pembimbing_lapangan = Auth::user()->pembimbingLapangan->first();
            if (!$pembimbing_lapangan) {
                return view('siprakerin-page.absensi.index')->with('messageWarning', 'Maaf, anda bukan pembimbing lapangan');
            }
            $siswas = Siswa::where('pembimbing_lapangan_id', $pembimbing_lapangan->id)->get();
            if ($siswas->isEmpty()) {
                return view('siprakerin-page.absensi.index')->with('message', 'Maaf, anda tidak memiliki siswa');
            }
            $query = Absensi::query();
            if ($tanggal) {
                $query->where('tanggal',$tanggal);
            }
            if ($ket) {
                $query->where('ket_kehadiran',$ket);
            }
            $absensis = $query->where('pembimbing_lapangan_id', $pembimbing_lapangan->id)->orderBy('tanggal','desc')->paginate(7);
            return view('siprakerin-page.absensi.index', compact('absensis','pl'));
        } elseif (Gate::allows('siswa')) {
            $query = Absensi::query();
            $siswa_id = Auth::user()->siswa[0]['id'];
            if ($tanggal) {
                $query->where('tanggal',$tanggal);
            }
            if ($ket) {
                $query->where('ket_kehadiran',$ket);
            }
            $absen_siswa = $query->where('siswa_id',$siswa_id)->orderBy('tanggal','desc')->paginate(10);
            return view('siprakerin-page.absensi.index',  compact('absen_siswa','pl','status'));
        }else {
            $query = Absensi::query();
            if ($tanggal) {
                $query->where('tanggal',$tanggal);
            }
            if ($pemb) {
                $query->where('pembimbing_lapangan_id',$pemb);
            }
            if ($ket) {
                $query->where('ket_kehadiran',$ket);
            }
            $absensis = $query->orderBy('tanggal','desc')->paginate(10);
            return view('siprakerin-page.absensi.index', compact('absensis','pl','status'));
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
