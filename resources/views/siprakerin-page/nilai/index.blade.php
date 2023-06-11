@extends('layouts.page')
@section('content')
@if ($status == 'buka')
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
        <div class="col-9">
            <form action="" method="get" class="row row-cols-sm-auto g-1 mb-4">
                    <p class="mx-2 my-auto">Filter</p>
                  <div class="col-sm">
                      <select name="filter" id="" class="form-select form-select-sm">
                        <option value="">Pilih Prodi..</option>
                        <option value="TKJ">TKJ</option>
                        <option value="PBS">PBS</option>
                        <option value="TKRO">TKRO</option>
                      </select>
                  </div>
                  <div class="col-sm">
                      <button type="submit" class="btn btn-primary btn-sm">Search</button>
                      <button type="submit" class="btn btn-secondary btn-sm" id="btn-reset">Reset</button>
                  </div>
              </form>
            </div>
        <div class="col-3">
            @can('pembimbing-lapangan')
                <a href="{{url('/nilai-siswa/create')}}" class="btn btn-primary mb-2" id="btn-addnilai"><i class="bi bi-plus-square"></i> Tambah Nilai Siswa</a>
            @endcan
        </div>
        
        @isset($nilai)
        <table class="table table-hover">
            @if ($filter)
            <p>Hasil filter : <span style="color: #FF6B00">{{$filter}}</span></p>
            @endif
            <tr>
                <th>No.</th>
                <th>Siswa</th>
                <th>Prodi</th>
                <th>Rata-Rata</th>
                <th>Grade</th>
                <th>Detail</th>
                @can('pembimbing-lapangan')
                <th colspan="2">Aksi</th>
                @endcan
            </tr>
            @foreach ($nilai as $data)    
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->siswa->user->fullname }}</td>
                    <td>{{ $data->prodi }}</td>
                    <td>{{ $data->rata_rata }}</td>
                    <td>{{ $data->nilai_huruf }}</td>
                    <td><a href="{{route('nilai-siswa.show',$data->siswa_id)}}">Lihat detail</a></td>
                    @can('pembimbing-lapangan')    
                    <td>
                        <a href="{{route('nilai-siswa.edit',$nilai->id)}}" id="btn-editnilai" class="btn btn-primary" title="edit"><i class="bi bi-pencil"></i></a>            
                    </td>
                    @endcan
                </tr>
            @endforeach
        </table>
        @endisset
    </div>
</div>
@else
    <div class="row">
      <div class="col text-center mt-5">
        <img src="{{asset('images/closed.png')}}" class="img-fluid" style="max-width: 550px" alt="">
        <h2 style="color:gray;">Oops.. Penilaian Sedang Ditutup Nih</h2>
      </div>
    </div>
@endif
@endsection