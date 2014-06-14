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
        $json_response = array('status' => 1, 'msg' => Input::get('type_name'));
        dd(Input::only('type_name', 'remark','sdl'));
        if(Input::only('type_name', 'remark'))
        {
            $json_response = array('status' => 0, 'msg' => Input::get('type_name'));
        }

        echo json_encode($json_response);
    }

    /**
     * 处理添加注册码使用平台
     * @return json 处理结果
     */
    public function doAddPlatform()
    {
        echo json_encode(['status' => 0, 'msg' => 'platform']);
    }
}
