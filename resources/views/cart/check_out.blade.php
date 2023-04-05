@extends('layout.app')

@section('content')
    <div class="main-content">
        <img src="{{ asset('assets/images/nfllogo3.png') }}" width="150" alt="Logo">
        <h1><i class="fa fa-shopping-cart"></i> Check-Out</h1>
        <div class="card">
            @if (!empty($cart))
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Gambar</th>
                            <th>Nama Barang</th>
                            <th>Jumlah</th>
                            <th>Harga</th>
                            <th>Total Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @foreach ($cart_details as $cart_detail)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>
                                    <img src="{{ asset('https://s3.theasianparent.com/tap-assets-prod/wp-content/uploads/sites/24/2021/05/leade-jajanan-tradisional-768x380.jpg') }}"
                                        width="100px" alt="">
                                </td>
                                <td>{{ $cart_detail->product->name }}</td>
                                <td>{{ $cart_detail->jumlah }}</td>
                                <td align="right">Rp. {{ number_format($cart_detail->product->price) }}</td>
                                <td align="right">Rp. {{ number_format($cart_detail->total_price) }}</td>
                                <td>
                                    <a href="/check-out/{{ $cart_detail->id }}/delete">
                                        <i class="fa-solid fa-trash"></i> Hapus
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="5" align="right"><strong>Total Harga :</strong></td>
                            <td align="right"><strong>Rp. {{ number_format($cart->total_price) }}</strong>
                            </td>
                            <td>
                                <a href="{{ url('konfirmasi-check-out') }}"
                                    onclick="return confirm('Check Out???????????');">
                                    <i class="fa fa-shopping-cart"></i> Check Out
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            @endif
        </div>
    </div>

@endsection
