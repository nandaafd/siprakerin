@extends('dashboard.layouts.main')
@section('container')
<div class="wrapper d-flex align-items-stretch">
    @include('dashboard.layouts.sidebar') 
    <!-- Page Content  -->
<div id="content" class="px-4 py-1 p-md-5">
    @include('dashboard.layouts.navbar')
    <section>
        @foreach ($siswa as $data)
        <form action="/x-tkj/update" method="post">
            @csrf
            <input type="text" hidden name="id" value="{{$data->id}}">
            <input type="text" name="user_id" value="{{$data->user_id}}">
            <div class="mb-3">
              <label for="nama" class="form-label">Nama</label> 
              <input type="text" class="form-control" id="nama" name="nama" value="{{$data->user->fullname}}">
            </div>
            <div class="mb-3">
                <label for="nisn" class="form-label">NISN</label>
                <input type="text" class="form-control" id="nisn" name="nisn" value="{{$data->nisn}}">
              </div>
              {{-- <div class="mb-3">
                <label for="kelas" class="form-label">Kelas</label>
                <input type="text" class="form-control" id="kelas" name="kelas" value="{{$data->kelas}}">
              </div> --}}
              <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" value="{{$data->alamat}}">
              </div>
              <div class="mb-3">
                <label for="no_telpon" class="form-label">No Telpon</label>
                <input type="text" class="form-control" id="no_telpon" name="no_telpon" value="{{$data->no_telpon}}">
              </div>
              <div class="mb-3">
                <label for="pembimbing_lapangan" class="form-label">Pembimbing Lapangan</label>
                <input type="text" class="form-control" id="pembimbing_lapangan" name="pembimbing_lapangan" value="{{$data->pembimbing_lapangan_id}}">
              </div>    
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        @endforeach
    </section>
</div>
</div>

@endsection