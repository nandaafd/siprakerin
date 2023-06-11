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
        
@if ($prodi == 'PBS')
    <p>pbs</p>
@endif



        @if ($prodi == 'PBS')
        {{-- pbs --}}
           @foreach ($nilai as $data)
           <h2>Nilai Siswa</h2>
                <ul>
                    <li>Nama : {{$data->siswa->user->fullname}}</li>
                    <li>{{$data->prodi}}</li>
                    <li>{{$data->mitra}}</li>
                </ul>
                <h5>Aspek Non Teknis</h5>
                <ul>
                    <li>Kedisiplinan : {{$data->disiplin}}</li>
                    <li>Kerjasama : {{$data->kerjasama}}</li>
                    <li>Tanggungjawab : {{$data->tanggungjawab}}</li>
                    <li>Inisiatif : {{$data->inisiatif}}</li>
                    <li>Kebersihan : {{$data->kebersihan}}</li>
                    <li>Keberhasilan : {{$data->keberhasilan}}</li>
                </ul>
                <h5>Aspek Teknis</h5>
                <ul>
                    <li>Marketing : {{$data->marketing}}</li>
                    <li>Customer Service : {{$data->cs}}</li>
                    <li>Teller : {{$data->teller}}</li>
                    <li>Administrasi : {{$data->administrasi}}</li>
                    @if ($data->teknis)
                        <li>{{$data->teknis}}</li>
                    @endif
                    
                </ul>
                <p>Nilai Rata-Rata : {{$data->rata_rata}}</p>
                <p>Grade : {{$data->nilai_huruf}}</p>
                @endforeach

        @elseif ($prodi == 'tkj')
        {{-- tkr --}}
            @foreach ($nilai as $data)
            <h2>Nilai Siswa</h2>
                <ul>
                    <li>Nama : {{$data->siswa->user->fullname}}</li>
                    <li>{{$data->prodi}}</li>
                    <li>{{$data->mitra}}</li>
                </ul>
                <h5>Aspek Non Teknis</h5>
                <ul>
                    <li>Kedisiplinan : {{$data->disiplin}}</li>
                    <li>Kerjasama : {{$data->kerjasama}}</li>
                    <li>Tanggungjawab : {{$data->tanggungjawab}}</li>
                    <li>Inisiatif : {{$data->inisiatif}}</li>
                    <li>Kebersihan : {{$data->kebersihan}}</li>
                    <li>Keberhasilan : {{$data->keberhasilan}}</li>
                </ul>
                <h5>Aspek Teknis</h5>
                <ul>
                    <li> {{$data->teknis_1}}</li>
                    <li>{{$data->teknis_2}}</li>
                    <li>{{$data->teknis_3}}</li>
                    <li>{{$data->teknis_4}}</li>
                    @if ($data->teknis_5)
                    <li>{{$data->teknis_5}}</li>
                    @endif   
                </ul>
                <p>Nilai Rata-Rata : {{$data->rata_rata}}</p>
                <p>Grade : {{$data->nilai_huruf}}</p>
                @endforeach

        @elseif ($prodi == 'TKRO')
        {{-- tkr --}}
            @foreach ($nilai as $data)
            <h2>Nilai Siswa</h2>
                <ul>
                    <li>Nama : {{$data->siswa->user->fullname}}</li>
                    <li>{{$data->prodi}}</li>
                    <li>{{$data->mitra}}</li>
                </ul>
                <h5>Aspek Non Teknis</h5>
                <ul>
                    <li>Kedisiplinan : {{$data->disiplin}}</li>
                    <li>Kerjasama : {{$data->kerjasama}}</li>
                    <li>Tanggungjawab : {{$data->tanggungjawab}}</li>
                    <li>Inisiatif : {{$data->inisiatif}}</li>
                    <li>Kebersihan : {{$data->kebersihan}}</li>
                    <li>Keberhasilan : {{$data->keberhasilan}}</li>
                </ul>
                <h5>Aspek Teknis</h5>
                <ul>
                    <li>Perawatan dan Perbaikan Engine : {{$data->perawatan_engine}}</li>
                    <li>Perawatan dan Perbaikan Chasis dan Pemindah Tenaga : {{$data->perawatan_chasis}}</li>
                    <li>Perawatan dan Perbaikan Kelistrikan Bodi Standar : {{$data->perawatan_kelistrikan}}</li>
                    <li>Kesehatan dan Keselamatan Kerja : {{$data->kkk}}</li>
                    @if ($data->teknis)
                    <li>{{$data->teknis}}</li>
                    @endif
                    
                </ul>
                <p>Nilai Rata-Rata : {{$data->rata_rata}}</p>
                <p>Grade : {{$data->nilai_huruf}}</p>
                @endforeach
        @endif

@else
    <div class="row">
      <div class="col text-center mt-5">
        <img src="{{asset('images/closed.png')}}" class="img-fluid" style="max-width: 550px" alt="">
        <h2 style="color:gray;">Oops.. Penilaian Sedang Ditutup Nih</h2>
      </div>
    </div>
@endif
@endsection