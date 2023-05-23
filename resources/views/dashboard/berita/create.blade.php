@extends('dashboard.layouts.berita')
@section('container')
<div class="wrapper d-flex align-items-stretch">
    @include('dashboard.layouts.sidebar') 
    <!-- Page Content  -->
<div id="content" class="px-4 py-1 p-md-5">
    @include('dashboard.layouts.navbar')
    <section>
        <form action="/data-berita" method="post" enctype="multipart/form-data">
            @csrf
            @method('post')
            <div class="mb-3">
              <label for="judul" class="form-label">Judul</label> 
              <input type="text" class="form-control form-control-lg" id="judul" name="judul" value="">
            </div>
            <div class="mb-3">
                <label for="terbit" class="form-label">Tanggal Terbit</label>
                <input type="date" class="form-control form-control-lg" id="terbit" name="terbit" value="">
              </div>
              <div class="mb-3">
                <label for="penulis" class="form-label">Nama Penulis</label>
                <input type="text" class="form-control form-control-lg" id="penulis" name="penulis" value="">
              </div>
              <div class="mb-3">
                <label for="isi_berita" class="form-label">Isi Berita</label>
                <textarea name="isi_berita" id="isi_berita" cols="30" rows="10" class="form-control form-control-lg"></textarea>
              </div>
              <div class="mb-3">
                <label for="gambar" class="form-label">Gambar <span style="color:orange; font-size:12px;">*jika ada/tidak wajib</span></label>
                <input type="file" class="form-control form-control-lg" id="gambar" name="gambar">
              </div>    
            <button type="submit" class="btn btn-primary btn-lg">Submit</button>
          </form>
          <script>
            $(document).ready(function() {
                $('#isi_berita').summernote();
            });
          </script>
    </section>
    
</div>
</div>

@endsection