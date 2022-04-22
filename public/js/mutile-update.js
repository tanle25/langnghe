jQuery(document).ready(function($) {
	jQuery('.m-update').on('click', function() 
	{ 
	  	action = $(this).data('action');
	  	var allVals = [];
	    $(".sub_chk:checked").each(function() {  
	      	allVals.push($(this).attr('data-id'));
	    });
	    if(allVals.length > 0)
	    {	
	    	$('#data-selected').val(allVals);
	    	$('#mutile-update-modal').find('#modal-form').attr('action', action);
			$('#mutile-update-modal').modal('show');
	    }
  	});
});