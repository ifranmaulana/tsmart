@extends('layouts.home')
@section('content')
<div class="container mt-5">
    <h2>Terjadi Kesalahan Pembayaran</h2>
    <p>Mohon maaf, pembayaran Anda gagal. Silakan coba lagi.</p>
    <a href="{{ url('/checkout/' . request()->transaction_id) }}" class="btn btn-warning">Coba Lagi</a>
</div>
@endsection