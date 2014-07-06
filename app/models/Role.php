<?php

class Role extends BaseModel {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'role';


    /**
     * 获得所有角色(部门)信息，带层级关系
     * @return array 角色信息数组
     */
    public function getAllRoles()
    {
        // 返回按等级层次排序好的所有的角色信息(按 [path,pid] 排序)
        return $this->orderBy(DB::raw('concat(`path`, ",", `id`)'))->get();
    }
}