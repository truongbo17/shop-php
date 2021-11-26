function deletePost(id){
    var option = confirm("Bạn có muốn xóa bài viết này ?");
    if(!option){
        return
    }
    $.post(BASE_URL+API_PRODUCT,
        {
            'action' : DELETE_POST,
            'id' : id
        },function(data){
            alert(data);
            location.reload();
        })
}