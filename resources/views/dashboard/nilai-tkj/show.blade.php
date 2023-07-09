@extends('dashboard.layouts.main')
@section('container')
<div class="wrapper d-flex align-items-stretch">
    @include('dashboard.layouts.sidebar') 
    <!-- Page Content  -->
<div id="content" class="px-4 py-1 p-md-5">
    @include('dashboard.layouts.navbar')
    <section>
        <div class="row">
            <div class="col">
                @foreach ($nilai as $data)
                <h2>Nilai Siswa</h2>
                <ul>
                    <li>Nama : {{$data->siswa ? $data->siswa->user->fullname : 'Data Siswa Ini Telah Dihapus'}}</li>
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
            </div>
        </div>
    </section>
</div>
</div>

@endsection