<div class="modal fade" id="cartModal-{{ $menu->id }}" tabindex="-1"
    aria-labelledby="cartModalLabel-{{ $menu->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('cart.store') }}" method="POST">
                @csrf
                <input type="hidden" name="menu_id" value="{{ $menu->id }}">
                <div class="modal-header">
                    <h5 class="modal-title" id="cartModalLabel-{{ $menu->id }}">Tambah ke Keranjang</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                    <p><strong>{{ $menu->name }}</strong></p>
                    <div class="mb-3">
                        <label for="quantity-{{ $menu->id }}" class="form-label">Jumlah</label>
                        <input type="number" name="quantity" id="quantity-{{ $menu->id }}" class="form-control"
                            value="1" min="1" max="{{ $menu->stock }}">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
