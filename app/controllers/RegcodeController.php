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
        $json_response = array('status' => -1, 'msg' => '未知错误！');

        if ( ! Input::has('name') )
        {
            $json_response = array('status' => 1, 'msg' => '请输入注册码类型名！');
        }
        else
        {
            $regcode = new RegcodeType();
            $regcode->name = Input::get('name');
            $regcode->remark = Input::get('remark') ?: '';
            $regcode->save();

            $json_response = array('status' => 0, 'msg' => '注册码类型添加成功！');
        }


        echo self::json_output($json_response);
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
