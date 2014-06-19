// 配置sea的路径，别名等参数
// 获取当前时间
var random = + Math.random();
// seajs配置开始
seajs.config({
    // 基础目录
    base: 'http://www.onecrm.com/static/script/',
    // 别名
    alias: {
        'jquery'     : 'lib/jquery/1.10.2/jquery-1.10.2.min',
        'validation' : 'lib/jqueryvalidation/1.11.1/jquery.Validation.min'
    },
    // 路径
    paths: {
        'template' : 'http://www.onecrm.com/static/template/',
    },
    // 映射
    map: [
        [ /^(.*\.(?:css|js))(.*)$/i, '$1?version=' + random ]
    ],
    // 预加载
    // preload: ['jquery']
});

$(function() {
    // 得到当前页面是哪个模型
    var _module = $('#wrapper').attr('module');
    if( ! _module ) {return;}

    switch( _module ){
        // 注册码模块
        case 'regcode':
            seajs.use('module/regcode/init');
            break;
        // 用户管理(员工管理)模块
        case 'user':
            // seajs.use('module/user/init');
        // 角色管理(部门管理)模块
        case 'role':
            // seajs.use('module/role/init');
            break;
    }
});
