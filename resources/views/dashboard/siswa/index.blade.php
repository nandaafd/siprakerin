@extends('dashboard.layouts.main')
@section('container')
<div class="wrapper d-flex align-items-stretch">
    @include('dashboard.layouts.sidebar') 
    <!-- Page Content  -->
<div id="content" class="px-4 py-1 p-md-5">
    @include('dashboard.layouts.navbar')
    <section>
        <a href="/siswa/create" class="btn btn-primary mb-2"><i class="bi bi-plus-square"></i> Tambah Data Siswa</a>
        <div>
            <table class="table table-hover">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>NISN</th>
                    <th>Kelas</th>
                    <th>Alamat</th>
                    <th>No Telpon</th>
                    <th>Pembimbing Lapangan</th>
                    <th>Aksi</th>
                </tr>
                @forelse ($siswa as $data)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{$data->user->fullname}}</td>
                    <td>{{$data->nisn}}</td>
                    <td>{{$data->kelas ? $data->kelas->nama_kelas : 'N/A'}}</td>
                    <td>{{$data->alamat}}</td>
                    <td>{{$data->no_telpon}}</td>
                    <td>{{$data->pembimbingLapangan ? $data->pembimbingLapangan->user->fullname : 'N/A'}}</td>

                    <td>
                        <form action="{{ route('siswa.destroy', $data->id) }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger" title="Hapus data" onclick="return confirm('Apakah anda yakin ingin menghapus?')"><i class="bi bi-trash3-fill"></i></button>
                        </form>
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