<?php

class GoodstypeController extends BaseController {
     /**
     * 空处理
     */
    public function missingMethod($parameters = array())
    {
        //
    }
    /**
     * 浏览实物商品
     */
    public function index()
    {
        return View::make('goodstype.index');
    }


    /**
     * 添加分类页面
     */
    public function add()
    {
        return View::make('goodstype.add');
    }


    /**
     * 执行添加分类
     */
    public function doAddType()
    {
       echo json_encode(array('status' => 0, 'msg' => '类别添加成功'));


        exit();
        $json_response = array('status' => -1, 'msg' => '未知错误！');

        if ( ! Input::has('name') )
        {
            $json_response = array('status' => 1, 'msg' => '请输入商品类别名！');
        }
        else
        {
            $goodstype = new RegcodeType();
            $goodstype->name = Input::get('name');
            $goodstype->remark = Input::get('remark') ?: '';
             $goodstype->status = Input::get('status');
           // $goodstype->save();
            var_dump(DB::getQueryLog());
            $json_response = array('status' => 0, 'msg' => '注册码类型添加成功！');
        }

        json_output($json_response);

        
       //  echo json_encode(array('status' => 0, 'msg' => '类别添加成功'));
    }
}
