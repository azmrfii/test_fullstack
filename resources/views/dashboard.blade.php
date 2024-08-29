@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Dashboard</h2>
                <div class="alert alert-info">
                    <strong>Total Harga Pembelian Hari Ini:</strong> Rp{{ number_format($totalHargaHarian, 2, ',', '.') }}
                </div>
            </div>
        </div>
    </div>
@endsection
