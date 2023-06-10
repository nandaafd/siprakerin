@extends('dashboard.layouts.main')
@section('container')
<div class="wrapper d-flex align-items-stretch">
    @include('dashboard.layouts.sidebar') 
    <!-- Page Content  -->
<div id="content" class="px-4 py-1 p-md-5">
    @include('dashboard.layouts.navbar')
    <section id="append-area">
        @foreach ($nilai as $data)
        <form action="{{route('nilai-tkro.update',$data->id)}}" method="post" enctype="multipart/form-data">
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
              @if ($data->teknis)
              <div class="mb-3" id="">
                <label for="kontak" class="form-label">Aspek Teknis Tambahan (Tidak Wajib)</label>
                <input type="text" class="form-control" id="" name="teknis" value="{{$data->teknis}}" placeholder="contoh - perawatan pendingin cairan mesin : 95">
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