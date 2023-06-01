@extends('dashboard.layouts.main')
@section('container')

<div class="wrapper d-flex align-items-stretch">
  @include('dashboard.layouts.sidebar')

  <!-- Page Content  -->
<div id="content" class="px-4 py-1 p-md-5">
  @include('dashboard.layouts.navbar')


  <form action="/nilai" method="POST">
    @method('post')
    @csrf
    <div class="mb-3">
        <label for="siswa" class="form-label">Siswa: NISN/Nama</label>
        <select class="form-control @error('siswa') is-invalid @enderror" name="siswa">
            <option value="">Pilih Siswa..</option>
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
    <div class="mb-3">
      <label for="pembimbing" class="form-label">Pembimbing Lapangan/Mitra</label>
      <select class="form-control @error('pembimbing') is-invalid @enderror" name="pembimbing">
          <option value="">Pilih Mitra..</option>
          @foreach ($pembimbing_lapangan as $pembimbing)
              <option class="text-secondary" value="{{ $pembimbing->user_id }}" {{ old('pembimbing') == $pembimbing->id ? 'selected' : '' }}>{{ $pembimbing->user->fullname." / ".$pembimbing->asal_perusahaan }}</option>
          @endforeach
      </select>
      @error('pembimbing')
          <div class="invalid-feedback">
              {{ $message }}
          </div>
      @enderror
  </div>

    {{-- <div>
        <input type="hidden" value="{{ $pl }}" name="pembimbing_lapangan">
    </div> --}}
    <div class="mb-3">
      <label for="nilai_rata_rata" class="form-label">Nilai Rata-Rata</label>
      <input type="number" value="{{ old('nilai_rata_rata') }}" class="form-control @error('nilai_rata_rata') is-invalid @enderror" name="nilai_rata_rata">
      @error('nilai_rata_rata')
          <div class="invalid-feedback">
              {{ $message }}
          </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="nilai_rata_rata" class="form-label">Nilai Dalam Huruf *contoh : A</label>
      <input type="text" value="{{ old('nilai_huruf') }}" class="form-control @error('nilai_huruf') is-invalid @enderror" name="nilai_huruf">
      @error('nilai_huruf')
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