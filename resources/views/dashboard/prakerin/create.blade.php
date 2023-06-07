@extends('dashboard.layouts.main')
@section('container')
<div class="wrapper d-flex align-items-stretch">
    @include('dashboard.layouts.sidebar') 
    <!-- Page Content  -->
<div id="content" class="px-4 py-1 p-md-5">
    @include('dashboard.layouts.navbar')
    <section>
        <form action="/data-prakerin" method="post" enctype="multipart/form-data">
            @csrf
            @method('post')
            <div class="mb-3">
              <label for="nama" class="form-label">Nama</label> 
              <input type="text" class="form-control" id="nama" name="nama" value="">
            </div>
            <div class="mb-3">
                <label for="prodi" class="form-label">Prodi</label> 
                <select class="form-select" aria-label="Default select example" id="prodi" name="prodi">
                    <option selected>Pilih Prodi..</option>
                    <option value="TKJ">TKJ</option>
                    <option value="PBS">PBS</option>
                    <option value="TKRO">TKRO</option>
                  </select>
              </div>
            <div class="mb-3">
                <label for="angkatan" class="form-label">Angkatan <span style="font-size: 12px">*ditulis dalam angka</span></label>
                <input type="text" class="form-control" id="angkatan" name="angkatan" value="">
              </div>
              <div class="mb-3">
                <label for="perusahaan" class="form-label">Tahun Ajaran</label>
                <input type="text" class="form-control" id="tahun_ajaran" name="tahun_ajaran" value="">
              </div>
              <div class="mb-3">
                <label for="perusahaan" class="form-label">Tanggal Mulai</label>
                <input type="date" class="form-control" id="" name="tanggal_mulai" value="">
              </div>
              <div class="mb-3">
                <label for="perusahaan" class="form-label">Tanggal Selesai</label>
                <input type="date" class="form-control" id="" name="tanggal_selesai" value="">
              </div>
              <div class="mb-3">
                <label for="perusahaan" class="form-label">Diterima di Perusahaan/Mitra</label>
                <input type="text" class="form-control" id="perusahaan" name="perusahaan" value="">
              </div>
              <div class="mb-3">
                <label for="bidang" class="form-label">Bidang Mitra/Perusahaan</label>
                <input type="text" class="form-control" id="bidang" name="bidang" value="">
              </div>
              <div class="mb-3">
                <label for="alamat" class="form-label">Alamat Mitra/Perusahaan</label>
                <input type="text" class="form-control" id="alamat" name="alamat" value="">
              </div>    
              <div class="mb-3">
                <label for="kontak" class="form-label">Kontak Perusahaan <span style="font-size: 12px">*Email/Nomor Telepon</span></label>
                <input type="text" class="form-control" id="kontak" name="kontak" value="">
              </div>
              <div class="mb-3">
                <label for="bukti" class="form-label">Bukti Diterima <span style="font-size:12px;">*jika ada/tidak wajib</span></label>
                <input type="file" class="form-control" id="bukti" name="bukti">
              </div> 
              <div class="mb-3">
                <label for="bukti" class="form-label">Surat Permohonan <span style="font-size:12px;">*kepada mitra</span></label>
                <input type="file" class="form-control" id="surat" name="surat">
              </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </section>
</div>
</div>

@endsection