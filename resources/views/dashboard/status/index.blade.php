@extends('dashboard.layouts.main')
@section('container')

<div class="wrapper d-flex align-items-stretch">
  @include('dashboard.layouts.sidebar')

  <!-- Page Content  -->
<div id="content" class="px-4 py-1 p-md-5">
  @include('dashboard.layouts.navbar')
        @if($status->isEmpty())
            <a href="/status/create" class="btn btn-primary mb-2"><i class="bi bi-plus-square"></i> Tambah Data</a>
        @endif
  @if(session('success'))
      <div class="alert alert-success">
          {{ session('success') }}
      </div>
  @endif
  @if(session('messageWarning'))
      <div class="alert alert-warning">
          {{ session('messageWarning') }}
      </div>
  @endif
  @isset($status)
  <table class="table table-hover">
    <tr>
        <th>No.</th>
        <th>Pendaftaran</th>
        <th>Penilaian</th>
        <th>Logbook</th>
        <th>Absensi</th>
        @can('admin')
          <th colspan="2">Action</th>
        @endcan
    </tr>
    @forelse ($status as $data)    
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $data->pendaftaran }}</td>
            <td>{{ $data->penilaian}}</td>
            <td>{{ $data->logbook}}</td>
            <td>{{ $data->absensi}}</td>
            @can('admin')    
              <td>
                <form action="{{ route('status.destroy', $data->id) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger" title="Hapus data" onclick="return confirm('Apakah anda yakin ingin menghapus?')"><i class="bi bi-trash3-fill"></i></button>
                </form>            
              </td>
              <td>
                <a href="{{route('status.edit',$data->id)}}" class="btn btn-primary" title="edit"><i class="bi bi-pencil"></i></a>            
            </td>
            @endcan
        </tr>
        @empty
    @endforelse
  </table>
  
  @endisset



</div>
</div>
@endsection