$( "#changestatus" ).submit(function( event ) {
  var option = confirm("Bạn có thay đổi trạng thái đơn hàng này ?");
    if(!option){
        return
    }
  $.post(BASE_URL + API_PRODUCT,
  {
    'action' : 'changeStutusOrder',
    'orderid' : $('input[name="orderid"]').val(),
    'status' : $('select[name="status"]').val(),
    'userid' : $('input[name="userid"]').val()
  },
  function(data) {
    alert(data);
    location.reload();
  });
});