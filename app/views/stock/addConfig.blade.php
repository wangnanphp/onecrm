@extends('layouts.master')

@section('content')
<h2>添加注册码配置信息</h2>
<br />
<div id="wrapper" class="row" name="add-config" module="regcode">
    <div class="col-md-12">
        <div class="tabs-vertical-env">
            <ul class="nav tabs-vertical"><!-- available classes "right-aligned" -->
                <li class="active"><a href="#v-banch" data-toggle="tab">添加类型</a></li>
                <li><a href="#v-single" data-toggle="tab">添加使用平台</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="v-banch">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="panel-title">添加的注册码类型名不能重复</div>
                            <div class="panel-options">
                                <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                                <a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <form id="add-type-form" class="validate form-horizontal form-groups-bordered">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="type_name">注册码类型名</label>
                                    <div class="col-sm-9">
                                        <input id="regcode-type" class="form-control" type="text" name="type_name" data-validate="required" data-message-required="亲，注册码类型必须写哦！" placeholder="必须" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="remark">类型描述</label>
                                    <div class="col-sm-9">
                                        <textarea id="field-ta" class="form-control autogrow" name="remark" placeholder="描述信息可不写"></textarea>
                                    </div>
                                </div>
                                <div class="form-group col-sm-9">
                                    <button id="json-add-type" class="btn btn-success" type="submit" data-url="/regcode/doAddType">添加</button>
                                    <button type="reset" class="btn">重置</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="v-single">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="panel-title">添加的使用平台名不能重复</div>
                            <div class="panel-options">
                                <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                                <a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <form role="form" id="form1" method="post" class="validate form-horizontal form-groups-bordered">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="platform_name">使用平台名称</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" name="platform_name" data-validate="required" data-message-required="亲，注册码类型必须写哦！" placeholder="必须" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="remark">平台描述</label>
                                    <div class="col-sm-9">
                                        <textarea id="field-ta" class="form-control autogrow" placeholder="描述信息可不写"></textarea>
                                    </div>
                                </div>
                                <div class="form-group col-sm-9">
                                    <button id="json-add-platform" class="btn btn-success" type="submit" data-url="/regcode/doAddPlatform">添加</button>
                                    <button type="reset" class="btn">重置</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection