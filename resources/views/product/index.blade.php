@extends('layout.app')

@section('content')
    <div class="main-content">
        <div class="product">
            <h1>{{ $title }}</h1>
            <a href="{{ url('category') }}">Lihat Category</a>
            <a href="/product/create">Tambah Product</a>
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <div class="product-table">
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Deskripsi</th>
                        <th>Stok</th>
                        <th>Price</th>
                        <th style="text-align: center; width=200px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->category->name }}</td>
                            <td>{{ $item->description }}</td>
                            <td>{{ $item->stok }}</td>
                            <td>Rp. {{ $item->price }}</td>
                            <td>
                                <form action="/product/{{ $item->id }}" method="POST">
                                    <a type="button" href="product/{{ $item->id }}/edit">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    @method('delete')
                                    @csrf
                                    <button type="submit">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
