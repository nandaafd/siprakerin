<?php

namespace App\Http\Controllers\siprakerin;

use App\Http\Controllers\Controller;
use App\Models\Berkas;
use Illuminate\Http\Request;

class DownloadController extends Controller
{

    public function index()
    {
        $berkas = Berkas::all();
        return view('siprakerin-page.download.index',compact('berkas'));
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
