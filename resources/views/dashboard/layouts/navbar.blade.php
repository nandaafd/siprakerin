<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container-fluid">

      <button type="button" id="sidebarCollapse" class="btn btn-primary">
        <i class="fa fa-bars"></i>
        <span class="sr-only">Toggle Menu</span>
      </button>
      <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fa fa-bars"></i>
      </button>
      @if (Request::is('absensi*'))
        <h3 class="mx-4 mt-2">Data absensi</h3>
      @elseif (Request::is('siswa*'))
        <h3 class="mx-4 mt-2">Data siswa</h3>
      @elseif (Request::is('logbook*'))
        <h3 class="mx-4 mt-2">Data logbook</h3>
      @elseif (Request::is('data-mitra*'))
        <h3 class="mx-4 mt-2">Data mitra</h3>
      @elseif (Request::is('data-guru*'))
        <h3 class="mx-4 mt-2">Data guru</h3>
      @elseif (Request::is('data-prakerin*'))
        <h3 class="mx-4 mt-2">Data prakerin</h3>
      @elseif (Request::is('nilai*'))
        <h3 class="mx-4 mt-2">Data nilai</h3>
      @elseif (Request::is('data-berita*'))
        <h3 class="mx-4 mt-2">Data berita</h3>
      @elseif (Request::is('pembimbing-lapangan*'))
        <h3 class="mx-4 mt-2">Data pembimbing lapangan</h3>
      @endif
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="nav navbar-nav ml-auto">
          <li class="nav-link">
            <form action="/logout" method="POST">
                @csrf
                <button type="submit" class="btn btn-outline-dark mt-2" onclick="return confirm('are you sure?')"><i class="bi bi-box-arrow-right"></i> Logout</button>
            </form>
          </li>
        </ul>
      </div>
    </div>
  </nav>