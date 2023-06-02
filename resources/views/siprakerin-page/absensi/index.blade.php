@extends('layouts.page')
@section('content')
@if ($status == 'buka')
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
        <h4 class="mb-3">Data Absensi Siswa</h4>
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
            <div class="col">
                <form action="" method="get" class="row row-cols-sm-auto g-1 mb-4">
                        <div class="col-sm">
                           <p class="mx-2 my-auto">Filter</p>
                        </div>
                        <div class="col-sm">
                            <input type="date" name="tanggal" id="" class="form-control form-control-sm">
                        </div>
                        @can('guru')
                        <div class="col-sm">
                            <select  class="form-select form-select-sm" aria-label="Default select example" name="pl" id="">
                                <option value="">Pilih pembimbing..</option>
                                @foreach ($pl as $data)
                                <option value="{{$data->id}}">{{$data->user->fullname}}</option>
                                @endforeach
                            </select>
                        </div>
                        @endcan
                        <div class="col-sm">
                            <select  class="form-select form-select-sm" aria-label="Default select example" name="ket" id="">
                                <option value="">Pilih Keterangan..</option>
                                <option value="Hadir">Hadir</option>
                                <option value="Izin">Izin</option>
                                <option value="Absen">Absen</option>
                                <option value="Sakit">Sakit</option>
                            </select>
                        </div>
                        <div class="col-sm">
                            <button type="submit" class="btn btn-primary btn-sm">Search</button>
                            <button type="submit" class="btn btn-secondary btn-sm" id="btn-reset">Reset</button>
                        </div>
                </form>
            </div>
        </div>
        @can('siswa')
            @isset($absen_siswa)
            <table class="table table-hover">
                    @if ($ket or $tanggal)
                    <p>Hasil filter : <span style="color: #FF6B00">{{$tanggal}}, {{$ket}}</span></p>
                    @endif
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
                @if ($ket or $tanggal)
                    <p>Hasil filter : <span style="color: #FF6B00">{{$tanggal}}, {{$ket}}</span></p>
                    @endif
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
                @if ($ket or $tanggal)
                    <p>Hasil filter : <span style="color: #FF6B00">{{$tanggal}}, {{$ket}}</span></p>
                    @endif
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
@else
    <div class="row">
      <div class="col text-center mt-5">
        <img src="{{asset('images/closed.png')}}" class="img-fluid" style="max-width: 550px" alt="">
        <h2 style="color:gray;">Oops.. Pengisian Absensi Sedang Ditutup Nih</h2>
      </div>
    </div>
@endif
@endsection