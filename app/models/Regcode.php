<?php

class Regcode extends BaseModel {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'regcode';

    /**
     * 不可被集体赋值的黑名单
     *
     * @var array
     */
    protected $guarded = array('id', 'created_at', 'updated_at');


    /**
     * 定义和User模型的一对多属于关系
     * @return Object 和Regcode模型关联的User模型
     */
    public function user()
    {
        return $this->belongsTo('User', 'user_id');
    }
}