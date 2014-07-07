<?php

/**
 * 注册码相关配置控制器
 */
class RegcodeConfigController extends BaseController {

    /**
     * 注册码类型列表页
     *
     * @return [type] [description]
     */
    public function getTypeList()
    {
        return View::make('regconf.TypeList');
    }


    /**
     * 注册码使用终端列表页
     *
     * @return [type] [description]
     */
    public function getTerminalList()
    {
        return View::make('regconf.TerminalList');
    }


    /**
     * 添加注册码配置信息页面
     *     含：1、注册码类型配置， 2、注册码使用终端配置
     *
     * @return [type] [description]
     */
    public function getConfigAdd()
    {
        return View::make('regconf.configAdd');
    }


    /**
     * 处理添加注册码类型
     *
     * @return json 处理结果
     */

    public function postTypeAdd()
    {
        $responseJson = array('status' => -1, 'msg' => '未知错误！');

        // 获取注册码名称
        $inputs = array_trim(Input::get());

        // 验证输入
        $validator = Validator::make($inputs, ['name' => 'required']);
        if ( $validator->failed() )    // 验证失败
        {
            $responseJson = array('status' => 2, 'msg' => '请输入注册码类型名！');
        }
        else
        {
            $regcode                = new RegcodeType();
            $regcode->name          = $inputs['name'];
            $regcode->user_id       = 1;
            $regcode->user_realname = '这就是用户名';
            $regcode->description   = empty($inputs['description']) ? '' : $inputs['description'];
            if( $regcode->save() )    // 添加数据库失败
            {
                $responseJson = array('status' => 0, 'msg' => '注册码类型添加成功！');
            }
            else
            {
                $responseJson = array('status' => 1, 'msg' => '注册码类型数据添加失败！');
            }
        }

        json_output($responseJson);
    }


    /**
     * 处理添加注册码使用终端
     *
     * @return json 处理结果
     */
    public function postTerminalAdd()
    {
        $responseJson = array('status' => -1, 'msg' => '未知错误！');

        // 获取终端名称
        $inputs = array_trim(Input::get());

        // 验证输入
        $validator = Validator::make($inputs, ['name' => 'required']);
        if ( $validator->failed() )    // 验证失败
        {
            $responseJson = array('status' => 2, 'msg' => '请输入注册码使用终端名！');
        }
        else
        {
            $regcode                = new RegcodeTerminal();
            $regcode->name          = $inputs['name'];
            $regcode->user_id       = 1;
            $regcode->user_realname = '这就是用户名';
            $regcode->description   = empty($inputs['description']) ? '' : $inputs['description'];
            if( $regcode->save() )    // 添加数据库失败
            {
                $responseJson = array('status' => 0, 'msg' => '注册码使用终端添加成功！');
            }
            else
            {
                $responseJson = array('status' => 1, 'msg' => '注册码使用终端数据添加失败！');
            }
        }

        json_output($responseJson);
    }
}
