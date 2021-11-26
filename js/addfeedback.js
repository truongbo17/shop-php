$( "#addfeedback" ).submit(function( event ) {
    $.post(BASE_URL + API_AUTHEN,
    {
      'action' : 'addFeedBack',
      'userid' : $('input[name="userid"]').val(),
      'fullname' : $('input[name="fullname"]').val(),
      'email' : $('input[name="email"]').val(),
      'subject' : $('input[name="subject"]').val(),
      'message' : $('textarea[name="message"]').val(),
    },
    function(data) {
      if(data == 'success'){
            alert("Cảm ơn bạn đã góp ý ,chúng tôi sẽ liên hệ lại sớm nhất");
            location.reload();
      }else{
        alert(data);
      }
    });
  });