// 配置sea的路径，别名等参数
// 获取当前时间
var random = + Math.random();
// seajs配置开始
seajs.config({
    // 基础目录
    base: 'http://www.onecrm.com/static/',
    // 别名
    alias: {
        "jquery"   : "lib/jquery/1.8.2/jquery",
    },
    // 映射
    'map': [
        [ /^(.*\.(?:css|js))(.*)$/i, '$1?version=' + random ]
      ]
})


// 得到当前页面是哪个
var _page = $('#Wrapper').attr('module');

// 如果page不存在则返回
if(!_page) {return;}

switch(_page){
    // 注册码模块
    case 'regcode':
        seajs.use("module/regcode/init");
        break;
}
