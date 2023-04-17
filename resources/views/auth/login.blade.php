@extends('layouts.main')
@section('container')
<div class="container">
<main class="form-signin w-100 m-auto">
    <h1 class="h3 mb-3 fw-normal text-center">Please Login</h1>
    <form action="/login" method="POST">
        @csrf
    
        <div class="form-floating">
            <input type="email" class="form-control @error('email')
                is-invalid
            @enderror" name="email" id="email" autofocus required value="{{ old('email') }}">
            <label for="email">Username/Email</label>
        </div>
        <div class="form-floating mt-2">
            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
            <label for="password">Password</label>
            <input type="checkbox" onclick="showPassword()" class="mb-4"> Show Password
        </div>
        @if (session()->has('loginError'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('loginError') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
        </form>
    </main>
</div>
@endsection