<?php

namespace App\Http\Controllers;

use App\Models\ProdukModel;
use Illuminate\Http\Request;
use App\Models\KeranjangModel;
use App\Models\TransactionModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function process(Request $request)
    {
        $data = $request->all();

        $transaction = TransactionModel::create([
            'user_id' => Auth::user()->id,
            'product_id' => $data['product_id'],
            'price' => $data['price'],
            'status' => 'pending',
        ]);

        \Midtrans\Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        \Midtrans\Config::$isProduction = (bool) env('MIDTRANS_IS_PRODUCTION', false);
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;

        $params = [
            'transaction_details' => [
                'order_id' => 'ORDER-' . $transaction->id . '-' . date('YmdHis') . '-' . rand(1000, 9999),
                'gross_amount' => $data['price'],
            ],
            'customer_details' => [
                'first_name' => Auth::user()->name,
                'email' => Auth::user()->email,
            ],
        ];

        try {
            $snapToken = \Midtrans\Snap::getSnapToken($params);
            $transaction->snap_token = $snapToken;
            $transaction->save();
        } catch (\Exception $e) {
            return back()->with('error', 'Midtrans Error: ' . $e->getMessage());
        }

        return redirect()->route('checkout', $transaction->id);
    }

    public function createOrderFromCart(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Anda harus login untuk melanjutkan checkout.');
        }

        $userId = Auth::user()->id;

        $cartItems = KeranjangModel::where('iduser', $userId)
            ->with('produk.produkdetail')
            ->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('keranjang')->with('error', 'Keranjang Anda kosong, tidak dapat membuat pesanan.');
        }

        $totalPrice = $this->calculateTotalFromCartItems($cartItems);

        DB::beginTransaction();
        try {
            $productId = $cartItems->first()->produk->id;

            $transaction = TransactionModel::create([
                'user_id' => $userId,
                'product_id' => $productId,
                'price' => $totalPrice,
                'status' => 'pending',
                'payment_method' => null,
                'snap_token' => null,
            ]);

            \Midtrans\Config::$serverKey = env('MIDTRANS_SERVER_KEY');
            \Midtrans\Config::$isProduction = (bool) env('MIDTRANS_IS_PRODUCTION', false);
            \Midtrans\Config::$isSanitized = true;
            \Midtrans\Config::$is3ds = true;

            $params = [
                'transaction_details' => [
                    'order_id' => 'ORDER-' . $transaction->id,
                    'gross_amount' => $totalPrice,
                ],
                'customer_details' => [
                    'first_name' => Auth::user()->name,
                    'email' => Auth::user()->email,
                ],
            ];

            try {
                $snapToken = \Midtrans\Snap::getSnapToken($params);
                $transaction->snap_token = $snapToken;
                $transaction->save();
            } catch (\Exception $e) {
                DB::rollBack();
                Log::error('Midtrans Snap Token Error in createOrderFromCart: ' . $e->getMessage());
                return back()->with('error', 'Gagal membuat token pembayaran: ' . $e->getMessage());
            }

            KeranjangModel::where('iduser', $userId)->delete();

            DB::commit();

            return redirect()->route('checkout', $transaction->id);

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error creating order from cart: ' . $e->getMessage());
            return back()->with('error', 'Gagal membuat pesanan dari keranjang: ' . $e->getMessage());
        }
    }

    private function calculateTotalFromCartItems($cartItems)
    {
        return $cartItems->sum(function ($item) {
            $price = $item->produk->produkdetail->first()->harga ?? 0;
            return $item->jumlah * $price;
        });
    }

    public function checkout(TransactionModel $transaction)
    {
        return view('checkout', compact('transaction'));
    }

    public function store(Request $request)
    {
        $transaction = TransactionModel::findOrFail($request->transaction_id);
        $method = $request->payment_method;

        if ($method === 'COD') {
            $transaction->status = 'cod';
            $transaction->payment_method = 'COD';
            $transaction->save();

            return redirect()->route('checkout.success')->with('success', 'Pesanan COD berhasil dibuat.');
        }

        return redirect()->route('checkout.pending')->with('info', 'Menunggu pembayaran via Midtrans.');
    }
    public function success($transactionId) {
    $transaction = TransactionModel::findOrFail($transactionId);
    return view('checkout_success',compact('transaction'));
    }
    public function updateStatusOnSuccess(Request $request, $transactionId)
    {
        try {
            $transaction = TransactionModel::findOrFail($transactionId);

            $transaction->status = 'success';     
            $transaction->save();

            return redirect()->route('checkout.success', ['transactionId' => $transactionId])    ->with([
        'success' => 'Pembayaran berhasil dan status pesanan diperbarui!',
        'transaction' => $transaction,
    ]);


        } catch (\Exception $e) {
            Log::error('Error updating transaction status: ' . $e->getMessage());
            return redirect()->route('checkout.error')->with('error', 'Gagal memperbarui status pesanan: ' . $e->getMessage());
        }
    }
}