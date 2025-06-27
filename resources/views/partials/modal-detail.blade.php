<div class="modal fade" id="detailModal-{{ $menu->id }}" tabindex="-1" aria-labelledby="detailModalLabel{{ $menu->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ $menu->name }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body row">
                <div class="col-md-6 mb-3">
                    <img src="{{ asset('storage/' . $menu->image) }}" alt="{{ $menu->name }}"
                        class="img-fluid rounded w-100" style="object-fit: cover; height: 300px;">
                </div>

                <div class="col-md-6">
                    <p class="mb-2"><strong>Harga:</strong> Rp{{ number_format($menu->price, 0, ',', '.') }}</p>
                    <p class="mb-3"><strong>Deskripsi:</strong><br>{{ $menu->description }}</p>
                    <p class="mb-0">
                        <strong>Status:</strong>
                        <span class="{{ $menu->stock > 0 ? 'text-success' : 'text-danger' }}">
                            {{ $menu->stock > 0 ? 'Tersedia' : 'Habis' }}
                        </span>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
