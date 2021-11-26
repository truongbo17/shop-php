$( "#checkinventory" ).submit(function( event ) {
    $.post(BASE_URL + API_PRODUCT,
    {
      'action' : 'checkInventory',
      'productcode' : $('input[name="product_code"]').val(),
      'userid' : $('input[name="userid"]').val()
    },
    function(data) {
      alert(data);
    });
  });