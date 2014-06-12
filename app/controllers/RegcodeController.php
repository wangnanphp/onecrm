<?php

class RegcodeController extends BaseController {

    public function showList()
    {
        return View::make('regcode.list');
    }


    /**
     * 添加注册码页面
     */
    public function addRegcode()
    {
        return View::make('regcode.add');
    }


    /**
     * 添加注册码类型和使用终端页面
     */
    public function addConfig()
    {
        return View::make('regcode.addConfig');
    }

    /**
     * 处理添加注册码类型
     * @return json 处理结果
     */
    public function doAddType()
    {
        var_dump($_POST);
    }
}
