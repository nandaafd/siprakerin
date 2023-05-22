@extends('dashboard.layouts.main')
@section('container')
<div class="wrapper d-flex align-items-stretch">
    @include('dashboard.layouts.sidebar') 
    <!-- Page Content  -->
<div id="content" class="px-4 py-1 p-md-5">
    @include('dashboard.layouts.navbar')
    <section>
            @if ($prakerin == null)
                <h4 class="badge-danger mx-auto text-center">Siswa ini tidak memiliki atau mengunggah file bukti diterima prakerin</h4> 
            @else
                <h4>Bukti diterima :</h4>
                <img src="{{asset('storage/'. $prakerin)}}" alt="" class="img img-fluid">    
            @endif 
    </section>
    
</div>
</div>
@endsection