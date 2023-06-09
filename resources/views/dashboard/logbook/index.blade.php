@extends('dashboard.layouts.main')
@section('container')

<div class="wrapper d-flex align-items-stretch">
  @include('dashboard.layouts.sidebar')

  <!-- Page Content  -->
<div id="content" class="px-4 py-1 p-md-5">
  @include('dashboard.layouts.navbar')


  @can('siswa')
      <a href="/logbook/create" class="btn btn-primary mb-2"><i class="bi bi-plus-square"></i> Tambah Absen Siswa</a>
  @endcan
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

  @isset($logbooks)
  <table class="table table-hover">
    <tr>
      <th>No.</th>
      <th>Siswa</th>
      <th>Impresi</th>
      <th>Kegiatan</th>
      <th>Detail</th>
      <th>Tanggal</th>
        @can('admin')
          <th colspan="2">Action</th>
        @endcan
    </tr>
    @foreach ($logbooks as $logbook)    
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $logbook->siswa->user->fullname }}</td>
          <td>{{ $logbook->impresi }}</td>
          <td>{{ $logbook->kegiatan }}</td> 
          <td><a href="{{route('logbook.show',$logbook->id)}}">Lihat Detail</a></td>
          <td>{{ $logbook->tanggal }}</td>
            @can('admin')    
              <td>
                <form action="{{ route('logbook.destroy', $logbook->id) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger" title="Hapus data" onclick="return confirm('Apakah anda yakin ingin menghapus?')"><i class="bi bi-trash3-fill"></i></button>
                </form>            
              </td>
              <td>
                <a href="{{route('logbook.edit',$logbook->id)}}" class="btn btn-primary" title="edit"><i class="bi bi-pencil"></i></a>            
            </td>
            @endcan
        </tr>
    @endforeach
  </table>
  {{ $logbooks->links() }}
  @endisset



</div>
</div>
@endsection