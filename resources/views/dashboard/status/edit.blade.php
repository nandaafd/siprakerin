@extends('dashboard.layouts.main')
@section('container')
<div class="wrapper d-flex align-items-stretch">
    @include('dashboard.layouts.sidebar') 
    <!-- Page Content  -->
<div id="content" class="px-4 py-1 p-md-5">
    @include('dashboard.layouts.navbar')
    <section>
        @foreach ($status as $data)
        <form action="{{route('status.update',$data->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="mb-3">
              <label for="nama" class="form-label">Pendaftaran</label> 
              <select class="form-control @error('pendaftaran') is-invalid @enderror" name="pendaftaran">
                <option {{$data->pendaftaran == 'buka' ? 'selected' : ''}} value="buka">Buka</option>
                <option {{$data->pendaftaran == 'tutup' ? 'selected' : ''}} value="tutup">tutup</option>
              </select>
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Penilaian</label> 
                <select class="form-control @error('penilaian') is-invalid @enderror" name="penilaian">
                  <option {{$data->penilaian == 'buka' ? 'selected' : ''}} value="buka">Buka</option>
                  <option {{$data->penilaian == 'tutup' ? 'selected' : ''}} value="tutup">tutup</option>
                </select>
              </div>
              <div class="mb-3">
                <label for="nama" class="form-label">Pengisian Logbook</label> 
                <select class="form-control @error('logbook') is-invalid @enderror" name="logbook">
                  <option {{$data->logbook == 'buka' ? 'selected' : ''}} value="buka">Buka</option>
                  <option {{$data->logbook == 'tutup' ? 'selected' : ''}} value="tutup">tutup</option>
                </select>
              </div>
              <div class="mb-3">
                <label for="nama" class="form-label">Pengisian Absensi</label> 
                <select class="form-control @error('absensi') is-invalid @enderror" name="absensi">
                  <option {{$data->absensi == 'buka' ? 'selected' : ''}} value="buka">Buka</option>
                  <option {{$data->absensi == 'tutup' ? 'selected' : ''}} value="tutup">tutup</option>
                </select>
              </div>
              <div class="mb-3">
                <label for="nama" class="form-label">Laporan Akhir</label> 
                <select class="form-control @error('laporan') is-invalid @enderror" name="laporan">
                  <option {{$data->laporan == 'buka' ? 'selected' : ''}} value="buka">Buka</option>
                  <option {{$data->laporan == 'tutup' ? 'selected' : ''}} value="tutup">tutup</option>
                </select>
              </div>
              @endforeach
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </section>
</div>
</div>

@endsection