@extends('layouts.app')

@section('content')
    <h2>Login</h2>
    

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="field-group">
            <label>Username</label>
            <input type="text" name="username" value="{{ old('username') }}" placeholder="Masukkan username">
            @error('username')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="field-group">
            <label>Password</label>
            <input type="password" name="password" placeholder="Masukkan password">
            @error('password')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Login</button>
    </form>

    <p style="margin-top:18px; font-size:13px; color:#6b7280;">
        Belum punya akun?
        <a href="{{ route('register.show') }}" class="link">Daftar sekarang</a>
    </p>
@endsection
