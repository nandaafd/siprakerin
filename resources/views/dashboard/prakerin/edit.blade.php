@extends('dashboard.layouts.main')
@section('container')
<div class="wrapper d-flex align-items-stretch">
    @include('dashboard.layouts.sidebar') 
    <!-- Page Content  -->
<div id="content" class="px-4 py-1 p-md-5">
    @include('dashboard.layouts.navbar')
    <section>
        @foreach ($prakerin as $data)
        <form action="{{route('data-prakerin.update',$data->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <input type="text" hidden name="id" id="" value="{{$data->id}}">
            <input type="text" hidden name="oldSurat" value="{{$data->surat_permohonan}}">
            <input type="text" hidden name="oldBukti" value="{{$data->bukti_diterima}}">
            <div class="mb-3">
              <label for="nama" class="form-label">Nama</label> 
              <input type="text" class="form-control" id="nama" name="nama" value="{{$data->nama}}">
            </div>
            <div class="mb-3">
                <label for="prodi" class="form-label">Prodi</label> 
                <select class="form-select" aria-label="Default select example" id="prodi" name="prodi">
                    <option {{$data->prodi == 'TKJ' ? 'selected' : ''}} value="TKJ">TKJ</option>
                    <option {{$data->prodi == 'PBS' ? 'selected' : ''}} value="PBS">PBS</option>
                    <option {{$data->prodi == 'TKRO' ? 'selected' : ''}} value="TKRO">TKRO</option>
                  </select>
              </div>
            <div class="mb-3">
                <label for="angkatan" class="form-label">Angkatan</label>
                <input type="text" class="form-control" id="angkatan" name="angkatan" value="{{$data->angkatan}}">
              </div>
              <div class="mb-3">
                <label for="perusahaan" class="form-label">Tahun Ajaran</label>
                <input type="text" class="form-control" id="tahun_ajaran" name="tahun_ajaran" value="{{$data->tahun_ajaran}}">
              </div>
              <div class="mb-3">
                <label for="perusahaan" class="form-label">Tanggal Mulai</label>
                <input type="date" class="form-control" id="" name="tanggal_mulai" value="{{$data->tanggal_mulai}}">
              </div>
              <div class="mb-3">
                <label for="perusahaan" class="form-label">Tanggal Selesai</label>
                <input type="date" class="form-control" id="" name="tanggal_selesai" value="{{$data->tanggal_selesai}}">
              </div>
              <div class="mb-3">
                <label for="perusahaan" class="form-label">Diterima di Perusahaan/Mitra</label>
                <input type="text" class="form-control" id="perusahaan" name="perusahaan" value="{{$data->mitra_perusahaan}}">
              </div>
              <div class="mb-3">
                <label for="bidang" class="form-label">Bidang Mitra/Perusahaan</label>
                <input type="text" class="form-control" id="bidang" name="bidang" value="{{$data->bidang_mitra}}">
              </div>
              <div class="mb-3">
                <label for="alamat" class="form-label">Alamat Mitra/Perusahaan</label>
                <input type="text" class="form-control" id="alamat" name="alamat" value="{{$data->alamat_mitra}}">
              </div>    
              <div class="mb-3">
                <label for="kontak" class="form-label">Kontak Perusahaan <span style="font-size: 12px">*Email/Nomor Telepon</span></label>
                <input type="text" class="form-control" id="kontak" name="kontak" value="{{$data->kontak_perusahaan}}">
              </div>
              <div class="mb-3">
                <label for="bukti" class="form-label">Bukti Diterima <span style="color:red; font-size:12px;">*jika ada/tidak wajib</span></label>
                @if ($data->bukti_diterima == null)
                  <p>belum memiliki file bukti</p>
                @else
                  <p style="color:red; font-size:12px;">surat balasan/bukti diterima sudah ada, upload ulang untuk mengganti yang sudah terupload</p>
                @endif
                <input type="file" class="form-control" id="bukti" value="{{$data->bukti_diterima}}" name="bukti">
              </div> 
              <div class="mb-3">
                <label for="kontak" class="form-label">Upload Surat Permohonan</label>
                @if ($data->bukti_diterima)
                    <p style="color:red; font-size:12px;">surat permohonan sudah terupload, upload ulang untuk mengganti yang sudah terupload</p>
                @endif
                <input type="file" class="form-control" id="bukti" value="" name="surat">
              </div>
              @endforeach
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </section>
</div>
</div>

@endsection