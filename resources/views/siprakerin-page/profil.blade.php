@extends('layouts.main')
@section('content')
<div>
    <h1>halo</h1>
    <form action="{{url('/logout')}}" method="POST">
        @csrf
        <button type="submit" class="btn btn-outline-dark mt-2" onclick="return confirm('are you sure?')"><i class="bi bi-box-arrow-right"></i> Logout</button>
    </form>
</div>

@endsection