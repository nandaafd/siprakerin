@extends('dashboard.layouts.berita')
@section('container')
<div class="wrapper d-flex align-items-stretch">
    @include('dashboard.layouts.sidebar') 
    <!-- Page Content  -->
<div id="content" class="px-4 py-1 p-md-5">
    @include('dashboard.layouts.navbar')
    <section>
        @foreach ($berita as $data)
        <form action="{{route('data-berita.update',$data->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <input type="text" name="oldImage" hidden value="{{$data->gambar}}">
            <input type="text" name="oldFile" hidden value="{{$data->file}}">
            <div class="mb-3">
              <label for="judul" class="form-label">Judul</label> 
              <input type="text" class="form-control form-control-lg" id="judul" name="judul" value="{{$data->judul}}">
            </div>
            <div class="mb-3">
                <label for="terbit" class="form-label">Tanggal Terbit</label>
                <input type="date" class="form-control form-control-lg" id="terbit" name="terbit" value="{{$data->tanggal_terbit}}">
              </div>
              <div class="mb-3">
                <label for="penulis" class="form-label">Nama Penulis</label>
                <input type="text" class="form-control form-control-lg" id="penulis" name="penulis" value="{{$data->penulis}}">
              </div>
              <div class="mb-3">
                <label for="isi_berita" class="form-label">Isi Berita</label>
                <textarea name="isi_berita" id="isi_berita" cols="30" rows="10" class="form-control form-control-lg">{{$data->isi_berita}}</textarea>
              </div>
              <div class="mb-3">
                <label for="gambar" class="form-label">Gambar <span style="color:orange; font-size:12px;">*jika ada/tidak wajib</span></label>
                @if ($data->gambar == null)
                  <p class="">data ini tidak memiliki gambar</p>
                @else
                  <img src="{{asset('storage/'. $data->gambar)}}" alt="" class="d-block mb-3" style="max-width:170px;">
                @endif
                <input type="file" class="form-control form-control-lg" id="gambar" name="gambar">
              </div>
              <div class="mb-3">
                <label for="file" class="form-label">File tambahan <span style="color:orange; font-size:12px;">*jika ada/tidak wajib</span></label>
                @if ($data->file == null)
                  <p class="">data ini tidak memiliki file tambahan</p>
                @else
                <p class="">data ini memiliki file tambahan upload ulang untuk merubahnya</p>
                @endif
                <input type="file" class="form-control form-control-lg" id="file" name="file">
              </div>
              @endforeach  
              <script>
                $(document).ready(function() {
                    $('#isi_berita').summernote();
                });
              </script>
              
            <button type="submit" class="btn btn-primary btn-lg">Submit</button>
          </form>
              
    </section>
    
</div>
</div>

@endsection