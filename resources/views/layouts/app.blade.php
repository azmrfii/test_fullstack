<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Test Fullstack Azzam Rafi Zafran')</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <style>
        body {
            padding-top: 56px;
        }
    </style>

    @stack('styles')
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('products.index') }}">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('orders.index') }}">Orders</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container">
        @yield('content')
    </div>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <!-- jQuery (Required for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @stack('scripts')

    <script>
        $(document).ready(function() {
            // Menambahkan item baru
            $('.add-item').click(function() {
                let newItem = $('.order-item').first().clone();
                newItem.find('input').val(''); // Mengosongkan input baru
                newItem.find('.harga').val(0); // Mengatur harga awal ke 0
                newItem.appendTo('.order-items'); // Menambahkan item baru ke dalam list
            });

            // Menghitung harga total ketika produk atau jumlah diubah
            $(document).on('change', '.product-select, .qty', function() {
                let parent = $(this).closest('.order-item');
                let price = parseFloat(parent.find('.product-select option:selected').data('price') || 0);
                let qty = parseInt(parent.find('.qty').val() || 1);
                parent.find('.harga').val(price * qty); // Menghitung harga item
                updateTotalHarga();
            });

            // Menghapus item
            $(document).on('click', '.remove-item', function() {
                $(this).closest('.order-item').remove(); // Menghapus item
                updateTotalHarga(); // Update harga total setelah item dihapus
            });

            // Menghitung total harga dari semua item
            function updateTotalHarga() {
                let total = 0;
                $('.harga').each(function() {
                    total += parseFloat($(this).val() || 0); // Menambahkan setiap harga item ke total
                });
                $('.total-harga').val(total); // Menampilkan total harga
            }
        });
    </script>

</body>

</html>
