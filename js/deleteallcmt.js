function deleteAllCmt(id){
    var option = confirm("Bạn có xóa đánh giá,bình luận này ?");
    if(!option){
        return
    }
    $.post(BASE_URL + API_PRODUCT,
    {
        'action' : DELETE_ALL_COMMENT,
        'id' : id
    },function(data){
        alert(data);
        location.reload();
    });
}