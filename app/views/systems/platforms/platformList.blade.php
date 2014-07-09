@extends('layouts.master')

@section('content')
<h2>销售平台管理</h2>
<br />
<div id="wrapper" class="row" name="platform-list" module="system">
    <div class="col-md-12">
        <table class="table datatable table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th> <th>平台名称</th> <th>添加/修改人</th>
                    <th>添加时间</th> <th>修改时间</th> <th>平台描述</th> <th>操作</th>
                </tr>
            </thead>
            <tbody>
            @foreach($platform_list as $pl_v)
                <tr class="platform" data-id="{{ $pl_v->id }}">
                    <td>{{ $pl_v->id }}</td>
                    <td>{{ $pl_v->name }}</td>
                    <td>{{ $pl_v->user_realname }}</td>
                    <td>{{ $pl_v->created_at }}</td>
                    <td>{{ $pl_v->updated_at }}</td>
                    <td>{{ $pl_v->description }}</td>
                    <td class="center">
                        <button class="btn btn-gold btn-xs platform-edit" data-url="/system/platform-info"> <i class="entypo-pencil"></i> </button>
                        <button type="button" class="btn btn-danger btn-xs platform-delete" data-url="/system/platform-delete"> <i class="entypo-cancel"></i> </button>
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
            <label class="col-sm-3 control-label" for="name">平台名称</label>
            <div class="col-sm-8">
                <div class="input-group">
                    <span class="input-group-addon"><i class="entypo-window"></i></span>
                    <input id="platform-name" class="form-control" name="name" type="text" data-validate="required" data-message-required="请填写平台名称！" placeholder="平台名称">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label" for="description">平台描述</label>
            <div class="col-sm-8">
                <textarea id="description" class="form-control autogrow" name="description" placeholder="描述信息可不写"></textarea>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <input id="platform-id" name="id" type="hidden" />
        <button class="btn btn-default" type="button" data-dismiss="modal">关闭</button>
        <button class="btn btn-primary" id="platform-modify" type="button" data-dismiss="modal" data-url="/system/platform-modify">保存</button>
      </div>
      </form>
    </div>
  </div>
</div>
@stop
{{-- 弹出层 modal E --}}
{{-- 弹出层 E --}}