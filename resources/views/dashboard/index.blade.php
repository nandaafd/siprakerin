@extends('dashboard.layouts.main')
@section('container')

<div class="wrapper d-flex align-items-stretch">
  @include('dashboard.layouts.sidebar')

  <!-- Page Content  -->
<div id="content" class="px-4 py-1 p-md-5">
  @include('dashboard.layouts.navbar')


  <h2 class="mb-2 text-center">welcome, 
    {{ Auth::user()->fullname }}</h2>


</div>
</div>
@endsection