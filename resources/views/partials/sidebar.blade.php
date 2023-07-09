@if (Auth::user())
<div class="sidebar-header">
    <h4 class="mt-4" id="name-sidebar"><span>Halo,</span> {{Auth::user()->fullname}}
        <i class="bi bi-patch-check-fill"></i>
    </h4>
    <p>{{Auth::user()->role->name}}</p>
</div>
@endif
<div class="menu-sidebar mt-5">
<ul class="my-3">
    @if (Auth::user())
    <li><a href="{{route('profil.show',Auth::user()->id)}}"><img src="{{asset('images/ikon/husband.gif')}}" alt="" class="">Pengaturan Akun</a></li>
    @endif
    <li><a href="{{url('/absensi-siswa')}}"><img src="{{asset('images/ikon/fingerprint-scan.gif')}}" alt="" class="">Lihat Absensi</a></li>
    <li><a href="{{url('/logbooks')}}"><img src="{{asset('images/ikon/book.gif')}}" alt="" class="">Lihat Logbook</a></li>
    <li><a href="{{url('/nilai-siswa')}}"><img src="{{asset('images/ikon/calendar.gif')}}" alt="" class="">Lihat Nilai</a></li>
    <li><a href="{{url('/berita')}}"><img src="{{asset('images/ikon/news.gif')}}" alt="" class="">Baca Berita & Informasi</a></li>
    <li><a href="{{url('/history')}}"><img src="{{asset('images/ikon/history.gif')}}" alt="" class="">Cek Riwayat Prakerin</a></li>
    <li><a href="{{url('/daftar-prakerin')}}"><img src="{{asset('images/ikon/notebook.gif')}}" alt="" class="">Pendaftaran Prakerin</a></li>
    <li><a href="{{url('/mitra')}}"><img src="{{asset('images/ikon/factory.gif')}}" alt="" class="">Mitra Sekolah Kita</a></li>
    <li><a href="{{url('/download')}}"><img src="{{asset('images/ikon/download.gif')}}" alt="" class="">Download Berkas</a></li>
    <li><a href="{{url('/laporan-akhir')}}"><img src="{{asset('images/ikon/upload.gif')}}" alt="" class="">Upload Laporan Akhir</a></li>
</ul>
</div>