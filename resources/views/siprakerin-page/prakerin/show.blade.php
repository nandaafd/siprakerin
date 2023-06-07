@extends('layouts.page')
@section('content')
<div class="row">
    <div class="col" id="prakerin-header">
      <div class="row">
        <div class="col-9">
          <h2 style="font-weight: 600;">Mulai <span style="color:#FF6B00;"> Mimpi Dan Petualanganmu </span> 
            Dengan Mendaftar Prakerin Sekarang Juga!</h2>
          <h4>Jangan sampai terlambat ya..</h4>
        </div>
        <div class="col-3">
          <img id="vector1" class="img-fluid" src="{{asset('images/vector1.png')}}" alt="" srcset="">
        </div>
      </div>
    </div>
</div>
<div class="row">
<div class="col" id="prakerin-page">

        @foreach ($prakerin as $data)
        <form action="{{route('daftar-prakerin.update',$data->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <input type="text" hidden name="id" id="" value="{{$data->id}}">
            <input type="text" hidden name="oldImage" value="{{$data->bukti_diterima}}">
            <div class="mb-3">
              <label for="nama" class="form-label">Nama</label> 
              <input readonly type="text" class="form-control" id="nama" name="nama" value="{{$data->nama}}">
            </div>
            <div class="mb-3">
                <label for="prodi" class="form-label">Prodi</label> 
                <select disabled class="form-select" aria-label="Default select example" id="prodi" name="prodi">
                    <option {{$data->prodi == 'TKJ' ? 'selected' : ''}} value="TKJ">TKJ</option>
                    <option {{$data->prodi == 'PBS' ? 'selected' : ''}} value="PBS">PBS</option>
                    <option {{$data->prodi == 'TKRO' ? 'selected' : ''}} value="TKRO">TKRO</option>
                  </select>
              </div>
            <div class="mb-3">
                <label for="angkatan" class="form-label">Angkatan</label>
                <input readonly type="text" class="form-control" id="angkatan" name="angkatan" value="{{$data->angkatan}}">
              </div>
              <div class="mb-3">
                <label for="perusahaan" class="form-label">Tahun Ajaran</label>
                <input readonly type="text" class="form-control" id="tahun_ajaran" name="tahun_ajaran" value="{{$data->tahun_ajaran}}">
              </div>
              <div class="mb-3">
                <label for="perusahaan" class="form-label">Tanggal Mulai</label>
                <input readonly type="date" class="form-control" id="" name="tanggal_mulai" value="{{$data->tanggal_mulai}}">
              </div>
              <div class="mb-3">
                <label for="perusahaan" class="form-label">Tanggal Selesai</label>
                <input readonly type="date" class="form-control" id="" name="tanggal_selesai" value="{{$data->tanggal_selesai}}">
              </div>
              <div class="mb-3">
                <label for="perusahaan" class="form-label">Diterima di Perusahaan/Mitra</label>
                <input readonly type="text" class="form-control" id="perusahaan" name="perusahaan" value="{{$data->mitra_perusahaan}}">
              </div>
              <div class="mb-3">
                <label for="bidang" class="form-label">Bidang Mitra/Perusahaan</label>
                <input readonly type="text" class="form-control" id="bidang" name="bidang" value="{{$data->bidang_mitra}}">
              </div>
              <div class="mb-3">
                <label for="alamat" class="form-label">Alamat Mitra/Perusahaan</label>
                <input readonly type="text" class="form-control" id="alamat" name="alamat" value="{{$data->alamat_mitra}}">
              </div>    
              <div class="mb-3">
                <label for="kontak" class="form-label">Kontak Perusahaan <span style="font-size: 12px">*Email/Nomor Telepon</span></label>
                <input readonly type="text" class="form-control" id="kontak" name="kontak" value="{{$data->kontak_perusahaan}}">
              </div>
              <div class="mb-3">
                <label for="kontak" class="form-label">Surat Permohonan</label>
                @if ($surat == null)
                <input readonly placeholder="Belum Memiliki Surat - Menunggu surat dari admin" type="text" class="form-control" id="kontak" name="surat" value="">
                @else
                    <a href="{{asset('storage/'.$data->surat_permohonan)}}" download="surat_permohonan_{{$data->nama}}" class="btn btn-primary">Download surat permohonan</a>
                @endif  
              </div>
              <div class="mb-3">
                <label for="bukti" class="form-label">Bukti Diterima <span style="color:red; font-size:12px;">*jika ada/tidak wajib</span></label>
                @if ($data->bukti_diterima == null)
                <input readonly placeholder="Belum Memiliki Bukti/Surat Balasan - mohon upload bukti di halaman edit bila sudah mendapatkannya" type="text" class="form-control" id="kontak" name="bukti" value="">
                @else
                <a href="{{asset('storage/'.$data->bukti_diterima)}}" download="surat_balasan_{{$data->nama}}" class="btn btn-primary">Download bukti/surat balasan</a>
                @endif
              </div> 
              @endforeach
          </form>
    
    </div>
</div>
@endsection