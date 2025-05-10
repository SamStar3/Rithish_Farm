$(document).ready(function () {
  // Add / Update Game
  $('#gameForm').submit(function (e) {
    e.preventDefault();
    $.ajax({
      url: 'action/games.php',
      type: 'POST',
      data: $(this).serialize(),
      success: function (res) {
        alert(res);
        $('#staticBackdrop').modal('hide');
        location.reload();
      }
    });
  });

  // Edit Button
  $('.edit-game').click(function () {
    let id = $(this).data('id');
    $.ajax({
      url: 'action/games.php',
      type: 'POST',
      data: { action: 'fetch', id: id },
      dataType: 'json',
      success: function (data) {
        $('#game_id').val(data.id);
        $('input[name="name"]').val(data.name);
        $('textarea[name="description"]').val(data.description);
        $('input[name="amount"]').val(data.amount);
        $('#staticBackdrop').modal('show');
      }
    });
  });

  // Delete Button
  $('.delete-game').click(function () {
    if (confirm("Are you sure you want to delete this game?")) {
      let id = $(this).data('id');
      $.post('action/games.php', { action: 'delete', id: id }, function (res) {
        alert(res);
        location.reload();
      });
    }
  });
});
