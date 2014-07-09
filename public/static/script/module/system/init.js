define(function(require, explode) {
    // 获得当前是什么页
    var _curPage = $('#wrapper').attr('name');

    switch( _curPage ) {
        // 销售平台列表页面
        case 'platform-list':
            var platform = require('module/system/method/platform');
            // 编辑平台信息
            platform.platformEdit();
            // 执行修改平台信息
            platform.platformModify();
            // 删除销售平台
            platform.platformDelete();
            break;
        // 添加销售平台页面
        case 'platform-add':
            // 包含提交表单模块
            var addConfig = require('module/common/method/submitForm');
            addConfig.submitFormByJson('#json-platform-add');
            break;
    }
});