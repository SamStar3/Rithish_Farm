

<!-- Activity Modal -->

<!-- Modal -->
<div class="modal fade" id="addActivityModal" tabindex="-1" aria-labelledby="addActivityModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content radius-15">
      <div class="modal-header">
        <h5 class="modal-title" id="addActivityModalLabel">Add Activity</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <form id="activityForm">
        <div class="modal-body">
          <input type="hidden" name="hdnAction" value="addActivity">
          <input type="hidden" name="event_id" value="1">
          <div class="mb-3">
            <label for="activity_name" class="form-label">Activity Name</label>
            <input type="text" class="form-control" name="activity_name" required>
          </div>
          <div class="mb-3">
            <label for="activity_description" class="form-label">Description</label>
            <textarea class="form-control" name="activity_description" required></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Save</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </form>
    </div>
  </div>
</div>


<!-- Edit Activity Modal -->
<!-- Edit Activity Modal -->
<div class="modal fade" id="editActivityModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <form id="editActivityForm">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Activity</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="hdnAction" value="updateActivity"> <!-- Updated to 'updateActivity' -->
          <input type="hidden" name="activity_id" id="edit_activity_id">

          <div class="mb-3">
            <label>Activity Name</label>
            <input type="text" name="activity_name" id="edit_activity_name" class="form-control" required>
          </div>
          <div class="mb-3">
            <label>Description</label>
            <textarea name="description" id="edit_activity_description" class="form-control" rows="3"></textarea> <!-- Updated to 'description' -->
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Update</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </form>
  </div>
</div>






