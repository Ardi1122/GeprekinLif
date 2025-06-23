<!-- Modal -->
<div class="modal fade" id="confirmationDelete-{{ $menu->id }}" tabindex="-1" aria-labelledby="confirmationDeleteLabel" aria-hidden="true">
  <div class="modal-dialog">
        @csrf
        @method('DELETE')
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title fs-5" id="confirmationDeleteLabel">Utamakan membaca</h4>
            <button type="button" class="btn btn-default" data-bs-dismiss="modal" aria-label="Close">
              <i class="fas fa-times"></i>
            </button>
          </div>
          <div class="modal-body">
            <span>Lu nggk lihat apa. Habis kocak</span>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
          </div>
        </div>

  </div>
</div>