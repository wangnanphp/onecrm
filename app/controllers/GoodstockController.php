<?php

class GoodstockController extends BaseController {
    /**
     * 浏览商品库存信息
     */
    public function index()
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

}
