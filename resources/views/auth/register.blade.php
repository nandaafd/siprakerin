@extends('auth.layouts.main')

@section('content')
    <div class="row">
        <div class="col-sm-6" id="left">
            <img class="my-4 mx-4" src="{{asset('images/logo1.png')}}" alt="">
            <h2 class="mx-4">Halo, Selamat Datang</h2>
            <h5 id="text" class="mx-4 mb-5">Ayo buat akunmu sekarang juga!</h5>
            <h4 class="mx-4 mb-2">Register</h4>
            <p id="text2" class="mx-4 ">Pilih sebagai siapa anda mendaftar</p>
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
                        <input type="text" placeholder="Nama Lengkap" class="form-control @error('nama_lengkap') is-invalid @enderror" id="nama_lengkap" name="nama_lengkap" value="">
                        <label for="nama" class="">Nama Lengkap</label>
                        @error('nama_lengkap')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror 
                    </div>
                    <div class="mb-3 form-floating">
                        <input type="text" class="form-control @error('nama_panggilan') is-invalid @enderror" placeholder="Nama Panggilan" id="nama_panggilan" name="nama_panggilan" value="">
                        <label for="nama" class="">Nama Panggilan</label> 
                        @error('nama_panggilan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror 
                      </div>
                    <div class="mb-3 form-floating">
                        <input type="text" class="form-control @error('nip_niy') is-invalid @enderror" placeholder="NIP/NIY" id="nip" name="nip_niy" value="">
                        <label for="nip" class="">NIP/NIY</label>
                        @error('nip_niy')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror 
                      </div>
                      <div class="mb-3 form-floating">
                        <input type="text" class="form-control @error('no_telpon') is-invalid @enderror" id="no_telpon" placeholder="No Telpon" name="no_telpon" value="">
                        <label for="no_telpon" class="">No Telpon</label>
                        @error('no_telpon')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror 
                      </div>
                      <div class="mb-3 form-floating">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Email" name="email" value="">
                        <label for="no_telpon" class="">Email</label>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror 
                      </div>
                      <div class="mb-3 form-floating">
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="Password" placeholder="Password" name="password" value="">
                        <label for="no_telpon" class="">Password</label>
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror 
                      </div>
                      <div class="mb-3 form-floating">
                        <input type="password" class="form-control @error('confirm_password') is-invalid @enderror" id="confirm_password" placeholder="Confirm Password" name="confirm_password" value="">
                        <label for="no_telpon" class="">Confirm Password</label>
                        @error('confirm_password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror 
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
                        <input type="text" placeholder="Nama Lengkap" class="form-control  @error('nama_lengkap') is-invalid @enderror" id="nama_lengkap" name="nama_lengkap" value="">
                        <label for="nama" class="">Nama Lengkap</label>
                        @error('nama_lengkap')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror 
                    </div>
                    <div class="mb-3 form-floating">
                        <input type="text" class="form-control  @error('nama_panggilan') is-invalid @enderror" placeholder="Nama Panggilan" id="nama_panggilan" name="nama_panggilan" value="">
                        <label for="nama" class="">Nama Panggilan</label>
                        @error('nama_panggilan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror 
                      </div>
                    <div class="mb-3 form-floating">
                        <input type="text" class="form-control  @error('nisn') is-invalid @enderror" placeholder="NISN" id="nisn" name="nisn" value="">
                        <label for="nisn" class="">NISN</label>
                        @error('nisn')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                      </div>
                      <div class="mb-3">
                        <select class="form-select form-select-lg  @error('kelas') is-invalid @enderror" id="pilih-kelas" aria-label="Default select example" name="kelas">
                            <option value="">Pilih kelas..</option>
                            @foreach ($kelas as $kls)
                            <option value="{{$kls->id}}">{{$kls->nama_kelas}}</option>
                            @endforeach
                          </select>
                          @error('kelas')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                      </div>
                      <div class="mb-3 form-floating">
                        <input type="text" class="form-control  @error('alamat') is-invalid @enderror" id="alamat" placeholder="Alamat" name="alamat" value="">
                        <label for="alamat" class="">Alamat</label>
                        @error('alamat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                      </div>
                      <div class="mb-3 form-floating">
                        <input type="text" class="form-control  @error('no_telpon') is-invalid @enderror" id="no_telpon" placeholder="No Telpon" name="no_telpon" value="">
                        <label for="no_telpon" class="">No Telpon</label>
                        @error('no_telpon')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                      </div>
                      <div class="mb-3 form-floating">
                        <input type="email" class="form-control  @error('email') is-invalid @enderror" id="email" placeholder="Email" name="email" value="">
                        <label for="no_telpon" class="">Email</label>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                      </div>
                      <div class="mb-3 form-floating">
                        <input type="password" class="form-control  @error('password') is-invalid @enderror" id="Password" placeholder="Password" name="password" value="">
                        <label for="no_telpon" class="">Password</label>
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                      </div>
                      <div class="mb-3 form-floating">
                        <input type="password" class="form-control  @error('confirm_password') is-invalid @enderror" id="confirm_password" placeholder="Confirm Password" name="confirm_password" value="">
                        <label for="no_telpon" class="">Confirm Password</label>
                        @error('confirm_password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
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

        </div>
        <div class="col-sm-6" id="right">
            <img id="img-left" class="start-0" src="{{asset('images/kanan1.png')}}" alt="">
        </div>
    </div>
@endsection
