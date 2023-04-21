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
      <label for="nilai_A" class="form-label">nilai A</label>
      <input type="number" value="{{ old('nilai_A') }}" class="form-control @error('nilai_A') is-invalid @enderror" name="nilai_A">
      @error('nilai_A')
          <div class="invalid-feedback">
              {{ $message }}
          </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="nilai_B" class="form-label">nilai B</label>
      <input type="number" value="{{ old('nilai_B') }}" class="form-control @error('nilai_B') is-invalid @enderror" name="nilai_B">
      @error('nilai_B')
          <div class="invalid-feedback">
              {{ $message }}
          </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="nilai_C" class="form-label">nilai C</label>
      <input type="number" value="{{ old('nilai_C') }}" class="form-control @error('nilai_C') is-invalid @enderror" name="nilai_C">
      @error('nilai_C')
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