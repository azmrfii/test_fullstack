@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Buat Order</h2>
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <form id="orderForm" method="POST" action="{{ route('orders.store') }}">
            @csrf
            <div class="order-items">
                <div class="order-item row mb-3">
                    <div class="col-md-4 form-group">
                        <label for="product">Product</label>
                        <select name="product_id[]" class="form-control product-select">
                            <option value="">Select Product</option>
                            @foreach ($products as $product)
                                <option value="{{ $product->id }}" data-price="{{ $product->harga }}">{{ $product->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2 form-group">
                        <label for="qty">Quantity</label>
                        <input type="number" name="qty[]" class="form-control qty" placeholder="qty" min="1"
                            value="1">
                    </div>
                    <div class="col-md-3 form-group">
                        <label for="harga">Price</label>
                        <input type="text" name="harga[]" class="form-control harga" placeholder="harga" readonly>
                    </div>
                    <div class="col-md-2 form-group">
                        <button type="button" class="btn btn-danger remove-item mt-4">Remove</button>
                    </div>
                </div>
            </div>

            <button type="button" class="btn btn-secondary add-item mb-3">Add Product</button>

            <div class="form-group">
                <label for="total_harga">Total Harga:</label>
                <input type="text" name="total_harga" class="form-control total-harga" readonly>
            </div>

            <br>
            <button type="submit" class="btn btn-primary">Pesan Order</button>
        </form>
    </div>
@endsection
