@extends('layouts.page')
@section('content')
    <div class="row">
        <div class="col" id="prakerin-header">
            <div class="row">
              <div class="col-9">
                @can('siswa')
                    <h2 style="font-weight: 600;">Bagaimana <span style="color:#FF6B00;">Kegiatanmu</span> Hari Ini?<br>
                        Ayo <span style="color:#FF6B00;">Ekspresikan</span>  Kegiatanmu 
                        Di Logbook Sekarang Juga!</h4>
                    <h4>Logbook adalah catatan sejarahmu selama mengikuti prakerin, yuk isi sekarang.</h4>
                @endcan
              </div>
              <div class="col-3">
                <img id="vector1" class="img-fluid" src="{{asset('images/vector2.png')}}" alt="" srcset="">
              </div>
            </div>
        </div>
        <div class="row">
            <div class="col" id="logbook-page" class="">
                <form action="" method="POST">
                    @method('post')
                    @csrf
                    @foreach ($logbook as $data)
                    <div class="mb-3">
                        <label for="impresi" class="form-label">Impresi</label>
                        <input type="text" name="impresi" id="" readonly value="{{$data->impresi}}" class="form-control">
                    </div>
                    <div class="mb-3">
                      <label for="kegiatan" class="form-label">Kegiatan</label>
                      <input type="text" value="{{ $data->kegiatan}}" readonly  class="form-control @error('kegiatan') is-invalid @enderror" name="kegiatan">      
                    </div>
                    <div class="mb-3">
                      <label for="deskripsi_kegiatan" class="form-label">Deskripsi Kegiatan</label>
                      <textarea name="deskripsi_kegiatan" id="deskripsi_kegiatan" cols="30" rows="10" value="" readonly class="form-control @error('deskripsi_kegiatan') is-invalid @enderror">{{ $data->deskripsi_kegiatan}}</textarea>
                    </div>
                    <div class="mb-3">
                      <label for="tanggal" class="form-label">Tanggal</label>
                      <input type="date" value="{{ $data->tanggal}}" readonly class="form-control @error('tanggal') is-invalid @enderror" name="tanggal">
                    </div>
                    @endforeach
                  </form>
            </div>
        </div>
    </div>
@endsection