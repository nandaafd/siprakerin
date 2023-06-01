<?php

namespace App\Http\Controllers;

use App\Models\Logbook;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class LogbookController extends Controller
{

    public function index()
    {
        if (Gate::allows('siswa')) {
            $siswa = Auth::user()->siswa->first();
            $logbooks = Logbook::where('siswa_id', $siswa->id)->paginate(10);
        }
        elseif (Gate::allows('pembimbing-lapangan')) {
            $pembimbing_lapangan = Auth::user()->pembimbingLapangan->first();
            $siswa_ids = Siswa::where('pembimbing_lapangan_id', $pembimbing_lapangan->id)->pluck('id');
            $logbooks = Logbook::whereIn('siswa_id', $siswa_ids)->paginate(10);
        }
        elseif (Gate::allows('guru')) {
            $logbooks = Logbook::paginate(10);
        }
        elseif (Gate::allows('admin')) {
            $logbooks = Logbook::orderBy('tanggal','desc')->paginate(10);
        }
        else {
            return view('dashboard.logbook.index')->with('messageWarning', 'Maaf, anda tidak memiliki akses untuk melihat logbook');
        }
        return view('dashboard.logbook.index', ['logbooks' => $logbooks]);
    }

    public function create()
    {
        $siswa = Auth::user()->siswa->first();

        return view('dashboard.logbook.create', [
            'siswa' => $siswa->id,
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'siswa_id' => 'required',
            'impresi' => 'required',
            'catatan_kegiatan' => 'required',
            'tanggal' => 'required'
        ]);

        $logbook = new Logbook();
        $logbook->siswa_id = $request->siswa_id;
        $logbook->impresi = $request->impresi;
        $logbook->catatan_kegiatan = $request->catatan_kegiatan;
        $logbook->tanggal = $request->tanggal;
        $logbook->save();

        return redirect('/logbook')->with('success', 'Data logbook berhasil disimpan');
    }

    public function show(Logbook $logbook)
    {
        //
    }

    public function edit($id)
    {
        $logbooks = Logbook::where('id',$id)->get();
        return view('dashboard.logbook.edit', [
            'logbooks' => $logbooks,
        ]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'siswa_id' => 'required',
            'impresi' => 'required',
            'catatan_kegiatan' => 'required',
            'tanggal' => 'required'
        ]);
        Logbook::where('id',$id)->update([
            'siswa_id'=>$request->siswa_id,
            'impresi'=>$request->impresi,
            'catatan_kegiatan'=>$request->catatan_kegiatan,
            'tanggal'=>$request->tanggal,
        ]);
        return redirect('/logbook');
    }

    public function destroy(Logbook $logbook)
    {
        $logbook->delete();
        return redirect('/logbook')->with('success', 'Data logbook berhasil dihapus');
    }
}
