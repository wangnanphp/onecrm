@extends('layouts.master')

@section('content')
<div class="row" id="wrapper" module="goods" name="add-goods">
    <div class="col-md-12">

        <div class="panel panel-primary" data-collapsed="0">

            <div class="panel-heading">
                <div class="panel-title">
                  添加商品实物
                </div>

                <div class="panel-options">
                    <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                    <a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>
                    <a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
                </div>
            </div>

            <div class="panel-body">

                <form role="form" class="form-horizontal form-groups-bordered">

                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label">添加人</label>

                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="user_realname" id="field-1" placeholder="输入添加的人员">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">商品类型</label>

                        <div class="col-sm-5">
                            <select class="form-control">
                                <optgroup label="请选择一个商品类型">
                                <option>请选择一个商品类型</option>
                                <option>Option 2</option>
                                <option>Option 3</option>
                                <option>Option 4</option>
                                <option>Option 5</option>
                            </select>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="field-3" class="col-sm-3 control-label">商品名</label>

                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="name" id="field-3" placeholder="商品的名称">
                        </div>
                    </div>

                     <div class="form-group">
                        <label for="field-4" class="col-sm-3 control-label">品牌</label>

                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="field-4" name="brand" placeholder="商品的品牌">
                        </div>
                    </div>
                   
                    <div class="form-group">
                        <label for="field-4" class="col-sm-3 control-label">成本价</label>

                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="field-4" name="cost_price" placeholder="商品的成本价">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="field-5" class="col-sm-3 control-label">销售价</label>

                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="field-5" name="sales_price" placeholder="商品的销售价格">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="field-6" class="col-sm-3 control-label">商品来源</label>

                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="field-6" name="origin" placeholder="商品的来源">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="field-6" class="col-sm-3 control-label">生产商</label>

                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="field-6" name="manufacture" placeholder="商品的生成商">
                        </div>
                    </div>


                     <div class="form-group">
                        <label for="field-ta" class="col-sm-3 control-label">备注</label>

                        <div class="col-sm-5">
                            <textarea class="form-control" id="field-ta" name="remark" placeholder="商品的备注"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">状态：</label>

                        <div class="col-sm-5">
                            <div class="make-switch" data-text-label="<i class='entypo-user'></i>">
                                <input type="checkbox" checked />
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-5">
                            <button id="json-add-goods" class="btn btn-success" type="submit" data-url="/goods/doAddGoods">添加</button>
                            <button type="reset" class="btn">重置</button>
                        </div>
                    </div>
                </form>

            </div>

        </div>

    </div>
</div>



@endsection