<?php

namespace App\Http\Controllers\siprakerin;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Access\GateServiceProvider;
use App\Models\Logbook;
use App\Models\Siswa;
use App\Models\Status;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogbookController extends Controller
{

    public function index(Request $request)
    {
        $id = Auth::user()->id;
        $status = Status::get()->value('logbook');
        $tanggal = $request->tanggal;
        $pl_siswa = Siswa::where('user_id',$id)->value('pembimbing_lapangan_id');
        if (Gate::allows('siswa')) {
            if ($pl_siswa == null) {
                return view('siprakerin-page.logbook.error')->with('messageWarning', 'Maaf, anda tidak memiliki akses untuk melihat logbook');
            }else{
                $siswa = Auth::user()->siswa->first();
                $query = Logbook::query();
                if ($tanggal) {
                    $query->where('tanggal',$tanggal);
                }
                $logbooks = $query->where('siswa_id', $siswa->id)->orderBy('tanggal','desc')->paginate(10);
            }
        }
        elseif (Gate::allows('pembimbing-lapangan')) {
            $pembimbing_lapangan = Auth::user()->pembimbingLapangan->first();
            $siswa_ids = Siswa::where('pembimbing_lapangan_id', $pembimbing_lapangan->id)->pluck('id');
            $query = Logbook::query();
            if ($tanggal) {
                $query->where('tanggal',$tanggal);
            }
            $logbooks = $query->whereIn('siswa_id', $siswa_ids)->orderBy('tanggal','desc')->paginate(10);
        }
        elseif (Gate::allows('guru')) {
            $query = Logbook::query();
            if ($tanggal) {
                $query->where('tanggal',$tanggal);
            }
            $logbooks = $query->orderBy('tanggal','desc')->paginate(10);
        }
        else {
            return view('siprakerin-page.logbook.index')->with('messageWarning', 'Maaf, anda tidak memiliki akses untuk melihat logbook');
        }
        return view('siprakerin-page.logbook.index',compact('logbooks','status','tanggal','pl_siswa'));
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
        $tanggal = $request->tanggal;
        $siswa_id = $request->siswa_id;
        $validatedData = $request->validate([
            'siswa_id' => 'required',
            'impresi' => 'required',
            'kegiatan'=>'required',
            'deskripsi_kegiatan' => 'required',
            'tanggal' => 'required'
        ]);
        $exists = Logbook::where('siswa_id',$siswa_id)->where('tanggal',$tanggal)->exists();
        if ($exists) {
            return redirect()->back()->with('error','logbook pada tanggal ini sudah ada');
        }
            $logbook = new Logbook();
            $logbook->siswa_id = $request->siswa_id;
            $logbook->impresi = $request->impresi;
            $logbook->kegiatan = $request->kegiatan;
            $logbook->deskripsi_kegiatan = $request->deskripsi_kegiatan;
            $logbook->tanggal = $request->tanggal;
            $logbook->save();
        

        return redirect('/logbooks')->with('success', 'Data logbook berhasil disimpan');
    }

    public function show($id)
    {
        $logbook = Logbook::where('id',$id)->get();
        return view('siprakerin-page.logbook.show',compact('logbook'));
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
