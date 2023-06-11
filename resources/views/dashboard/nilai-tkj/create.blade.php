@extends('dashboard.layouts.main')
@section('container')
<div class="wrapper d-flex align-items-stretch">
    @include('dashboard.layouts.sidebar') 
    <!-- Page Content  -->
<div id="content" class="px-4 py-1 p-md-5">
    @include('dashboard.layouts.navbar')
    <section id="append-area">
        <form action="/nilai-tkj" method="post" enctype="multipart/form-data">
            @csrf
            @method('post')
            <div class="mb-3">
                <h3>ASPEK NON TEKNIS</h3>
              </div>
            <div class="mb-3">
                <label for="siswa" class="form-label">Siswa: NISN/Nama</label>
                    <select class="form-control @error('siswa') is-invalid @enderror" name="siswa">
                        <option value="">Pilih Siswa..</option>
                        @foreach ($siswa as $data)
                            <option class="text-secondary" value="{{ $data->id }}" {{ old('siswa') == $data->id ? 'selected' : '' }}>{{ $data->user->fullname." / ".$data->nisn }}</option>
                        @endforeach
                    </select>
              </div>
            <div class="mb-3">
                <label for="angkatan" class="form-label">Prodi</label>
                <input type="text" class="form-control" id="prodi" name="prodi" value="">
              </div>
              <div class="mb-3">
                <label for="perusahaan" class="form-label">Mitra Perusahaan</label>
                <input type="text" class="form-control" id="mitra" name="mitra" value="">
              </div>
              <div class="mb-3">
                <label for="perusahaan" class="form-label">Kedisiplinan</label>
                <input type="number" class="form-control" id="" name="disiplin" value="">
              </div>
              <div class="mb-3">
                <label for="perusahaan" class="form-label">Kerjasama</label>
                <input type="number" class="form-control" id="" name="kerjasama" value="">
              </div>
              <div class="mb-3">
                <label for="perusahaan" class="form-label">Tanggungjawab</label>
                <input type="number" class="form-control" id="tanggungjawab" name="tanggungjawab" value="">
              </div>
              <div class="mb-3">
                <label for="bidang" class="form-label">Inisiatif</label>
                <input type="number" class="form-control" id="inisiatif" name="inisiatif" value="">
              </div>
              <div class="mb-3">
                <label for="alamat" class="form-label">Kebersihan</label>
                <input type="number" class="form-control" id="kebersihan" name="kebersihan" value="">
              </div>    
              <div class="mb-3">
                <label for="kontak" class="form-label">Keberhasilan</label>
                <input type="number" class="form-control" id="keberhasilan" name="keberhasilan" value="">
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
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </section>
</div>
</div>
@endsection