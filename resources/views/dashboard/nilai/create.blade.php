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
      <label for="nilai_rata_rata" class="form-label">Nilai Rata-Rata</label>
      <input type="number" value="{{ old('nilai_rata_rata') }}" class="form-control @error('nilai_rata_rata') is-invalid @enderror" name="nilai_rata_rata">
      @error('nilai_rata_rata')
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