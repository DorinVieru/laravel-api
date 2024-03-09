<div class="modal fade" id="modal_tech_delete-{{ $technology->id }}" tabindex="-1" aria-labelledby="modal_tech_delete" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5 fw-bold" id="modal_tech_delete_label">Conferma cancellazione per la tecnologia numero {{ $technology->id }}</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h6 id="custom-message">Sei sicuro di voler cancellare {{ $technology->name }}?</h6>
        <p>(Cancellando la tecnologia di assegnazione ad un progetto, non cancellerai tutti i progetti associati a questa tecnologia.)</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa-solid fa-xmark"></i> Chiudi</button>
        <form action="{{ route('admin.technologies.destroy', ['technology' => $technology->id]) }}" method="POST">
        @csrf
        @method('DELETE')
            <button class="btn btn-danger"><i class="fas fa-trash"></i> Cancella</button>
        </form>
      </div>
    </div>
  </div>
</div>