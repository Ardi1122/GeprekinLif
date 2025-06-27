@foreach ($menus as $menu)
    <div class="col mb-4">
        <!-- Seluruh card jadi trigger modal detail -->
        <div class="card h-100 shadow-sm border-0"
            role="button"
            data-bs-toggle="modal"
            data-bs-target="#detailModal-{{ $menu->id }}">

            <img src="{{ asset('storage/' . $menu->image) }}" alt="{{ $menu->name }}" class="card-img-top"
                style="height: 180px; object-fit: cover;">

            <div class="card-body">
                <h6 class="fw-bold mb-1">{{ $menu->name }}</h6>
                <p class="text-muted small mb-3">{{ Str::limit($menu->description, 40) }}</p>

                <div class="d-flex justify-content-between align-items-center">
                    <small class="text-success">{{ $menu->stock > 0 ? 'Tersedia' : 'Habis' }}</small>

                    <!-- Tombol Add to Cart (tidak trigger modal detail) -->
                    <button type="button" class="btn btn-sm btn-outline-dark"
                        data-bs-toggle="modal"
                        data-bs-target="#cartModal-{{ $menu->id }}"
                        onclick="event.stopPropagation();"
                        {{ $menu->stock < 1 ? 'disabled' : '' }}>

                        <!-- Icon untuk mobile -->
                        <i class="bi bi-cart d-sm-none"></i>

                        <!-- Teks untuk desktop -->
                        <span class="d-none d-sm-inline">Add to Cart</span>
                    </button>
                </div>
            </div>
        </div>

        @include('partials.modal-detail', ['menu' => $menu])  {{-- Modal info detail --}}
        @include('partials.modal-tambah', ['menu' => $menu])  {{-- Modal tambah ke cart --}}
    </div>
@endforeach

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).on('click', '.category-btn', function () {
        const category = $(this).data('category');
        $('.category-btn').removeClass('active');
        $(this).addClass('active');

        $.get('/menu/ajax', { category: category }, function (data) {
            $('#menuList').html(data);
        });
    });
</script>
