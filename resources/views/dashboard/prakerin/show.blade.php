@extends('dashboard.layouts.main')
@section('container')
<div class="wrapper d-flex align-items-stretch">
    @include('dashboard.layouts.sidebar') 
    <!-- Page Content  -->
<div id="content" class="px-4 py-1 p-md-5">
    @include('dashboard.layouts.navbar')
    <section>
        @foreach ($prakerin as $data)
        <form action="" method="post" enctype="multipart/form-data">
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
                <label for="kontak" class="form-label">Surat Permohonan <span style="font-size: 12px">*Menunggu surat dari admin</span></label>
                @if ($data->surat_permohonan == null)
                <input readonly placeholder="Belum Memiliki Surat - Ke halaman edit untuk upload" type="text" class="form-control" id="kontak" name="surat" value="">
                @else
                    <a href="{{asset('storage/'.$data->surat_permohonan)}}" download="surat_permohonan_{{$data->nama}}" class="btn btn-primary">Download permohonan</a>
                @endif
              </div>
              <div class="mb-3">
                <label for="bukti" class="form-label">Bukti Diterima <span style="color:red; font-size:12px;">*jika ada/tidak wajib</span></label>
                @if ($data->bukti_diterima == null)
                <input readonly placeholder="Belum Memiliki Bukti" type="text" class="form-control" id="kontak" name="surat" value="">
                @else
                  <p>Bukti diterima/surat balasan sudah ada, download untuk melihat</p>
                  <a href="{{asset('storage/'. $data->bukti_diterima)}}" download="bukti{{$data->nama}}" class="btn btn-primary">Download bukti</a>
                @endif
              </div> 
              @endforeach
          </form>
    </section>
</div>
</div>

@endsection