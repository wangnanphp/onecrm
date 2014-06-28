define(function (require, explode) {
    // 导入消息配置
    var toastorMsg = require('module/common/config/toastorMsg');
    // 包含提示消息JS库模块
    require('template/js/toastr');

    // 修改工作状态方法
    explode.changeMode = function() {
        $('.mode').click(function() {
            // 获取需要修改的ID
            var id = $(this).parents('tr').attr('data-id');
            // 获取修改的类型模式
            var mode = $(this).attr('data-mode');
            // $(this).trigger('click');exit;

            $.post('/user/change-mode', {'id' : id, 'mode' : mode}, function(data) {
                var arrChecked = ['checked', ''];
                if( 0 === data.status ) {
                    toastr.success(data.msg, "操作成功", toastorMsg.successOpt);
                }else{
                    // 获取父DIV，用于设置选择样式
                    // var oDiv = $(this).parents('div');
                    // var sDivClassAttr = oDiv.attr('class');
                    // if( sDivClassAttr.length > 60 ) {
                    //     classAttr = sDivClassAttr.substr(0, 54);
                    // }else {
                    //     classAttr = sDivClassAttr + ' checked';
                    // }
                    // oDiv.attr('class', classAttr);
                    toastr.error(data.msg, "操作失败", toastorMsg.errorOpt);
                    return false;
                }
            }, 'json');
        });
    };

    // 删除员工
    explode.deleteUser = function(){
        $('.delete-user').click(function() {
            var id = $(this).parentsUntil('tr').attr('data-id');
            // var id = $(this).attr('class');
            alert(id);
        });
    };
});