<div class="modal fade" id="editModal-{{ $cart->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $cart->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('cart.update', $cart->id) }}" method="POST" class="modal-content">
            @csrf
            @method('PUT')
            <div class="modal-header">
                <h5 class="modal-title">Edit Jumlah</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>
            <div class="modal-body">
                <p><strong>{{ $cart->menu->name }}</strong></p>
                <div class="form-group">
                    <label for="quantity">Jumlah</label>
                    <input type="number" name="quantity" class="form-control" value="{{ $cart->quantity }}" min="1" max="{{ $cart->menu->stock }}">
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Simpan</button>
            </div>
        </form>
    </div>
</div>