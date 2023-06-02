@extends('layouts.page')
@section('content')
@if ($status == 'buka')
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

  
<div class="row {{$prakerin->where('user_id',Auth::user()->id)->isEmpty() ? 'd-none':'' }}">
    <div class="col" id="prakerin-data">
        <h5><span>{{Auth::user()->nickname}},</span> ini adalah data pendaftaran anda</h5>
        <p style="font-size:14px;">Apakah terdapat kesalahan pada data anda? kalau ada, langsung diedit ya!</p>
        <table class="table mb-0 text-center table-striped table-sm">
            <tr>
                <th>Nama</th>
                <th>Prodi</th>
                <th>Angkatan</th>
                <th>Mitra</th>
                <th>Bidang Mitra</th>
                <th>Alamat Mitra</th>
                <th>Kontak</th>
                <th>Bukti</th>
                <th colspan="2">Aksi</th>
            </tr>
            @forelse ($prakerin as $data)
            <tr>
                <td>{{$data->nama}}</td>
                <td>{{$data->prodi}}</td>
                <td>{{$data->angkatan}}</td>
                <td>{{$data->mitra_perusahaan}}</td>
                <td>{{$data->bidang_mitra}}</td>
                <td>{{$data->alamat_mitra}}</td>
                <td>{{$data->kontak_perusahaan}}</td>
                <td> <a id="bukti" href="{{route('daftar-prakerin.show',$data->id)}}">Lihat bukti</a></td>
                <td>
                    <form action="{{ route('daftar-prakerin.destroy',$data->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" title="Hapus data" onclick="return confirm('Apakah anda yakin ingin menghapus?')"><i class="bi bi-trash3-fill"></i></button>
                    </form>
                <td>
                    <a href="{{route('daftar-prakerin.edit',$data->id)}}" class="btn btn-primary" title="edit"><i class="bi bi-pencil"></i></a>            
                </td>
            </tr>
            @empty  
            @endforelse
        </table>
    </div>
</div>
<div class="row">
<div class="col" id="prakerin-page">

    @if (Auth::user()->role->name == 'siswa')
        @if (in_array(Auth::user()->siswa[0]['kelas_id'], [2,5,8]))
        <h3>Formulir Pendaftaran</h3>
        <p style="font-size: 14px;">Harap memasukkan data pendaftaran dengan benar!
            <br>Dilarang mengisi formulir pendaftaran 2 kali. Kalau ada kesalahan pengisian mohon edit secara mandiri atau menghubungi Admin.
        </p>
        <form action="{{url('/daftar-prakerin')}}" method="post" enctype="multipart/form-data">
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
            <button type="submit" class="btn btn-primary" id="btn-submitdaftar">Daftar</button>
          </form>
        @else
            <h2>Maaf Anda Tidak Dapat Mengisi Formulir Karena Bukan Siswa Kelas 11</h2>
        @endif
    @else
        <img src="{{asset('images/closed.png')}}" class="img-fluid" style="max-width: 550px" alt="">
        <h1>Maaf Anda Tidak Dapat Mengakses Halaman Ini</h1>
    @endif
    
    </div>
</div>
@else
    <div class="row">
      <div class="col text-center mt-5">
        <img src="{{asset('images/closed.png')}}" class="img-fluid" style="max-width: 550px" alt="">
        <h2 style="color:gray;">Oops.. Pendaftaran Sedang Ditutup Nih</h2>
      </div>
    </div>
@endif
@endsection