<?php

class SystemController extends BaseController {

    /**
     * 销售平台列表
     *
     * @return [type] [description]
     */
    public function getPlatformList()
    {
        // 获取注册码类型列表
        $viewData['platform_list'] = SystemPlatform::get();
        // 修改时的标题(modal)
        $viewData['modal_title']   = '修改销售平台';

        return View::make('systems.platforms.platformList', $viewData);
    }


    /**
     * 销售平台添加页显示
     *
     * @return [type] [description]
     */
    public function getPlatformAdd()
    {
        return View::make('systems.platforms.platformAdd');
    }


    /**
     * 执行添加销售平台
     */
    public function postPlatformAdd()
    {
        $json_reponse = ['status' => -1, 'msg' => '未知错误'];

        // 获取数据
        $inputs = array_trim(Input::all());

        // 验证输入
        $validator = Validator::make($inputs, ['name' => 'required']);
        if ( $validator->failed() )
        {
            $json_response = array('status' => 2, 'msg' => '请输入销售平台名称！');
        }
        else
        {
            $platform                = new SystemPlatform;
            $platform->name          = $inputs['name'];
            $platform->user_id       = 1;
            $platform->user_realname = '这就是用户名';
            $platform->description   = empty($inputs['description']) ? '' : $inputs['description'];
            if( $platform->save() )    // 添加数据库失败
            {
                $responseJson = array('status' => 0, 'msg' => '销售平台添加成功！');
            }
            else
            {
                $responseJson = array('status' => 1, 'msg' => '销售平台数据添加失败！');
            }
        }

        json_output($responseJson);
    }


    /**
     * 获取销售平台信息
     *
     * @return [type] [description]
     */
    public function postPlatformInfo()
    {
        $responseJson = ['status' => 2, 'msg' => '请通过正常途径修改信息！'];
        $inputs = Input::all();

        // 验证数据
        $validator = Validator::make($inputs, ['id' => 'required | integer | exists:regcode_type,id']);
        if( $validator->passes() )    // 通过验证
        {
            $type = SystemPlatform::select('id','name', 'description')
                ->find($inputs['id'])
                ->toArray();

            $responseJson = ['status' => 0, 'data' => $type];
        }

        json_output($responseJson);
    }


    /**
     * 修改销售平台信息
     *
     * @return [type] [description]
     */
    public function postPlatformModify()
    {
        $responseJson = ['status' => 2, 'msg' => '请通过正常途径修改信息！'];
        $inputs = array_trim(Input::all());

        // 验证数据
        $validatorRule = [
            'id' => 'required | integer | exists:regcode_type,id',
            'name' => 'required',
        ];
        $validatorMsg = ['id' => '请通过正常途径修改信息！', 'name' => '销售平台名称必须填写！'];
        $validator = Validator::make($inputs, $validatorRule, $validatorMsg);
        if( $validator->passes() )    // 通过验证
        {
            $type = SystemPlatform::find($inputs['id']);
            $type->name        = $inputs['name'];
            $type->description = $inputs['description'];

            if( false === $type->save() )
            {
                $responseJson = ['status' => 1, 'msg' => '修改销售平台数据失败！'];
            }
            else
            {
                $responseJson = ['status' => 0, 'msg' => '修改销售平台信息成功！'];
            }
        }
        else
        {
            $responseJson = ['status' => 3, 'msg' => $validator->messages()->first()];
        }

        json_output($responseJson);
    }


    /**
     * 删除销售平台信息
     *
     * @return [type] [description]
     */
    public function postPlatformDelete()
    {
        $responseJson = ['status' => 2, 'msg' => '请通过正常途径删除信息！'];

        // 获取要删除的类别ID
        $inputs = Input::all();

        // 验证数据
        $validator = Validator::make($inputs, ['id' => 'required | integer | exists:regcode_type,id']);
        if( $validator->passes() )    // 验证通过
        {
            if( false === SystemPlatform::destroy($inputs['id']) )    // 删除失败
            {
                $responseJson = ['status' => 1, 'msg' =>'删除销售平台数据失败！'];
            }
            else
            {
                $responseJson = ['status' => 0, 'msg' => '删除销售平台成功！'];
            }
        }

        json_output($responseJson);
    }
}