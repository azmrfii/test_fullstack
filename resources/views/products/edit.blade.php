@extends('layouts.app')

@section('title', 'Edit Product')

@section('content')
<div class="container">
    <h2>Edit Product</h2>

    <form action="{{ route('products.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nama" class="form-label">Nama Product</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ $product->nama }}" required>
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required>{{ $product->deskripsi }}</textarea>
        </div>

        <div class="mb-3">
            <label for="harga" class="form-label">Harga per Item</label>
            <input type="number" class="form-control" id="harga" name="harga" value="{{ $product->harga }}" required>
        </div>

        <div class="mb-3">
            <label for="kategori" class="form-label">Kategori</label>
            <input type="text" class="form-control" id="kategori" name="kategori" value="{{ $product->kategori }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Product</button>
    </form>
</div>
@endsection
