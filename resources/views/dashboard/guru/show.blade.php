@extends('dashboard.layouts.main')
@section('container')
<div class="wrapper d-flex align-items-stretch">
    @include('dashboard.layouts.sidebar') 
    <!-- Page Content  -->
<div id="content" class="px-4 py-1 p-md-5">
    @include('dashboard.layouts.navbar')
    <section>
        @if ($guru == null)
                <h4 class="badge-danger mx-auto text-center">User ini tidak memiliki foto profil</h4> 
            @else
                <h4>Foto Profil :</h4>
                <img src="{{asset('storage/'. $guru)}}" alt="" class="img img-fluid">    
            @endif
    </section>
</div>
</div>
@endsection