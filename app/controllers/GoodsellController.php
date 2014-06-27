<?php

class GoodsellController extends BaseController {
    /**
     * 快速搜索商品实物
     */
    public function search()
    {
        return View::make('goods.search');
    }

    /**
     * 浏览实物商品
     */
    public function index()
    {
        return View::make('goods.index');
    }

    
    /**
     * 添加实物列表页面
     */
    public function addGoods()
    {
        return View::make('goods.add');
    }


    /**
     * 商品添加
     */
    public function doAddGoods()
    {
        
        $json_response = array('status' => -1, 'msg' => '未知错误！');

        if ( ! Input::has('name') )
        {
            $json_response = array('status' => 1, 'msg' => '请输入商品信息！');
        }
        else
        {
            $goods = new AddGoods();
            $goods->user_realname   = Input::get('user_realname');
            $goods->goods_type_name = Input::get('goods_type_name');
            $goods->name            = Input::get('name');
            $goods->brand           = Input::get('brand');
            $goods->cost_price      = Input::get('cost_price');
            $goods->sales_price     = Input::get('sales_price');
            $goods->origin          = Input::get('origin');
            $goods->manufacture     = Input::get('manufacture');
            $goods->remark          = Input::get('remark') ?: '';
            $goods->status          = Input::get('status');
            $goods->save();
            //var_dump(DB::getQueryLog());
            $json_response = array('status' => 0, 'msg' => '商品添加成功！');
        }

        json_output($json_response);
    }



    
    /**
     * 浏览商品库存信息
     */
    public function indexStock()
    {
        return View::make('stock.index');
    }

    /**
     * 添加商品库存信息
     */
    public function addStock()
    {
        return View::make('stock.add');
    }

    /**
     * 执行添加商品库存信息
     */
    public function doAddStock()
    {
          $json_response = array('status' => -1, 'msg' => '未知错误！');
       // return View::make('stock.index');
    }






























































    /**
     * 处理添加注册码类型
     * @return json 处理结果
     */
    public function doAddType()
    {
        echo json_encode(array('status' => 0, 'msg' => 'alsdjfl'));
    }

    /**
     * 处理添加注册码使用平台
     * @return json 处理结果
     */
    public function doAddPlatform()
    {
        echo json_encode(['status' => 0, 'msg' => 'platform']);
    }
}
