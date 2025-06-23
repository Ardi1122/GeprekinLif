<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use \App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    // Tampilan keranjang
    public function index()
    {
        // Hanya menampilkan keranjang user yang telah login
        $carts = Cart::with('menu')->where('user_id', Auth::id())->get();

        return view('cart.index', compact('carts'));
    }

    // Tampilan pesanan dari pengguna
    public function order()
    {
        $orders = Cart::with(['menu', 'user'])->get();

        return view('admin.order.index', compact('orders'));
    }

    // Mengonfirmasi pesanan pengguna
    public function confirm($id)
    {
        $cart = Cart::with('menu')->findOrFail($id);

        $menu = $cart->menu;

        // Cek stok
        if ($menu->stock < $cart->quantity) {
            return back()->with('error', 'Stok ' . $menu->name . ' tidak mencukupi!');
        }

        // Kurangi stok menu
        $menu->stock -= $cart->quantity;
        $menu->save();

        // Simpan ke tabel orders
        Order::create([
            'user_id' => $cart->user_id,
            'menu_id' => $cart->menu_id,
            'quantity' => $cart->quantity,
        ]);

        // Hapus dari cart
        $cart->delete();

        return redirect()->route('admin.order.index')->with('success', 'Pesanan dikonfirmasi dan stok dikurangi.');

    }

    // Memasukkan keranjang pengguna ke database
    public function store(Request $request)
    {
        $request->validate([
            'menu_id' => 'required|exists:menus,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $menu = Menu::findOrFail($request->menu_id);
        $existingCart = Cart::where('user_id', Auth::id())
            ->where('menu_id', $menu->id)
            ->first();

        $existingQty = $existingCart ? $existingCart->quantity : 0;
        $requestedQty = $request->quantity;
        $totalQty = $existingQty + $requestedQty;

        if ($totalQty > $menu->stock) {
            return back()->with('error', 'Stok tidak mencukupi! Maksimum stok: ' . $menu->stock);
        }

        Cart::updateOrCreate(
            ['user_id' => Auth::id(), 'menu_id' => $request->menu_id],
            ['quantity' => $totalQty]
        );

        return back()->with('success', 'Berhasil ditambahkan ke keranjang');
    }
}
