@extends('dashboard.layouts.main')
@section('container')
<div class="wrapper d-flex align-items-stretch">
    @include('dashboard.layouts.sidebar') 
    <!-- Page Content  -->
<div id="content" class="px-4 py-1 p-md-5">
    @include('dashboard.layouts.navbar')
    <section>
      @foreach ($siswa as $data)
          <input type="text" hidden name="id" value="{{$data->id}}">
          <input type="text" hidden name="user_id" value="{{$data->user_id}}">
          <div class="mb-3">
            <label for="nama_lengkap" class="form-label">Nama Lengkap</label> 
            <input type="text" readonly class="form-control" id="nama" name="nama_lengkap" value="{{$data->user->fullname}}">
          </div>
          <div class="mb-3">
            <label for="nama_panggilan" class="form-label">Nama Panggilan</label> 
            <input type="text" readonly class="form-control" id="nama_panggilan" name="nama_panggilan" value="{{$data->user->nickname}}">
          </div>
          <div class="mb-3">
              <label for="nisn" class="form-label">NISN</label>
              <input type="text" readonly class="form-control" id="nisn" name="nisn" value="{{$data->nisn}}">
            </div>
            <div class="mb-3">
              <label for="kelas" class="form-label">Kelas</label>
              <input type="text" readonly class="form-control" id="kelas" name="kelas" value="{{$data->kelas->nama_kelas}}">
            </div>
            <div class="mb-3">
              <label for="alamat" class="form-label">Alamat</label>
              <input type="text" readonly class="form-control" id="alamat" name="alamat" value="{{$data->alamat}}">
            </div>
            <div class="mb-3">
              <label for="no_telpon" class="form-label">No Telpon</label>
              <input type="text" readonly class="form-control" id="no_telpon" name="no_telpon" value="{{$data->no_telpon}}">
            </div>
            <div class="mb-3">
              <label for="pembimbing_lapangan" class="form-label">Pembimbing Lapangan</label>
              <input type="text" readonly class="form-control" id="pembimbing_lapangan" name="pembimbing_lapangan" value="{{$data->pembimbingLapangan ? $data->pembimbingLapangan->user->fullname : 'N/A'}}">
            </div>
            <div class="mb-3">
                <label for="foto_profil" class="form-label">Foto Profil</label>
                @if ($foto_profil == null)
                <h4 class="badge-danger mx-auto text-center">User ini tidak memiliki foto profil</h4> 
              @else
                  <h4>Foto Profil :</h4>
                  <img src="{{asset('storage/'. $foto_profil)}}" alt="" class="img img-fluid">    
              @endif
              </div>    
            @endforeach
    </section>
</div>
</div>

@endsection

