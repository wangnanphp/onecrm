define(function(require, explode) {
    // 获得当前是什么页
    var _curPage = $('#wrapper').attr('name');

    switch( _curPage ) {
        case 'add-config':
            // 包含提交表单模块
            var addConfig = require('module/common/method/submitForm');
            // 添加注册码类型
            addConfig.submitFormByJson('#json-add-type');
            // 添加注册码使用终端
            addConfig.submitFormByJson('#json-add-platform');
            break;
    }
});