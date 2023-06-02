@extends('layouts.page')
@section('content')
<div class="row">
    <div class="col" id="prakerin-header">
        <div class="row">
          <div class="col-9">
            <h2 style="font-weight: 600;">Disini Anda Dapat Membaca <span style="color:#FF6B00;">Berita</span> & <span style="color:#FF6B00;">Informasi</span> Seputar SMK Ihyaul Ulum Dukun Gresik
                Dengan Aktual, Tajam, Dan Terpercaya Lho!!</h2>
            <h4>Yuk, Baca Sekarang..</h4>
          </div>
          <div class="col-3">
            <img id="vector1" class="img-fluid" src="{{asset('images/vector6.jpg')}}" alt="" srcset="">
          </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col" id="prakerin-page">
        <h3 class="my-4">Berita Dan Informasi</h3>
        <div class="container text-center">
            <div class="row">
                @forelse ($berita as $data)
                <div class="col mt-3">
                    <div class="card" style="width: 18rem;" id="card-berita">
                        @if ($data->gambar == null)
                        <img src="{{asset('images/berita.jpg')}}" class="card-img-top img-fluid" id="gambar-berita" alt="...">
                        @else
                        <img src="{{asset('storage/'. $data->gambar)}}" class="card-img-top img-fluid" id="gambar-berita" alt="...">
                        @endif
                        <div class="card-body">
                          <h5 class="card-title" id="judul-berita">{{$data->judul}}</h5>
                          <p class="card-text">Terbit : {{$data->tanggal_terbit}}</p>
                          <a href="{{route('berita.show',$data->id)}}" class="btn btn-primary" id="btn-baca">Baca sekarang</a>
                        </div>
                    </div>
                </div>
                @empty   
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection