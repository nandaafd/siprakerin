@extends('dashboard.layouts.main')
@section('container')
<div class="wrapper d-flex align-items-stretch">
    @include('dashboard.layouts.sidebar') 
    <!-- Page Content  -->
<div id="content" class="px-4 py-1 p-md-5">
    @include('dashboard.layouts.navbar')
    <section>
      <form action="/siswa/update" method="post">
      @foreach ($siswa as $data)
          @csrf
          <input type="text" hidden name="id" value="{{$data->id}}">
          <input type="text" hidden name="user_id" value="{{$data->user_id}}">
          <div class="mb-3">
            <label for="nama" class="form-label">Nama</label> 
            <input type="text" class="form-control" id="nama" name="nama" value="{{$data->user->fullname}}">
          </div>
          <div class="mb-3">
              <label for="nisn" class="form-label">NISN</label>
              <input type="text" class="form-control" id="nisn" name="nisn" value="{{$data->nisn}}">
            </div>
            <div class="mb-3">
              <label for="kelas" class="form-label">Kelas</label>
              <select class="form-select" aria-label="Default select example" name="kelas">
                @if ($data->kelas_id == null)
                  <option value="">Belum punya kelas</option>
                  @foreach ($kelas as $kls) 
                  <option value="{{$kls->id}}">{{$kls->nama_kelas}}</option>
                  @endforeach
                @else
                  @foreach ($kelas as $kls) 
                  <option value="{{$kls->id}}" {{$kls->id == $data->kelas->id ? 'selected' : ''}}>{{$kls->kelas}}</option>
                  @endforeach
                @endif
              </select>
            </div>
            <div class="mb-3">
              <label for="alamat" class="form-label">Alamat</label>
              <input type="text" class="form-control" id="alamat" name="alamat" value="{{$data->alamat}}">
            </div>
            <div class="mb-3">
              <label for="no_telpon" class="form-label">No Telpon</label>
              <input type="text" class="form-control" id="no_telpon" name="no_telpon" value="{{$data->no_telpon}}">
            </div>
            <div class="mb-3">
              <label for="pembimbing_lapangan" class="form-label">Pembimbing Lapangan</label>
              <select class="form-select" aria-label="Default select example" name="pembimbing_lapangan">
                @if ($data->pembimbingLapangan == null)
                  <option value="">Belum Punya Pembimbing </option>
                  @foreach ($pembimbing as $pl)
                  <option value="{{$pl->id}}">{{$pl->user->fullname}}</option>
                  @endforeach
                @else 
                  @foreach ($pembimbing as $pl)
                  <option value="{{$pl->id}}" {{$pl->id == $data->pembimbingLapangan->user->id ? 'selected' : ''}}>{{$pl->user->fullname}}</option>
                  @endforeach
                @endif
              </select>
            </div>    
            @endforeach
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </section>
</div>
</div>

@endsection

