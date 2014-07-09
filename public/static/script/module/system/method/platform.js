define(function(require, explode) {
    // 包含提示消息JS库模块
    require('template/js/toastr');
    // 导入消息配置
    var toastorMsg = require('module/common/config/toastorMsg');

    // 修改平台信息
    explode.platformEdit = function() {
        $('.platform-edit').on('click', function() {
            // 获取要修改的原始数据
            $.post($(this).data('url'), {'id' : $(this).closest('tr').data('id')}, function(response) {
                if( 0 !== response.status ) {
                    toastr.error(response.msg, "操作失败", toastorMsg.errorOpt);
                    return false;
                }else {
                    $('#platform-id').val(response.data['id']);
                    $('#platform-name').val(response.data['name']);
                    $('#description').val(response.data['description']);
                    $('#myModal').modal();
                }
            }, 'json');
        });
    };

    // 执行修改平台信息
    explode.platformModify = function() {
        $('#platform-modify').on('click', function() {
            $.post($(this).data('url'), $(this).closest('form').serialize(), function(response) {
                if( 0 !== response.status ) {
                    toastr.error(response.msg, "操作失败", toastorMsg.errorOpt);
                    return false;
                }else {
                    toastr.success(response.msg, "操作成功", toastorMsg.successOpt);
                    window.location.reload();
                    return true;
                }
            }, 'json');
        });
    };

    // 删除平台信息
    explode.platformDelete = function() {
        $('.platform-delete').on('click', function() {
            var oTr = $(this).closest('tr');
            $.post($(this).data('url'), {'id' : oTr.data('id')}, function(response) {
                if( 0 !== response.status) {
                    toastr.error(response.msg, "操作失败", toastorMsg.errorOpt);
                    return false;
                }
                oTr.fadeOut('1000');
            }, 'json');
        });
    }
});