@extends('layouts.page')
@section('content')
    <div class="row">
        <div class="col" id="prakerin-header">
            <div class="row">
              <div class="col-9">
                @can('siswa')
                    <h2 style="font-weight: 600;">Bagaimana <span style="color:#FF6B00;">Kegiatanmu</span> Hari Ini?<br>
                        Ayo <span style="color:#FF6B00;">Ekspresikan</span>  Kegiatanmu 
                        Di Logbook Sekarang Juga!</h4>
                    <h4>Logbook adalah catatan sejarahmu selama mengikuti prakerin, yuk isi sekarang.</h4>
                @endcan
              </div>
              <div class="col-3">
                <img id="vector1" class="img-fluid" src="{{asset('images/vector2.png')}}" alt="" srcset="">
              </div>
            </div>
        </div>
        <div class="row">
            <div class="col" id="logbook-page" class="">
              @if(session('messageWarning'))
                  <div class="alert alert-warning">
                      {{ session('messageWarning') }}
                  </div>
              @endif
              @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                @can('siswa')
                <form action="{{url('/logbooks')}}" method="POST">
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
                      <label for="deskripsi_kegiatan" class="form-label">Deskripsi Kegiatan</label>
                      <textarea name="deskripsi_kegiatan" id="deskripsi_kegiatan" cols="30" rows="10" value="{{ old('deskripsi_kegiatan') }}" class="form-control @error('deskripsi_kegiatan') is-invalid @enderror"></textarea>
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
                    <button type="submit" class="btn btn-primary" id="btn-submitlogbook">Submit</button>
                  </form>
                @endcan
            </div>
        </div>
    </div>
@endsection