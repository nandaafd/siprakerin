@extends('layouts.page')
@section('content')
<div class="row">
    <div class="col" id="prakerin-header">
        <div class="row">
          <div class="col-9">
            @if (Auth::user()->role->name == 'siswa')
                <h2 style="font-weight: 600;">Nilai Yang Anda Dapat Selama Prakerin Adalah <span style="color:#FF6B00;">Hasil Penilaian</span> oleh Pembimbing Lapangan Selama Anda Prakerin!</h2>
                <h4>Yuk, cek Sekarang..</h4>
            @else
            <h2 style="font-weight: 600;">Nilai <span style="color:#FF6B00;">Prakerin Siswa</span> Bisa Anda Lihat Disini! </h2>
            <h4>Yuk, cek Sekarang..</h4>
            @endif
          </div>
          <div class="col-3">
            <img id="vector1" class="img-fluid" src="{{asset('images/vector7.jpg')}}" alt="" srcset="">
          </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col" id="prakerin-page">
        @can('pembimbing-lapangan')
            <a href="{{url('/nilai-siswa/create')}}" class="btn btn-primary mb-2" id="btn-addnilai"><i class="bi bi-plus-square"></i> Tambah Nilai Siswa</a>
        @endcan
        @isset($nilais)
        <table class="table table-hover">
            <tr>
                <th>No.</th>
                <th>Siswa</th>
                <th>NISN</th>
                <th>Nilai Rata-Rata</th>
                <th>Nilai Dalam Huruf</th>
                @can('pembimbing-lapangan')
                <th colspan="2">Aksi</th>
                @endcan
            </tr>
            @foreach ($nilais as $nilai)    
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $nilai->siswa->user->fullname }}</td>
                    <td>{{ $nilai->siswa->nisn }}</td>
                    <td>{{ $nilai->nilai_rata_rata }}</td>
                    <td>{{ $nilai->nilai_huruf }}</td>
                    @can('pembimbing-lapangan')    
                    <td>
                        <a href="{{route('nilai-siswa.edit',$nilai->id)}}" id="btn-editnilai" class="btn btn-primary" title="edit"><i class="bi bi-pencil"></i></a>            
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