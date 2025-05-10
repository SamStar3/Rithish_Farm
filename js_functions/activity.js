console.log("activity.js loaded");

// Add Activity
$(document).ready(function() {
    $('#activityForm').on('submit', function(e) {
      e.preventDefault(); // Prevent the default form submission
  
      $.ajax({
        url: 'action/activity.php', // PHP file to handle insertion
        type: 'POST',
        data: $(this).serialize(), // Send form data
        success: function(response) {
          let res = JSON.parse(response);
          if (res.status === 'success') {
            // Success message
            alert('Activity added successfully!');
            
            // Hide modal
            $('#addActivityModal').modal('hide');
  
            // Reset form
            $('#activityForm')[0].reset();
            location.reload();
          } else {
            alert('Error: ' + res.message);
          }
        }
      });
    });
  });

 //fetch
function goEditActivity(activityId) {
  document.activeElement?.blur();
  $('#editActivityForm').modal('hide');

  $.ajax({
      url: "action/activity.php",
      type: "POST",
      data: { activity_id: activityId, action: 'fetchActivity' },
      dataType: "json",
      success: function (response) {
          if (response.error) {
              Swal.fire("Error!", response.error, "error");
          } else {
              $('#edit_activity_id').val(activityId);
              $('#edit_activity_name').val(response.activity_name);
              $('#edit_activity_description').val(response.description);
              $('#editActivityModal').modal('show');
          }
      },
      error: function () {
          Swal.fire("Error!", "Failed to fetch activity details.", "error");
      }
  });
}

//update
$(document).ready(function () {
  $("#editActivityForm").on("submit", function (e) {
      e.preventDefault();
      var formData = new FormData(this);

      $.ajax({
          type: "POST",
          url: "action/activity.php",
          data: formData,
          processData: false,
          contentType: false,
          success: function (response) {
              if (response.trim() === "success") {
                  alert("Activity updated successfully!");
                  $('#editActivityModal').modal('hide');
                  location.reload();
              } else {
                  alert("Update failed: " + response);
              }
          }
      });
  });
});





// delete activity
$(document).on('click', '.delete-activity', function () {
    if (confirm("Are you sure you want to delete this activity?")) {
        let activityId = $(this).data('id');
        console.log("Deleting activity ID:", activityId);

        $.ajax({
            url: 'action/activity.php',
            type: 'POST',
            data: {
                hdnAction: 'delete_activity',
                activity_id: activityId
            },
            success: function (response) {
                console.log("Server response:", response); // Important!
                if (response.trim() === "success") {
                    alert("Activity deleted!");
                    location.reload();
                } else {
                    alert("Deletion failed: " + response);
                }
            },
            error: function (xhr) {
                alert("AJAX error: " + xhr.status + " " + xhr.statusText);
            }
        });
    }
});



