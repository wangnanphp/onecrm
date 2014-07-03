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
            // 获取其祖先对象(tr)
            var oTr = $(this).parents('tr');
            // 获取要删除用户的ID
            var id  = oTr.attr('data-id');
            if( ! id ) {
                toastr.error('无效请求！', "操作失败", toastorMsg.errorOpt);
                return false;
            }
            $.post('/user/user-delete', {'id':id}, function(data){
                if( 0 !== data.status) {
                    toastr.error(data.msg, "操作失败", toastorMsg.errorOpt);
                    return false;
                }
                oTr.fadeOut('1000');
            }, 'json');
        });
    };

    // 编辑员工角色信息
    explode.userRoleEdit = function() {
        $('.user-role-edit').click(function() {
            // 获取要修改用户的ID
            var nId = $(this).parents('tr').attr('data-id');
            if( ! nId ) {
                toastr.error('无效请求！', "操作失败", toastorMsg.errorOpt);
                return false;
            }

            获取所有部门信息和此员工现所在部门信息
            $.post('/user/user-role', {'id', id}, function(data){
                if( 0 !== data.status ) {
                    toastr.error(data.msg, "操作失败", toastorMsg.errorOpt);
                    return false;
                }else {
                    $oOptions = $('#user-role').find('option');
                    // for(roleId in )
                    $('#myModal').modal();
                }

            });
        });
    };
});