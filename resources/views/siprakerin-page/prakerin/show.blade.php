@extends('layouts.page')
@section('content')
<div class="row">
    <div class="col" id="prakerin-header">
        <div class="row">
            <div class="col-9">
              <h2 style="font-weight: 600;">Mulai <span style="color:#FF6B00;"> Mimpi Dan Petualanganmu </span> 
                Dengan Mendaftar Prakerin Sekarang Juga!</h2>
              <h4>Jangan sampai terlambat ya..</h4>
            </div>
            <div class="col-3">
              <img id="vector1" class="img-fluid" src="{{asset('images/vector1.png')}}" alt="" srcset="">
            </div>
          </div>
    </div>
</div>
<div class="row">
<div class="col" id="prakerin-page">

    @if (Auth::user()->role->name == 'siswa')
        @if (in_array(Auth::user()->siswa[0]['kelas_id'], [2,5,8]))
            @if ($prakerin == null)
                <h4 class="badge-danger mx-auto text-center">Anda tidak memiliki atau mengunggah file bukti diterima prakerin</h4> 
            @else
                <h4>Bukti diterima :</h4>
                <img src="{{asset('storage/'. $prakerin)}}" alt="" class="img img-fluid">    
            @endif 
        @else
            <h2>Maaf Anda Tidak Dapat Mengisi Formulir Karena Bukan Siswa Kelas 11</h2>
        @endif
    @else
        <h1>Maaf Anda Tidak Dapat Mengakses Halaman Ini</h1>
    @endif
    
    </div>
</div>
@endsection