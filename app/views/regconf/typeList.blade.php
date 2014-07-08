@extends('layouts.master')

@section('content')
<h2>注册码类型管理</h2>
<br />
<div id="wrapper" class="row" name="type-list" module="regcode">
    <div class="col-md-12">
        <table class="table datatable table-striped table-hover" id="table-1">
            <thead>
                <tr>
                    <th>ID</th> <th>类别名称</th> <th>添加/修改人</th>
                    <th>添加时间</th> <th>修改时间</th> <th>类别描述</th> <th>操作</th>
                </tr>
            </thead>
            <tbody>
            @foreach($type_list as $tl_v)
                <tr class="type" data-id="{{ $tl_v->id }}">
                    <td>{{ $tl_v->id }}</td>
                    <td>{{ $tl_v->name }}</td>
                    <td>{{ $tl_v->user_realname }}</td>
                    <td>{{ $tl_v->created_at }}</td>
                    <td>{{ $tl_v->updated_at }}</td>
                    <td>{{ $tl_v->description }}</td>
                    <td class="center">
                        <button class="btn btn-gold btn-xs config-edit" data-url="/regconf/type-info"> <i class="entypo-pencil"></i> </button>
                        <button type="button" class="btn btn-danger btn-xs config-delete" data-url="/regconf/type-delete"> <i class="entypo-cancel"></i> </button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop

{{-- 弹出层 modal S --}}
@section('modal')
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">{{ $modal_title }}</h4>
      </div>
      <form role="form" class="validate form-horizontal form-groups-bordered">
      <div class="modal-body">
        <div class="form-group">
            <label class="col-sm-3 control-label" for="name">注册码类型名</label>
            <div class="col-sm-8">
                <input id="config-name" class="form-control" type="text" name="name" data-validate="required" data-message-required="亲，注册码类型必须写哦！" placeholder="必须" />
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label" for="description">类型描述</label>
            <div class="col-sm-8">
                <textarea id="description" class="form-control autogrow" name="description" placeholder="描述信息可不写"></textarea>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <input id="config-id" name="id" type="hidden" />
        <button class="btn btn-default" type="button" data-dismiss="modal">关闭</button>
        <button class="btn btn-primary" id="config-modify" type="button" data-dismiss="modal" data-url="/regconf/type-modify">保存</button>
      </div>
      </form>
    </div>
  </div>
</div>
@stop
{{-- 弹出层 modal E --}}
{{-- 弹出层 E --}}