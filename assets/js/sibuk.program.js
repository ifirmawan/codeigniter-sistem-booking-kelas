$(document).ready(function(){
	var site_url = $('span.site_url').text();
  
  if ($('#hours').length == 1) {
      setInterval(timer_call, 1000);
  }

  $(document).on('click','a.btn-done',function(){
    if (confirm("are you sure get out from this room?")) {
      return true;
    }else{
      return false;
    }
  });

	$(document).on('change','input.check-use-fc',function(){
		var action_url  = site_url +'/check_use/';
		var id_booking 	= $('input.id_booking').val();
   	var id_fc		    = $('input.id_fc').val();
    var data        = {'id_booking':id_booking, 'id_fc':id_fc};
        if ($(this).is(":checked")) {
          if ($('input[name="data_status"]').length == 1) {
            action_url+='update';
          }else{
            action_url+='add';          
          }
        }else{
          if ($('input[name="data_status"]').length == 0) {
              action_url+='del';
          }
        }
      $.ajax({
        url: action_url,
        type:"POST",
        data: data,
        dataType:"json",
        success: function (response) {
           // you will get response from your php page (what you echo or print)                 
          return response;
        },
        error: function(jqXHR, textStatus, errorThrown) {
           return textStatus;
        }
    });
  });
  
  
  $(document).on('change','input.im_in',function(){
      if ($(this).is(":checked")) {
        var user_name = $('span.user_name').text();
        $('input[name="book_pic_name"]').val(user_name);  
      }else{
        $('input[name="book_pic_name"]').val("");
      }
  }); 
  //select day booking
  //$(document).on('change','select[name="book_day"]',function(){
    $(document.body).on('change','select[name=book_day]',function(){
        window.location.href='?day='+$(this).val();
    });
    

      /*for (i = 0; i < items_id.length; i++){ 
        $('select[name="book_room_id"]').append($('<option>',{
              value: items_id[i],
              text : items_time[i]
          }));
      }*/



});

function timer_call(){
    var action_url = $('span.site_url').text()+'time';
    if ($('div.left_time').length == 1) {
        action_url +='/'+$('div.left_time').text();
    }
    $.ajax({
        'url' : action_url
        ,success: function(data){
            data = data.split(':');
            $('h3#hours').text(data[0]);
            $('h3#minutes').text(data[1]);
            $('h3#seconds').text(data[2]);
        }
    });
}