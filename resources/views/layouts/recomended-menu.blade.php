<section class="py-5 bg-light recommended-section position-relative"
    style="background-image: url('{{ asset('img/bg-recomended.png') }}'); background-size: cover; background-position: center;">
    
    <!-- Overlay Blur + Hitam -->
    <div class="background-overlay position-absolute top-0 start-0 w-100 h-100"></div>

    <div class="container text-white position-relative">
        <h2 class="fw-bold text-dark text-center">REKOMENDASI MENU</h2>
        <hr class="highlight-line mb-5 mx-auto">

        <div class="row justify-content-center">
            @foreach ($menus->take(4) as $menu)
                <div class="col-6 col-md-4 col-lg-3 mb-4" data-aos="fade-up" data-aos-duration="1500">
                    <div class="card position-relative overflow-hidden h-100">
                        <img src="{{ asset('storage/' . $menu->image) }}" class="card-img-top img-menu-card" alt="{{ $menu->name }}">
                        <div class="card-overlay d-flex justify-content-center align-items-center">
                            <span class="text-white fw-bold"><a href="/menu" class="link-lihat"> Lihat Semuanya</a></span>
                        </div>
                        <div class="card-body d-flex flex-column justify-content-between">
                            <div>
                                <h6 class="fw-bold">{{ $menu->name }}</h6>
                                <p class="text-muted small mb-2">{{ Str::limit($menu->description, 60) }}</p>
                            </div>
                            <div class="text-end fw-bold text-warning">Rp{{ number_format($menu->price, 0, ',', '.') }}</div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
