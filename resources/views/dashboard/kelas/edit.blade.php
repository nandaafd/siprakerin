@extends('dashboard.layouts.main')
@section('container')

<div class="wrapper d-flex align-items-stretch">
  @include('dashboard.layouts.sidebar')

  <!-- Page Content  -->
<div id="content" class="px-4 py-1 p-md-5">
  @include('dashboard.layouts.navbar')

@foreach ($kelas as $data)
    

  <form action="{{route('kelas.update',$data->id)}}" method="POST">
    @method('put')
    @csrf
    
    <div class="mb-3">
      <label for="nama" class="form-label">Nama Kelas</label>
      <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{$data->nama_kelas}}">
      @error('nama')
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