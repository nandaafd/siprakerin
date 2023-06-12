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
        {{-- PBS --}}
        @if ($prodi == 'PBS')
        @foreach ($nilai as $data)
        <form action="{{route('nilai-siswa.update',$data->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="mb-3">
                <h3>ASPEK NON TEKNIS</h3>
              </div>
            <div class="mb-3">
                <label for="siswa" class="form-label">Siswa: NISN/Nama</label>
                    <input type="text" class="form-control" name="siswa" readonly value="{{$data->siswa->user->fullname}}">
              </div>
              <input type="text" name="pbs" value="pbs" hidden>
            <div class="mb-3">
                <label for="angkatan" class="form-label">Prodi</label>
                <select class="form-control @error('prodi') is-invalid @enderror" name="prodi">
                    <option value="PBS">PBS</option>
                </select>
              </div>
              <div class="mb-3">
                <label for="perusahaan" class="form-label">Mitra Perusahaan</label>
                <input type="text" class="form-control" id="mitra" name="mitra" value="{{$data->mitra}}">
              </div>
              <div class="mb-3">
                <label for="perusahaan" class="form-label">Kedisiplinan</label>
                <input type="number" class="form-control" id="" name="disiplin" value="{{$data->disiplin}}">
              </div>
              <div class="mb-3">
                <label for="perusahaan" class="form-label">Kerjasama</label>
                <input type="number" class="form-control" id="" name="kerjasama" value="{{$data->kerjasama}}">
              </div>
              <div class="mb-3">
                <label for="perusahaan" class="form-label">Tanggungjawab</label>
                <input type="number" class="form-control" id="tanggungjawab" name="tanggungjawab" value="{{$data->tanggungjawab}}">
              </div>
              <div class="mb-3">
                <label for="bidang" class="form-label">Inisiatif</label>
                <input type="number" class="form-control" id="inisiatif" name="inisiatif" value="{{$data->inisiatif}}">
              </div>
              <div class="mb-3">
                <label for="alamat" class="form-label">Kebersihan</label>
                <input type="number" class="form-control" id="kebersihan" name="kebersihan" value="{{$data->kebersihan}}">
              </div>    
              <div class="mb-3">
                <label for="kontak" class="form-label">Keberhasilan</label>
                <input type="number" class="form-control" id="keberhasilan" name="keberhasilan" value="{{$data->keberhasilan}}">
              </div>
              <div class="mb-3">
                <h3>ASPEK TEKNIS</h3>
              </div>
              <div class="mb-3">
                <label for="kontak" class="form-label">Marketing</label>
                <input type="number" class="form-control" id="" name="marketing" value="{{$data->marketing}}">
              </div>
              <div class="mb-3">
                <label for="kontak" class="form-label">Customer Service</label>
                <input type="number" class="form-control" id="" name="cs" value="{{$data->cs}}">
              </div>
              <div class="mb-3">
                <label for="kontak" class="form-label">Teller</label>
                <input type="number" class="form-control" id="" name="teller" value="{{$data->teller}}">
              </div>
              <div class="mb-3">
                <label for="kontak" class="form-label">Administrasi dan Pembukuan</label>
                <input type="number" class="form-control" id="" name="administrasi" value="{{$data->administrasi}}">
              </div>
              <div class="row mb-3" id="">
                <label for="kontak" class="form-label">Aspek Teknis Tambahan (Tidak Wajib)</label>
                <div class="col">
                    <input type="text" class="form-control" id="" name="teknis" value="" placeholder="contoh : pencatatan keuangan">
                </div>
                <div class="col">
                    <input type="text" class="form-control" id="" name="angka_teknis" value="" placeholder="Angka nilai | contoh : 90">
                </div>
              </div>
              @endforeach
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>


        {{-- TKJ --}}
        @elseif ($prodi == 'TKJ')
        @foreach ($nilai as $data)
        <form action="{{route('nilai-siswa.update',$data->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="mb-3">
                <h3>ASPEK NON TEKNIS</h3>
              </div>
              <input type="text" name="tkj" value="tkj" hidden>
            <div class="mb-3">
                <label for="siswa" class="form-label">Siswa: NISN/Nama</label>
                        <input type="text" class="form-control" value="{{$data->siswa->user->fullname}}" name="siswa" readonly>
              </div>
            <div class="mb-3">
                <label for="angkatan" class="form-label">Prodi</label>
                    <select class="form-control @error('prodi') is-invalid @enderror" name="prodi">
                        <option value="TKJ">TKJ</option>
                    </select>
              </div>
              <div class="mb-3">
                <label for="perusahaan" class="form-label">Mitra Perusahaan</label>
                <input type="text" class="form-control" id="mitra" name="mitra" value="{{$data->mitra}}">
              </div>
              <div class="mb-3">
                <label for="perusahaan" class="form-label">Kedisiplinan</label>
                <input type="number" class="form-control" id="" name="disiplin" value="{{$data->disiplin}}">
              </div>
              <div class="mb-3">
                <label for="perusahaan" class="form-label">Kerjasama</label>
                <input type="number" class="form-control" id="" name="kerjasama" value="{{$data->kerjasama}}">
              </div>
              <div class="mb-3">
                <label for="perusahaan" class="form-label">Tanggungjawab</label>
                <input type="number" class="form-control" id="tanggungjawab" name="tanggungjawab" value="{{$data->tanggungjawab}}">
              </div>
              <div class="mb-3">
                <label for="bidang" class="form-label">Inisiatif</label>
                <input type="number" class="form-control" id="inisiatif" name="inisiatif" value="{{$data->inisiatif}}">
              </div>
              <div class="mb-3">
                <label for="alamat" class="form-label">Kebersihan</label>
                <input type="number" class="form-control" id="kebersihan" name="kebersihan" value="{{$data->kebersihan}}">
              </div>    
              <div class="mb-3">
                <label for="kontak" class="form-label">Keberhasilan</label>
                <input type="number" class="form-control" id="keberhasilan" name="keberhasilan" value="{{$data->keberhasilan}}">
              </div>
              <div class="mb-3">
                <h3>ASPEK TEKNIS</h3>
              </div>
              <div class="row mb-3" id="">
                <label for="kontak" class="form-label">Aspek Teknis 1 (Wajib Diisi)</label>
                <div class="col">
                    <input type="text" class="form-control" id="" name="teknis_1" value="" placeholder="contoh : instalasi jaringan internet">
                </div>
                <div class="col">
                    <input type="text" class="form-control" id="" name="angka_teknis_1" value="" placeholder="Angka nilai | contoh : 90">
                </div>
              </div>
              <div class="row mb-3" id="">
                <label for="kontak" class="form-label">Aspek Teknis 2 (Wajib Diisi)</label>
                <div class="col">
                    <input type="text" class="form-control" id="" name="teknis_2" value="" placeholder="contoh : instalasi jaringan internet">
                </div>
                <div class="col">
                    <input type="text" class="form-control" id="" name="angka_teknis_2" value="" placeholder="Angka nilai | contoh : 90">
                </div>
              </div>
              <div class="row mb-3" id="">
                <label for="kontak" class="form-label">Aspek Teknis 3 (Wajib Diisi)</label>
                <div class="col">
                    <input type="text" class="form-control" id="" name="teknis_3" value="" placeholder="contoh : instalasi jaringan internet">
                </div>
                <div class="col">
                    <input type="text" class="form-control" id="" name="angka_teknis_3" value="" placeholder="Angka nilai | contoh : 90">
                </div>
              </div>
              <div class="row mb-3" id="">
                <label for="kontak" class="form-label">Aspek Teknis 4 (Wajib Diisi)</label>
                <div class="col">
                    <input type="text" class="form-control" id="" name="teknis_4" value="" placeholder="contoh : instalasi jaringan internet">
                </div>
                <div class="col">
                    <input type="text" class="form-control" id="" name="angka_teknis_4" value="" placeholder="Angka nilai | contoh : 90">
                </div>
              </div>
              <div class="row mb-3" id="">
                <label for="kontak" class="form-label">Aspek Teknis Tambahan (Tidak Wajib)</label>
                <div class="col">
                    <input type="text" class="form-control" id="" name="teknis" value="" placeholder="contoh : perawatan komputer">
                </div>
                <div class="col">
                    <input type="text" class="form-control" id="" name="angka_teknis" value="" placeholder="Angka nilai | contoh : 90">
                </div>
              </div>
              @endforeach
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>


        {{-- TKR --}}
        @elseif ($prodi == 'TKRO')
        @foreach ($nilai as $data)
        <form action="{{route('nilai-siswa.update',$data->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="mb-3">
                <h3>ASPEK NON TEKNIS</h3>
              </div>
            <div class="mb-3">
                <label for="siswa" class="form-label">Siswa: NISN/Nama</label>
                <input type="text" class="form-control" name="siswa" readonly value="{{$data->siswa->user->fullname}}">
              </div>
              <input type="text" name="tkr" value="tkr" hidden>
            <div class="mb-3">
                <label for="angkatan" class="form-label">Prodi</label>
                <select class="form-control @error('prodi') is-invalid @enderror" name="prodi">
                    <option value="TKRO">TKRO</option>
                </select>
              </div>
              <div class="mb-3">
                <label for="perusahaan" class="form-label">Mitra Perusahaan</label>
                <input type="text" class="form-control" id="mitra" name="mitra" value="{{$data->mitra}}">
              </div>
              <div class="mb-3">
                <label for="perusahaan" class="form-label">Kedisiplinan</label>
                <input type="number" class="form-control" id="" name="disiplin" value="{{$data->disiplin}}">
              </div>
              <div class="mb-3">
                <label for="perusahaan" class="form-label">Kerjasama</label>
                <input type="number" class="form-control" id="" name="kerjasama" value="{{$data->kerjasama}}">
              </div>
              <div class="mb-3">
                <label for="perusahaan" class="form-label">Tanggungjawab</label>
                <input type="number" class="form-control" id="tanggungjawab" name="tanggungjawab" value="{{$data->tanggungjawab}}">
              </div>
              <div class="mb-3">
                <label for="bidang" class="form-label">Inisiatif</label>
                <input type="number" class="form-control" id="inisiatif" name="inisiatif" value="{{$data->inisiatif}}">
              </div>
              <div class="mb-3">
                <label for="alamat" class="form-label">Kebersihan</label>
                <input type="number" class="form-control" id="kebersihan" name="kebersihan" value="{{$data->kebersihan}}">
              </div>    
              <div class="mb-3">
                <label for="kontak" class="form-label">Keberhasilan</label>
                <input type="number" class="form-control" id="keberhasilan" name="keberhasilan" value="{{$data->keberhasilan}}">
              </div>
              <div class="mb-3">
                <h3>ASPEK TEKNIS</h3>
              </div>
              <div class="mb-3">
                <label for="kontak" class="form-label">Perawatan dan Perbaikan Engine</label>
                <input type="number" class="form-control" id="" name="engine" value="{{$data->perawatan_engine}}">
              </div>
              <div class="mb-3">
                <label for="kontak" class="form-label">Perawatan dan Perbaikan Chasis dan Pemindah Tenaga</label>
                <input type="number" class="form-control" id="" name="chasis" value="{{$data->perawatan_chasis}}">
              </div>
              <div class="mb-3">
                <label for="kontak" class="form-label">Perawatan dan Perbaikan Kelistrikan Bodi Standar</label>
                <input type="number" class="form-control" id="" name="kelistrikan" value="{{$data->perawatan_kelistrikan}}">
              </div>
              <div class="mb-3">
                <label for="kontak" class="form-label">Kesehatan dan Keselamatan Kerja</label>
                <input type="number" class="form-control" id="" name="kkk" value="{{$data->kkk}}">
              </div>
              <div class="row mb-3" id="">
                <label for="kontak" class="form-label">Aspek Teknis Tambahan (Tidak Wajib)</label>
                <div class="col">
                    <input type="text" class="form-control" id="" name="teknis" value="" placeholder="contoh : perbaikan pendingin mesin">
                </div>
                <div class="col">
                    <input type="text" class="form-control" id="" name="angka_teknis" value="" placeholder="Angka nilai | contoh : 90">
                </div>
              </div>
              @endforeach
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        @endif
    </div>
</div>
@endsection