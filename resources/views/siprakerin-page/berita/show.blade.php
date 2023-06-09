@extends('layouts.page')
@section('content')
<div class="row mt-4">
    <div class="col" id="prakerin-page">
        <script>var htmlCode = {!! json_encode($htmlCode) !!};</script>
    <section>
        @foreach ($berita as $data)
            <h1 id="judul" class="text-center">{{$data->judul}}</h1>
            <p id="penulis" class="text-center"><span>{{$data->penulis}}</span> - {{$data->tanggal_terbit}}</p>
            @if ($gambar == null)
            <img src="" alt="">
            @else
                <img class="img img-fluid d-block text-center mx-auto mt-5 mb-3" src="{{asset('storage/'. $gambar)}}" alt="" id="gambar-isi">
            @endif
            <div id="isi_berita" class="mx-5"></div>
            @if ($data->file == null)
                <div></div>  
            @else
            <div class="mx-5"><a href="{{asset('storage/'.$data->file)}}" download="surat_{{$data->judul}}">Download PDF</a></div>
            @endif
        @endforeach
    </section>
</div>
</div>
<script>
    var targetElement = document.getElementById("isi_berita");
        targetElement.innerHTML = htmlCode;
</script>
    </div>
</div>
@endsection