@extends('layouts.beranda-layout')

@section('content')
@include('components.card-category')
@include('layouts.recomended-menu')
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-2">
            <h2 class="mb-4 fw-bolder">Menu</h2>
            <select id="categorySelect" class="form-select w-auto d-inline-block mb-2">
                <option value="">Semua Kategori</option>
                <option value="food">Makanan</option>
                <option value="drink">Minuman</option>
                <option value="snack">Snack</option>
            </select>

            <div id="menuList" class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-left">
                @include('partials.menu-list', ['menus' => $menus])
            </div>
        </div>
    </section>
@endsection
