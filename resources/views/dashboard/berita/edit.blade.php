@extends('dashboard.layouts.berita')
@section('container')
<div class="wrapper d-flex align-items-stretch">
    @include('dashboard.layouts.sidebar') 
    <!-- Page Content  -->
<div id="content" class="px-4 py-1 p-md-5">
    @include('dashboard.layouts.navbar')
    <section>
        @foreach ($berita as $data)
        <form action="{{route('data-berita.update',$data->id)}}" method="post">
            @csrf
            @method('put')
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
                <input type="file" class="form-control form-control-lg" id="gambar" name="gambar">
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