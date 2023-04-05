@extends('layout.app')

@section('content')
    <div class="main-content">
        <div>
            <img src="{{ asset('assets/images/nfllogo3.png') }}" width="150" alt="Logo">
        </div>
        <div class="login">
            <form action="" method="POST">
                @csrf
                <h1>Register</h1>
                <div>
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                        id="name" aria-describedby="nameHelp">
                    @error('name')
                        <div id="nameHelp" class="form-text">{{ $message }}</div>
                    @enderror
                </div>
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
                <div>
                    <label for="password_confirmation" class="form-label">Password Confirmation</label>
                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                        name="password_confirmation" id="password_confirmation">
                    @error('password_confirmation')
                        <div id="passwordConfirmationHelp" class="form-text">{{ $message }}</div>
                    @enderror
                </div>
                <p>Sudah punya akun?<a href="{{ url('login') }}"><br><strong>Login disini</strong></a></p>
                <button type="submit">Register</button>
            </form>
        </div>
    </div>
@endsection
