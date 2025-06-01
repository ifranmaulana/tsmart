<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Address;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use App\Models\TransactionModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Menampilkan halaman profile user
     */
    public function index()
    {
        $user = Auth::user();
        $lastLogin = $user->last_login_at ?? $user->created_at;
        
        // Data order
        $recentOrders = TransactionModel::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();
            
        $orderCount = TransactionModel::where('user_id', $user->id)->count();
        $completedOrders = TransactionModel::where('user_id', $user->id)
            ->where('status', 'completed')
            ->count();
        $pendingOrders = TransactionModel::where('user_id', $user->id)
            ->whereIn('status', ['pending', 'processing'])
            ->count();
            
        // Data wishlist
        // $wishlistItems = Wishlist::with('product')
        //     ->where('user_id', $user->id)
        //     ->orderBy('created_at', 'desc')
        //     ->take(4)
        //     ->get();
            
        // Alamat pengiriman default
        // $defaultAddress = Address::where('user_id', $user->id)
        //     ->where('is_default', true)
        //     ->first();

        return view('profile.index', [
            'user' => $user,
            'lastLogin' => $lastLogin,
            'recentOrders' => $recentOrders,
            'orderCount' => $orderCount,
            'completedOrders' => $completedOrders,
            'pendingOrders' => $pendingOrders,
        ]);
    }

    /**
     * Menampilkan form edit profile
     */
    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }

    /**
     * Update profile user
     */
    public function update(Request $request)
    {
        $user = Auth::user();
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,'.$user->id,
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
        ]);
        
        $user->update($validated);
        
        return redirect()->route('profile.index')
            ->with('success', 'Profile updated successfully');
    }

    /**
     * Menampilkan form ubah password
     */
    public function showChangePasswordForm()
    {
        return view('profile.change-password');
    }

    /**
     * Proses ubah password
     */
    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:8|confirmed',
        ]);
        
        $user = Auth::user();
        
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Current password is incorrect']);
        }
        
        $user->password = \Hash::make($request->new_password);
        $user->save();
        
        return redirect()->route('profile.index')
            ->with('success', 'Password changed successfully');
    }

    /**
     * Menampilkan daftar order
     */
    public function orders()
    {
        $orders = TransactionModel::where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->paginate(10);
            
        return view('profile.orders', compact('orders'));
    }

    /**
     * Menampilkan detail order
     */
    public function showOrder($id)
    {
        $order = TransactionModel::with('product')
            ->where('user_id', Auth::id())
            ->where('id', $id)
            ->firstOrFail();
            
        return view('profile.order-detail', compact('order'));
    }

    /**
     * Menampilkan wishlist user
     */
    public function wishlist()
    {
        $wishlistItems = TransactionModel::with('product')
            ->where('user_id', Auth::id())
            ->paginate(12);
            
        return view('profile.wishlist', compact('wishlistItems'));
    }

    /**
     * Menambahkan produk ke wishlist
     */
    public function addToWishlist(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id'
        ]);
        
        $wishlist = TransactionModel::firstOrCreate([
            'user_id' => Auth::id(),
            'product_id' => $request->product_id
        ]);
        
        return back()->with('success', 'Product added to wishlist');
    }

    /**
     * Menghapus produk dari wishlist
     */
    public function removeFromWishlist($id)
    {
        $wishlistItem = TransactionModel::where('user_id', Auth::id())
            ->where('id', $id)
            ->firstOrFail();
            
        $wishlistItem->delete();
        
        return back()->with('success', 'Product removed from wishlist');
    }

    /**
     * Menampilkan/manajemen alamat pengiriman
     */
    public function addresses()
    {
        // $addresses = Address::where('user_id', Auth::id())->get();
        // return view('profile.addresses', compact('addresses'));
    }

    /**
     * Menyimpan alamat baru
     */
    public function storeAddress(Request $request)
    {
        $validated = $request->validate([
            'recipient_name' => 'required|string|max:255',
            'street' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'postal_code' => 'required|string|max:20',
            'country' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'is_default' => 'sometimes|boolean'
        ]);
        
        // Jika menandai sebagai default, hapus status default dari alamat lain
        if ($request->is_default) {
            Address::where('user_id', Auth::id())->update(['is_default' => false]);
        }
        
        $validated['user_id'] = Auth::id();
        Address::create($validated);
        
        return redirect()->route('profile.addresses')
            ->with('success', 'Address added successfully');
    }

    /**
     * Mengupdate alamat
     */
    public function updateAddress(Request $request, $id)
    {
        $address = Address::where('user_id', Auth::id())
            ->where('id', $id)
            ->firstOrFail();
            
        $validated = $request->validate([
            'recipient_name' => 'required|string|max:255',
            'street' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'postal_code' => 'required|string|max:20',
            'country' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'is_default' => 'sometimes|boolean'
        ]);
        
        // Jika menandai sebagai default, hapus status default dari alamat lain
        if ($request->is_default) {
            Address::where('user_id', Auth::id())
                ->where('id', '!=', $id)
                ->update(['is_default' => false]);
        }
        
        $address->update($validated);
        
        return redirect()->route('profile.addresses')
            ->with('success', 'Address updated successfully');
    }
}