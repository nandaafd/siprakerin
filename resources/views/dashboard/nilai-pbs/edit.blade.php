@extends('dashboard.layouts.main')
@section('container')
<div class="wrapper d-flex align-items-stretch">
    @include('dashboard.layouts.sidebar') 
    <!-- Page Content  -->
<div id="content" class="px-4 py-1 p-md-5">
    @include('dashboard.layouts.navbar')
    <section id="append-area">
        @foreach ($nilai as $data)
            
        
        <form action="{{route('nilai-pbs.update',$data->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="mb-3">
                <h3>ASPEK NON TEKNIS</h3>
              </div>
            <div class="mb-3">
                <label for="siswa" class="form-label">Nama Siswa</label>
                <input type="text" readonly class="form-control" id="" name="siswa" value="{{$data->siswa->user->fullname}}">
              </div>
            <div class="mb-3">
                <label for="angkatan" class="form-label">Prodi</label>
                <input type="text" class="form-control" id="prodi" name="prodi" value="{{$data->prodi}}">
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
              @if ($data->teknis)
              <div class="mb-3" id="">
                <label for="kontak" class="form-label">Aspek Teknis Tambahan (Tidak Wajib)</label>
                <input type="text" class="form-control" id="" name="teknis" placeholder="contoh - pencatatan keuangan : 90" value="{{$data->teknis}}">
              </div>
              @endif
              <div class="mb-3">
                <label for="kontak" class="form-label">Nilai Rata-Rata (Wajib diisi)</label>
                <input type="number" class="form-control" id="rata" name="rata" value="{{$data->rata_rata}}">
              </div>
              @endforeach
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </section>
</div>
</div>
@endsection