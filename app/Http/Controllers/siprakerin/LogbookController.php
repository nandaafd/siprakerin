<?php

namespace App\Http\Controllers\siprakerin;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Access\GateServiceProvider;
use App\Models\Logbook;
use App\Models\Siswa;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        else {
            return view('siprakerin-page.logbook.index')->with('messageWarning', 'Maaf, anda tidak memiliki akses untuk melihat logbook');
        }
        return view('siprakerin-page.logbook.index',compact('logbooks'));
    }

    public function create()
    {
        $siswa = Auth::user()->siswa->first();

        return view('siprakerin-page.logbook.create', [
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

        return redirect('/logbooks')->with('success', 'Data logbook berhasil disimpan');
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
