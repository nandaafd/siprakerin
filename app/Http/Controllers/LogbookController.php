<?php

namespace App\Http\Controllers;

use App\Models\Logbook;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class LogbookController extends Controller
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
            return view('dashboard.logbook.index')->with('messageWarning', 'Maaf, anda tidak memiliki akses untuk melihat logbook');
        }
        return view('dashboard.logbook.index', ['logbooks' => $logbooks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $siswa = Auth::user()->siswa->first();

        return view('dashboard.logbook.create', [
            'siswa' => $siswa->id,
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Logbook  $logbook
     * @return \Illuminate\Http\Response
     */
    public function show(Logbook $logbook)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Logbook  $logbook
     * @return \Illuminate\Http\Response
     */
    public function edit(Logbook $logbook)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Logbook  $logbook
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Logbook $logbook)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Logbook  $logbook
     * @return \Illuminate\Http\Response
     */
    public function destroy(Logbook $logbook)
    {
        $logbook->delete();
        return redirect('/logbook')->with('success', 'Data logbook berhasil dihapus');
    }
}
