@extends('layouts.page')
@section('content')
    <div class="row">
        <div class="col" id="prakerin-header">
            <div class="row">
              <div class="col-9">
                @can('siswa')
                    <h2 style="font-weight: 600;">Bagaimana <span style="color:#FF6B00;">Kegiatanmu</span> Hari Ini?<br>
                        Ayo <span style="color:#FF6B00;">Ekspresikan</span>  Kegiatanmu 
                        Di Logbook Sekarang Juga!</h4>
                    <h5>Logbook adalah catatan sejarahmu selama mengikuti prakerin, yuk isi sekarang.</h5>
                @endcan
                @can('pembimbing-lapangan')
                <h2 style="font-weight: 600;">Dengan <span style="color:#FF6B00;">Logbook</span>, Anda Dapat Memantau Kegiatan Siswa <span style="color:#FF6B00;">Setiap Hari</span> Dengan Mudah!</h4>
                    <h4>Logbook adalah wahana ekspresi siswa selama mengikuti prakerin.</h4>
                @endcan
                @can('guru')
                <h2 style="font-weight: 600;">Dengan <span style="color:#FF6B00;">Logbook</span>, Anda Dapat Memantau Kegiatan Siswa <span style="color:#FF6B00;">Setiap Hari</span> Dengan Mudah!</h4>
                    <h4>Logbook adalah wahana ekspresi siswa selama mengikuti prakerin.</h4>
                @endcan
              </div>
              <div class="col-3">
                <img id="vector2" class="img-fluid" src="{{asset('images/vector2.png')}}" alt="" srcset="">
              </div>
            </div>
        </div>
        <div class="row">
            <div class="col" id="logbook-page" class="">
                @can('siswa')
                    <a href="/logbooks/create" id="btn-addlogbook" class="btn btn-primary mb-2"><i class="bi bi-plus-square"></i> Isi Logbook</a>
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
                <table class="table table-hover table-striped">
                    <tr>
                        <th>No.</th>
                        <th>Siswa</th>
                        <th>NISN</th>
                        {{-- <th>Pembimbing Lapangan</th> --}}
                        <th>Impresi</th>
                        <th>Catatan Kegiatan</th>
                        <th>Tanggal</th>
                    </tr>
                    @foreach ($logbooks as $logbook)    
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $logbook->siswa->user->fullname }}</td>
                        <td>{{ $logbook->siswa->nisn }}</td>
                        {{-- <td>{{ $logbook->siswa->pembimbing_lapangan->user->fullname }}</td> --}}
                        <td>{{ $logbook->impresi }}</td>
                        <td>{{ $logbook->catatan_kegiatan }}</td>
                        <td>{{ $logbook->tanggal }}</td>
                    </tr>
                @endforeach
                </table>
                {{ $logbooks->links() }}
                @endisset
                
            </div>
        </div>
    </div>
@endsection