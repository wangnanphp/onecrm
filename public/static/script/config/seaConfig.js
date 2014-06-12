// 配置sea的路径，别名等参数
// 获取当前时间
alert($('#wrapper').attr('id'));
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
});

alert($('#wrapper'));
var dsl = $('#wrapper');
alert(dsl.attr);
// for(aa in dsl){
//     alert(aa);
// }
alert($('#wrapper').attr('id'));

// 得到当前页面是哪个
var _page = $('#wrapper').attr('class');
alert(_page);
// 如果page不存在则返回
var abc = function() {
    if(!_page) {return;}

    switch(_page){
        // 注册码模块
        case 'regcode':
            seajs.use("module/regcode/init");
            alert('111');
            break;
    }
    alert('adadadf');
};

abc();