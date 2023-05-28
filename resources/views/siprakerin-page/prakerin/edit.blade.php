@extends('layouts.page')
@section('content')
<div class="row">
    <div class="col" id="prakerin-header">
        <h2>lorem ipsum</h2>
    </div>
</div>
<div class="row">
<div class="col" id="prakerin-page">

    @if (Auth::user()->role->name == 'siswa')
        @if (in_array(Auth::user()->siswa[0]['kelas_id'], [2,5,8]))
        <h3><span>Edit</span> Formulir Pendaftaran</h3>
        <p style="font-size: 14px;">Pastikan data pendaftaran yang akan anda rubah dengan benar!
        </p>
        @foreach ($prakerin as $data)
        <form action="{{route('daftar-prakerin.update',$data->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <input type="text" hidden name="id" id="" value="{{$data->id}}">
            <input type="text" hidden name="oldImage" value="{{$data->bukti_diterima}}">
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
                  <img src="{{asset('storage/'. $data->bukti_diterima)}}" alt="" class="d-block mb-3" style="max-width:170px;">
                @endif
                <input type="file" class="form-control" id="bukti" value="{{$data->bukti_diterima}}" name="bukti">
              </div> 
              @endforeach
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        @else
            <h2>Maaf Anda Tidak Dapat Mengisi Formulir Karena Bukan Siswa Kelas 11</h2>
        @endif
    @else
        <h1>Maaf Anda Tidak Dapat Mengakses Halaman Ini</h1>
    @endif
    
    </div>
</div>
@endsection