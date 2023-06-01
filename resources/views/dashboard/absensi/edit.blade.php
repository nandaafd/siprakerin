@extends('dashboard.layouts.main')
@section('container')

<div class="wrapper d-flex align-items-stretch">
  @include('dashboard.layouts.sidebar')

  <!-- Page Content  -->
<div id="content" class="px-4 py-1 p-md-5">
  @include('dashboard.layouts.navbar')

@foreach ($absensis as $absensi)

  <form action="{{route('absensi.update',$absensi->id)}}" method="POST">
    @method('put')
    @csrf
    <div>
        <label for="siswa" class="form-label">Siswa:</label>
        <input type="text" readonly class="form-control" name="siswa" value="{{$absensi->siswa->user->fullname}}">
        <input type="text" hidden name="siswa_id" value="{{$absensi->siswa_id}}">
        @error('siswa')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div>
        <input type="hidden" value="{{$absensi->pembimbing_lapangan_id}}" name="pembimbing_lapangan">
    </div>
    <div class="mb-3">
      <label for="ket_kehadiran" class="form-label">Keterangan Kehadiran</label>
      {{-- <input type="text" value="{{ old('ket_kehadiran') }}" class="form-control @error('ket_kehadiran') is-invalid @enderror" name="ket_kehadiran"> --}}
      <select class="form-select @error('ket_kehadiran') is-invalid @enderror" value="{{ old('impresi') }}" aria-label="Default select example" name="ket_kehadiran">
        <option {{$absensi->ket_kehadiran == 'Hadir' ? 'selected' : ''}} value="Hadir">Hadir</option>
        <option {{$absensi->ket_kehadiran == 'Izin' ? 'selected' : ''}} value="Izin">Izin</option>
        <option {{$absensi->ket_kehadiran == 'Sakit' ? 'selected' : ''}} value="Sakit">Sakit</option>
        <option {{$absensi->ket_kehadiran == 'Absen' ? 'selected' : ''}} value="Absen">Absen</option>
      </select>
      @error('ket_kehadiran')
          <div class="invalid-feedback">
              {{ $message }}
          </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="tanggal" class="form-label">Tanggal</label>
      <input type="date" value="{{$absensi->tanggal}}" class="form-control @error('tanggal') is-invalid @enderror" name="tanggal">
      @error('tanggal')
          <div class="invalid-feedback">
              {{ $message }}
          </div>
      @enderror
    </div>
    @endforeach
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>


</div>
</div>
@endsection