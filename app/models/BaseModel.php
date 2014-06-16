<?php

class BaseModel extends Eloquent {

    /**
     * 软删除开启
     *
     * @var boolean
     */
    protected $softDelete = true;


    /**
     * 重写 created_at 和 updated_at 数据字段格式
     * @return int  时间戳
     */
    public function getDateFormat()
    {
        return time();
    }
}