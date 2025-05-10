console.log("event.js script is loaded");

// Add Event AJAX
$(document).ready(function () {
  $('#addEvent').on('submit', function (e) {
    e.preventDefault();

    $.ajax({
      url: 'action/event.php',
      type: 'POST',
      data: $(this).serialize(),
      dataType: 'json',
      success: function (response) {
        if (response.status === 'success') {
          alert(response.message);
          $('#addEventModal').modal('hide');
          $('#addEvent')[0].reset();
          location.reload();
        } else {
          alert(response.message);
        }
      },
      error: function () {
        alert('Something went wrong. Please try again.');
      }
    });
  });
});

// Load Events
function loadEvents() {
  $.ajax({
    url: 'action/event.php',
    type: 'POST',
    data: { action: 'getEvents' },
    dataType: 'json',
    success: function (events) {
      let html = '';
      events.forEach(ev => {
        html += `
          <div class="col-md-6 mb-4">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">${ev.name}</h5>
                <h5 class="card-title">${ev.description}</h5>
                <button type="button" class="btn btn-success text-white mb-2"
                  onclick="window.location.href='syllabus.php?id=${ev.id}'">
                  <i class="bx bx-book-open"></i> View Syllabus
                </button>
              </div>
            </div>
          </div>`;
      });
      $('#event-content .row').html(html);
    }
  });
}

// Fetch Event Data
function goEditEvent(eventId) {
  $.ajax({
      url: "action/event.php",
      type: "POST",
      data: { event_id: eventId, action: "fetchEvent" },
      dataType: "json",
      success: function (response) {
          if (response.error) {
              Swal.fire("Error!", response.error, "error");
          } else {
              // Populate form fields with the fetched data
              $('#edit_event_id').val(eventId);
              $('#edit_event_name').val(response.event_name);
              
              // Now show the modal
              $('#editEventModal').modal('show');
          }
      },
      error: function () {
          Swal.fire("Error!", "Unable to fetch event.", "error");
      }
  });
}


$(document).ready(function () {
  $("#editEventForm").on("submit", function (e) {
    e.preventDefault();
    var formData = new FormData(this);

    $.ajax({
      type: "POST",
      url: "action/event.php",
      data: formData,
      processData: false,
      contentType: false,
      success: function (response) {
        response = response.trim();
    
        if (response === "success") {
            Swal.fire({
                icon: 'success',
                title: 'Updated!',
                text: 'Event updated successfully.',
                confirmButtonColor: '#3085d6'
            }).then(() => {
                $('#editEventModal').modal('hide');
                location.reload();
            });
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Update Failed!',
                text: 'Something went wrong: ' + response,
                confirmButtonColor: '#d33'
            });
        }
    }
    
    });
  });
});


// delete

$(document).ready(function () {
  $(document).on('click', '.delete-event', function () {
      const eventId = $(this).data('id');
      console.log("Deleting Event ID:", eventId);

      if (confirm("Are you sure you want to delete this event?")) {
          $.ajax({
              url: 'action/event.php',
              type: 'POST',
              data: {
                  hdnAction: 'delete_event',
                  event_id: eventId
              },
              success: function (response) {
                  if (response.trim() === "success") {
                      alert("Event deleted successfully!");
                      location.reload();
                  } else {
                      alert("Delete failed: " + response);
                  }
              },
              error: function (xhr) {
                  alert("AJAX error: " + xhr.status + " " + xhr.statusText);
              }
          });
      }
  });
});





