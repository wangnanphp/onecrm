define(function(require, explode) {
    // 获得当前是什么页
    var _curPage = $('#wrapper').attr('name');

    switch( _curPage ) {
        // 添加角色(部门)页面
        case 'add-platform':
            // 包含提交表单模块
            var addConfig = require('module/common/method/submitForm');
            addConfig.submitFormByJson('#json-add-platform');
            break;
    }
});