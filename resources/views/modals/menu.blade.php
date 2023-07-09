
  <!-- Modal -->
  <div class="modal fade" id="modal-menu" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Menu</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row text-center">
            <div class="col">
              <div class="mx-auto py-1">
                <a href="{{url('/daftar-prakerin')}}" id="menu-ikon" class="text-center mx-auto">
                  <img src="{{asset('images/ikon/notebook.gif')}}" alt="" class="ikon-daftar">
                  <p>Daftar</p>
                </a>
            </div>
            </div>
            <div class="col">
              <div class="mx-auto py-1">
                <a href="{{url('/logbooks')}}" id="menu-ikon" class="text-center mx-auto">
                  <img src="{{asset('images/ikon/book.gif')}}" alt="" class="ikon-daftar">
                  <p>Logbook</p>
                </a>
              </div>
            </div>
            <div class="col">
              <div class="mx-auto py-1">
                <a href="{{url('/absensi-siswa')}}" id="menu-ikon" class="text-center mx-auto">
                  <img src="{{asset('images/ikon/fingerprint-scan.gif')}}" alt="" class="ikon-daftar">
                  <p>Absensi</p>
                </a>
              </div>
            </div>
            <div class="col">
              <div class="mx-auto py-1">
                <a href="{{url('/berita')}}" id="menu-ikon" class="text-center mx-auto">
                  <img src="{{asset('images/ikon/news.gif')}}" alt="" class="ikon-daftar">
                  <p>Berita & Informasi</p>
                </a>
              </div>
            </div>
            <div class="col">
              <div class="mx-auto py-1">
                <a href="{{url('/mitra')}}" id="menu-ikon" class="text-center mx-auto">
                  <img src="{{asset('images/ikon/factory.gif')}}" alt="" class="ikon-daftar">
                  <p>Mitra</p>
                </a>
              </div>
            </div>
            <div class="col">
              <div class="mx-auto py-1">
                <a href="{{url('/history')}}" id="menu-ikon" class="text-center mx-auto">
                  <img src="{{asset('images/ikon/history.gif')}}" alt="" class="ikon-daftar">
                  <p>History prakerin</p>
                </a>
              </div>
            </div>
            <div class="col">
              <div class="mx-auto py-1">
                <a href="{{url('/laporan-akhir')}}" id="menu-ikon" class="text-center mx-auto">
                  <img src="{{asset('images/ikon/notebook2.gif')}}" alt="" class="ikon-daftar">
                  <p>Laporan Akhir</p>
                </a>
              </div>
            </div>
            <div class="col">
              <div class="mx-auto py-1">
                <a href="{{url('/nilai-siswa')}}" id="menu-ikon" class="text-center mx-auto">
                  <img src="{{asset('images/ikon/book2.gif')}}" alt="" class="ikon-daftar">
                  <p>Nilai</p>
                </a>
              </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>