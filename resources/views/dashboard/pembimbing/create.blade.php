@extends('dashboard.layouts.main')
@section('container')
<div class="wrapper d-flex align-items-stretch">
    @include('dashboard.layouts.sidebar') 
    <!-- Page Content  -->
<div id="content" class="px-4 py-1 p-md-5">
    @include('dashboard.layouts.navbar')
    <section>
        <form action="/pembimbing-lapangan" method="post" enctype="multipart/form-data">
            @csrf
            @method('post')
            <input type="text" hidden name="role" id="role" value="3">
            <div class="mb-3">
              <label for="nama" class="form-label">Nama Lengkap</label> 
              <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="">
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Panggilan</label> 
                <input type="text" class="form-control" id="nama_panggilan" name="nama_panggilan" value="">
              </div>
            <div class="mb-3">
                <label for="asal_perusahaan" class="form-label">Asal Perusahaan</label>
                <input type="text" class="form-control" id="asal_perusahaan" name="asal_perusahaan" value="">
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
              </div>
              <div class="mb-3">
                <label for="foto_profil" class="form-label">Foto Profil <span style="font-size:12px;">*jika ada/tidak wajib</span></label>
                <input type="file" class="form-control" id="foto_profil" name="foto_profil">
              </div>    
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </section>
</div>
</div>

@endsection