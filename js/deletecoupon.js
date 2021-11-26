function deleteCoupon(id){
    var option = confirm("Bạn có xóa mã giảm giá này ?");
    if(!option){
        return
    }
    $.post(BASE_URL + API_PRODUCT,
    {
        'action' : DELETE_COUPON,
        'id' : id
    },function(data){
        alert(data);
        location.reload();
    });

};