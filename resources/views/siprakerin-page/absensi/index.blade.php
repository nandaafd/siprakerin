@extends('layouts.page')
@section('content')
<div class="row">
    <div class="col" id="prakerin-header">
        <div class="row">
          <div class="col-9">
            <h2 style="font-weight: 600;">Mulai <span style="color:#FF6B00;"> Mimpi Dan Petualanganmu </span> 
              Dengan Mendaftar Prakerin Sekarang Juga!</h2>
            <h4>Jangan sampai terlambat ya..</h4>
          </div>
          <div class="col-3">
            <img id="vector1" class="img-fluid" src="{{asset('images/vector1.png')}}" alt="" srcset="">
          </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col" id="prakerin-page">
        @can('pembimbing-lapangan')
            <a href="{{url('/absensi-siswa/create')}}" class="btn btn-primary mb-2"><i class="bi bi-plus-square"></i> Tambah Absen Siswa</a>
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

        @isset($absensis)
        <table class="table table-hover">
            <tr>
                <th>No.</th>
                <th>Siswa</th>
                <th>Pembimbing Lapangan</th>
                <th>Keterangan Kehadiran</th>
                <th>Tanggal</th>
                @can('admin')
                <th>Action</th>
                @endcan
            </tr>
            @foreach ($absensis as $absensi)    
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $absensi->siswa->user->fullname }}</td>
                    <td>{{ $absensi->pembimbingLapangan->user->fullname }}</td>
                    <td>{{ $absensi->ket_kehadiran }}</td>
                    <td>{{ $absensi->tanggal }}</td>
                    @can('admin')    
                    <td>
                        <form action="{{ route('absensi.destroy', $absensi->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" title="Hapus data" onclick="return confirm('Apakah anda yakin ingin menghapus?')"><i class="bi bi-trash3-fill"></i></button>
                        </form>            
                    </td>
                    @endcan
                </tr>
            @endforeach
        </table>
        {{ $absensis->links() }}
        @endisset
    </div>
</div>
@endsection