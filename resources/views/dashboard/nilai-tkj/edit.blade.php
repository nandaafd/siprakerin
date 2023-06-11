@extends('dashboard.layouts.main')
@section('container')
<div class="wrapper d-flex align-items-stretch">
    @include('dashboard.layouts.sidebar') 
    <!-- Page Content  -->
<div id="content" class="px-4 py-1 p-md-5">
    @include('dashboard.layouts.navbar')
    <section id="append-area">
        @foreach ($nilai as $data)
        <form action="{{route('nilai-tkj.update',$data->id)}}" method="post" enctype="multipart/form-data">
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
                <label for="kontak" class="form-label">Aspek Teknis 1 (Wajib Diisi)</label>
                <input type="text" class="form-control" id="" name="teknis_1" value="{{$data->teknis_1}}" placeholder="contoh penulisan - Perawatan dan Perbaikan Komputer : 95">
              </div>
              <div class="mb-3">
                <label for="kontak" class="form-label">Aspek Teknis 2 (Wajib Diisi)</label>
                <input type="text" class="form-control" id="" name="teknis_2" value="{{$data->teknis_2}}" placeholder="contoh penulisan - Perawatan dan Perbaikan Komputer : 95">
              </div>
              <div class="mb-3">
                <label for="kontak" class="form-label">Aspek Teknis 3 (Wajib Diisi)</label>
                <input type="text" class="form-control" id="" name="teknis_3" value="{{$data->teknis_3}}" placeholder="contoh penulisan - Perawatan dan Perbaikan Komputer : 95">
              </div>
              <div class="mb-3">
                <label for="kontak" class="form-label">Aspek Teknis 4 (Wajib Diisi)</label>
                <input type="text" class="form-control" id="" name="teknis_4" value="{{$data->teknis_4}}" placeholder="contoh penulisan - Perawatan dan Perbaikan Komputer : 95">
              </div>
              <div class="mb-3" id="">
                <label for="kontak" class="form-label">Aspek Teknis Tambahan (Tidak Wajib)</label>
                <input type="text" class="form-control" id="" name="teknis" value="{{$data->teknis_5}}" placeholder="contoh penulisan - Perawatan dan Perbaikan Komputer : 95">
              </div>
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