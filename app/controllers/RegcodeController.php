<?php

/**
 * 注册码控制器
 */
class RegcodeController extends BaseController {

    public function showList()
    {
        return View::make('regcode.list');
    }


    /**
     * 添加注册码页面
     * @return [type] [description]
     */
    public function getAddRegcode()
    {
        return View::make('regcodes.addRegcode');
    }
}
