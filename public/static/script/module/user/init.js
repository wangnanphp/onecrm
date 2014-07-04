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
            // 修改 是否在职 和 状态 模式
            userList.changeMode();
            // 删除用户
            userList.deleteUser();
            // 用户角色编辑
            userList.userRoleEdit();
            // 用户角色编辑提交
            var userRoleEditSubmit = require('module/common/method/submitForm');
            userRoleEditSubmit.submitFormByJson('user-role-edit');
            break;
    }
});