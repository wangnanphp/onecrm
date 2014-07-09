define(function(require, explode) {
    // 包含提示消息JS库模块
    require('template/js/toastr');
    // 导入消息配置
    var toastorMsg = require('module/common/config/toastorMsg');

    // 获取需要修改的注册码配置信息(类型或终端)
    explode.configEdit = function() {
        $('.config-edit').on('click', function() {
            // 获取要修改配置的原始数据
            $.post($(this).data('url'), {'id' : $(this).closest('tr').data('id')}, function(response) {
                if( 0 !== response.status ) {
                    toastr.error(response.msg, "操作失败", toastorMsg.errorOpt);
                    return false;
                }else {
                    $('#config-id').val(response.data['id']);
                    $('#config-name').val(response.data['name']);
                    $('#description').val(response.data['description']);
                    $('#myModal').modal();
                }
            }, 'json');
        });
    };

    // 执行修改注册码配置信息（类型或终端）
    explode.configModify = function() {
        $('#config-modify').on('click', function() {
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

    // 删除注册码配置信息(类型或终端)
    explode.configDelete = function() {
        $('.config-delete').on('click', function() {
            var oTr = $(this).closest('tr');
            $.post($(this).data('url'), {'id' : oTr.data('id')}, function(response) {
                if( 0 !== response.status) {
                    toastr.error(response.msg, "操作失败", toastorMsg.errorOpt);
                    return false;
                }
                oTr.fadeOut('1000');
            }, 'json');
        });
    };
});