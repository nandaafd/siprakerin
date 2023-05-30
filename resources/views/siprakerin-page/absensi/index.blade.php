@extends('layouts.page')
@section('content')
<div class="row">
    <div class="col" id="prakerin-header">
        <div class="row">
          <div class="col-9">
            @can('siswa')
                <h2 style="font-weight: 600;">Jangan Lewatkan <span style="color:#FF6B00;">Pengalaman Menarik</span> 
                    Setiap Harinya Dengan Selalu Mengikuti Kegiatan Prakerin!</h2>
                <h4>Jangan sampai tidak hadir ya..</h4>
            @endcan
            @can('guru')
                <h2 style="font-weight: 600;">Disini, Anda Dapat Memantau Kehadiran Siswa Secara 
                    <span style="color:#FF6B00;">Real Time</span> Setiap Harinya!</h2>
                <h4>Terus awasi mereka ya..</h4>
            @endcan
            @can('pembimbing-lapangan')
                <h2 style="font-weight: 600;">Disini, Anda Dapat Mengisi Kehadiran Siswa Dengan 
                    <span style="color:#FF6B00;">Mudah</span> Setiap Harinya!</h2>
                <h4>Terus awasi mereka ya..</h4>
            @endcan
          </div>
          <div class="col-3">
            <img id="vector4" class="img-fluid" src="{{asset('images/vector4.png')}}" alt="" srcset="">
          </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col" id="prakerin-page">
        @can('pembimbing-lapangan')
            <a href="{{url('/absensi-siswa/create')}}" class="btn btn-primary mb-2" id="btn-addabsen"><i class="bi bi-plus-square"></i> Tambah Absen Siswa</a>
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
        <div class="row">
            <div class="col-9">
                <form action="" method="get" class="row row-cols-sm-auto g-1 mb-4">
                        <div class="col-sm">
                            <select class="form-select form-select-sm" aria-label="Default select example" name="kelas_id" id="filter_kelas">
                                <option value="">Pilih kelas..</option>
                                @foreach ($kelas as $kls)
                                <option value="{{$kls->id}}">{{$kls->nama_kelas}}</option>
                                @endforeach
                              </select>
                        </div>
                        <div class="col-sm">
                            <button type="submit" class="btn btn-primary btn-sm">Search</button>
                            <button type="submit" class="btn btn-secondary btn-sm" id="btn-reset">Reset</button>
                        </div>
                    </form>
            </div>
            <div class="col-3">
                {{-- <a href="/siswa/create" class="btn btn-primary mb-2"><i class="bi bi-plus-square"></i> Tambah Data Siswa</a> --}}
            </div>
        </div>
        @can('siswa')
            @isset($absen_siswa)
            <table class="table table-hover">
                <tr>
                    <th>No.</th>
                    <th>Siswa</th>
                    <th>Pembimbing Lapangan</th>
                    <th>Keterangan Kehadiran</th>
                    <th>Tanggal</th>
                </tr>
                @foreach ($absen_siswa as $absensi)    
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $absensi->siswa->user->fullname }}</td>
                        <td>{{ $absensi->pembimbingLapangan->user->fullname }}</td>
                        <td>{{ $absensi->ket_kehadiran }}</td>
                        <td>{{ $absensi->tanggal }}</td>
                    </tr>
                @endforeach
            </table>
            {{ $absen_siswa->links() }}
            @endisset
        @endcan
        @can('guru')
            @isset($absensis)
            <table class="table table-hover">
                <tr>
                    <th>No.</th>
                    <th>Siswa</th>
                    <th>Pembimbing Lapangan</th>
                    <th>Keterangan Kehadiran</th>
                    <th>Tanggal</th>
                </tr>
                @foreach ($absensis as $absensi)    
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $absensi->siswa->user->fullname }}</td>
                        <td>{{ $absensi->pembimbingLapangan->user->fullname }}</td>
                        <td>{{ $absensi->ket_kehadiran }}</td>
                        <td>{{ $absensi->tanggal }}</td>
                    </tr>
                @endforeach
            </table>
            {{ $absensis->links() }}
            @endisset
        @endcan
        @can('pembimbing-lapangan')
            @isset($absensis)
            <table class="table table-hover">
                <tr>
                    <th>No.</th>
                    <th>Siswa</th>
                    <th>Pembimbing Lapangan</th>
                    <th>Keterangan Kehadiran</th>
                    <th>Tanggal</th>
                </tr>
                @foreach ($absensis as $absensi)    
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $absensi->siswa->user->fullname }}</td>
                        <td>{{ $absensi->pembimbingLapangan->user->fullname }}</td>
                        <td>{{ $absensi->ket_kehadiran }}</td>
                        <td>{{ $absensi->tanggal }}</td>
                    </tr>
                @endforeach
            </table>
            {{ $absensis->links() }}
            @endisset
        @endcan
        
    </div>
</div>
@endsection