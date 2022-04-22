jQuery(document).ready(function($) {
  $('#wrapper').delegate('.delete-button', 'click', function(e){
    action = $(this).data('action');
    $('#deleteModal').find('#modal-form-delete').attr('action', action);
    $('#deleteModal').modal('show');
  });
});