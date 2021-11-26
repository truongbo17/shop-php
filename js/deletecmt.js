function deleteCmt(id,productid){
    var option = confirm("Bạn có xóa đánh giá này ?");
    if(!option){
        return
    }
    $.post(BASE_URL + API_PRODUCT,
    {
        'action' : DELETE_COMMENT,
        'id' : id,
        'productid' : productid
    },function(data){
        alert(data);
        location.reload();
    });
}