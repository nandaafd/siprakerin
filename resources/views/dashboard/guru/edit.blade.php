@extends('dashboard.layouts.main')
@section('container')
<div class="wrapper d-flex align-items-stretch">
    @include('dashboard.layouts.sidebar') 
    <!-- Page Content  -->
<div id="content" class="px-4 py-1 p-md-5">
    @include('dashboard.layouts.navbar')
    <section>
        @foreach ($guru as $data)
        <form action="{{route('data-guru.update',$data->id)}}" method="post">
            @csrf
            @method('put')
            <input type="text" hidden name="user_id" id="user_id" value="{{$data->user_id}}">
            <div class="mb-3">
              <label for="nama" class="form-label">Nama Lengkap</label> 
              <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="{{$data->user->fullname}}">
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Panggilan</label> 
                <input type="text" class="form-control" id="nama_panggilan" name="nama_panggilan" value="{{$data->user->nickname}}">
              </div>
            <div class="mb-3">
                <label for="nip" class="form-label">NIP/NIY</label>
                <input type="text" class="form-control" id="nip" name="nip" value="{{$data->nip_niy}}">
              </div>
              <div class="mb-3">
                <label for="no_telpon" class="form-label">No Telpon</label>
                <input type="text" class="form-control" id="no_telpon" name="no_telpon" value="{{$data->no_telpon}}">
              </div>
              @endforeach   
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </section>
</div>
</div>

@endsection