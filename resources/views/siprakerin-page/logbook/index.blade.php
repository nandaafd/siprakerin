@extends('layouts.page')
@section('content')

@if ($status == 'buka')

    {{-- <div class="row">
        <div class="col text-center mt-5">
          <img src="{{asset('images/closed.png')}}" class="img-fluid" style="max-width: 550px" alt="">
          <h2 style="color:gray;">Oops.. Maaf anda tidak dapat mengakses logbook karena sedang tidak prakerin</h2>
        </div>
      </div> --}}
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
            {{-- {{Auth::user()->siswa[0]['pembimbing_lapangan_id']}} --}}
            <div class="col" id="logbook-page" class="">
                <h4 class="mb-3">Data Logbook Siswa</h4>
                
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if(session('messageWarning'))
                    <div class="col text-center mt-5">
                        {{ session('messageWarning') }}
                    </div>  
                @endif
                <div class="row">
                    <div class="col-9">
                        <form action="" method="get" class="row row-cols-sm-auto g-1 mb-4">
                                   <p class="mx-2 my-auto">Filter</p>
                                <div class="col-sm">
                                    <input type="date" name="tanggal" id="" class="form-control form-control-sm">
                                </div>
                                <div class="col-sm">
                                    <button type="submit" class="btn btn-primary btn-sm">Search</button>
                                    <button type="submit" class="btn btn-secondary btn-sm" id="btn-reset">Reset</button>
                                </div>
                        </form>
                    </div>
                    <div class="col-3">
                        @can('siswa')
                            <a href="/logbooks/create" id="btn-addlogbook" class="btn btn-primary mb-2"><i class="bi bi-plus-square"></i> Isi Logbook</a>
                        @endcan
                    </div>
                </div>
                
                @isset($logbooks)
                <table class="table table-hover">
                    @if ($tanggal)
                        <p>Hasil filter : <span style="color: #FF6B00">{{$tanggal}}</span></p>
                    @endif 
                    <tr>
                        <th>No.</th>
                        <th>Siswa</th>
                        <th>Impresi</th>
                        <th>Kegiatan</th>
                        <th>Detail</th>
                        <th>Tanggal</th>
                    </tr>
                    @foreach ($logbooks as $logbook)    
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $logbook->siswa->user->fullname }}</td>
                        <td>{{ $logbook->impresi }}</td>
                        <td>{{ $logbook->kegiatan }}</td>
                        <td><a href="{{route('logbooks.show',$logbook->id)}}">Lihat Detail</a></td>
                        <td>{{ $logbook->tanggal }}</td>
                    </tr>
                @endforeach
                </table>
                {{ $logbooks->links() }}
                @endisset
                
            </div>
        </div>
    </div>
    @else
    <div class="row">
      <div class="col text-center mt-5">
        <img src="{{asset('images/closed.png')}}" class="img-fluid" style="max-width: 550px" alt="">
        <h2 style="color:gray;">Oops.. Pengisian Logbook Sedang Ditutup Nih</h2>
      </div>
    </div>
@endif
@endsection