<?php

namespace App\Http\Controllers\siprakerin;

use App\Http\Controllers\Controller;
use App\Models\Prakerin;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    
    public function index(Request $request)
    {
        $angkatan = $request->angkatan;
        $prodi = $request->prodi;
        $query = Prakerin::query();
        if ($angkatan) {
            $query->where('angkatan',$angkatan);
        }
        if ($prodi) {
            $query->where('prodi',$prodi);
        }
        $prakerin = $query->orderBy('created_at','desc')->get();
        return view('siprakerin-page.history.index',compact('prakerin','angkatan','prodi'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
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
