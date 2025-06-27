@php
    $cardCategory = [
        [
        'title' => 'Ayam Berkualitas',
        'text' => 'Bahan makanan yang sehat dan berkualitas.',
        'animasi' => 'fade-up'
        ],
        [
        'title' => 'Sensasi Kriuk Maksimal!',
        'text' => 'Renyah di setiap gigitan.',
        'animasi' => 'fade-up'
        ],
        [
        'title' => 'Pesan Sekarang',
        'text' => 'Gak perlu nunggu lama lagih.',
        'animasi' => 'fade-up'
        ],
        [
        'title' => 'Keju lumer meleleh~',
        'text' => 'Meleleh lembut di setiap suapan.',
        'animasi' => 'fade-up'
        ],

    ]

@endphp

<div class="row container mx-auto mt-4">
    @foreach ($cardCategory as $card)
    <div class="col-md-3 mb-3" data-aos={{ $card['animasi'] }} data-aos-duration="1000">
        <div class="card h-100">
            <div class="card-body card-body-beranda">
                <h6 class="card-title card-title-menu">{{ $card['title'] }}</h6>
                <p class="card-text">{{ $card['text'] }}</p>
            </div>
        </div>
    </div>
        
    @endforeach
</div>

<!-- Tambahkan di blade file kamu -->
<div class="container py-4 px-4 mb-4">
    <div class="row">
        <!-- Gambar -->
        <div class="col-md-6 text-center mb-4 mb-md-0 content-our-menu" data-aos="fade-right" data-aos-duration="1500">
            <img src="{{ asset('img/our-menu.jpeg') }}" alt="Menu Kami" class="img-fluid img-our-menu">
        </div>

        <!-- Konten Teks -->
        <div class="col-md-6 text-md-start" data-aos="fade-left" data-aos-duration="1500">
            <h2 class="fw-bold">MENU KAMI</h2>
            <hr class="highlight-line">
            <p class="mb-4 fs-6 fs-md-5">Nikmati ayam geprek lezat dengan berbagai pilihan sambal, dari original hingga keju lumer
                dan sambal matah. Bukan cuma ayam geprek, kami juga punya menu lain seperti mie geprek, nasi goreng, dan
                camilan gurih. Dilengkapi nasi hangat, tahu-tempe, dan minuman segar. Pedasnya? Bikin nagih!</p>
            <a href="/menu" class="btn  btn-menu fw-bold px-4">LIHAT MENU</a>
        </div>
    </div>
</div>
