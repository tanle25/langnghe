$('#master').on('click', function(e) {
    if($(this).is(':checked',true))  
    {
      $(".sub_chk").prop('checked', true);  
    } else {  
      $(".sub_chk").prop('checked',false);  
    }
    var allVals = [];  
    $(".sub_chk:checked").each(function() {  
      allVals.push($(this).attr('data-id'));
    });
    count = allVals.length;
    $('.count-tick').empty().html(count);  
});

$(".sub_chk").on('click', function(e) {
    if(!$(this).is(':checked',true))  
    {
      $('#master').prop('checked', false);  
    }
    var allVals = [];
    $(".sub_chk:checked").each(function() {  
      allVals.push($(this).attr('data-id'));
    });
    count = allVals.length;
    $('.count-tick').empty().html(count);  
});