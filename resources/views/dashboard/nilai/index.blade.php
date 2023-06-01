@extends('dashboard.layouts.main')
@section('container')

<div class="wrapper d-flex align-items-stretch">
  @include('dashboard.layouts.sidebar')

  <!-- Page Content  -->
<div id="content" class="px-4 py-1 p-md-5">
  @include('dashboard.layouts.navbar')


      <a href="/nilai/create" class="btn btn-primary mb-2"><i class="bi bi-plus-square"></i> Tambah Nilai Siswa</a>
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

  @isset($nilais)
  <table class="table table-hover">
    <tr>
        <th>No.</th>
        <th>Siswa</th>
        <th>NISN</th>
        <th>Pembimbing Lapangan</th>
        <th>Nilai Rata-Rata</th>
        <th>Nilai Dalam Huruf</th>
        @can('admin')
          <th colspan="2">Action</th>
        @endcan
    </tr>
    @foreach ($nilais as $nilai)    
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $nilai->siswa->user->fullname }}</td>
            <td>{{ $nilai->siswa->nisn }}</td>
            <td>{{ $nilai->pembimbing_lapangan->user->fullname }}</td>
            <td>{{ $nilai->nilai_rata_rata }}</td>
            <td>{{ $nilai->nilai_huruf }}</td>
            @can('admin')    
              <td>
                <form action="{{ route('nilai.destroy', $nilai->id) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger" title="Hapus data" onclick="return confirm('Apakah anda yakin ingin menghapus?')"><i class="bi bi-trash3-fill"></i></button>
                </form>            
              </td>
              <td>
                <a href="{{route('nilai.edit',$nilai->id)}}" class="btn btn-primary" title="edit"><i class="bi bi-pencil"></i></a>            
            </td>
            @endcan
        </tr>
    @endforeach
  </table>
  {{ $nilais->links() }}
  @endisset



</div>
</div>
@endsection