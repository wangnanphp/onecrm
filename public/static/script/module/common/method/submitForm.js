define(function(require, explode) {
    // 导入消息配置
    var toastorMsg = require('module/common/config/toastorMsg');
    // 包含提示消息JS库模块
    require('template/js/toastr');

    explode.submitFormByJson = function(btnID) {
        $(btnID).click(function() {
            var submitForm = $(this).parents('form');
            $.post($(this).attr('data-url'), submitForm.serialize(), function(data) {
                if( 0 === data.status ) {
                    toastr.success(data.msg, "操作成功", toastorMsg.successOpt);
                    submitForm[0].reset();
                }else {
                    toastr.error(data.msg, "操作失败", toastorMsg.errorOpt);
                }
            }, 'json');
            return false;
        });
    };
});