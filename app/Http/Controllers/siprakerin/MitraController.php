<?php

namespace App\Http\Controllers\siprakerin;

use App\Http\Controllers\Controller;
use App\Models\Mitra;
use Illuminate\Http\Request;

class MitraController extends Controller
{

    public function index()
    {
        $mitra = Mitra::all();
        return view('siprakerin-page.mitra.index',compact('mitra'));
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
