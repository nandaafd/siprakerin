@extends('dashboard.layouts.main')
@section('container')
<div class="wrapper d-flex align-items-stretch">
    @include('dashboard.layouts.sidebar') 
    <!-- Page Content  -->
<div id="content" class="px-4 py-1 p-md-5">
    @include('dashboard.layouts.navbar')
    <section>
      @foreach ($pembimbing as $data)
        <form action="{{route('pembimbing-lapangan.update',$data->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <input type="text" name="foto_profil" value="{{$data->foto_profil}}">
            <input type="text" hidden name="id" value="{{$data->id}}">
            <input type="text" hidden name="user_id" value="{{$data->user_id}}">
            <div class="mb-3">
              <label for="nama" class="form-label">Nama Lengkap</label> 
              <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="{{$data->user->fullname}}">
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Panggilan</label> 
                <input type="text" class="form-control" id="nama_panggilan" name="nama_panggilan" value="{{$data->user->nickname}}">
              </div>
            <div class="mb-3">
                <label for="asal_perusahaan" class="form-label">Asal Perusahaan</label>
                <input type="text" class="form-control" id="asal_perusahaan" name="asal_perusahaan" value="{{$data->asal_perusahaan}}">
              </div>
              <div class="mb-3">
                <label for="no_telpon" class="form-label">No Telpon</label>
                <input type="text" class="form-control" id="no_telpon" name="no_telpon" value="{{$data->no_telpon}}">
              </div>
              <div class="mb-3">
                <label for="foto_profil" class="form-label">Foto Profil <span style="font-size:12px;">*jika ada/tidak wajib</span></label>
                @if ($data->foto_profil == null)
                  <p class="">data ini tidak memiliki gambar</p>
                @else
                  <img src="{{asset('storage/'. $data->foto_profil)}}" alt="" class="d-block mb-3" style="max-width:170px;">
                @endif
                <input type="file" class="form-control" id="foto_profil" name="foto_profil">
              </div>
              @endforeach    
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </section>
</div>
</div>

@endsection