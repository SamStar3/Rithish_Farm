<!-- Add Event Modal -->
<div class="modal fade" id="addEventModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form name="frmAddEvent" id="addEvent" enctype="multipart/form-data">
        <input type="hidden" name="hdnAction" value="addEvent">
        <div class="modal-header">
          <h4 class="modal-title" id="staticBackdropLabel">Add Event</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div id="eventMsg" class="px-3 mt-2"></div>
        <div class="modal-body p-3">
          <div class="row g-3">
            <div class="col-sm-12">
              <label for="event_name" class="form-label fw-bold">Event Name</label>
              <input type="text" class="form-control" placeholder="Enter event name" name="event_name" id="event_name" required>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Edit modal -->
<!-- Edit Event Modal -->
<div class="modal fade" id="editEventModal" tabindex="-1" aria-labelledby="editEventModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form id="editEventForm">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editEventModalLabel">Edit Event</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="hdnAction" value="updateEvent">
          <input type="hidden" name="event_id" id="edit_event_id">

          <div class="mb-3">
            <label for="edit_event_name" class="form-label">Event Name</label>
            <input type="text" name="event_name" id="edit_event_name" class="form-control" required>
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



