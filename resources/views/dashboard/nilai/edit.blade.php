@extends('dashboard.layouts.main')
@section('container')

<div class="wrapper d-flex align-items-stretch">
  @include('dashboard.layouts.sidebar')

  <!-- Page Content  -->
<div id="content" class="px-4 py-1 p-md-5">
  @include('dashboard.layouts.navbar')

  
  @forelse($nilais as $key => $nilai)
  <form action="{{route('nilai.update',$nilai->id)}}" method="POST">
    @method('put')
    @csrf
    <div class="mb-3">
        <label for="siswa" class="form-label">Siswa: NISN/Nama</label>
        <select disabled class="form-control @error('siswa') is-invalid @enderror" name="siswa">
            <option value="">Pilih Siswa..</option>
            @foreach ($siswas as $siswa)
                <option class="text-secondary" value="{{ $siswa->id }}" {{$siswa->id == $nilai->siswa_id ? 'selected' : ''}}>{{ $siswa->user->fullname." / ".$siswa->nisn }}</option>
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
      <select disabled class="form-control @error('pembimbing') is-invalid @enderror" name="pembimbing">
          @foreach ($pembimbing_lapangan as $pembimbing)
              <option class="text-secondary" value="{{ $pembimbing->id }}" {{$pembimbing->id == $nilai->pembimbing_lapangan_id ? 'selected' : ''}}>{{ $pembimbing->user->fullname." / ".$pembimbing->asal_perusahaan }}</option>
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
      <input type="number"  class="form-control @error('nilai_rata_rata') is-invalid @enderror" name="nilai_rata_rata" value="{{$nilai->nilai_rata_rata}}">
      @error('nilai_rata_rata')
          <div class="invalid-feedback">
              {{ $message }}
          </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="nilai_rata_rata" class="form-label">Nilai Dalam Huruf *contoh : A</label>
      <input type="text"  class="form-control @error('nilai_huruf') is-invalid @enderror" name="nilai_huruf" value="{{$nilai->nilai_huruf}}">
      @error('nilai_huruf')
          <div class="invalid-feedback">
              {{ $message }}
          </div>
      @enderror
    </div>
    @empty
    
  @endforelse
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

</div>
</div>
@endsection