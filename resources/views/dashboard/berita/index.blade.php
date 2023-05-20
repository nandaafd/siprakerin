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
                {{-- <form action="" method="get" class="row row-cols-sm-auto g-1 mb-4">
                        <div class="col-sm">
                            <select class="form-select form-select-sm" aria-label="Default select example" name="perusahaan" id="filter_perusahaan">
                                <option value="">Pilih asal perusahaan..</option>
                                @foreach ($pembimbing as $data)
                                <option value="{{$data->asal_perusahaan}}">{{$data->asal_perusahaan}}</option>
                                @endforeach
                              </select>
                        </div>
                        <div class="col-sm">
                            <button type="submit" class="btn btn-primary btn-sm">Search</button>
                            <button type="submit" class="btn btn-secondary btn-sm" id="btn-reset">Reset</button>
                        </div>
                    </form> --}}
            </div>
            <div class="col-3">
                <a href="{{route('data-berita.create')}}" class="btn btn-primary mb-2"><i class="bi bi-plus-square"></i> Tambah Data</a>
            </div>
        </div>
        <div>
            {{-- @foreach ($pembimbing as $data)
            @if ($filter_perusahaan == $data->asal_perusahaan)
                <h5 id="filter-info">Hasil filter : <span> {{$data->asal_perusahaan}}</span></h5>
            @endif 
            @endforeach --}}
            <table class="table mb-0 text-center table-striped table-sm">
                <thead class="thead-dark">
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Tanggal Terbit</th>
                        <th>Isi Berita</th>
                        <th>Penulis</th>
                        <th colspan="2">Aksi</th>
                    </tr>
                </thead>
                @forelse ($berita as $data)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{$data->judul}}</td>
                        <td>{{$data->tanggal_terbit}}</td>
                        <td><a href="{{route('data-berita.show',$data->id)}}">Lihat</a></td>
                        <td>{{$data->penulis}}</td> 
                        <td>
                            <form action="{{ route('data-berita.destroy',$data->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" title="Hapus data" onclick="return confirm('Apakah anda yakin ingin menghapus?')"><i class="bi bi-trash3-fill"></i></button>
                            </form>
                        <td>
                            <a href="{{route('data-berita.edit',$data->id)}}" class="btn btn-primary" title="edit"><i class="bi bi-pencil"></i></a>            
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