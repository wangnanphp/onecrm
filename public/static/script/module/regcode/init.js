define(function(require, explode) {
    var _curPage = $('#wrapper').attr('name');

    switch( _curPage ) {
        case 'add-config':
            require('regcode/method/regcode');
    }
});