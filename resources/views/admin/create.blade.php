@php
    $menu = $menus ?? new \App\Models\Menu();
@endphp

@extends('layouts.admin-layout')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Produk</h1>
    </div>
    <div class="row">
        <div class="col">
            <form action="/admin" method="post" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="card">
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label for="name">Nama Produk</label>
                            <input type="text" name="name" id="name"
                                class="form-control @error('name') is-invalid @enderror"
                                value="{{ old('name', $menu->name) }}">
                            @error('name')
                                <span class="invalid-message">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="description">Deskripsi</label>
                            <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror">{{ old('description', $menu->description) }}</textarea>
                            @error('description')
                                <span class="invalid-message">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                        <label for="category">Jenis Kelamin</label>
                        <select name="category" id="category" class="form-control @error('category') is-invalid @enderror">
                            @foreach ([
                                (object) [
                                    "label" => "Makanan",
                                    "value" => "food",
                                ], (object) [
                                    "label" => "Minuman",
                                    "value" => "drink",
                                ], (object) [
                                    "label" => "Snak",
                                    "value" => "snack",
                                ],
                            ] as $item)
                                <option value="{{ $item->value }}" @selected(old('category', $menu->category) == $item->value)>{{ $item->label  }}</option>
                            @endforeach
                        </select>
                            @error('category')
                                <span class="invalid-message">
                                    {{ $message }}
                                </span>
                            @enderror
                    </div>
                        <div class="form-group mb-3">
                            <label for="price">Harga</label>
                            <input type="number" name="price" id="price"
                                class="form-control @error('price') is-invalid @enderror"
                                value="{{ old('price', $menu->price) }}">
                            @error('price')
                                <span class="invalid-message">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="stock">Stok</label>
                            <input type="number" name="stock" id="stock"
                                class="form-control @error('stock') is-invalid @enderror"
                                value="{{ old('stock', $menu->stock) }}">
                            @error('stock')
                                <span class="invalid-message">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="image">Gambar</label>
                            <input type="file" name="image" id="image"
                                class="form-control @error('image') is-invalid @enderror">
                            @error('image')
                                <span class="invalid-message">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="d-flex justify-content-end" style="gap:10px;">
                        <a href="/admin" class="btn btn-outline-secondary">
                            Kembali</a>
                        <button type="submit" class="btn btn-primary">
                            Simpan
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
