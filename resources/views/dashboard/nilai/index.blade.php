@extends('dashboard.layouts.main')
@section('container')

<div class="wrapper d-flex align-items-stretch">
  @include('dashboard.layouts.sidebar')

  <!-- Page Content  -->
<div id="content" class="px-4 py-1 p-md-5">
  @include('dashboard.layouts.navbar')


  @can('pembimbing-lapangan')
      <a href="/nilai/create" class="btn btn-primary mb-2"><i class="bi bi-plus-square"></i> Tambah Nilai Siswa</a>
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

  @isset($nilais)
  <table class="table table-hover">
    <tr>
      {{-- buat siswa hanya bisa melihat data nilainya saja --}}
        <th>No.</th>
        <th>Siswa</th>
        <th>NISN</th>
        <th>Pembimbing Lapangan</th>
        <th>Nilai A</th>
        <th>Nilai B</th>
        <th>Nilai C</th>
        <th>Nilai Total</th>
        @can('pembimbing-lapangan')
          <th>Action</th>
        @endcan
    </tr>
    @foreach ($nilais as $nilai)    
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $nilai->siswa->user->fullname }}</td>
            <td>{{ $nilai->siswa->nisn }}</td>
            <td>{{ $nilai->pembimbing_lapangan->user->fullname }}</td>
            <td>{{ $nilai->nilai_A }}</td>
            <td>{{ $nilai->nilai_B }}</td>
            <td>{{ $nilai->nilai_C }}</td>
            <td>{{ $nilai->nilai_total }}</td>
            @can('pembimbing-lapangan')    
              <td>
                <form action="{{ route('nilai.destroy', $nilai->id) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger" title="Hapus data" onclick="return confirm('Apakah anda yakin ingin menghapus?')"><i class="bi bi-trash3-fill"></i></button>
                </form>            
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