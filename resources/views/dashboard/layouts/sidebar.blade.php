<nav id="sidebar">
    <div class="p-4 pt-5">
      <img src="{{asset('images/logo1.png')}}" alt="" class="mx-4 mb-3">
      <p class="mb-2 text-center">welcome, 
        <span>{{ Auth::user()->nickname }}</span></p>
      <ul class="list-unstyled components mb-5">
        <li class="{{ Request::is('absensi*') ? 'active' : '' }}">
          <a href="#pageAbsensi" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Absensi</a>
          <ul class="collapse list-unstyled" id="pageAbsensi">
            @can('admin')
            <li class="{{ Request::is('absensi') ? 'active' : '' }}">
                <a href="/absensi">Lihat Absensi</a>
            </li>
          @endcan
          </ul>
        </li>
        <li class="{{ Request::is('logbook*') ? 'active' : '' }}">
          <a href="#pageLogbook" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Logbook</a>
          <ul class="collapse list-unstyled" id="pageLogbook">
            @can('admin')
            <li class="{{ Request::is('logbook') ? 'active' : '' }}">
                <a href="/logbook">Lihat Logbook</a>
            </li>
           @endcan
          </ul>
        </li>
        <li class="{{ Request::is('nilai*') ? 'active' : '' }}">
          <a href="#pageNilai" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Nilai</a>
          <ul class="collapse list-unstyled" id="pageNilai">
            @can('admin')
            <li class="{{ Request::is('nilai-tkj') ? 'active' : '' }}">
              <a href="/nilai-tkj">Nilai TKJ</a>
            </li>
            <li class="{{ Request::is('nilai-tkro') ? 'active' : '' }}">
              <a href="/nilai-tkro">Nilai TKRO</a>
            </li>
            <li class="{{ Request::is('nilai-pbs') ? 'active' : '' }}">
              <a href="/nilai-pbs">Nilai PBS</a>
            </li>
            @endcan
          </ul>
        </li>
        <li class="{{ Request::is('siswa*') ? 'active' : '' }}">
          <a href="/siswa" class="">Siswa</a>
        </li>
        <li class="{{ Request::is('pembimbing-lapangan*') ? 'active' : '' }}">
          <a href="/pembimbing-lapangan" class="">Pembimbing Lapangan</a>
        </li>
        <li class="{{ Request::is('data-guru*') ? 'active' : '' }}">
          <a href="/data-guru" class="">Guru</a>
        </li>
        <li class="{{ Request::is('data-prakerin*') ? 'active' : '' }}">
          <a href="/data-prakerin" class="">Prakerin</a>
        </li>
        <li class="{{ Request::is('data-berita*') ? 'active' : '' }}">
          <a href="/data-berita" class="">Berita & Informasi</a>
        </li>
        <li class="{{ Request::is('data-mitra*') ? 'active' : '' }}">
          <a href="/data-mitra" class="">Mitra</a>
        </li>
        <li class="{{ Request::is('berkas*') ? 'active' : '' }}">
          <a href="/berkas" class="">Berkas</a>
        </li>
        <li class="{{ Request::is('status*') ? 'active' : '' }}">
          <a href="/status" class="">Status</a>
        </li>
        <li class="{{ Request::is('kelas*') ? 'active' : '' }}">
          <a href="/kelas" class="">Kelas</a>
        </li>
        <li class="{{ Request::is('data-laporan*') ? 'active' : '' }}">
          <a href="/data-laporan" class="">Laporan Akhir</a>
        </li>
      </ul>
  
      {{-- <div class="footer">
        <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
          Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib.com</a>
          <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
      </div> --}}
  
    </div>
  </nav>