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
        {{-- pbs --}}
        <div class="">
           @foreach ($nilai as $data)
           <h2 class="mx-auto fw-bold">Nilai Siswa</h2>
           <div class="">
                <p>Nama : {{$data->siswa->user->fullname}} <br>
                    Program Studi : {{$data->prodi}} <br>
                    Mitra Du/Di : {{$data->mitra}}
                </p>
                
            </div>
            <div>
                <h5 class="badge-warning mx-auto" style="width: fit-content">Aspek Non Teknis</h5>
                <ul>
                    <li>Kedisiplinan : {{$data->disiplin}}</li>
                    <li>Kerjasama : {{$data->kerjasama}}</li>
                    <li>Tanggungjawab : {{$data->tanggungjawab}}</li>
                    <li>Inisiatif : {{$data->inisiatif}}</li>
                    <li>Kebersihan : {{$data->kebersihan}}</li>
                    <li>Keberhasilan : {{$data->keberhasilan}}</li>
                </ul>
            </div>
            <div>
                <h5 class="badge-warning mx-auto" style="width: fit-content">Aspek Teknis</h5>
                <ul>
                    <li>Marketing : {{$data->marketing}}</li>
                    <li>Customer Service : {{$data->cs}}</li>
                    <li>Teller : {{$data->teller}}</li>
                    <li>Administrasi : {{$data->administrasi}}</li>
                    @if ($data->teknis)
                        <li>{{$data->teknis}}</li>
                    @endif
                    
                </ul>
            </div>
            <p class="fw-semibold">Nilai Rata-Rata : {{$data->rata_rata}}</p>
            <p class="fw-semibold">Grade : <span style="background-color: greenyellow;">{{$data->nilai_huruf}}</span></p>
                @endforeach
        </div>

        @elseif ($prodi == 'TKJ')
        {{-- tkj --}}
        <div class="text-center">
            @foreach ($nilai as $data)

            <h2 class="text-center fw-bold">Nilai Siswa</h2>
                <p>Nama : {{$data->siswa->user->fullname}} <br>
                    Program Studi : {{$data->prodi}} <br>
                    Mitra Du/Di : {{$data->mitra}}
                </p>
                <h5 class="badge-warning mx-auto" style="width: fit-content">Aspek Non Teknis</h5>
                <ul>
                    <li>Kedisiplinan : {{$data->disiplin}}</li>
                    <li>Kerjasama : {{$data->kerjasama}}</li>
                    <li>Tanggungjawab : {{$data->tanggungjawab}}</li>
                    <li>Inisiatif : {{$data->inisiatif}}</li>
                    <li>Kebersihan : {{$data->kebersihan}}</li>
                    <li>Keberhasilan : {{$data->keberhasilan}}</li>
                </ul>
                <h5 class="badge-warning mx-auto" style="width: fit-content">Aspek Teknis</h5>
                <ul>
                    <li> {{$data->teknis_1}}</li>
                    <li>{{$data->teknis_2}}</li>
                    <li>{{$data->teknis_3}}</li>
                    <li>{{$data->teknis_4}}</li>
                    @if ($data->teknis_5)
                    <li>{{$data->teknis_5}}</li>
                    @endif   
                </ul>
                <p class="fw-semibold">Nilai Rata-Rata : {{$data->rata_rata}}</p>
                <p class="fw-semibold">Grade : <span style="background-color: greenyellow;">{{$data->nilai_huruf}}</span></p>
                @endforeach
            </div>

        @elseif ($prodi == 'TKRO')
        {{-- tkr --}}
        <div class="">
            @foreach ($nilai as $data)
            <h2>Nilai Siswa</h2>
                <p>Nama : {{$data->siswa->user->fullname}} <br>
                    Program Studi : {{$data->prodi}} <br>
                    Mitra Du/Di : {{$data->mitra}}
                </p>
                <h5 class="badge-warning mx-auto" style="width: fit-content">Aspek Non Teknis</h5>
                <ul>
                    <li>Kedisiplinan : {{$data->disiplin}}</li>
                    <li>Kerjasama : {{$data->kerjasama}}</li>
                    <li>Tanggungjawab : {{$data->tanggungjawab}}</li>
                    <li>Inisiatif : {{$data->inisiatif}}</li>
                    <li>Kebersihan : {{$data->kebersihan}}</li>
                    <li>Keberhasilan : {{$data->keberhasilan}}</li>
                </ul>
                <h5 class="badge-warning mx-auto" style="width: fit-content">Aspek Teknis</h5>
                <ul>
                    <li>Perawatan dan Perbaikan Engine : {{$data->perawatan_engine}}</li>
                    <li>Perawatan dan Perbaikan Chasis dan Pemindah Tenaga : {{$data->perawatan_chasis}}</li>
                    <li>Perawatan dan Perbaikan Kelistrikan Bodi Standar : {{$data->perawatan_kelistrikan}}</li>
                    <li>Kesehatan dan Keselamatan Kerja : {{$data->kkk}}</li>
                    @if ($data->teknis)
                    <li>{{$data->teknis}}</li>
                    @endif
                    
                </ul>
                <p class="fw-semibold">Nilai Rata-Rata : {{$data->rata_rata}}</p>
                <p class="fw-semibold">Grade : <span style="background-color: greenyellow;">{{$data->nilai_huruf}}</span></p>
                @endforeach
            </div>
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