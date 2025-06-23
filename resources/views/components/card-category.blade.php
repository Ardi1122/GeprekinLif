@php
    $cardCategory = [
        [
        'title' => 'Ayam Berkualitas',
        'text' => 'Bahan makanan yang sehat dan berkualitas.'
        ],
        [
        'title' => 'Sensasi Kriuk Maksimal!',
        'text' => 'Renyah di setiap gigitan.'
        ],
        [
        'title' => 'Pesan Sekarang',
        'text' => 'Gak perlu nunggu lama lagih.'
        ],
        [
        'title' => 'Keju lumer meleleh~',
        'text' => 'Meleleh lembut di setiap suapan.'
        ],

    ]

@endphp

<div class="row container mx-auto mt-4">
    @foreach ($cardCategory as $card)
    <div class="col-md-3 mb-3">
        <div class="card h-100">
            <div class="card-body">
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
        <div class="col-md-6 text-center mb-4 mb-md-0 content-our-menu">
            <img src="{{ asset('img/our-menu.jpeg') }}" alt="Menu Kami" class="img-fluid img-our-menu">
        </div>

        <!-- Konten Teks -->
        <div class="col-md-6 text-md-start ">
            <h2 class="fw-bold">MENU KAMI</h2>
            <hr class="highlight-line">
            <p class="mb-4 fs-6 fs-md-5">Nikmati ayam geprek lezat dengan berbagai pilihan sambal, dari original hingga keju lumer
                dan sambal matah. Bukan cuma ayam geprek, kami juga punya menu lain seperti mie geprek, nasi goreng, dan
                camilan gurih. Dilengkapi nasi hangat, tahu-tempe, dan minuman segar. Pedasnya? Bikin nagih!</p>
            <a href="/menu" class="btn  btn-menu fw-bold px-4">LIHAT MENU</a>
        </div>
    </div>
</div>
