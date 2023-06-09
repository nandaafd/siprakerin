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
@if ($status == 'buka')
    @if ($pl_siswa == null)
    <div class="row">
        <div class="col text-center mt-5">
          <img src="{{asset('images/closed.png')}}" class="img-fluid" style="max-width: 550px" alt="">
          <h2 style="color:gray;">Oops.. Maaf anda tidak dapat mengakses logbook karena sedang tidak prakerin</h2>
        </div>
      </div>
    @else
<div class="row">
    <div class="col" id="prakerin-header">
        <div class="row">
          <div class="col-9">
            <h2 style="font-weight: 600;">Tak terasa petualangan dan perjalanan anda selama prakerin <span style="color:#FF6B00;">telah usai</span>, yuk upload laporan prakerinmu sekarang! </h2>
            <h4>Yuk, Jangan Sampai Terlambat Ya..</h4>
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
        <h3 class="mb-4 ms-2">Data Laporan Siswa </h3>
        <div class="col-9">
          <form action="" method="get" class="row row-cols-sm-auto g-1 mb-4">
                  <p class="mx-2 my-auto">Filter</p>
                <div class="col-sm">
                    <select name="kls_filter" id="" class="form-select form-select-sm">
                      <option value="">Pilih Kelas..</option>
                      @foreach ($kelas as $data)
                      <option value="{{$data->nama_kelas}}">{{$data->nama_kelas}}</option>
                      @endforeach
                    </select>
                </div>
                <div class="col-sm">
                    <button type="submit" class="btn btn-primary btn-sm">Search</button>
                    <button type="submit" class="btn btn-secondary btn-sm" id="btn-reset">Reset</button>
                </div>
            </form>
          </div>
      <div class="col-3"></div>
            @isset($laporan_akhir)
                <table class="table table-hover text-center">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Kelas</th>
                        <th>File Laporan Akhir</th>
                    </tr>
                @forelse ($laporan_akhir as $data)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{$data->nama}}</td>
                        <td>{{$data->kelas}}</td>
                        <td><a href="{{asset('storage/'.$data->file)}}" id="btn-download" download="laporan_akhir_{{$data->nama}}" class="btn btn-primary"><i class="bi bi-file-earmark-arrow-down"></i> Download</a></td>
                    </tr>
                @empty
                @endforelse>
            </table>  
            {{ $laporan_akhir->links() }}
            @endisset
        @endcan
        @can('siswa')

            @if(session('messageWarning'))
                    <div class="alert alert-warning alert-dismissible fade show">
                        {{ session('messageWarning') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
              @endif
            <div class="alert alert-success text-center {{$laporan == Auth::user()->id ? 'd-flex' : 'd-none'}}">
              <p>Laporan anda sudah terunggah. apabila terdapat kesalahan dalam pengunggahan, silahkan
                hubungi admin untuk menghapus data anda dan silahkan upload ulang apabila sudah terhapus.
              </p>
            </div>
        <form method="post" action="{{route('laporan-akhir.store')}}" id="#" enctype="multipart/form-data" class="{{$laporan == Auth::user()->id ? 'd-none' : ''}}">
          @csrf
          @method('post')
          <div class="mb-3">
            <label for="nama">Nama Siswa</label>
            <input type="text" class="form-control" name="nama" value="{{Auth::user()->fullname}}">
          </div> 
          <div class="mb-3">
            <label for="nama">Kelas</label>
            <select name="kelas" id="" class="form-select">
              <option value="none">Pilih Kelas..</option>
              @foreach ($kelas as $data)
                <option value="{{$data->nama_kelas}}">{{$data->nama_kelas}}</option>
              @endforeach
            </select>
          </div>  
          <div class="form-group files">
            <label>Upload Laporan Akhir/Prakerin </label>
            <input type="file" class="form-control" multiple="" name="file">
          </div>
          <button type="submit" class="btn btn-primary"><i class="bi bi-file-earmark-arrow-up mx-1"></i>Upload</button>
        </form>
        @endcan
    </div>
</div>
@endif
    @else
    <div class="row">
      <div class="col text-center mt-5">
        <img src="{{asset('images/closed.png')}}" class="img-fluid" style="max-width: 550px" alt="">
        <h2 style="color:gray;">Oops.. Pengisian Logbook Sedang Ditutup Nih</h2>
      </div>
    </div>
@endif
@endif
@endsection
@push('js')
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
@endpush