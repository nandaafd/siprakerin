<nav id="sidebar">
    <div class="p-4 pt-5">
      <a href="#" class="img logo rounded-circle" style="background-image: url({{ asset('assets/images/utm.jpg') }});"></a>
      <p class="mb-2 text-center">welcome, 
        {{-- {{ Auth::user()->role->name }} --}}
        {{ Auth::user()->fullname }}</p>
      <ul class="list-unstyled components mb-5">
        <li class="{{ Request::is('absensi*') ? 'active' : '' }}">
          <a href="#pageAbsensi" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Absensi</a>
          <ul class="collapse list-unstyled" id="pageAbsensi">
            @can('siswa')
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
              <li class="{{ Request::is('logbook*') ? 'active' : '' }}">
                  <a href="/logbook">Lihat Logbook</a>
              </li>
            @endcan
            @can('pembimbing-lapangan')
              <li class="{{ Request::is('logbook*') ? 'active' : '' }}">
                  <a href="/logbook">Lihat Logbook</a>
              </li>
            @endcan
            @can('siswa')
              <li class="{{ Request::is('isi-logbook*') ? 'active' : '' }}">
                  <a href="/isi-logbook">Isi Logbook</a>
              </li>
            @endcan
          </ul>
        </li>
        <li class="{{ Request::is('nilai*') ? 'active' : '' }}">
          <a href="#pageNilai" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Nilai</a>
          <ul class="collapse list-unstyled" id="pageNilai">
            @can('siswa')
              <li class="{{ Request::is('nilai*') ? 'active' : '' }}">
                <a href="/nilai">Lihat Nilai Saya</a>
              </li>
            @endcan
            @can('guru')
              <li class="{{ Request::is('nilai*') ? 'active' : '' }}">
                <a href="/nilai">Lihat Nilai Siswa</a>
              </li>
            @endcan
            @can('pembimbing-lapangan')
              <li class="{{ Request::is('isi-nilai*') ? 'active' : '' }}">
                <a href="/isi-nilai">Isi Nilai</a>
              </li>
            @endcan
          </ul>
        </li>
        <li>
          <a href="#">Menu 4</a>
        </li>
        <li>
          <a href="#">Menu 5</a>
        </li>
      </ul>
  
      <div class="footer">
        <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
          Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib.com</a>
          <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
      </div>
  
    </div>
  </nav>