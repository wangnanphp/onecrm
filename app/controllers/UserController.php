<?php

class RegcodeController extends BaseController {

    public function showList()
    {
        return View::make('users.list');
    }


    /**
     * 处理添加用户
     * @return json 处理结果
     */
    public function doAdd()
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
            var_dump(DB::getQueryLog());
            $json_response = array('status' => 0, 'msg' => '注册码类型添加成功！');
        }


        echo self::json_output($json_response);
    }
}