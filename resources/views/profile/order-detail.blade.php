@extends('layouts.home')
@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card shadow-sm">
                <div class="card-header bg-light d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Order Details #{{ $order->order_number }}</h4>
                    <div>
                        <span class="badge 
                            @if($order->status == 'completed') bg-success
                            @elseif($order->status == 'processing') bg-primary
                            @elseif($order->status == 'cancelled') bg-danger
                            @elseif($order->status == 'shipped') bg-info
                            @else bg-warning text-dark
                            @endif">
                            {{ ucfirst($order->status) }}
                        </span>
                    </div>
                </div>
                
                <div class="card-body">
                    <!-- Order Summary -->
                    <div class="row mb-5">
                        <div class="col-md-6">
                            <h5 class="mb-3">Order Information</h5>
                            <ul class="list-unstyled">
                                <li><strong>Order Date:</strong> {{ $order->created_at->format('F j, Y \a\t H:i') }}</li>
                                <li><strong>Order Number:</strong> {{ $order->order_number }}</li>
                                <li><strong>Payment Method:</strong> {{ ucfirst($order->payment_method) }}</li>
                                <li><strong>Payment Status:</strong> 
                                    <span class="badge {{ $order->payment_status == 'paid' ? 'bg-success' : 'bg-warning text-dark' }}">
                                        {{ ucfirst($order->payment_status) }}
                                    </span>
                                </li>
                                @if($order->tracking_number)
                                <li><strong>Tracking Number:</strong> {{ $order->tracking_number }}</li>
                                @endif
                            </ul>
                        </div>
                        
                        <div class="col-md-6">
                            <h5 class="mb-3">Customer Information</h5>
                            <ul class="list-unstyled">
                                <li><strong>Name:</strong> {{ $order->user->name }}</li>
                                <li><strong>Email:</strong> {{ $order->user->email }}</li>
                                <li><strong>Phone:</strong> {{ $order->phone ?? 'N/A' }}</li>
                            </ul>
                        </div>
                    </div>
                    
                    <!-- Shipping Address -->
                    {{-- <div class="mb-5">
                        <h5 class="mb-3">Shipping Address</h5>
                        <div class="border p-3 rounded bg-light">
                            <address class="mb-0">
                                <strong>{{ $order->shipping_address['recipient_name'] }}</strong><br>
                                {{ $order->shipping_address['street'] }}<br>
                                {{ $order->shipping_address['city'] }}, {{ $order->shipping_address['state'] }} {{ $order->shipping_address['postal_code'] }}<br>
                                {{ $order->shipping_address['country'] }}<br>
                                <abbr title="Phone">P:</abbr> {{ $order->shipping_address['phone'] }}
                            </address>
                        </div>
                    </div> --}}
                    
                    {{-- <h5 class="mb-3">Order Items</h5>
                    <div class="table-responsive mb-5">
                        <table class="table">
                            <thead class="bg-light">
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{ dd($order); }}
                                @foreach($order->product as $item)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="{{ $item->product->thumbnail }}" alt="{{ $item->product->name }}" class="img-fluid rounded me-3" width="60">
                                            <div>
                                                <h6 class="mb-1">{{ $item->product->name }}</h6>
                                                <small class="text-muted">SKU: {{ $item->product->sku }}</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ format_currency($item->price) }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>{{ format_currency($item->price * $item->quantity) }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div> --}}
                    
                    <!-- Order Totals -->
                    <div class="row justify-content-end">
                        <div class="col-md-5">
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <th>Subtotal</th>
                                            <td class="text-end">{{ $order->subtotal }}</td>
                                        </tr>
                                        @if($order->discount > 0)
                                        <tr>
                                            <th>Discount</th>
                                            <td class="text-end text-danger">-{{ $order->discount }}</td>
                                        </tr>
                                        @endif
                                        <tr>
                                            <th>Shipping</th>
                                            <td class="text-end">{{ $order->shipping_cost }}</td>
                                        </tr>
                                        @if($order->tax > 0)
                                        <tr>
                                            <th>Tax</th>
                                            <td class="text-end">{{ $order->tax }}</td>
                                        </tr>
                                        @endif
                                        <tr class="fw-bold">
                                            <th>Total</th>
                                            <td class="text-end">{{ $order->grand_total }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Order Actions -->
                    <div class="d-flex justify-content-between mt-4">
                        <a href="{{ route('profile.index') }}" class="btn btn-outline-secondary">
                            <i class="fas fa-arrow-left me-2"></i>Back to Orders
                        </a>
                        
                        @if($order->status == 'pending' || $order->status == 'processing')
                        <div>
                            <a href="{{ route('orders.invoice', $order->id) }}" class="btn btn-outline-primary me-2">
                                <i class="fas fa-file-invoice me-2"></i>Download Invoice
                            </a>
                            @if($order->payment_status == 'unpaid')
                            <a href="{{ route('payment.retry', $order->id) }}" class="btn btn-primary">
                                <i class="fas fa-credit-card me-2"></i>Complete Payment
                            </a>
                            @endif
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .table th {
        background-color: #f8f9fa;
        font-weight: 600;
    }
    
    .order-status {
        font-size: 0.9rem;
        padding: 0.35rem 0.65rem;
    }
    
    .product-img {
        max-width: 60px;
        border-radius: 4px;
    }
</style>
@endsection