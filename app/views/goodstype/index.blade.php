@extends('layouts.master')

@section('content')

<h3>分类管理</h3>

<table class="table table-bordered table-striped datatable" id="table-2">
    <thead>
        <tr>
            <th>
                <div class="checkbox checkbox-replace">
                    <input type="checkbox" id="chk-1">
                </div>
            </th>
            <th>类别名称</th>
            <th>所属类别</th>
            <th>添加人</th>
            <th>状态</th>
            <th>添加时间</th>
            <th>操作</th>
           
        </tr>
    </thead>

    <tbody>

        <tr>
            <td>
                <div class="checkbox checkbox-replace">
                    <input type="checkbox" id="chk-1">
                </div>
            </td>
            <td>奥迪</td>
            <td>汽车类</td>
            <td>刘晓威</td>
            <td>状态</td>
            <td>时间</td>
            <td>
                <a href="#" class="btn btn-default btn-sm btn-icon icon-left">
                    <i class="entypo-pencil"></i>
                    编辑
                </a>

                <a href="#" class="btn btn-danger btn-sm btn-icon icon-left">
                    <i class="entypo-cancel"></i>
                   删除
                </a>

                <a href="#" class="btn btn-info btn-sm btn-icon icon-left">
                    <i class="entypo-info"></i>
                    添加子类
                </a>
            </td>
        </tr>
    </tbody>
</table>
<a href="javascript:fnClickAddRow();" class="btn btn-primary">
    <i class="entypo-plus"></i>
    添加父类
</a>
@endsection