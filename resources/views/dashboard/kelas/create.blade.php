@extends('dashboard.layouts.main')
@section('container')

<div class="wrapper d-flex align-items-stretch">
  @include('dashboard.layouts.sidebar')

  <!-- Page Content  -->
<div id="content" class="px-4 py-1 p-md-5">
  @include('dashboard.layouts.navbar')


  <form action="/kelas" method="POST">
    @method('post')
    @csrf
    
    <div class="mb-3">
      <label for="nama" class="form-label">Nama Kelas</label>
      <input type="text" value="{{ old('nama') }}" class="form-control @error('nama') is-invalid @enderror" name="nama">
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