@extends('layouts.master')

@section('content')
<h2>添加新部门</h2>
<br />
<div id="wrapper" class="row" name="add-role" module="role">
    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="panel-title">添加新部门</div>
                <div class="panel-options">
                    <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                    <a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
                </div>
            </div>
            <div class="panel-body">
                <form role="form" id="form1" class="validate form-horizontal form-groups-bordered">
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="name">部门名称</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="entypo-window"></i></span>
                                <input class="form-control" name="name" type="text" data-validate="required" data-message-required="请填写部门名称！" placeholder="部门名称">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="parent">上级部门</label>
                        <div class="col-sm-9">
                            <select id="parent" name="parent" class="selectboxit">
                                <optgroup label="请选择上级部门">
                                    <option value="0">顶级部门</option>
                                @foreach($roles as $r_v)
                                    <option value="{{ $r_v->id }}">
                                        |&sim;
                                        <?php $tmp_path_length = floor(strlen($r_v->path) / 2); ?>
                                        @for(;$tmp_path_length > 0; $tmp_path_length--)
                                            &sim;
                                        @endfor
                                        {{ $r_v->name }}
                                    </option>
                                @endforeach
                                </optgroup>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="description">部门描述</label>
                        <div class="col-sm-9">
                            <textarea id="description" class="form-control autogrow" name="description" placeholder="描述信息可不写"></textarea>
                        </div>
                    </div>
                    <div class="form-group col-sm-9">
                        <button id="json-add-role" type="submit" class="btn btn-success" data-url="/role/role-add">添加</button>
                        <button type="reset" class="btn">重置</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection