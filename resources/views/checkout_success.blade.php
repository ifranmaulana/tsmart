@extends('layouts.home')
@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow-sm border-0 rounded-lg">
                <div class="card-body text-center p-5">
                    <!-- Success icon -->
                    <div class="mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" viewBox="0 0 24 24" fill="#28a745" class="bi bi-check-circle-fill">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                        </svg>
                    </div>
                    {{-- {{ dd($transaction); }} --}}
                    <!-- Success message -->
                    <h2 class="mb-3 fw-bold text-success">Pembayaran Berhasil!</h2>
                    <p class="lead mb-4">Terima kasih, transaksi Anda telah berhasil diproses.</p>
                    
                    <!-- Order details (you can add dynamic data here) -->
                    <div class="bg-light p-4 rounded mb-4 text-start">
                        <h5 class="mb-3">Detail Pesanan</h5>
                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-muted">ID Transaksi:</span>
                            <span class="fw-bold">#{{ $transaction->id ?? 'N/A' }}</span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-muted">Total Pembayaran:</span>
                            <span class="fw-bold">Rp {{ number_format($transaction->price ?? 0, 0, ',', '.') }}</span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span class="text-muted">Metode Pembayaran:</span>
                            <span class="fw-bold">{{ $transaction->payment_method ?? 'N/A' }}</span>
                        </div>
                    </div>
                    
                    <!-- Action buttons -->
                    <div class="d-grid gap-3 d-md-flex justify-content-md-center">
                        <a href="{{ route('profile.index') }}" class="btn btn-primary px-4 py-2">
                            <i class="fas fa-home me-2"></i> Kembali ke Beranda
                        </a>
                        <a href="{{ route('profile.index', $transaction->id ?? '') }}" class="btn btn-outline-secondary px-4 py-2">
                            <i class="fas fa-receipt me-2"></i> Lihat Detail Pesanan
                        </a>
                    </div>
                    
                    <!-- Additional info -->
                    <div class="mt-4 text-muted small">
                        <p>Pesanan Anda sedang diproses. Kami akan mengirimkan konfirmasi melalui email.</p>
                        <p class="mb-0">Butuh bantuan? <a href="#" class="text-decoration-none">Hubungi kami</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .card {
        border: none;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    
    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }
    
    .rounded-lg {
        border-radius: 15px;
    }
    
    .btn-primary {
        background-color: #3CB371;
        border-color: #3CB371;
    }
    
    .btn-primary:hover {
        background-color: #2d8a57;
        border-color: #2d8a57;
    }
    
    .btn-outline-secondary {
        color: #3CB371;
        border-color: #3CB371;
    }
    
    .btn-outline-secondary:hover {
        background-color: #3CB371;
        color: white;
    }
</style>
@endsection