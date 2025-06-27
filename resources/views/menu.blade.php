@extends('layouts.beranda-layout')

@section('content')
    <section class="py-2">
        <div class="container px-lg-5">
            <h2 class="mb-4 fw-bolder">Menu</h2>
            <div class="mb-4 d-flex flex-wrap gap-2">
                <button class="btn btn-outline-dark category-btn active" data-category="">Semua</button>
                <button class="btn btn-outline-dark category-btn" data-category="food">Makanan</button>
                <button class="btn btn-outline-dark category-btn" data-category="drink">Minuman</button>
                <button class="btn btn-outline-dark category-btn" data-category="snack">Snack</button>
            </div>


            <div id="menuList" class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-left">
                @include('partials.menu-list', ['menus' => $menus])
            </div>
        </div>
    </section>
    <script>
        $(document).on('click', '.category-btn', function () {
            const category = $(this).data('category');
    
            // Hapus class 'active' dari semua tombol kategori
            $('.category-btn').removeClass('active');
    
            // Tambahkan class 'active' ke tombol yang diklik
            $(this).addClass('active');
    
            // Request data baru
            $.get('/menu/ajax', { category: category }, function (data) {
                $('#menuList').html(data);
            });
        });
    </script>
@endsection

