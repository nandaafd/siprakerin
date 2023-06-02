@extends('dashboard.layouts.main')
@section('container')

<div class="wrapper d-flex align-items-stretch">
  @include('dashboard.layouts.sidebar')

  <!-- Page Content  -->
<div id="content" class="px-4 py-1 p-md-5">
  @include('dashboard.layouts.navbar')
      <a href="/berkas/create" class="btn btn-primary mb-2"><i class="bi bi-plus-square"></i> Tambah Berkas</a>
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
  @isset($berkas)
  <table class="table table-hover">
    <tr>
        <th>No.</th>
        <th>Nama Berkas</th>
        <th>Path/Link</th>
        @can('admin')
          <th colspan="2">Action</th>
        @endcan
    </tr>
    @forelse ($berkas as $data)    
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $data->nama }}</td>
            <td>{{ $data->link}}</td>
            @can('admin')    
              <td>
                <form action="{{ route('berkas.destroy', $data->id) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger" title="Hapus data" onclick="return confirm('Apakah anda yakin ingin menghapus?')"><i class="bi bi-trash3-fill"></i></button>
                </form>            
              </td>
              <td>
                <a href="{{route('berkas.edit',$data->id)}}" class="btn btn-primary" title="edit"><i class="bi bi-pencil"></i></a>            
            </td>
            @endcan
        </tr>
        @empty
    @endforelse
  </table>
  
  {{ $berkas->links() }}
  @endisset



</div>
</div>
@endsection