// 配置sea的路径，别名等参数
// 获取当前时间
var random = + Math.random();
// seajs配置开始
seajs.config({
    // 基础目录
    base: 'http://www.onecrm.com/static/script/',
    // 别名
    alias: {
        'jquery' : 'lib/jquery/1.8.2/jquery',
    },
    // 路径
    paths: {
        'template' : 'http://www.onecrm.com/static/template/',
    },
    // 映射
    'map': [
        [ /^(.*\.(?:css|js))(.*)$/i, '$1?version=' + random ]
      ]
});

$(function() {
    // 得到当前页面是哪个模型
    var _module = $('#wrapper').attr('module');
    if( ! _module ) {return;}

    switch( _module ){
        // 注册码模块
        case 'regcode':
            seajs.use("module/regcode/init");
            break;
    }
});
