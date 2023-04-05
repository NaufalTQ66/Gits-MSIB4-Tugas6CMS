@extends('layout.app')

@section('content')
    <div class="main-content">
        <div class="product">
            <h1>{{ $title }}</h1>
            <a href="/category/create">Tambah Category</a>
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
                        <th>Category Name</th>
                        <th style="text-align: center; width=200px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($category as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>
                                <form action="/category/{{ $item->id }}" method="POST">
                                    <a type="button" href="category/{{ $item->id }}/edit">
                                        <i class="fa-solid fa-pen-to-square"></i> Edit
                                    </a>
                                    @method('delete')
                                    @csrf
                                    <button type="submit">
                                        <i class="fa-solid fa-trash-can"></i> Hapus
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
