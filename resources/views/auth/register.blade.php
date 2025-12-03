@extends('layouts.app')

@section('content')
    <h2>Buat Akun Baru</h2>
    

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="field-group">
            <label>Username</label>
            <input type="text" name="username" value="{{ old('username') }}" placeholder="contoh: fadhil123">
            @error('username')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="field-group">
            <label>Password</label>
            <input type="password" name="password" placeholder="Minimal 6 karakter">
            @error('password')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="field-group">
            <label>Konfirmasi Password</label>
            <input type="password" name="password_confirmation" placeholder="Ulangi password">
        </div>

        <button type="submit" class="btn btn-primary">Daftar</button>
    </form>

    <p style="margin-top:18px; font-size:13px; color:#6b7280;">
        Sudah punya akun?
        <a href="{{ route('login.show') }}" class="link">Login di sini</a>
    </p>
@endsection
