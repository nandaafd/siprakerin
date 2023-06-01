@extends('layouts.page')
@section('content')
<div class="row">
    <div class="col" id="prakerin-header">
        <div class="row">
          <div class="col-9">
            @if (Auth::user()->role->name == 'siswa')
                <h2 style="font-weight: 600;">Nilai Yang Anda Dapat Selama Prakerin Adalah <span style="color:#FF6B00;">Hasil Penilaian</span> oleh Pembimbing Lapangan Selama Anda Prakerin!</h2>
                <h4>Yuk, cek Sekarang..</h4>
            @else
            <h2 style="font-weight: 600;">Nilai <span style="color:#FF6B00;">Prakerin Siswa</span> Bisa Anda Lihat Disini! </h2>
            <h4>Yuk, cek Sekarang..</h4>
            @endif
          </div>
          <div class="col-3">
            <img id="vector1" class="img-fluid" src="{{asset('images/vector7.jpg')}}" alt="" srcset="">
          </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col" id="prakerin-page">
        @forelse($nilais as $key => $nilai)
        <form action="{{route('nilai-siswa.update',$nilai->id)}}" method="POST">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="siswa" class="form-label">Siswa</label>
                <input type="text" class="form-control" value="{{$nilai->siswa->user->fullname}}" readonly name="siswa">
                @error('siswa')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div>
                <input type="hidden" value="{{ Auth::user()->id }}" name="pembimbing_lapangan">
            </div>
            <div class="mb-3">
            <label for="nilai_rata_rata" class="form-label">Nilai Rata-Rata</label>
            <input type="number"  class="form-control @error('nilai_rata_rata') is-invalid @enderror" name="nilai_rata_rata" value="{{$nilai->nilai_rata_rata}}">
            @error('nilai_rata_rata')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
            </div>
            <div class="mb-3">
            <label for="nilai_rata_rata" class="form-label">Nilai Dalam Huruf *contoh : A</label>
            <input type="text"  class="form-control @error('nilai_huruf') is-invalid @enderror" name="nilai_huruf" value="{{$nilai->nilai_huruf}}">
            @error('nilai_huruf')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
            <p>Nilai dalam huruf adalah nilai rata-rata yang kemudian
                dikonversikan ke dalam huruf. <br>
                untuk mengetahui konversinya silahkan lihat pada tabel di bawah ini.
              </p>
              <img src="{{asset('images/tabelnilai.png')}}" class="img-fluid" alt="" srcset="">
            </div>
            @empty
            
        @endforelse
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection