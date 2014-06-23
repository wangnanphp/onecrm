define(function(require, explode) {
    // 获得当前是什么页
    var _curPage = $('#wrapper').attr('name');

    switch( _curPage ) {
        // 添加用户页面
        case 'add-user':
            // 包含提交表单模块
            // require('module/user/method/user').addUser();
            break;
    }
});