<?php

class RegcodeType extends BaseModel {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'regcode_type';

    /**
     * 不可被集体赋值的黑名单
     *
     * @var array
     */
    protected $guarded = array('id', 'created_at', 'updated_at');

}