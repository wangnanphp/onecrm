define(function(require, explode) {
    // 获得当前是什么页
    var _curPage = $('#wrapper').attr('name');

    switch( _curPage ) {
        // 添加用户页面
        case 'add-user':
            // 包含提交表单模块
            // require('module/user/method/user').addUser();    // 没有用到，直接POST提交了
            break;
        case 'user-list':
            var userList = require('module/user/method/userList');
            userList.changeMode();
            break;
    }
});