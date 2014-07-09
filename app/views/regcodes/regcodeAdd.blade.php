@extends('layouts.master')

@section('content')
<h2>添加注册码</h2>
<br />
<div class="row" id="wrapper" name="regcode-add" module="regcode">
    <div class="col-md-12">
        <div class="tabs-vertical-env">
            <ul class="nav tabs-vertical"><!-- available classes "right-aligned" -->
                <li class="active"><a href="#v-banch" data-toggle="tab">批量添加</a></li>
                <li><a href="#v-single" data-toggle="tab">单条添加</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="v-banch">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="panel-title">批量添加请先下载模板文件</div>
                            <div class="panel-options">
                                <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                                <a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <form role="form" id="form1" method="post" class="validate form-horizontal form-groups-bordered">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="regcode_type">注册码类型</label>
                                    <div class="col-sm-9">
                                        <select id="regcode_type" name="type" class="selectboxit">
                                            <optgroup label="请选择注册码类型">
                                                @foreach($type as $t_v)
                                                <option value="{{ $t_v['id'] }}">{{ $t_v['name'] }}</option>
                                                @endforeach
                                            </optgroup>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="terminal">使用终端</label>
                                    <div class="col-sm-9">
                                        <select id="terminal" name="terminal" class="selectboxit">
                                            <optgroup label="请选择注册码使用终端">
                                                @foreach($terminal as $tl_v)
                                                <option value="{{ $tl_v['id'] }}">{{ $tl_v['name'] }}</option>
                                                @endforeach
                                            </optgroup>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="regcode">注册码号</label>
                                    <div class="col-sm-9">
                                        <input class="form-control file2 inline btn btn-primary" type="file" name="regcode_file" data-validate="required" data-message-required="亲，你不上传文件就提交你妈妈知道吗？" data-label="<i class='glyphicon glyphicon-circle-arrow-up'></i> &nbsp;Browse Files" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="regcode">是否开放申请</label>
                                    <div class="col-sm-9">
                                        <div class="make-switch" data-on-label="<i class='entypo-check'></i>" data-off-label="<i class='entypo-cancel'></i>">
                                            <input name="allow_sell" type="checkbox" checked />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success">提交</button>
                                    <button type="reset" class="btn">重置</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="v-single">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="panel-title">请按要求填写表单</div>
                            <div class="panel-options">
                                <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                                <a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <form role="form" id="form1" method="post" class="validate form-horizontal form-groups-bordered">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="regcode_type">注册码类型</label>
                                    <div class="col-sm-9">
                                        <select id="regcode_type" name="type" class="selectboxit">
                                            <optgroup label="请选择注册码类型">
                                                @foreach($type as $t_v)
                                                <option value="{{ $t_v['id'] }}">{{ $t_v['name'] }}</option>
                                                @endforeach
                                            </optgroup>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="terminal">使用终端</label>
                                    <div class="col-sm-9">
                                        <select id="terminal" name="terminal" class="selectboxit">
                                            <optgroup label="请选择注册码使用终端">
                                                @foreach($terminal as $tl_v)
                                                <option value="{{ $tl_v['id'] }}">{{ $tl_v['name'] }}</option>
                                                @endforeach
                                            </optgroup>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="regcode">注册码号</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" name="regcode" data-numeric="true" data-validate="required" data-message-required="亲，你不填注册码就提交你妈妈知道吗？" placeholder="必须" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="regcode">是否开放申请</label>
                                    <div class="col-sm-9">
                                        <div class="make-switch" data-on-label="<i class='entypo-check'></i>" data-off-label="<i class='entypo-cancel'></i>">
                                            <input name="allow_sell" type="checkbox" checked />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success">提交</button>
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