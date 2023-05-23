@extends('dashboard.layouts.main')
@section('container')
<div class="wrapper d-flex align-items-stretch">
    @include('dashboard.layouts.sidebar') 
    <!-- Page Content  -->
<div id="content" class="px-4 py-1 p-md-5">
    @include('dashboard.layouts.navbar')
    <section>
        @if ($gambar == null)
        <h4 class="badge-danger mx-auto text-center">Data ini tidak memiliki gambar</h4> 
    @else
        <h4>Foto/Logo :</h4>
        <img src="{{asset('storage/'. $gambar)}}" alt="" class="img img-fluid">    
    @endif
    </section>
</div>
</div>

@endsection