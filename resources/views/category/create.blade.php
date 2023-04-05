@extends('layout.app')

@section('content')
    <div class="main-content">
        <div>
            <img src="{{ asset('assets/images/nfllogo3.png') }}" width="150" alt="Logo">
        </div>
        <h1>Tambah Category</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="create">
            <form method="post" action="{{ url('/category') }}" id="myForm" enctype="multipart/form-data" class="row g-3">
                @csrf
                <div>
                    <label for="desk" class="from-label">Category Name</label>
                    <input type="text" class="form-control @error('product_name') is-invalid @enderror"
                        id="exampleInputEmail1" aria-describedby="emailHelp" name="category_name" required>
                    @error('product_name')
                        <div class="invalid-feedback">
                            Nama tidak boleh kosong
                        </div>
                    @enderror
                </div>
                <div>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
@endsection
