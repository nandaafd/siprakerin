@extends('dashboard.layouts.main')
@section('container')
<div class="wrapper d-flex align-items-stretch">
    @include('dashboard.layouts.sidebar') 
    <!-- Page Content  -->
<div id="content" class="px-4 py-1 p-md-5">
    @include('dashboard.layouts.navbar')
    <section>
        <form action="/data-mitra" method="post">
            @csrf
            @method('post')
            <div class="mb-3">
              <label for="nama" class="form-label">Nama Mitra/Perusahaan</label> 
              <input type="text" class="form-control" id="nama" name="nama" value="">
            </div>
            <div class="mb-3">
                <label for="bidang" class="form-label">Bidang</label>
                <input type="text" class="form-control" id="bidang" name="bidang" value="">
              </div>
              <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" value="">
              </div>
              <div class="mb-3">
                <label for="kuota" class="form-label">Kuota</label>
                <input type="text" class="form-control" id="kuota" name="kuota" value="">
              </div>
              <div class="mb-3">
                <label for="gambar" class="form-label">Gambar/Logo </label>
                <input type="file" class="form-control" id="gambar" name="gambar">
              </div>    
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </section>
</div>
</div>

@endsection