<?php

class RoleController extends BaseController {

    /**
     * 角色列表页面
     * @return [type] [description]
     */
    public function getRoleList()
    {
        $roleList = with(new Role)->getAllRoles();
        return View::make('roles.roleList')->withRoleList($roleList)
            ->withModalTitle('用户部门设置');
    }

    /**
     * 添加角色页面
     */
    public function getRoleAdd()
    {
        // 获取所有的角色信息
        $roles = new Role;
        $roles = $roles->getAllRoles();

        return View::make('roles.roleAdd')->with('roles', $roles);
    }


    /**
     * 执行角色添加操作
     * @return [type] [description]
     */
    public function postRoleAdd()
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
            $role->description = Input::get('description') ?: '';
            $role->save();
            // print_r(DB::getQueryLog());
            $json_reponse = ['status' => 0, 'msg' => '新部门添加成功！'];
        }

        json_output($json_reponse);
    }
}