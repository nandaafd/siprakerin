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
               
            </div>
            <div class="col-3">
                <a href="{{route('data-mitra.create')}}" class="btn btn-primary mb-2"><i class="bi bi-plus-square"></i> Tambah Data</a>
            </div>
        </div>
        <div>
            <table class="table mb-0 text-center table-striped table-sm">
                <thead class="thead-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama Siswa</th>
                        <th>Prodi</th>
                        <th>Mitra</th>
                        <th>Nilai</th>
                        <th colspan="2">Aksi</th>
                    </tr>
                </thead>
                @forelse ($nilai as $data)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{$data->siswa->user->fullname}}</td>
                        <td>{{$data->prodi}}</td>
                        <td>{{$data->mitra}}</td>
                        <td><a href="{{route('nilai-pbs.show',$data->id)}}">Lihat nilai</a></td>
                        <td>
                            <form action="{{ route('nilai-pbs.destroy',$data->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" title="Hapus data" onclick="return confirm('Apakah anda yakin ingin menghapus?')"><i class="bi bi-trash3-fill"></i></button>
                            </form>
                        <td>
                            <a href="{{route('nilai-pbs.edit',$data->id)}}" class="btn btn-primary" title="edit"><i class="bi bi-pencil"></i></a>            
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