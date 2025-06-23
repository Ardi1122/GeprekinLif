<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    // Tampilan dashboard admin
    public function index()
    {
        $menus = Menu::all();
        return view('admin.index', [
            'menus' => $menus,
        ]);
    }

    // Tampilan menambhkan data menu
    public function create()
    {
        return view('admin.create');
    }

    // Mengirim data ke database
    public function store(Request $request)
    {   
        // Menvalidasi data terlebih dahulu
        $validatedData = $request->validate([
            'name' => ['required', 'max:100'],
            'description' => ['required', 'max:700'],
            'category' => ['required', Rule::in(['food', 'drink', 'snack'])],
            'price' => ['required', 'max:100'],
            'stock' => ['required', 'max:100'],
            
            // Jenis gambar yang bisa dimasukan
            'image' => ['required', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
        ]);

        // Memasukan data di stroge yang berada di folder public
        $imagePath = $request->file('image')->store('menu-images', 'public');
        $validatedData['image'] = $imagePath;
        Menu::create($validatedData);

        return redirect('/admin')->with('success', 'Berhasil menambahkan produk');
    }

    // Tampilan edit data menu
    public function edit($id)
    {
        $menu = Menu::findOrFail($id);

        return view('admin.edit', [
            'menu' => $menu,
        ]);
    }

    //  Mengirim Perubahan data ke database
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'max:100'],
            'description' => ['required', 'max:700'],
            'category' => ['required', Rule::in(['food', 'drink', 'snack'])],
            'price' => ['required', 'max:100'],
            'stock' => ['required', 'max:100'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
        ]);

        $menu = Menu::findOrFail($id);

        // Admin memasukkan gambar di bagian editnya 
        if ($request->hasFile('image')) {
            // Jika gambar yang dulu ada maka akan dihapus dari folder menu-images
            if ($menu->image && Storage::disk('public')->exists($menu->image)) {
                Storage::disk('public')->delete($menu->image);
            }

            // Masukkan gambarnya ke folder menu-images dalam folder public
            $imagePath = $request->file('image')->store('menu-images', 'public');
            $validatedData['image'] = $imagePath;
        }

        Menu::findOrFail($id)->update($validatedData);
        return redirect('/admin')->with('success', 'Berhasil mengubah data');
    }

    public function destroy($id)
    {

        $menu = Menu::findOrFail($id);
        if ($menu->image && Storage::disk('public')->exists($menu->image)) {
            Storage::disk('public')->delete($menu->image);
        }
        $menu->delete();

        return redirect('/admin')->with('success', 'Berhasil menghapus produk');
    }
}
