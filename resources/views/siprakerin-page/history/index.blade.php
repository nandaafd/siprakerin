@extends('layouts.page')
@section('content')
@if (Auth::user()->role->name == 'pembimbing_lapangan')
<div class="row">
    <div class="col text-center mt-5">
      <img src="{{asset('images/closed.png')}}" class="img-fluid" style="max-width: 550px" alt="">
      <h2 style="color:gray;">Oops.. Anda Tidak Diizinkan Mengakses Halaman ini</h2>
    </div>
  </div>
@else

<div class="row">
    <div class="col" id="prakerin-header">
        <div class="row">
          <div class="col-9">
            <h2 style="font-weight: 600;">Disini Anda Dapat Melihat <span style="color:#FF6B00;">Riwayat Prakerin</span> Seluruh Siswa SMK Ihyaul Ulum Dukun Gresik Lho!!</h2>
            <h4>Yuk, Cek Sekarang..</h4>
          </div>
          <div class="col-3">
            <img id="vector1" class="img-fluid" src="{{asset('images/vector6.jpg')}}" alt="" srcset="">
          </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col" id="prakerin-page">
        <div class="row">
            <div class="col-12">
                <form action="" method="get" class="row row-cols-sm-auto g-1 mb-4">
                        <div class="col-sm">
                           <p class="mx-2 my-auto">Filter</p>
                        </div>
                        <div class="col-sm">
                            <select name="prodi" id="" class="form-control form-control-sm">
                                <option value="">Pilih prodi..</option>
                                <option value="TKJ">TKJ</option>
                                <option value="PBS">PBS</option>
                                <option value="TKRO">TKRO</option>
                            </select>
                        </div>
                        <div class="col-sm">
                            <input type="text" name="angkatan" id="" placeholder="Angakatan (tulis angka)" class="form-control form-control-sm">
                        </div>
                        <div class="col-sm">
                            <button type="submit" class="btn btn-primary btn-sm">Search</button>
                            <button type="submit" class="btn btn-secondary btn-sm" id="btn-reset">Reset</button>
                        </div>
                </form>
            </div>
        </div>
      @isset($prakerin)
        <table class="table table-hover">
            @if ($prodi or $angkatan)
                <p>Hasil filter : <span style="color: #FF6B00">{{$prodi}}, {{$angkatan}}</span></p>
            @endif
            <tr>
                <th>No</th>
                    <th>Nama</th>
                    <th>Prodi</th>
                    <th>Angkatan</th>
                    <th>Mitra</th>
                    <th>Bidang Mitra</th>
                    <th>Alamat Mitra</th>
                    <th>Kontak</th>
            </tr>
        @forelse ($prakerin as $data)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{$data->nama}}</td>
                <td>{{$data->prodi}}</td>
                <td>{{$data->angkatan}}</td>
                <td>{{$data->mitra_perusahaan}}</td>
                <td>{{$data->bidang_mitra}}</td>
                <td>{{$data->alamat_mitra}}</td>
                <td>{{$data->kontak_perusahaan}}</td>
            </tr>
        @empty
        @endforelse>
      </table>  
      @endisset
    </div>
</div>
@endif
@endsection