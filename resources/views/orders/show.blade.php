@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Detail Order</h2>
        <div class="card">
            <div class="card-header">
                Detail Order #{{ $order->id }}
            </div>
            <div class="card-body">
                <h5 class="card-title">Nama Konsumen: {{ $order->customer->nama }}</h5>
                <p class="card-text">Total Harga: Rp. {{ number_format($order->total_harga, 2, ',', '.') }}</p>
                <p class="card-text">Tanggal Pembelian: {{ \Carbon\Carbon::parse($order->created_at)->format('d-M-y') }}</p>

                <h5>Items:</h5>
                <ul class="list-group">
                    @foreach ($order->orderItems as $item)
                        <li class="list-group-item">
                            {{ $item->product->nama }} - {{ $item->qty }} x
                            Rp. {{ number_format($item->product->harga, 2, ',', '.') }} =
                            Rp. {{ number_format($item->harga, 2, ',', '.') }}
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="card-footer">
                <a href="{{ route('orders.index') }}" class="btn btn-secondary">Back to Orders</a>
            </div>
        </div>
    </div>
@endsection
