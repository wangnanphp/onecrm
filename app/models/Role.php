<?php

class Role extends BaseModel {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'role';

    /**
     * 不可被集体赋值的黑名单
     *
     * @var array
     */
    protected $guarded = array('id', 'created_at', 'updated_at');


    /**
     * 获得所有角色(部门)信息，带层级关系
     * @return array 角色信息数组
     */
    public function getAllRoles()
    {
        // 返回按等级层次排序好的所有的角色信息(按 [path,pid] 排序)
        return $this->orderBy(DB::raw('concat(`path`, ",", `id`)'))->get();
    }


    /**
     * 获取用户所属的所有角色ID
     * @param  int $user_id 用户ID
     * @return array        用户的角色信息
     */
    public function getUserRoleId($userId)
    {
        return $this->select('role_id')->where('user_id', '=', $userId)->get();
    }
}