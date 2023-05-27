@extends('auth.layouts.main')

@section('content')
    <div class="row">
        <div class="col-sm-6" id="left">
            <img class="my-4 mx-4" src="{{asset('images/logo1.png')}}" alt="">
            <h2 class="mx-4">Halo, Selamat Datang</h2>
            <h5 id="text" class="mx-4">Ayo buat akunmu sekarang juga!</h5>
            <div class="nav nav-tabs tab mx-4">
                <button class="nav-link tablinks" onclick="openTab(event, 'tab1')">Guru</button>
                <button class="nav-link tablinks" onclick="openTab(event, 'tab2')">Siswa</button>
                {{-- <button class="nav-link tablinks" onclick="openTab(event, 'tab3')">Pembimbing Lapangan</button> --}}
              </div>
              
              <div id="tab1" class="tabcontent">
                <p>Anda mendaftar sebagai guru</p>
                <form action="{{url('/register')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('post')
                    <input type="text" hidden name="role" id="role" value="2">
                    <input type="text" hidden name="guru" value="guru">
                    <div class="mb-3 form-floating">
                        <input type="text" placeholder="Nama Lengkap" class="form-control" id="nama_lengkap" name="nama_lengkap" value="">
                        <label for="nama" class="">Nama Lengkap</label> 
                    </div>
                    <div class="mb-3 form-floating">
                        <input type="text" class="form-control" placeholder="Nama Panggilan" id="nama_panggilan" name="nama_panggilan" value="">
                        <label for="nama" class="">Nama Panggilan</label> 
                      </div>
                    <div class="mb-3 form-floating">
                        <input type="text" class="form-control" placeholder="NIP/NIY" id="nip" name="nip_niy" value="">
                        <label for="nip" class="">NIP/NIY</label>
                      </div>
                      <div class="mb-3 form-floating">
                        <input type="text" class="form-control" id="no_telpon" placeholder="No Telpon" name="no_telpon" value="">
                        <label for="no_telpon" class="">No Telpon</label>
                      </div>
                      <div class="mb-3 form-floating">
                        <input type="email" class="form-control" id="email" placeholder="Email" name="email" value="">
                        <label for="no_telpon" class="">Email</label>
                      </div>
                      <div class="mb-3 form-floating">
                        <input type="password" class="form-control" id="Password" placeholder="Password" name="password" value="">
                        <label for="no_telpon" class="">Password</label>
                      </div>
                      <div class="mb-3 form-floating">
                        <input type="password" class="form-control" id="confirm_password" placeholder="Confirm Password" name="confirm_password" value="">
                        <label for="no_telpon" class="">Confirm Password</label>
                      </div>
                      @if(session('error'))
                        <div class="alert alert-warning">
                            {{ session('error') }}
                        </div>
                      @endif    
                      <button type="submit" class="btn btn-primary" style="">Register</button>
                  </form>
                  <p id="login-btn" class="text-center my-2">Sudah punya akun? <a href="{{url('/login')}}">Login</a></p>
              </div>
              
              {{-- SISWA --}}
              <div id="tab2" class="tabcontent">
                <p>Anda mendaftar sebagai siswa</p>
                <form action="{{url('/register')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('post')
                    <input type="text" hidden name="role" id="role" value="2">
                    <input type="text" hidden name="siswa" value="siswa">
                    <div class="mb-3 form-floating">
                        <input type="text" placeholder="Nama Lengkap" class="form-control" id="nama_lengkap" name="nama_lengkap" value="">
                        <label for="nama" class="">Nama Lengkap</label> 
                    </div>
                    <div class="mb-3 form-floating">
                        <input type="text" class="form-control" placeholder="Nama Panggilan" id="nama_panggilan" name="nama_panggilan" value="">
                        <label for="nama" class="">Nama Panggilan</label> 
                      </div>
                    <div class="mb-3 form-floating">
                        <input type="text" class="form-control" placeholder="NISN" id="nisn" name="nisn" value="">
                        <label for="nisn" class="">NISN</label>
                      </div>
                      <div class="mb-3">
                        <select class="form-select form-select-lg" id="pilih-kelas" aria-label="Default select example" name="kelas">
                            <option value="">Pilih kelas..</option>
                            @foreach ($kelas as $kls)
                            <option value="{{$kls->id}}">{{$kls->nama_kelas}}</option>
                            @endforeach
                          </select>
                      </div>
                      <div class="mb-3 form-floating">
                        <input type="text" class="form-control" id="alamat" placeholder="Alamat" name="alamat" value="">
                        <label for="alamat" class="">Alamat</label>
                      </div>
                      <div class="mb-3 form-floating">
                        <input type="text" class="form-control" id="no_telpon" placeholder="No Telpon" name="no_telpon" value="">
                        <label for="no_telpon" class="">No Telpon</label>
                      </div>
                      <div class="mb-3 form-floating">
                        <input type="email" class="form-control" id="email" placeholder="Email" name="email" value="">
                        <label for="no_telpon" class="">Email</label>
                      </div>
                      <div class="mb-3 form-floating">
                        <input type="password" class="form-control" id="Password" placeholder="Password" name="password" value="">
                        <label for="no_telpon" class="">Password</label>
                      </div>
                      <div class="mb-3 form-floating">
                        <input type="password" class="form-control" id="confirm_password" placeholder="Confirm Password" name="confirm_password" value="">
                        <label for="no_telpon" class="">Confirm Password</label>
                      </div>
                      @if(session('error'))
                        <div class="alert alert-warning">
                            {{ session('error') }}
                        </div>
                      @endif    
                      <button type="submit" class="btn btn-primary" style="">Register</button>
                  </form>
                  <p>Sudah punya akun? <a href="{{url('/login')}}">Login</a></p>
              </div>

        </div>
        <div class="col-sm-6" id="right">
            <img id="img-left" class="start-0" src="{{asset('images/kanan1.png')}}" alt="">
        </div>
    </div>
@endsection
