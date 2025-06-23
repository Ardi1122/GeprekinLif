<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MenuController extends Controller
{
    // Meampilkan data menu
    public function index()
    {
        $menus = Menu::all();
        $carts = collect();
        $stockData = [];

        if (Auth::check()) {
            $carts = Cart::where('user_id', Auth::id())->get();

            foreach ($menus as $menu) {
                $stockData[$menu->id] = $menu->stock - $carts->where('menu_id', $menu->id)->sum('quantity');
            }
        } else {
            foreach ($menus as $menu) {
                $stockData[$menu->id] = $menu->stock; // tampilkan stok asli
            }
        }

        return view('beranda', compact('menus', 'carts', 'stockData'));
    }

    // Membuat filter dari menu secara real time
    public function ajaxMenu(Request $request)
    {
        $query = Menu::query();

        if ($request->has('category') && $request->category) {
            $query->where('category', $request->category);
        }

        $menus = $query->get();

        return view('partials.menu-list', ['menus' => $menus]);
    }
}
