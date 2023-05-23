@extends('dashboard.layouts.main')
@section('container')
<div class="wrapper d-flex align-items-stretch">
    @include('dashboard.layouts.sidebar') 
    <!-- Page Content  -->
<div id="content" class="px-4 py-1 p-md-5">
    @include('dashboard.layouts.navbar')
    <section>
        @foreach ($mitra as $data)
        <form action="{{route('data-mitra.update',$data->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <input type="text" name="oldImage" id="" hidden value="{{$data->foto_mitra}}">
            <div class="mb-3">
              <label for="nama" class="form-label">Nama Mitra/Perusahaan</label> 
              <input type="text" class="form-control" id="nama" name="nama" value="{{$data->nama_mitra}}">
            </div>
            <div class="mb-3">
                <label for="bidang" class="form-label">Bidang</label>
                <input type="text" class="form-control" id="bidang" name="bidang" value="{{$data->bidang}}">
              </div>
              <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" value="{{$data->alamat}}">
              </div>
              <div class="mb-3">
                <label for="kuota" class="form-label">Kuota</label>
                <input type="text" class="form-control" id="kuota" name="kuota" value="{{$data->kuota}}">
              </div>
              <div class="mb-3">
                <label for="gambar" class="form-label">Gambar/Logo </label>
                @if ($data->foto_mitra == null)
                  <p class="">data ini tidak memiliki gambar</p>
                @else
                  <img src="{{asset('storage/'. $data->foto_mitra)}}" alt="" class="d-block mb-3" style="max-width:170px;">
                @endif
                <input type="file" class="form-control" id="gambar" name="gambar">
              </div> 
              @endforeach    
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </section>
</div>
</div>

@endsection