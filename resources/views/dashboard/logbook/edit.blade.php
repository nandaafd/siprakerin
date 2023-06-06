@extends('dashboard.layouts.main')
@section('container')

<div class="wrapper d-flex align-items-stretch">
  @include('dashboard.layouts.sidebar')

  <!-- Page Content  -->
<div id="content" class="px-4 py-1 p-md-5">
  @include('dashboard.layouts.navbar')

@foreach($logbooks as $key => $logbook)
    

  <form action="{{route('logbook.update',$logbook->id)}}" method="POST">
    @method('put')
    @csrf
    <div>
        <input type="hidden" value="{{ $logbook->siswa_id }}" name="siswa_id">
    </div>
    <div>
        <label for="" class="form-label">Siswa</label>
        <input type="text" readonly class="mb-3 form-control" value="{{$logbook->siswa->user->fullname}}" name="" id="">
    </div>
    <div class="mb-3">
      <label for="impresi" class="form-label">Impresi</label>
      <select class="form-select @error('impresi') is-invalid @enderror" value="{{ old('impresi') }}" aria-label="Default select example" name="impresi">
        <option {{$logbook->impresi == 'Sangat seru' ? 'selected' : ''}} value="Sangat seru">Sangat seru</option>
        <option {{$logbook->impresi == 'Seru' ? 'selected' : ''}} value="Seru">Seru</option>
        <option {{$logbook->impresi == 'Biasa saja' ? 'selected' : ''}} value="Biasa saja">Biasa saja</option>
        <option {{$logbook->impresi == 'Kurang' ? 'selected' : ''}} value="Kurang">Kurang</option>
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
      <input type="text" value="{{$logbook->kegiatan}}" class="form-control @error('kegiatan') is-invalid @enderror" name="kegiatan">
      @error('deskripsi_kegiatan')
          <div class="invalid-feedback">
              {{ $message }}
          </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="deskripsi_kegiatan" class="form-label">Deskripsi Kegiatan</label>
      <input type="text" value="{{$logbook->deskripsi_kegiatan}}" class="form-control @error('deskripsi_kegiatan') is-invalid @enderror" name="deskripsi_kegiatan">
      @error('deskripsi_kegiatan')
          <div class="invalid-feedback">
              {{ $message }}
          </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="tanggal" class="form-label">Tanggal</label>
      <input type="date" value="{{$logbook->tanggal}}" class="form-control @error('tanggal') is-invalid @enderror" name="tanggal">
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