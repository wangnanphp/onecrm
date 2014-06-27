@extends('layouts.master')

@section('content')
<div class="row"  id="wrapper" module="goodstype" name="add-goodstype">
    <div class="col-md-12">

        <div class="panel panel-primary" data-collapsed="0">

            <div class="panel-heading">
                <div class="panel-title">
                  添加商品分类管理
                </div>

                <div class="panel-options">
                    
                    <i class="entypo-cog"></i></a>
                    <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                    <a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>
                    <a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
                </div>
            </div>

            <div class="panel-body">

    
                <form role="form" id="form1" method="post" class="validate form-horizontal form-groups-bordered">
                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label">主类别名称</label>

                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="name" id="field-1" placeholder="添加主类别名称">
                        </div>
                    </div>

              
                    <div class="form-group">
                        <label for="field-ta" class="col-sm-3 control-label">添加描述</label>

                        <div class="col-sm-5">
                            <textarea class="form-control" id="field-ta" name="remark" placeholder="添加描述文字"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">状态：</label>

                        <div class="col-sm-5">
                            <div class="make-switch" data-text-label="<i class='entypo-user'></i>">
                                <input type="checkbox" checked name="status"/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-5">
                            <button id="json-add-goodstype" class="btn btn-success" type="submit" data-url="/goodstype/doAddType">添加</button>
                            <button type="reset" class="btn">重置</button>
                        </div>
                    </div>

                </form>

            </div>

        </div>

    </div>
</div>



@endsection