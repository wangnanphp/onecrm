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
        // 获取注册码类型列表
        $viewData['type_list']   = RegcodeType::orderBy('id', 'desc')->get();
        // 修改时的标题(modal)
        $viewData['modal_title'] = '修改注册码类型';

        return View::make('regconf.typeList',$viewData);
    }


    /**
     * 注册码使用终端列表页
     *
     * @return [type] [description]
     */
    public function getTerminalList()
    {
        // 获取注册码使用终端列表
        $viewData['terminal_list'] = RegcodeTerminal::orderBy('id', 'desc')->get();
        // 修改时的标题(modal)
        $viewData['modal_title']   = '修改注册码使用终端';

        return View::make('regconf.terminalList', $viewData);
    }


    /**
     * 获取注册码类型信息
     *
     * @return [type] [description]
     */
    public function postTypeInfo()
    {
        $responseJson = ['status' => 2, 'msg' => '请通过正常途径修改信息！'];
        $inputs = Input::all();

        // 验证数据
        $validator = Validator::make($inputs, ['id' => 'required | integer | exists:regcode_type,id']);
        if( $validator->passes() )    // 通过验证
        {
            $type = RegcodeType::select('id','name', 'description')
                ->find($inputs['id'])
                ->toArray();

            $responseJson = ['status' => 0, 'data' => $type];
        }

        json_output($responseJson);
    }


    /**
     * 获取注册码使用终端信息
     *
     * @return [type] [description]
     */
    public function postTerminalInfo()
    {
        $responseJson = ['status' => 2, 'msg' => '请通过正常途径修改信息！'];
        $inputs = Input::all();

        // 验证数据
        $validator = Validator::make($inputs, ['id' => 'required | integer | exists:regcode_type,id']);
        if( $validator->passes() )    // 通过验证
        {
            $type = RegcodeTerminal::select('id','name', 'description')
                ->find($inputs['id'])
                ->toArray();

            $responseJson = ['status' => 0, 'data' => $type];
        }

        json_output($responseJson);
    }


    /**
     * 修改注册码类型信息
     *
     * @return [type] [description]
     */
    public function postTypeModify()
    {
        $responseJson = ['status' => 2, 'msg' => '请通过正常途径修改信息！'];
        $inputs = array_trim(Input::all());

        // 验证数据
        $validatorRule = [
            'id' => 'required | integer | exists:regcode_type,id',
            'name' => 'required',
        ];
        $validatorMsg = ['id' => '请通过正常途径修改信息！', 'name' => '注册码类型名必须填写！'];
        $validator = Validator::make($inputs, $validatorRule, $validatorMsg);
        if( $validator->passes() )    // 通过验证
        {
            $type = RegcodeType::find($inputs['id']);
            $type->name        = $inputs['name'];
            $type->description = $inputs['description'];

            if( false === $type->save() )
            {
                $responseJson = ['status' => 1, 'msg' => '修改类型数据失败！'];
            }
            else
            {
                $responseJson = ['status' => 0, 'msg' => '修改类型数据成功！'];
            }
        }
        else
        {
            $responseJson = ['status' => 3, 'msg' => $validator->messages()->first()];
        }

        json_output($responseJson);
    }


    /**
     * 修改注册码使用终端信息
     *
     * @return [type] [description]
     */
    public function postTerminalModify()
    {
        $responseJson = ['status' => 2, 'msg' => '请通过正常途径修改信息！'];
        $inputs = array_trim(Input::all());

        // 验证数据
        $validatorRule = [
            'id' => 'required | integer | exists:regcode_type,id',
            'name' => 'required',
        ];
        $validatorMsg = ['id' => '请通过正常途径修改信息！', 'name' => '注册码使用终端名必须填写！'];
        $validator = Validator::make($inputs, $validatorRule, $validatorMsg);
        if( $validator->passes() )    // 通过验证
        {
            $type = RegcodeTerminal::find($inputs['id']);
            $type->name        = $inputs['name'];
            $type->description = $inputs['description'];

            if( false === $type->save() )
            {
                $responseJson = ['status' => 1, 'msg' => '修改注册码使用终端数据失败！'];
            }
            else
            {
                $responseJson = ['status' => 0, 'msg' => '修改注册码使用终端数据成功！'];
            }
        }
        else
        {
            $responseJson = ['status' => 3, 'msg' => $validator->messages()->first()];
        }

        json_output($responseJson);
    }


    /**
     * 删除注册码类型信息
     *
     * @return [type] [description]
     */
    public function postTypeDelete()
    {
        $responseJson = ['status' => 2, 'msg' => '请通过正常途径删除信息！'];

        // 获取要删除的类别ID
        $inputs = Input::all();

        // 验证数据
        $validator = Validator::make($inputs, ['id' => 'required | integer | exists:regcode_type,id']);
        if( $validator->passes() )    // 验证通过
        {
            if( false === RegcodeType::destroy($inputs['id']) )    // 删除失败
            {
                $responseJson = ['status' => 1, 'msg' =>'删除注册码类型数据失败！'];
            }
            else
            {
                $responseJson = ['status' => 0, 'msg' => '删除注册码类型成功！'];
            }
        }

        json_output($responseJson);
    }


    /**
     * 删除注册码使用终端信息
     *
     * @return [type] [description]
     */
    public function postTerminalDelete()
    {
        $responseJson = ['status' => 2, 'msg' => '请通过正常途径删除信息！'];

        // 获取要删除的终端ID
        $inputs = Input::all();

        // 验证数据
        $validator = Validator::make($inputs, ['id' => 'required | integer | exists:regcode_type,id']);
        if( $validator->passes() )    // 验证通过
        {
            if( false === RegcodeTerminal::destroy($inputs['id']) )    // 删除失败
            {
                $responseJson = ['status' => 1, 'msg' =>'删除注册码使用终端数据失败！'];
            }
            else
            {
                $responseJson = ['status' => 0, 'msg' => '删除注册码使用终端成功！'];
            }
        }

        json_output($responseJson);
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
