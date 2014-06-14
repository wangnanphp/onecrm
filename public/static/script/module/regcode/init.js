define(function(require, explode) {
    // 获得当前是什么页
    var _curPage = $('#wrapper').attr('name');

    switch( _curPage ) {
        case 'add-config':
            // 包含提示消息JS库模块
            require('template/js/toastr');

            // 包含提交表单模块
            var addConfig = require('module/common/method/submitForm');
            addConfig.submitFormByJson('#json-add-type');
            addConfig.submitFormByJson('#json-add-platform');
            break;
    }
});