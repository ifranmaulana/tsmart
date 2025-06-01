@extends('layouts.home')
@section('content')
<div class="container py-5">
    <div class="row">
        <!-- Profile Sidebar -->
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <div class="avatar-circle bg-primary text-white mb-3 mx-auto" style="width: 120px; height: 120px; line-height: 120px; font-size: 48px;">
                        {{ strtoupper(substr($user->name, 0, 1)) }}
                    </div>
                    <h4>{{ $user->name }}</h4>
                    {{-- <p class="text-muted mb-1">@{{ $user->username }}</p> --}}
                    <p class="text-muted">{{ $user->email }}</p>
                    
                    <div class="d-grid gap-2 mt-4">
                        <a href="{{ route('profile.edit') }}" class="btn btn-outline-primary">
                            <i class="fas fa-user-edit me-2"></i>Edit Profile
                        </a>
                        <a href="{{ route('password.change') }}" class="btn btn-outline-secondary">
                            <i class="fas fa-key me-2"></i>Change Password
                        </a>
                    </div>
                    
                    <hr>
                    
                    <div class="profile-stats">
                        <div class="stat-item">
                            <div class="stat-value">{{ $orderCount }}</div>
                            <div class="stat-label">Total Orders</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-value">{{ $completedOrders }}</div>
                            <div class="stat-label">Completed</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-value">{{ $pendingOrders }}</div>
                            <div class="stat-label">Pending</div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Account Details -->
            <div class="card shadow-sm mt-4">
                <div class="card-header bg-light">
                    <h6 class="mb-0">Account Details</h6>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                            <span>Member Since</span>
                            <span>{{ $user->created_at->format('M d, Y') }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                            <span>Email Status</span>
                            <span>
                                @if($user->email_verified_at)
                                    <span class="badge bg-success">Verified</span>
                                @else
                                    <span class="badge bg-warning text-dark">Unverified</span>
                                @endif
                            </span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                            <span>Last Login</span>
                            <span>{{ $lastLogin->diffForHumans() }}</span>
                        </li>
                    </ul>
                </div>
            </div>
            
            <!-- Shipping Address -->
            {{-- <div class="card shadow-sm mt-4">
                <div class="card-header bg-light d-flex justify-content-between align-items-center">
                    <h6 class="mb-0">Default Shipping Address</h6>
                    <a href="{{ route('address.edit') }}" class="btn btn-sm btn-outline-primary">Edit</a>
                </div>
                <div class="card-body">
                    @if($defaultAddress)
                        <address>
                            <strong>{{ $defaultAddress->recipient_name }}</strong><br>
                            {{ $defaultAddress->street }}<br>
                            {{ $defaultAddress->city }}, {{ $defaultAddress->state }} {{ $defaultAddress->postal_code }}<br>
                            {{ $defaultAddress->country }}<br>
                            <abbr title="Phone">P:</abbr> {{ $defaultAddress->phone }}
                        </address>
                    @else
                        <p class="text-muted">No default address set</p>
                        <a href="{{ route('address.create') }}" class="btn btn-sm btn-primary">Add Address</a>
                    @endif
                </div>
            </div> --}}
        </div>
        
        <!-- Main Content -->
        <div class="col-md-8">
            <!-- Recent Orders -->
            <div class="card shadow-sm">
                <div class="card-header bg-light d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Recent Orders</h5>
                    <a href="{{ route('profile.index') }}" class="btn btn-sm btn-outline-primary">View All</a>
                </div>
                <div class="card-body">
                    @if($recentOrders->count() > 0)
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Order #</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Total</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($recentOrders as $order)
                                    <tr>
                                        <td>#{{ $order->order_number }}</td>
                                        <td>{{ $order->created_at->format('M d, Y') }}</td>
                                        <td>
                                            <span class="badge 
                                                @if($order->status == 'success') bg-success
                                                @elseif($order->status == 'pending') bg-primary
                                                @elseif($order->status == 'cancelled') bg-danger
                                                @else bg-warning text-dark
                                                @endif">
                                                {{ ucfirst($order->status) }}
                                            </span>
                                        </td>
                                        <td>{{ $order->grand_total}}</td>
                                        <td>
                                            @if($order->status == 'completed')
                                            <a href="{{ route('orders.show', $order->id) }}" class="btn btn-sm btn-outline-secondary">
                                                <i class="fas fa-eye"></i> View
                                            </a>
                                            @elseif($order->status == 'pending')
                                            <a href="{{ route('checkout', $order->id) }}" class="btn btn-sm btn-outline-secondary">
                                                <i class="fas fa-eye"></i> View
                                            </a>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center py-4">
                            <i class="fas fa-shopping-bag fa-3x text-muted mb-3"></i>
                            <h5>No orders yet</h5>
                            <p class="text-muted">You haven't placed any orders with us yet.</p>
                            <a href="{{ route('products.index') }}" class="btn btn-primary">Start Shopping</a>
                        </div>
                    @endif
                </div>
            </div>
            
            <!-- Wishlist Preview -->
            {{-- <div class="card shadow-sm mt-4">
                <div class="card-header bg-light d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Wishlist</h5>
                    <a href="{{ route('wishlist.index') }}" class="btn btn-sm btn-outline-primary">View All</a>
                </div>
                <div class="card-body">
                    @if($wishlistItems->count() > 0)
                        <div class="row">
                            @foreach($wishlistItems as $item)
                            <div class="col-6 col-md-4 mb-3">
                                <div class="product-card">
                                    <a href="{{ route('products.show', $item->product->slug) }}">
                                        <img src="{{ $item->product->thumbnail }}" alt="{{ $item->product->name }}" class="img-fluid rounded">
                                    </a>
                                    <div class="mt-2">
                                        <h6 class="mb-1"><a href="{{ route('products.show', $item->product->slug) }}">{{ $item->product->name }}</a></h6>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="price">{{ format_currency($item->product->price) }}</span>
                                            <form action="{{ route('wishlist.remove', $item->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger">
                                                    <i class="far fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-4">
                            <i class="fas fa-heart fa-3x text-muted mb-3"></i>
                            <h5>Your wishlist is empty</h5>
                            <p class="text-muted">Save items you love for easy access later.</p>
                            <a href="{{ route('products.index') }}" class="btn btn-primary">Browse Products</a>
                        </div>
                    @endif
                </div>
            </div> --}}
        </div>
    </div>
</div>

<style>
    .avatar-circle {
        border-radius: 50%;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background-color: #0d6efd;
        color: white;
        font-weight: bold;
    }
    
    .profile-stats {
        display: flex;
        justify-content: space-around;
        text-align: center;
        margin-top: 20px;
    }
    
    .stat-item {
        padding: 0 10px;
    }
    
    .stat-value {
        font-size: 1.5rem;
        font-weight: bold;
        color: #0d6efd;
    }
    
    .stat-label {
        font-size: 0.8rem;
        color: #6c757d;
        text-transform: uppercase;
    }
    
    .product-card {
        transition: transform 0.3s ease;
    }
    
    .product-card:hover {
        transform: translateY(-5px);
    }
    
    .price {
        font-weight: bold;
        color: #0d6efd;
    }
</style>
@endsection