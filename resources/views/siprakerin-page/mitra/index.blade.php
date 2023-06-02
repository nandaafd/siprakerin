@extends('layouts.page')
@section('content')
<div class="row">
    <div class="col" id="prakerin-header">
        <div class="row">
          <div class="col-9">
            <h2 style="font-weight: 600;">SMKS Ihyaul Ulum Dukun Gresik Mencetak SDM Yang <span style="color:#FF6B00;">Unggul </span>
              Dan <span style="color:#FF6B00;">Berkualitas</span>, Salah Satunya Dengan Cara Bekerja Sama Dengan Mitra Dunia Usaha Dunia Industri!</h2>
            <h4>Wah, Hebat Sekali Ya SMK Kita..</h4>
          </div>
          <div class="col-3">
            <img id="vector1" class="img-fluid" src="{{asset('images/vector5.jpg')}}" alt="" srcset="">
          </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col" id="prakerin-page">
      <h3>Mitra-Mitra SMKS Ihyaul Ulum Dukun Gresik</h3>
      <div class="container text-center">
        <div class="row">
          @foreach ($mitra as $data)
          <div class="col-3 my-3" id="mitra-card">
            <div id="content-mitra" class="row text-center mx-auto">
                <img src="{{asset('storage/'. $data->foto_mitra)}}" alt="" id="foto-mitra" class="mx-auto img-fluid">
                <h5 class="my-3" id="nama-mitra">{{$data->nama_mitra}}</h5>
                <ul>
                  <li>Alamat : {{$data->alamat}}</li>
                  <li>Bidang : {{$data->bidang}}</li>
                  <li>Kuota Siswa : {{$data->kuota}}</li>
                </ul>
              </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
</div>
@endsection