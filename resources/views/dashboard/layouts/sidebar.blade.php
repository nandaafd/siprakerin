<nav id="sidebar">
    <div class="p-4 pt-5">
      <a href="#" class="img logo rounded-circle" style="background-image: url({{ asset('assets/images/utm.jpg') }});"></a>
      <p class="mb-2 text-center">welcome, 
        {{-- {{ Auth::user()->role->name }} --}}
        {{ Auth::user()->nickname }}</p>
      <ul class="list-unstyled components mb-5">
        <li class="{{ Request::is('absensi*') ? 'active' : '' }}">
          <a href="#pageAbsensi" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Absensi</a>
          <ul class="collapse list-unstyled" id="pageAbsensi">
            @can('siswa')
              <li class="{{ Request::is('absensi') ? 'active' : '' }}">
                  <a href="/absensi">Lihat Absensi</a>
              </li>
            @endcan
            @can('admin')
            <li class="{{ Request::is('absensi') ? 'active' : '' }}">
                <a href="/absensi">Lihat Absensi</a>
            </li>
          @endcan
            @can('guru')
              <li class="{{ Request::is('absensi') ? 'active' : '' }}">
                  <a href="/absensi">Lihat Absensi</a>
              </li>
            @endcan
            @can('pembimbing-lapangan')
            <li class="{{ Request::is('absensi') ? 'active' : '' }}">
                <a href="/absensi">Lihat Absensi</a>
            </li>
              <li class="{{ Request::is('absensi/create*') ? 'active' : '' }}">
                  <a href="/absensi/create">Isi Absensi</a>
              </li>
            @endcan
          </ul>
        </li>
        <li class="{{ Request::is('logbook*') ? 'active' : '' }}">
          <a href="#pageLogbook" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Logbook</a>
          <ul class="collapse list-unstyled" id="pageLogbook">
            @can('guru')
              <li class="{{ Request::is('logbook') ? 'active' : '' }}">
                  <a href="/logbook">Lihat Logbook</a>
              </li>
            @endcan
            @can('admin')
            <li class="{{ Request::is('logbook') ? 'active' : '' }}">
                <a href="/logbook">Lihat Logbook</a>
            </li>
           @endcan
            @can('pembimbing-lapangan')
              <li class="{{ Request::is('logbook') ? 'active' : '' }}">
                  <a href="/logbook">Lihat Logbook</a>
              </li>
            @endcan
            @can('siswa')
              <li class="{{ Request::is('logbook') ? 'active' : '' }}">
                  <a href="/logbook">Lihat Logbook</a>
              </li>
              <li class="{{ Request::is('logbook/create') ? 'active' : '' }}">
                  <a href="/logbook/create">Isi Logbook</a>
              </li>
            @endcan
          </ul>
        </li>
        <li class="{{ Request::is('nilai*') ? 'active' : '' }}">
          <a href="#pageNilai" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Nilai</a>
          <ul class="collapse list-unstyled" id="pageNilai">
            @can('siswa')
              <li class="{{ Request::is('nilai') ? 'active' : '' }}">
                <a href="/nilai">Lihat Nilai Saya</a>
              </li>
            @endcan
            @can('admin')
            <li class="{{ Request::is('nilai') ? 'active' : '' }}">
              <a href="/nilai">Lihat Nilai Saya</a>
            </li>
            @endcan
            @can('guru')
              <li class="{{ Request::is('nilai') ? 'active' : '' }}">
                <a href="/nilai">Lihat Nilai Siswa</a>
              </li>
            @endcan
            @can('pembimbing-lapangan')
            <li class="{{ Request::is('nilai') ? 'active' : '' }}">
              <a href="/nilai">Lihat Nilai Siswa</a>
            </li>
              <li class="{{ Request::is('nilai/create') ? 'active' : '' }}">
                <a href="/nilai/create">Isi Nilai</a>
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
      </ul>
  
      {{-- <div class="footer">
        <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
          Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib.com</a>
          <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
      </div> --}}
  
    </div>
  </nav>