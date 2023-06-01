@extends('dashboard.layouts.main')
@section('container')
<div class="wrapper d-flex align-items-stretch">
    @include('dashboard.layouts.sidebar') 
    <!-- Page Content  -->
<div id="content" class="px-4 py-1 p-md-5">
    @include('dashboard.layouts.navbar')
    <section>
        <form action="/status" method="post" enctype="multipart/form-data">
            @csrf
            @method('post')
            <div class="mb-3">
              <label for="nama" class="form-label">Pendaftaran</label> 
              <select class="form-control @error('pendaftaran') is-invalid @enderror" name="pendaftaran">
                <option value="">Pilih status pendaftaran..</option>
                <option value="buka">Buka</option>
                <option value="tutup">tutup</option>
              </select>
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Penilaian</label> 
                <select class="form-control @error('penilaian') is-invalid @enderror" name="penilaian">
                  <option value="">Pilih status penilaian..</option>
                  <option value="buka">Buka</option>
                  <option value="tutup">tutup</option>
                </select>
              </div>
              <div class="mb-3">
                <label for="nama" class="form-label">Pengisian Logbook</label> 
                <select class="form-control @error('logbook') is-invalid @enderror" name="logbook">
                  <option value="">Pilih status logbook..</option>
                  <option value="buka">Buka</option>
                  <option value="tutup">tutup</option>
                </select>
              </div>
              <div class="mb-3">
                <label for="nama" class="form-label">Pengisian Absensi</label> 
                <select class="form-control @error('absensi') is-invalid @enderror" name="absensi">
                  <option value="">Pilih status absensi..</option>
                  <option value="buka">Buka</option>
                  <option value="tutup">tutup</option>
                </select>
              </div>
                
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </section>
</div>
</div>

@endsection