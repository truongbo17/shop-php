function deleteCatePost(id){
    var option = confirm("Bạn có muốn xóa danh mục bài viết này ?");
    if(!option){
        return
    }
    $.post(BASE_URL+API_PRODUCT,
        {
            'action' : AUTHEN_DELETE_CATEGORY_POST,
            'id' : id
        },function(data){
            alert(data);
            location.reload();
        })
}