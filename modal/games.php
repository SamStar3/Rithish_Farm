<!-- Add/Edit Modal -->
<div class="modal fade" id="staticBackdrop" tabindex="-1">
  <div class="modal-dialog">
    <form id="gameForm">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add Game</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" id="game_id" name="id">
          <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" required>
          </div>
          <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control" required></textarea>
          </div>
          <div class="mb-3">
            <label>Amount</label>
            <input type="number" name="amount" class="form-control" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
      </div>
    </form>
  </div>
</div>





