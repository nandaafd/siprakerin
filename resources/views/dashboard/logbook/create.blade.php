@extends('dashboard.layouts.main')
@section('container')

<div class="wrapper d-flex align-items-stretch">
  @include('dashboard.layouts.sidebar')

  <!-- Page Content  -->
<div id="content" class="px-4 py-1 p-md-5">
  @include('dashboard.layouts.navbar')


  <form action="/logbook" method="POST">
    @method('post')
    @csrf
    <div>
        <input type="hidden" value="{{ $siswa }}" name="siswa_id">
    </div>
    <div class="mb-3">
      <label for="impresi" class="form-label">Impresi</label>
      <input type="text" value="{{ old('impresi') }}" class="form-control @error('impresi') is-invalid @enderror" name="impresi">
      @error('impresi')
          <div class="invalid-feedback">
              {{ $message }}
          </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="catatan_kegiatan" class="form-label">Catatan Kegiatan</label>
      <input type="text" value="{{ old('catatan_kegiatan') }}" class="form-control @error('catatan_kegiatan') is-invalid @enderror" name="catatan_kegiatan">
      @error('catatan_kegiatan')
          <div class="invalid-feedback">
              {{ $message }}
          </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="tanggal" class="form-label">Tanggal</label>
      <input type="date" value="{{ old('tanggal') }}" class="form-control @error('tanggal') is-invalid @enderror" name="tanggal">
      @error('tanggal')
          <div class="invalid-feedback">
              {{ $message }}
          </div>
      @enderror
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>


</div>
</div>
@endsection