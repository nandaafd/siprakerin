@extends('dashboard.layouts.main')
@section('container')
<div class="wrapper d-flex align-items-stretch">
    @include('dashboard.layouts.sidebar') 
    <!-- Page Content  -->
<div id="content" class="px-4 py-1 p-md-5">
    @include('dashboard.layouts.navbar')
    <section>
        @foreach ($mitra as $data)
        <form action="{{route('data-mitra.update',$data->id)}}" method="post">
            @csrf
            @method('put')
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
              @endforeach    
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </section>
</div>
</div>

@endsection