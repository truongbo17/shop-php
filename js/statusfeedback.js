function statusFeedback(id){
    $.post(BASE_URL + API_PRODUCT,
    {
        'action' : STATUS_FEEDBACK,
        'id' : id
    },function(data){
        alert(data);
        location.reload();
    });
}