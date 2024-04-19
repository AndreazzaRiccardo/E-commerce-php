<div class="modal fade" id="modal-delete" tabindex="-1" aria-labelledby="modal-delete-label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="modal-delete-label">ATTENZIONE</h3>
                <button type="button" class="btn-close close-modal" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body fw-bolder">
                Sei sicuro di voler eliminare il PRODOTTO ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-primary fs-6 text-nowrap text-light" data-bs-dismiss="modal">ANNULLA</button>
                <form method="POST">
                    <input type="hidden" name="id" value="<?= $product->id ?>">
                    <input type="submit" name="delete" class="btn btn-sm btn-danger fs-6 text-nowrap text-dark" value="ELIMINA">
                </form>
            </div>
        </div>
    </div>
</div>