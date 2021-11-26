function showHide(id){
    $.post(BASE_URL+API_PRODUCT,
        {
            'action' : AUTHEN_SHOWHIDE_CATEGORY,
            'id' : id
        },function(data){
            alert(data);
            location.reload();
        })
}