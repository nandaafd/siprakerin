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
      <select class="form-select @error('impresi') is-invalid @enderror" value="{{ old('impresi') }}" aria-label="Default select example" name="impresi">
        <option selected>Pilih impresi anda..</option>
        <option value="Sangat seru">Sangat seru</option>
        <option value="Seru">Seru</option>
        <option value="Biasa saja">Biasa saja</option>
        <option value="Kurang">Kurang</option>
      </select>
      {{-- <input type="text" value="{{ old('impresi') }}" class="form-control @error('impresi') is-invalid @enderror" name="impresi"> --}}
      @error('impresi')
          <div class="invalid-feedback">
              {{ $message }}
          </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="kegiatan" class="form-label">Kegiatan</label>
      <input type="text" value="{{ old('kegiatan') }}" class="form-control @error('kegiatan') is-invalid @enderror" name="kegiatan">
      @error('kegiatan')
          <div class="invalid-feedback">
              {{ $message }}
          </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="deskripsi_kegiatan" class="form-label">Catatan Kegiatan</label>
      <input type="text" value="{{ old('deskripsi_kegiatan') }}" class="form-control @error('deskripsi_kegiatan') is-invalid @enderror" name="deskripsi_kegiatan">
      @error('deskripsi_kegiatan')
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