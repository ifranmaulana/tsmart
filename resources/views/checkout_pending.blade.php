@extends('layouts.home')
@section('content')
<div class="container mt-5">
    <h2>Pembayaran Menunggu Konfirmasi</h2>
    <p>Pesanan Anda sedang menunggu pembayaran. Silakan cek kembali status pesanan Anda nanti.</p>
    <a href="{{ url('/') }}" class="btn btn-primary">Kembali ke Beranda</a>
</div>
@endsection