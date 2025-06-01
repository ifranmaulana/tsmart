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

    /* Checkout Card */
    .checkout-card {
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

    /* Payment Section */
    .payment-section {
        margin-top: 30px;
    }

    .payment-section h5 {
        margin-bottom: 15px;
        font-weight: 600;
    }

    .payment-options {
        display: flex;
        gap: 20px;
        margin-bottom: 30px;
    }

    .payment-option {
        padding: 15px;
        border: 1px solid #ddd;
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
    }

    .payment-option:hover,
    .payment-option.active {
        border-color: #28a745;
        background-color: #f8fff8;
    }

    .payment-option input {
        margin-right: 8px;
    }

    /* Order Summary */
    .summary-box {
        background-color: #f9f9f9;
        border-radius: 8px;
        padding: 20px;
        margin-top: 20px;
    }

    .summary-row {
        display: flex;
        justify-content: space-between;
        margin-bottom: 10px;
    }

    .summary-label {
        font-weight: 500;
    }

    .summary-value {
        font-weight: 600;
    }

    .total-value {
        color: #28a745;
        font-size: 18px;
    }

    .btn-place-order {
        width: 100%;
        margin-top: 15px;
        padding: 10px;
        font-weight: 600;
    }
</style>

<div class="container content-container">
    <div class="checkout-card">
        <div class="checkout-header">
            <div class="store-label">
                <i class="fas fa-store"></i> TokoTani | Checkout
            </div>
        </div>

        <div class="alert alert-info" role="alert">
            Detail produk individual akan ditampilkan setelah Anda mengintegrasikan tabel `transaction_details`. Saat ini, transaksi menampilkan total pesanan.
        </div>

        <div class="order-summary">
            <div class="row">
                <div class="col-12">
                    <div class="summary-box">
                        <div class="summary-row">
                            <span class="summary-label">ID Pesanan:</span>
                            <span class="summary-value">{{ $transaction->id }}</span>
                        </div>
                        <div class="summary-row">
                            <span class="summary-label">Status:</span>
                            <span class="summary-value text-capitalize">{{ $transaction->status }}</span>
                        </div>
                        <hr>
                        <div class="summary-row">
                            <span class="summary-label">Total Pembayaran:</span>
                            <span class="summary-value total-value">Rp {{ number_format($transaction->price, 0, ',', '.') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="payment-section">
            <h5>Metode Pembayaran</h5>
            <form action="{{ route('checkout.process_payment') }}" method="POST" id="checkoutForm">
                @csrf
                <input type="hidden" name="transaction_id" value="{{ $transaction->id }}">
                <input type="hidden" name="payment_method" id="payment_method_input">
                <div class="payment-options">
                    <label class="form-check payment-option">
                        <input class="form-check-input" type="radio" name="payment_method_radio" id="cod" value="COD" checked>
                        <span class="form-check-label" for="cod">COD</span>
                    </label>
                    <label class="form-check payment-option">
                        <input class="form-check-input" type="radio" name="payment_method_radio" id="midtrans" value="Midtrans">
                        <span class="form-check-label" for="midtrans">Midtrans</span>
                    </label>
                </div>

                <button type="button" id="place-order" class="btn btn-success btn-place-order">Buat Pesanan</button>
            </form>
        </div>
    </div>
</div>

<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>

<script>
    document.getElementById('place-order').addEventListener('click', function () {
        const selectedMethod = document.querySelector('input[name="payment_method_radio"]:checked').value;
        document.getElementById('payment_method_input').value = selectedMethod;

        if (selectedMethod === 'COD') {
            document.getElementById('checkoutForm').submit();
        } else if (selectedMethod === 'Midtrans') {
            const snapToken = "{{ $transaction->snap_token }}";
            if (snapToken) {
                snap.pay(snapToken, {
                    onSuccess: function (result) {
                        // === PERUBAHAN DI SINI ===
                        // Arahkan ke route update_status setelah Midtrans sukses
                        window.location.href = "{{ route('checkout.update_status', $transaction->id) }}";
                    },
                    onPending: function (result) {
                        window.location.href = "{{ route('checkout.pending') }}";
                    },
                    onError: function (result) {
                        window.location.href = "{{ route('checkout.error') }}";
                    },
                    onClose: function () {
                        alert('Anda menutup pop-up pembayaran Midtrans.');
                        window.location.href = "{{ route('checkout.pending') }}";
                    }
                });
            } else {
                alert('Snap token tidak tersedia. Pastikan integrasi Midtrans sudah benar.');
            }
        }
    });

    document.querySelectorAll('.payment-option input[type="radio"]').forEach(radio => {
        radio.addEventListener('change', function() {
            document.querySelectorAll('.payment-option').forEach(label => {
                label.classList.remove('active');
            });
            if (this.checked) {
                this.closest('.payment-option').classList.add('active');
            }
        });
    });

    document.addEventListener('DOMContentLoaded', () => {
        const defaultCheckedRadio = document.querySelector('input[name="payment_method_radio"]:checked');
        if (defaultCheckedRadio) {
            defaultCheckedRadio.closest('.payment-option').classList.add('active');
        }
    });
</script>

@endsection