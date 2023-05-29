@extends('layouts.page')
@section('content')
<div class="row">
    <div class="col" id="prakerin-header">
        <div class="row">
          <div class="col-9">
            <h2 style="font-weight: 600;">Mulai <span style="color:#FF6B00;"> Mimpi Dan Petualanganmu </span> 
              Dengan Mendaftar Prakerin Sekarang Juga!</h2>
            <h4>Jangan sampai terlambat ya..</h4>
          </div>
          <div class="col-3">
            <img id="vector1" class="img-fluid" src="{{asset('images/vector1.png')}}" alt="" srcset="">
          </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col" id="prakerin-page">
        <form action="{{url('/absensi-siswa')}}" method="POST">
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
              {{-- <input type="text" value="{{ old('ket_kehadiran') }}" class="form-control @error('ket_kehadiran') is-invalid @enderror" name="ket_kehadiran"> --}}
              <select class="form-select @error('ket_kehadiran') is-invalid @enderror" value="{{ old('impresi') }}" aria-label="Default select example" name="ket_kehadiran">
                <option selected>Pilih kehadiran..</option>
                <option value="Hadir">Hadir</option>
                <option value="Izin">Izin</option>
                <option value="Sakit">Sakit</option>
                <option value="Absen">Absen</option>
              </select>
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