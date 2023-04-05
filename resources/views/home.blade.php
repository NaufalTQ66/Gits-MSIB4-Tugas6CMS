@extends('layout.app')

@section('content')
    <div class="main-content">
        <img src="{{ asset('assets/images/nfllogo3.png') }}" width="150" alt="Logo">
        @guest
            <h1>NFL Shop</h1>
        @endguest
        @auth
            <h1>Welcome to NFL Shop, {{ auth()->user()->name }}</h1>
        @endauth
        <p>NFL Shop is a snack store that sells various types of snacks.<br>
            You can find many kinds of snacks.</p>
        <div class="row">
            @foreach ($products as $a)
                <div class="column">
                    <div class="card">
                        <img src="https://s3.theasianparent.com/tap-assets-prod/wp-content/uploads/sites/24/2021/05/leade-jajanan-tradisional-768x380.jpg"
                            alt="Product image">
                        <h2>{{ $a->name }}</h2>
                        <p>
                            <strong>Harga : </strong> Rp. {{ number_format($a->price) }} <br>
                            <strong>Stok :</strong> {{ $a->stok }} <br>
                        </p>
                        <a href="/detail/{{ $a->id }}"><i class="fa fa-shopping-cart"></i> Pesan</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
