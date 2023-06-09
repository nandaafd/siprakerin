@extends('dashboard.layouts.main')
@section('container')

<div class="wrapper d-flex align-items-stretch">
  @include('dashboard.layouts.sidebar')

  <!-- Page Content  -->
<div id="content" class="px-4 py-1 p-md-5">
  @include('dashboard.layouts.navbar')
  <section>
    @foreach ($laporan as $data)
    <form action="{{route('berkas.update',$data->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="mb-3">
          <label for="nama" class="form-label">Nama Siswa</label> 
          <input type="text" class="form-control" id="nama" name="nama" value="{{$data->nama}}">
        </div> 
        <input type="text" name="oldPath" id="" hidden value="{{$data->link}}">  
        @endforeach
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
</section>


</div>
</div>
@endsection