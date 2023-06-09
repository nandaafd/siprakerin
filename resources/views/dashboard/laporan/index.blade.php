@extends('dashboard.layouts.main')
@section('container')

<div class="wrapper d-flex align-items-stretch">
  @include('dashboard.layouts.sidebar')

  <!-- Page Content  -->
<div id="content" class="px-4 py-1 p-md-5">
  @include('dashboard.layouts.navbar')
     
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
  @isset($laporan)
  <table class="table table-hover">
    <tr>
        <th>No.</th>
        <th>Nama Siswa</th>
        <th>File</th>
        @can('admin')
          <th colspan="2">Action</th>
        @endcan
    </tr>
    @forelse ($laporan as $data)    
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $data->nama }}</td>
            <td><a href="{{asset('storage/'.$data->file)}}" download="laporan_akhir_{{$data->nama}}" class="btn btn-primary">Download</a></td>
            @can('admin')    
              <td>
                <form action="{{ route('data-laporan.destroy', $data->id) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger" title="Hapus data" onclick="return confirm('Apakah anda yakin ingin menghapus?')"><i class="bi bi-trash3-fill"></i></button>
                </form>            
              </td>
              <td>
                <a href="{{route('data-laporan.edit',$data->id)}}" class="btn btn-primary" title="edit"><i class="bi bi-pencil"></i></a>            
            </td>
            @endcan
        </tr>
        @empty
    @endforelse
  </table>
  
  {{ $laporan->links() }}
  @endisset



</div>
</div>
@endsection