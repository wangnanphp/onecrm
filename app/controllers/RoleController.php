<?php

class RoleController extends BaseController {


    public function doAddRole()
    {

    }


    /**
     * 获得所有角色(部门)信息，带层级关系
     * @return array 角色信息数组
     */
    public function getAllRoles()
    {
        // 获取所有的角色信息
        $roles = Role->orderBy('id')->get();

        // 格式化处理数据
        foreach($roles as $k => $v)
        {

        }

        var_dump(DB::getQueryLog());
        // echo '<br>', $role->pid;


        echo '<br>';
        echo '<br>';
        echo '<br>';
        echo '<br>';
        echo '<br>';
        echo '<br>';
        echo '<br>';
        echo '<br>';
        echo '<br>';
        echo '<br>';
    }
}