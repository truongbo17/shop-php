function banUser(id){
    var option = confirm("Bạn có muốn cấm người dùng này ?");
    if(!option){
        return
    }
    $.post(BASE_URL + API_AUTHEN,
    {
        'action' : AUTHEN_BAN_USER,
        'id' : id
    },function(data){
        obj = JSON.parse(data);
        if(obj.status == 1){
            $('#alert').append('<div class="alert alert-danger alert-common alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="tf-ion-close-circled"></i><span>Thông báo !</span> Cấm người dùng '+obj.msg+' thành công</div>');
            $('#ban'+id).hide();
            $('#bansecond'+id).show();
            $('#status'+id).attr('class', 'label label-danger');
            $('#status'+id).text('Tài khoản bị cấm');
            setTimeout(function () {
                location.reload(true);
            }, 5000);
        }
        else{
            alert(obj.msg);
            location.reload();
        }
    });
}
function unbanUser(id){
    var option = confirm("Bạn có bỏ cấm người dùng này ?");
    if(!option){
        return
    }
    $.post(BASE_URL + API_AUTHEN,
    {
        'action' : AUTHEN_UNBAN_USER,
        'id' : id
    },function(data){
        obj = JSON.parse(data);
        if(obj.status == 1){
            $('#alert').append('<div class="alert alert-danger alert-common alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="tf-ion-close-circled"></i><span>Thông báo !</span> Bỏ cấm người dùng '+obj.msg+' thành công</div>');
            $('#unban'+id).hide();
            $('#unbansecond'+id).show();
            $('#status'+id).attr('class', 'label label-success');
            $('#status'+id).text('Bình thường');
            setTimeout(function () {
                location.reload(true);
            }, 5000);
        }
        else{
            alert(obj.msg);
            location.reload();
        }
    });
}