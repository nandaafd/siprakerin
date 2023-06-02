@extends('layouts.main')
@section('content')

<section id="hero" class="mx-auto">
  <div class="row">
    <div class="col-md-6" id="tagline">
      <h1 class="text">
        Tak Perlu  <span class="fw-bold"> Cemas</span>, 
        Kini Anda Dapat Melaksanakan <span class="fw-bold"> Prakerin</span> Dengan Sangat Mudah</span>
      </h1>
      <p class="text">Kini anda tak perlu risau untuk mencari tempat prakerin, karena kami 
        memberikan layanan berupa sistem informasi prakerin yang lengkap
        dan akurat.
      </p>
      <a href="" class="btn btn-primary" id="btn-daftar-hero">Daftar Sekarang</a>
    </div>
      <img src="{{asset('images/hero-person.png')}}" alt="" srcset="" id="person-hero" class="position-absolute end-0">
      <img src="{{asset('images/half-hero.png')}}" alt="" srcset="" id="half-hero" class="position-absolute end-0">
      <img src="{{asset('images/eclipse.png')}}" alt="" srcset="" id="eclipse" class="position-absolute">
  </div>
</section>  
{{-- <section id="search-area" class="my-4 mx-auto py-4">
  <h3>Halo<span> kamu</span>, mau cari apa?</h3>
  <p>Gunakan fitur pencarian ini untuk mempermudahkan kamu dalam menemukan sesuatu</p>
    <div class="row" id="search-row">
      <form action="" method="get" class="row" id="search-form">
        <div class="col-11">
          <input type="text" class="form-control" name="search" placeholder="ketik disini yaa.." id="search-bar">
        </div>
        <div class="col-1">
          <button type="submit" class="btn btn-primary" id="btn-search"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
          </svg></button>
        </div>
      </form>
    </div>
</section> --}}
<section id="menu-area" class="my-4">
  <div class="row text-center mx-auto py-4 menu">
    <div class="col">
      <div class="menu-box mx-auto py-1">
        <a href="{{url('/daftar-prakerin')}}" class="text-center mx-auto">
          <img src="{{asset('images/ikon/notebook.gif')}}" alt="" class="ikon-daftar">
          <p>Daftar</p>
        </a>
    </div>
    </div>
    <div class="col">
      <div class="menu-box mx-auto py-1">
        <a href="{{url('/logbooks')}}" class="text-center mx-auto">
          <img src="{{asset('images/ikon/book.gif')}}" alt="" class="ikon-daftar">
          <p>Logbook</p>
        </a>
      </div>
    </div>
    <div class="col">
      <div class="menu-box mx-auto py-1">
        <a href="{{url('/absensi-siswa')}}" class="text-center mx-auto">
          <img src="{{asset('images/ikon/fingerprint-scan.gif')}}" alt="" class="ikon-daftar">
          <p>Absensi</p>
        </a>
      </div>
    </div>
    <div class="col">
      <div class="menu-box mx-auto py-1">
        <a href="{{url('/berita')}}" class="text-center mx-auto">
          <img src="{{asset('images/ikon/news.gif')}}" alt="" class="ikon-daftar">
          <p>Berita & Informasi</p>
        </a>
      </div>
    </div>
    <div class="col">
      <div class="menu-box mx-auto py-1">
        <a href="{{url('/mitra')}}" class="text-center mx-auto">
          <img src="{{asset('images/ikon/factory.gif')}}" alt="" class="ikon-daftar">
          <p>Mitra</p>
        </a>
      </div>
    </div>
    <div class="col">
      <div class="menu-box mx-auto py-1">
        <a href="javascript:void(0)" class="text-center mx-auto" data-bs-target="#modal-menu" data-bs-toggle="modal" id="btn-lainnya">
          <img src="{{asset('images/ikon/menu.gif')}}" alt="" class="ikon-daftar">
          <p>Lainnya</p>
        </a>
      </div>
    </div>
  </div>
</section>
<section id="berita-area">
  <h3 class="mt-3 ms-5" id="tittle-berita">Berita & Informasi Terbaru</h3>
    <p class="ms-5">Jangan Lewatkan Berita Dan Informasi Terbaru!</p>
  <div class="row" id="berita">
      @isset($berita) 
      @foreach ($berita as $data)
      <div class="col">
        <div class="card mx-5 text-center" id="card-berita" style="">
          @if ($data->gambar == null)
          <img src="{{asset('images/berita.jpg')}}" id="gambar-berita" alt="" class="mx-auto img-fluid">
          @else
          <img src="{{asset('storage/'.$data->gambar)}}" id="gambar-berita" class="card-img-top" alt="">
          @endif
          <div class="card-body">
            <h5 class="card-title">{{$data->judul}}</h5>
            <p class="card-text">{{$data->tanggal_terbit}}</p>
            <a href="{{route('berita.show',$data->id)}}" id="btn-baca" class="btn btn-primary">Baca Sekarang <i class="bi bi-caret-right"></i></a>
          </div>
        </div>
      </div>
      @endforeach
      @endisset
</div>
</section>
<section>
  <h2 class="mt-5 mx-5" id="tittle-mitra">Mitra-Mitra SMKS Ihyaul Ulum</h2>
    <p id="subtittle-mitra" class="mx-5">SMKS Ihyaul Ulum Dukun Gresik Mencetak SDM Yang Unggul, Dan Berkualitas,
      Salah Satunya Dengan Cara Bekerja Sama Dengan Mitra Dunia Usaha Dunia Industri!
    </p>
  <div class="row mx-4">
    @foreach ($mitra as $data)
    <div class="col-3 my-3 mx-auto" id="mitra-card">
      <div id="content-mitra" class="row text-center mx-auto">
        <img src="{{asset('storage/'. $data->foto_mitra)}}" alt="" id="foto-mitra" class="mx-auto img-fluid">
          <h5 class="my-3" id="nama-mitra">{{$data->nama_mitra}}</h5>
        </div>
    </div>
    @endforeach
  </div>
</section>

@include('modals.menu')
@push('js')
@endpush
@endsection