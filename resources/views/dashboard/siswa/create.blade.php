@extends('dashboard.layouts.main')
@section('container')
<div class="wrapper d-flex align-items-stretch">
    @include('dashboard.layouts.sidebar') 
    <!-- Page Content  -->
<div id="content" class="px-4 py-1 p-md-5">
    @include('dashboard.layouts.navbar')
    <section>
        <form action="/x-tkj" method="post">
            @csrf
            @method('post')
            <div class="mb-3">
              <label for="nama" class="form-label">Nama Lengkap</label> 
              <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="">
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Panggilan</label> 
                <input type="text" class="form-control" id="nama_panggilan" name="nama_panggilan" value="">
              </div>
            <div class="mb-3">
                <label for="nisn" class="form-label">NISN</label>
                <input type="text" class="form-control" id="nisn" name="nisn" value="">
              </div>
              <div class="mb-3">
                <label for="kelas" class="form-label">Kelas</label>
                <input type="text" name="kelas" id="">
                <select class="form-select" aria-label="Default select example" name="kelas">
                  <option value="">Pilih kelas..</option>
                  @foreach ($kelas as $kls)
                  <option value="{{$kls->id}}">{{$kls->kelas}}</option>
                  @endforeach
                </select>
              </div>
              <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" value="">
              </div>
              <div class="mb-3">
                <label for="no_telpon" class="form-label">No Telpon</label>
                <input type="text" class="form-control" id="no_telpon" name="no_telpon" value="">
              </div>
              <div class="mb-3">
                <label for="no_telpon" class="form-label">Email</label>
                <input type="text" class="form-control" id="email" name="email" value="">
              </div>
              <div class="mb-3">
                <label for="no_telpon" class="form-label">Password</label>
                <input type="text" class="form-control" id="Password" name="password" value="">
                <input type="text" name="role" id="role" hidden value="3">
              </div>
              <div class="mb-3">
                <label for="pembimbing_lapangan" class="form-label">Pembimbing Lapangan</label>
                <select class="form-select" aria-label="Default select example" name="pembimbing_lapangan">
                  <option value="">Pilih pembimbing..</option>
                  @foreach ($pembimbing as $pl)
                  <option value="{{$pl->id}}">{{$pl->user->fullname}}</option>
                  @endforeach
                </select>
              </div>    
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </section>
</div>
</div>

@endsection