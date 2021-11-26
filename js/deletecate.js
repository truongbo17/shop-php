function deleteCate(id){
    var option = confirm("Bạn có muốn xóa danh mục sản phẩm này ?");
    if(!option){
        return
    }
    $.post(BASE_URL+API_PRODUCT,
        {
            'action' : AUTHEN_DELETE_CATEGORY,
            'id' : id
        },function(data){
            alert(data);
            location.reload();
        })
}