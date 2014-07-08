define(function(require, explode) {
    // 获得当前是什么页
    var _curPage = $('#wrapper').attr('name');

    switch( _curPage ) {
        // 添加注册码配置（类型和使用平台）
        case 'add-config':
            // 包含提交表单模块
            var addConfig = require('module/common/method/submitForm');
            // 添加注册码类型
            addConfig.submitFormByJson('#json-add-type');
            // 添加注册码使用终端
            addConfig.submitFormByJson('#json-add-platform');
            break;

        // 注册码类型列表
        case 'type-list':
        // 注册码使用终端列表
        case 'terminal-list':
            var regcode = require('module/regcode/method/regcode');
            // 修改注册码配置（类型或终端）
            regcode.configEdit();
            // 执行修改注册码配置（类型或终端）
            regcode.configModify();
            // 删除注册码配置（类型或终端）
            regcode.configDelete();
            break;
    }
});