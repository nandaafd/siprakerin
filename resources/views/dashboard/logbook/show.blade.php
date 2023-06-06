@extends('dashboard.layouts.main')
@section('container')

<div class="wrapper d-flex align-items-stretch">
  @include('dashboard.layouts.sidebar')

  <!-- Page Content  -->
<div id="content" class="px-4 py-1 p-md-5">
  @include('dashboard.layouts.navbar')

@foreach($logbooks as $key => $logbook)
    

  <form action="" method="POST">
    @method('put')
    @csrf
    <div>
        <input type="hidden" value="{{ $logbook->siswa_id }}" name="siswa_id">
    </div>
    <div>
        <label for="" class="form-label">Siswa</label>
        <input type="text" readonly class="mb-3 form-control" value="{{$logbook->siswa->user->fullname}}" name="" id="">
    </div>
    <div class="mb-3">
      <label for="impresi" class="form-label">Impresi</label>
      <input readonly type="text" value="{{$logbook->impresi}}" class="form-control" name="impresi">
    </div>
    <div class="mb-3">
        <label for="kegiatan" class="form-label">Kegiatan</label>
        <input type="text" value="{{$logbook->kegiatan}}" class="form-control @error('kegiatan') is-invalid @enderror" readonly name="kegiatan">  
      </div>
    <div class="mb-3">
      <label for="deskripsi_kegiatan" class="form-label">Deskripsi Kegiatan</label>
      <input type="text" value="{{$logbook->deskripsi_kegiatan}}" class="form-control @error('deskripsi_kegiatan') is-invalid @enderror" readonly name="deskripsi_kegiatan">  
    </div>
    <div class="mb-3">
      <label for="tanggal" class="form-label">Tanggal</label>
      <input readonly type="date" value="{{$logbook->tanggal}}" class="form-control @error('tanggal') is-invalid @enderror" name="tanggal">
      @error('tanggal')
          <div class="invalid-feedback">
              {{ $message }}
          </div>
      @enderror
    </div>
    @endforeach
    
  </form>


</div>
</div>
@endsection