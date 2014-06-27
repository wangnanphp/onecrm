define(function(require, explode) {
    // 获得当前是什么页
    var _curPage = $('#wrapper').attr('name');

    switch( _curPage ) {
        case 'add-goodstype':
            // 包含提交表单模块
            var addConfig = require('module/common/method/submitForm');
            addConfig.submitFormByJson('#json-add-goodstype');
            break;
    }
});