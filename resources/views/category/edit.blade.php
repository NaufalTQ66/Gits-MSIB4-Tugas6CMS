@extends('layout.app')

@section('content')
    <div class="main-content">
        <div>
            <img src="{{ asset('assets/images/nfllogo3.png') }}" width="150" alt="Logo">
        </div>
        <h1>Edit Category</h1>

        @if ($errors->any())
            <div>
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="create">
            <form method="post" action="/category/{{ $category->id }}" id="myForm" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div>
                    <label for="desk" class="from-label">Name</label>
                    <input type="text" class="form-control @error('product_name') is-invalid @enderror"
                        id="exampleInputEmail1" aria-describedby="emailHelp" name="category_name"
                        value="{{ $category->name }}">
                    @error('product_name')
                        <div class="invalid-feedback">
                            Nama tidak boleh kosong
                        </div>
                    @enderror
                </div>
                <div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
