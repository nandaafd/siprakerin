@extends('dashboard.layouts.berita')
@section('container')
<div class="wrapper d-flex align-items-stretch">
    @include('dashboard.layouts.sidebar') 
    <!-- Page Content  -->
<div id="content" class="px-4 py-1 p-md-5">
    @include('dashboard.layouts.navbar')
    <script>var htmlCode = {!! json_encode($htmlCode) !!};</script>
    <section>
        @foreach ($berita as $data)
            <h1 id="judul" class="text-center">{{$data->judul}}</h1>
            <p id="penulis" class="text-center"><span>{{$data->penulis}}</span> - {{$data->tanggal_terbit}}</p>
            @if ($gambar == null)
            <img src="" alt="">
            @else
                <img class="img img-fluid d-block text-center mx-auto mt-5 mb-3" src="{{asset('storage/'. $gambar)}}" alt="">
            @endif
            <div id="isi_berita" class="mx-5"></div>
        @endforeach
    </section>
</div>
</div>
<script>
    var targetElement = document.getElementById("isi_berita");
        targetElement.innerHTML = htmlCode;
</script>

@endsection