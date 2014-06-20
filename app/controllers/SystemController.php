<?php

class SystemController extends BaseController {

    /**
     * 执行添加销售平台
     */
    public function doAddPlatform()
    {
        $json_reponse = ['status' => -1, 'msg' => '未知错误'];

        // 判断是否输入了平台名
        if ( ! Input::has('name') )
        {
            $json_response = array('status' => 1, 'msg' => '请输入销售平台名称！');
        }
        else
        {
            $regcode = new SystemPlatform;
            $regcode->name = Input::get('name');
            $regcode->description = Input::get('description') ?: '';
            $regcode->save();

            $json_response = array('status' => 0, 'msg' => '新销售平台添加成功！');
        }

        self::json_output($json_response);
    }


    /**
     * 执行角色添加操作
     * @return [type] [description]
     */
    public function doAddRole()
    {
        $json_reponse = ['status' => -1, 'msg' => '未知错误'];

        if( ! Input::has('name') || ! Input::has('parent'))
        {
            $json_reponse = ['status' => 2, 'msg' => '请输入完整的信息！'];
        }
        else
        {
            $pid  = Input::get('parent');
            // 顶级角色
            $path = 0;
            if( $pid )  // 非顶级角色
            {
                $path = DB::table('role')->where('id', $pid)->pluck('path');
                $path = $path . ',' . $pid;
            }

            $role              = new role;
            $role->name        = Input::get('name');
            $role->pid         = $pid;
            $role->path        =  $path;
            $role->description = Input::get('description');
            $role->save();
            // print_r(DB::getQueryLog());
            $json_reponse = ['status' => 0, 'msg' => '新部门添加成功！'];
        }

        self::json_output($json_reponse);
    }
}