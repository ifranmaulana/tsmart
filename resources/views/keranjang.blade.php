@extends('layouts.home')

@section('content')

    <style>
        /* Navbar */
        .navbar {
            background-color: #1a2a3a !important;
        }

        .navbar-brand {
            font-size: 1.5rem;
            font-weight: bold;
        }

        .navbar-brand span {
            color: #3cb371;
        }

        .navbar .nav-link {
            color: #fff !important;
            font-weight: 500;
            font-size: 1rem;
        }

        .navbar .nav-link:hover {
            color: #3cb371 !important;
        }

        /* Content Container */
        .content-container {
            margin-top: 90px;
            margin-bottom: 30px;
        }

        /* Cart Card */
        .cart-card {
            background: #fff;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Store Label */
        .store-label {
            font-size: 22px;
            font-weight: bold;
            color: #28a745;
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 15px;
            border-bottom: 1px solid #eee;
            padding-bottom: 10px;
        }

        .store-label i {
            color: #28a745;
            font-size: 24px;
        }

        /* Empty Cart */
        .empty-cart {
            text-align: center;
            padding: 30px;
        }

        /* Cart Items */
        .cart-items {
            margin-bottom: 20px;
        }

        .cart-item {
            display: flex;
            align-items: center;
            padding: 15px 0;
            border-bottom: 1px solid #eee;
        }

        .item-checkbox {
            width: 5%;
            text-align: center;
        }

        .item-image {
            width: 10%;
            padding: 0 10px;
        }

        .item-image img {
            width: 100%;
            max-width: 80px;
            height: auto;
            border-radius: 4px;
        }

        .item-details {
            width: 30%;
            padding: 0 10px;
        }

        .item-details h5 {
            margin-bottom: 5px;
            font-size: 16px;
        }

        .variant-info {
            margin-bottom: 0;
            font-size: 14px;
            color: #6c757d;
        }

        .variant-value {
            font-weight: 500;
        }

        .item-price {
            width: 15%;
            padding: 0 10px;
        }

        .item-quantity {
            width: 15%;
            padding: 0 10px;
        }

        .quantity-control {
            display: flex;
            align-items: center;
            width: 100%;
            max-width: 120px;
        }

        .quantity-input {
            width: 40px;
            text-align: center;
            border-radius: 0;
            height: 32px;
            padding: 0;
        }

        .quantity-btn {
            border: 1px solid #ced4da;
            background-color: #f8f9fa;
            height: 32px;
            width: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            padding: 0;
        }

        .minus-btn,
        .plus-btn {
            font-size: 16px;
            line-height: 1;
        }

        .item-total {
            width: 15%;
            padding: 0 10px;
            font-weight: 500;
            color: #28a745;
        }

        .item-actions {
            width: 10%;
            text-align: center;
        }

        .delete-item {
            color: #dc3545;
            font-size: 18px;
            cursor: pointer;
        }

        /* Cart Footer */
        .cart-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 15px;
        }

        .selection-count {
            font-size: 16px;
            font-weight: 500;
        }

        .checkout-section {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .total-price {
            font-size: 16px;
            font-weight: 500;
        }

        .total-price span {
            color: #28a745;
            font-size: 18px;
            font-weight: bold;
        }

        .btn-checkout {
            background-color: #28a745;
            color: white;
            font-weight: 600;
            padding: 8px 20px;
            border-radius: 6px;
        }

        .btn-checkout:hover {
            background-color: #218838;
            color: white;
        }
    </style>

    <div class="container content-container">
        <div class="cart-card">
            <div class="cart-header">
                <div class="store-label">
                    <i class="fas fa-store"></i>
                    TokoTani | Troli
                </div>
            </div>

            @if (empty($cartItems))
                <div class="empty-cart">
                    <p>Keranjang belanja Anda kosong.</p>
                    <a href="{{ url('dashboard#tokotani') }}" class="btn btn-success">Belanja Sekarang</a>
                </div>
            @else
                <!-- Cart Items -->
                <div class="cart-items">
                    @foreach ($cartItems as $item)
                        @php
                            $product = $item->produk;
                            $productDetail = $product->produkdetail->first();
                        @endphp
                        <div class="cart-item">
                            <div class="item-image">
                                <img src="{{ asset('uploads/' . $product->gambar ?? 'default.jpg') }}"
                                    alt="{{ $product->namaproduk }}">
                            </div>
                            <div class="item-details">
                                <h5>{{ $product->namaproduk }}</h5>
                                <p class="variant-info">
                                    Variasi: <span
                                        class="variant-value">{{ $productDetail->namavariasi ?? 'Standard' }}</span>
                                </p>
                            </div>
                            <div class="item-price">
                                <p>Rp {{ number_format($productDetail->harga, 0, ',', '.') }}</p>
                            </div>
                            <div class="item-quantity">
                                <div class="quantity-control">
                                    <button class="btn btn-sm quantity-btn minus-btn"
                                        onclick="updateQuantity({{ $item->idkeranjang }}, -1)">-</button>
                                    <input type="text" class="form-control quantity-input" value="{{ $item->jumlah }}"
                                        min="1" data-cart-id="{{ $item->idkeranjang }}" readonly>
                                    <button class="btn btn-sm quantity-btn plus-btn"
                                        onclick="updateQuantity({{ $item->idkeranjang }}, 1)">+</button>
                                </div>
                            </div>
                            <div class="item-total" id="total-{{ $item->idkeranjang }}">
                                Rp {{ number_format($productDetail->harga * $item->jumlah, 0, ',', '.') }}
                            </div>
                            <div class="item-actions">
                                <a href="{{ url('keranjang/hapus/' . $item->idkeranjang) }}" class="delete-item">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Cart Footer -->
                <div class="cart-footer">
                    <div class="selection-info">
                        <div class="selection-count">
                            {{ count($cartItems) }} produk
                        </div>
                    </div>
                    <div class="checkout-section">
                        @php
                            $total = 0;
                            foreach ($cartItems as $item) {
                                $productDetail = $item->produk->produkdetail->first();
                                $total += ($productDetail->harga ?? 0) * $item->jumlah; // Tambahkan null coalescing untuk keamanan
                            }
                        @endphp
                        <div class="total-price">
                            Total ({{ count($cartItems) }} produk):
                            <span id="cart-total">Rp {{ number_format($total, 0, ',', '.') }}</span>
                        </div>
                        <form action="{{ route('checkout.createOrderFromCart') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-checkout">Checkout</button>
                        </form>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <script>
        // Function to update quantity
        function updateQuantity(cartId, change) {
            try {
                const inputElement = document.querySelector(
                    `.quantity-input[data-cart-id="${cartId}"]`
                );

                if (!inputElement) {
                    console.error(`Element input dengan cartId ${cartId} tidak ditemukan.`);
                    return;
                }

                let currentQty = parseInt(inputElement.value);

                if (!isNaN(currentQty)) {
                    let newQty = currentQty + change;
                    if (newQty > 0) {
                        inputElement.value = newQty;

                        const xhr = new XMLHttpRequest();
                        xhr.open('PUT', '{{ route('keranjang.update') }}', true);
                        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                        xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');

                        xhr.onreadystatechange = function() {
                            if (xhr.readyState === 4) {
                                try {
                                    if (xhr.status === 200) {
                                        const response = JSON.parse(xhr.responseText);

                                        if (response.error) {
                                            console.error('Error dari server:', response.error);
                                            alert('Terjadi kesalahan: ' + response.error);
                                            return;
                                        }

                                        // Update total price untuk item ini
                                        document.getElementById(`total-${cartId}`).innerText = 'Rp ' + response
                                            .itemTotal;

                                        // Update total harga keseluruhan
                                        document.getElementById('cart-total').innerText = 'Rp ' + response.cartTotal;
                                    } else {
                                        console.error(`Gagal update. Status: ${xhr.status}`);
                                        alert('Gagal mengupdate keranjang. Silakan coba lagi.');
                                    }
                                } catch (e) {
                                    console.error('Gagal mem-parsing respons JSON:', e);
                                    console.log('Raw response:', xhr.responseText);
                                    alert('Terjadi kesalahan saat memproses respons server.');
                                }
                            }
                        };

                        xhr.send(`cart_id=${cartId}&quantity=${newQty}`);
                    }
                } else {
                    console.error('Nilai kuantitas bukan angka:', currentQty);
                }
            } catch (err) {
                console.error('Terjadi kesalahan saat updateQuantity():', err);
                alert('Terjadi kesalahan sistem. Silakan coba lagi.');
            }
        }
    </script>
@endsection
