

<nav class="navbar navbar-expand-lg position-fixed top-0">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><img src="{{asset('images/logo1.png')}}" alt="" srcset=""></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mx-auto mb-2 mb-lg-0" id="nav-menu">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="{{url('/')}}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Berita</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-bs-target="#modal-menu" data-bs-toggle="modal" href="javascript:void(0)" id="btn-lainnya">Menu</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Tentang</a>
        </li>
      </ul>
       @if (Auth::user())
          <a href="{{route('profil.show',Auth::user()->id)}}" class="btn btn-primary"  id="btn-profil-nav">Profil</a>
        @else
          <a href="{{url('/login')}}" class="btn btn-primary" id="btn-login-nav">Login</a> 
       @endif
    </div>
  </div>
</nav>
@push('js')

@endpush