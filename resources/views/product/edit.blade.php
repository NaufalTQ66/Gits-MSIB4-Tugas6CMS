@extends('layout.app')

@section('content')
    <div class="main-content">
        <div>
            <img src="{{ asset('assets/images/nfllogo3.png') }}" width="150" alt="Logo">
        </div>
        <h1>Edit Product</h1>

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
            <form method="post" action="/product/{{ $product->id }}" id="myForm" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div>
                    <label for="desk" class="from-label">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="exampleInputEmail1"
                        aria-describedby="emailHelp" name="name" value="{{ $product->name }}">
                    @error('name')
                        <div class="invalid-feedback">
                            Nama tidak boleh kosong
                        </div>
                    @enderror
                </div>
                <div>
                    <label for="category" class="form-label">Pilih Category</label>
                    <select class="form-select @error('category_id') is-invalid @enderror"
                        aria-label="Default select example" name="category_id">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <div class="invalid-feedback">
                            Pilih salah satu kategori
                        </div>
                    @enderror
                </div>
                <div>
                    <label for="stok" class="form-label">Stok</label>
                    <input type="text" class="form-control @error('stok') is-invalid @enderror"
                        id="exampleInputPassword1" name="stok" value="{{ $product->stok }}">
                    @error('stok')
                        <div class="invalid-feedback">
                            Stok tidak boleh kosong
                        </div>
                    @enderror
                </div>
                <div>
                    <label for="price" class="form-label">Price</label>
                    <input type="text" class="form-control @error('price') is-invalid @enderror"
                        id="exampleInputPassword1" name="price" value="{{ $product->price }}">
                    @error('price')
                        <div class="invalid-feedback">
                            Harga tidak boleh kosong
                        </div>
                    @enderror
                </div>
                <div>
                    <label for="desk" class="from-label">Deskripsi</label>
                    <input type="text" class="form-control @error('description') is-invalid @enderror"
                        id="exampleInputPassword1" name="description" value="{{ $product->description }}">
                    @error('description')
                        <div class="invalid-feedback">
                            Deskripsi tidak boleh kosong
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
