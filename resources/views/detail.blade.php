@extends('layout.app')

@section('content')
    <div class="main-content">
        <img src="{{ asset('assets/images/nfllogo3.png') }}" width="150" alt="Logo">
        <div class="detail-card">
            <img src="{{ asset('https://s3.theasianparent.com/tap-assets-prod/wp-content/uploads/sites/24/2021/05/leade-jajanan-tradisional-768x380.jpg') }}"
                width="100%" alt="">
            <h2>{{ $products->name }}</h2>
            <table>
                <tr>
                    <td><strong>Harga</strong></td>
                    <td><strong>:</strong></td>
                    <td>Rp. {{ number_format($products->price) }}</td>
                </tr>
                <tr>
                    <td><strong>Stok</strong></td>
                    <td><strong>:</strong></td>
                    <td>{{ number_format($products->stok) }}</td>
                </tr>
                <tr>
                    <td><strong>Deskripsi</strong></td>
                    <td><strong>:</strong></td>
                    <td>{{ $products->description }}</td>
                </tr>
                <tr>
                    <td><strong>Jumlah Pesan</strong></td>
                    <td><strong>:</strong></td>
                    <td>
                        <form method="post" action="{{ url('pesan') }}/{{ $products->id }}">
                            @csrf
                            <input type="text" name="jumlah_pesan" class="form-control" required="">
                            <button type="submit">
                                <i class="fa fa-shopping-cart"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            </table>
        </div>
    </div>
@endsection
