@extends('dashboard.layouts.main')
@section('container')

<div class="wrapper d-flex align-items-stretch">
  @include('dashboard.layouts.sidebar')

  <!-- Page Content  -->
<div id="content" class="px-4 py-1 p-md-5">
  @include('dashboard.layouts.navbar')


  <form action="/absensi" method="POST">
    @method('post')
    @csrf
    <div>
        <label for="siswa" class="form-label">Siswa: NISN/Nama</label>
        <select class="form-control @error('siswa') is-invalid @enderror" name="siswa">
            @foreach ($siswas as $siswa)
                <option class="text-secondary" value="{{ $siswa->id }}" {{ old('siswa') == $siswa->id ? 'selected' : '' }}>{{ $siswa->user->fullname." / ".$siswa->nisn }}</option>
            @endforeach
        </select>
        @error('siswa')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div>
        <input type="hidden" value="{{ $pl }}" name="pembimbing_lapangan">
    </div>
    <div class="mb-3">
      <label for="ket_kehadiran" class="form-label">Keterangan Kehadiran</label>
      <input type="text" value="{{ old('ket_kehadiran') }}" class="form-control @error('ket_kehadiran') is-invalid @enderror" name="ket_kehadiran">
      @error('ket_kehadiran')
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