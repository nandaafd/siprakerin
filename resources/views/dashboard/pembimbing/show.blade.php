@extends('dashboard.layouts.main')
@section('container')
<div class="wrapper d-flex align-items-stretch">
    @include('dashboard.layouts.sidebar') 
    <!-- Page Content  -->
<div id="content" class="px-4 py-1 p-md-5">
    @include('dashboard.layouts.navbar')
    <section>
        @foreach ($pembimbing as $data)
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Lengkap</label> 
            <input type="text" readonly class="form-control" id="nama_lengkap" name="nama_lengkap" value="{{$data->user->fullname}}">
          </div>
          <div class="mb-3">
              <label for="nama" class="form-label">Nama Panggilan</label> 
              <input type="text" readonly class="form-control" id="nama_panggilan" name="nama_panggilan" value="{{$data->user->nickname}}">
            </div>
          <div class="mb-3">
              <label for="asal_perusahaan" class="form-label">Asal Perusahaan</label>
              <input type="text" readonly class="form-control" id="asal_perusahaan" name="asal_perusahaan" value="{{$data->asal_perusahaan}}">
            </div>
            <div class="mb-3">
              <label for="no_telpon" class="form-label">No Telpon</label>
              <input type="text" readonly class="form-control" id="no_telpon" name="no_telpon" value="{{$data->no_telpon}}">
            </div>
            <div class="mb-3">
              <label for="foto_profil" class="form-label">Foto Profil <span style="font-size:12px;">*jika ada/tidak wajib</span></label>
              @if ($pl == null)
              <h4 class="badge-danger mx-auto text-center">User ini tidak memiliki foto profil</h4> 
            @else
                <h4>Foto Profil :</h4>
                <img src="{{asset('storage/'. $pl)}}" alt="" class="img img-fluid">    
            @endif
            </div>
            @endforeach
    </section>
</div>
</div>
@endsection