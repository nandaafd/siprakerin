@extends('dashboard.layouts.main')
@section('container')
<div class="wrapper d-flex align-items-stretch">
    @include('dashboard.layouts.sidebar') 
    <!-- Page Content  -->
<div id="content" class="px-4 py-1 p-md-5">
    @include('dashboard.layouts.navbar')
    <section>
        <div class="row">
            <div class="col-9">
                <form action="" method="get" class="row row-cols-sm-auto g-1 mb-4">
                        <div class="col-sm">
                            <select class="form-select form-select-sm" aria-label="Default select example" name="kelas_id" id="filter_kelas">
                                <option value="">Pilih kelas..</option>
                                @foreach ($kelas as $kls)
                                <option value="{{$kls->id}}">{{$kls->nama_kelas}}</option>
                                @endforeach
                              </select>
                        </div>
                        <div class="col-sm">
                            <button type="submit" class="btn btn-primary btn-sm">Search</button>
                            <button type="submit" class="btn btn-secondary btn-sm" id="btn-reset">Reset</button>
                        </div>
                    </form>
            </div>
            <div class="col-3">
                <a href="/siswa/create" class="btn btn-primary mb-2"><i class="bi bi-plus-square"></i> Tambah Data Siswa</a>
            </div>
        </div>
        <div>
            @foreach ($kelas as $kls)
                
            @if ($filter_kelas == $kls->id)
                <h5 id="filter-info">Hasil filter : <span> {{$kls->nama_kelas}}</span></h5>
            @endif 
            @endforeach
            <table class="table mb-0 text-center table-striped table-sm">
                <thead class="thead-dark">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>NISN</th>
                    <th>Kelas</th>
                    <th>Alamat</th>
                    <th>No Telpon</th>
                    <th>email</th>
                    <th>Pembimbing Lapangan</th>
                    <th colspan="2">Aksi</th>
                </tr>
                </thead>
                @forelse ($siswa as $data)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{$data->user->fullname}}</td>
                    <td>{{$data->nisn}}</td>
                    <td>{{$data->kelas ? $data->kelas->nama_kelas : 'N/A'}}</td>
                    <td>{{$data->alamat}}</td>
                    <td>{{$data->no_telpon}}</td>
                    <td>{{$data->user->email}}</td>
                    <td>{{$data->pembimbingLapangan ? $data->pembimbingLapangan->user->fullname : 'N/A'}}</td>
                    <td>
                        <form action="{{ route('siswa.destroy', $data->id) }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger" title="Hapus data" onclick="return confirm('Apakah anda yakin ingin menghapus?')"><i class="bi bi-trash3-fill"></i></button>
                        </form>
                    </td>
                    <td>
                        <a href="/siswa/edit/{{$data->id}}" class="btn btn-primary" title="edit"><i class="bi bi-pencil"></i></a>            
                    </td>
                </tr>
                @empty
                @endforelse>
            </table>
        </div>
    </section>
</div>
</div>

@endsection