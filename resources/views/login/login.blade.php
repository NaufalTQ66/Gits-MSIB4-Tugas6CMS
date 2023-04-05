@extends('layout.app')

@section('content')
    <div class="main-content">
        <div>
            <img src="{{ asset('assets/images/nfllogo3.png') }}" width="150" alt="Logo">
        </div>
        <div class="login">
            <form action="{{ url('login') }}" method="POST">
                @csrf
                <h1>Login</h1>
                <div>
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                        id="email" aria-describedby="emailHelp">
                    @error('email')
                        <div id="emailHelp" class="form-text">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                        id="password">
                    @error('password')
                        <div id="passwordHelp" class="form-text">{{ $message }}</div>
                    @enderror
                </div>
                <p>Belum punya akun?<a href="{{ url('register') }}"><br><strong>Register disini</strong></a></p>
                <button type="submit">Login</button>
            </form>
        </div>
    </div>
@endsection
