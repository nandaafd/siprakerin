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
            <h2 style="font-weight: 600;">Disini Anda Dapat <span style="color:#FF6B00;">Unduh</span> Berkas yang dibutuhkan Lho!!</h2>
            <h4>Yuk, Unduh Sekarang..</h4>
          </div>
          <div class="col-3">
            <img id="vector1" class="img-fluid" src="{{asset('images/vector7.jpg')}}" alt="" srcset="">
          </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col" id="prakerin-page">
        @can('guru')
            @isset($laporan)
                <table class="table table-hover">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>File Laporan Akhir</th>
                    </tr>
                @forelse ($laporan as $data)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{$data->nama}}</td>
                        <td><a href="{{asset('/storage'.$data->link)}}" id="btn-download" download="laporan_akhir_{{$data->nama}}" class="btn btn-primary"><i class="bi bi-file-earmark-arrow-down"></i> Download</a></td>
                    </tr>
                @empty
                @endforelse>
            </table>  
            {{ $laporan->links() }}
            @endisset
        @endcan
        @can('siswa')
        <form method="post" action="#" id="#">
          <div class="mb-3">
            <label for="nama">Nama Siswa</label>
            <input type="text" class="form-control" name="nama" value="{{Auth::user()->fullname}}">
          </div>  
          <div class="form-group files">
            <label>Upload Your File </label>
            <input type="file" class="form-control" multiple="">
          </div>
          <button type="submit" class="btn btn-primary"><i class="bi bi-file-earmark-arrow-up mx-1"></i>Upload</button>
        </form>
        @endcan
    </div>
</div>
@endif
@endsection
@push('js')
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
@endpush