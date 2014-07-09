@extends('layouts.master')

@section('content')
<h2>添加新销售平台</h2>
<br />
<div id="wrapper" class="row" name="platform-add" module="system">
    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="panel-title">添加新销售平台</div>
                <div class="panel-options">
                    <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                    <a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
                </div>
            </div>
            <div class="panel-body">
                <form role="form" id="form1" class="validate form-horizontal form-groups-bordered">
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="name">平台名称</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="entypo-window"></i></span>
                                <input class="form-control" name="name" type="text" data-validate="required" data-message-required="请填写平台名称！" placeholder="平台名称">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="description">平台描述</label>
                        <div class="col-sm-9">
                            <textarea id="description" class="form-control autogrow" name="description" placeholder="描述信息可不写"></textarea>
                        </div>
                    </div>
                    <div class="form-group col-sm-9">
                        <button id="json-platform-add" type="submit" class="btn btn-success" data-url="/system/platform-add">添加</button>
                        <button type="reset" class="btn">重置</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection