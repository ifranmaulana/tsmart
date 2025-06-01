<?php

namespace App\Http\Controllers;

use App\Models\ProdukModel;
use App\Models\ArtikelModel;
use Illuminate\Http\Request;
use App\Models\KomentarModel;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Models\KeranjangModel;

class HomeController extends Controller
{
    public function index()
    {
        $data['artikel'] = ArtikelModel::orderBy('idartikel', 'DESC')->limit(6)->get();
        $data['produk'] = ProdukModel::with(['produkdetail'])->limit(6)->get();
        return view('home', $data);
    }

    public function artikeldetail($idartikel)
    {
        $data['artikel'] = ArtikelModel::with('komentar')->findOrFail($idartikel);

        $data['artikellain'] = ArtikelModel::where('idartikel', '!=', $idartikel)
            ->orderBy('idartikel', 'DESC')
            ->take(5)
            ->get();

        return view('artikeldetail', $data);
    }

    public function komentarsimpan(Request $request)
    {
        $request->validate([
            'idartikel' => 'required',
            'isi' => 'required',
        ]);

        KomentarModel::create([
            'idartikel' => $request->idartikel,
            'iduser' => Auth::user()->id,
            'isi' => $request->isi,
            'tanggal' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->back()->with('success', 'Komentar berhasil disimpan');
    }

    public function produkdetail($idproduk)
    {
        $produk = ProdukModel::with('produkdetail')->findOrFail($idproduk);
        $harga_min = $produk->produkdetail->min('harga');
        $harga_max = $produk->produkdetail->max('harga');

        return view('produkdetail', compact('produk', 'harga_min', 'harga_max'));
    }

    public function cartsimpan(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Anda harus login untuk menambahkan produk ke keranjang.');
        }

        $idproduk = $request->query('id');
        $quantity = (int) $request->query('quantity', 1);

        $cartItem = KeranjangModel::firstOrNew([
            'iduser' => Auth::user()->id,
            'idproduk' => $idproduk,
        ]);

        if ($cartItem->exists) {
            $cartItem->jumlah += $quantity;
        } else {
            $cartItem->jumlah = $quantity;
        }

        $cartItem->save();

        return redirect('keranjang')->with('success', 'Produk berhasil dimasukkan ke keranjang!');
    }

    public function keranjang()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Anda harus login untuk melihat keranjang.');
        }

        $cartItems = KeranjangModel::where('iduser', Auth::user()->id)
            ->with('produk.produkdetail')
            ->get();
            // dd($cartItems);

        $total = $this->calculateTotal($cartItems);

        return view('keranjang', compact('cartItems', 'total'));
    }

    public function keranjangupdate(Request $request)
    {
        if (!Auth::check()) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $productId = $request->input('product_id');
        $quantity = (int) $request->input('quantity');

        $cartItem = KeranjangModel::where('iduser', Auth::user()->id)
            ->where('idproduk', $productId)
            ->first();

        if ($cartItem) {
            $cartItem->jumlah = $quantity;
            $cartItem->save();
            Log::info('Cart item updated: ', ['idproduk' => $productId, 'quantity' => $quantity]);
            
            $updatedCartItems = KeranjangModel::where('iduser', Auth::user()->id)
                ->with('produk.produkdetail')
                ->get();
            return response()->json($this->calculateTotal($updatedCartItems));
        }

        return response()->json(['error' => 'Item not found in cart'], 404);
    }

    public function keranjanghapus($idproduk)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Anda harus login untuk menghapus produk dari keranjang.');
        }

        KeranjangModel::where('iduser', Auth::user()->id)
            ->where('idproduk', $idproduk)
            ->delete();

        return redirect('keranjang')->with('success', 'Produk berhasil dihapus dari keranjang!');
    }

    public function keranjangtotal()
    {
        if (!Auth::check()) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $cartItems = KeranjangModel::where('iduser', Auth::user()->id)
            ->with('produk.produkdetail')
            ->get();
            
        return number_format($this->calculateTotal($cartItems), 0, ',', '.');
    }

    private function calculateTotal($cartItems)
    {
        return $cartItems->sum(function ($item) {
            $price = $item->produk->produkdetail->first()->harga ?? 0;
            return $item->jumlah * $price;
        });
    }

    public function checkout()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Anda harus login untuk melanjutkan checkout.');
        }

        $cartItems = KeranjangModel::where('iduser', Auth::user()->id)
            ->with('produk.produkdetail')
            ->get();
        
        if ($cartItems->isEmpty()) {
            return redirect('keranjang')->with('error', 'Keranjang Anda kosong.');
        }

        $total = $this->calculateTotal($cartItems);

        return view('checkout', compact('cartItems', 'total'));
    }
}