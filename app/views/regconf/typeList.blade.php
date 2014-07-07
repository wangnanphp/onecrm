@extends('layouts.master')

@section('content')
<h2>注册码类型管理</h2>
<br />
<div id="wrapper" class="row" name="user-list" module="user">
    <div class="col-md-12">
        <table class="table datatable table-striped table-hover" id="table-1">
            <thead>
                <tr>
                    <th>ID</th> <th>登陆E-mail</th> <th>账号</th> <th>真实姓名</th>
                    <th>身份证号</th> <th>电话</th> <th>最后登录时间</th> <th>最后登录IP</th>
                    <th>是否在职</th> <th>状态</th> <th>操作</th>
                </tr>
            </thead>
            <tbody>
            @foreach($users as $u_v)
                <tr class="user" data-id="{{ $u_v->id }}">
                    <td>{{ $u_v->id }}</td>
                    <td>{{ $u_v->login_email }}</td>
                    <td>{{ $u_v->login_name }}</td>
                    <td>{{ $u_v->realname }}</td>
                    <td>{{ $u_v->idcards }}</td>
                    <td>{{ $u_v->phone }}</td>
                    <td>{{ $u_v->last_login_time }}</td>
                    <td>{{ $u_v->last_login_ip }}</td>
                    <td>
                        <button type="button" class="btn btn-orange btn-xs user-role-edit">部门设置</button>
                    </td>
                    <td>
                        <div class="checkbox checkbox-replace color-green">
                            <input class="mode" type="checkbox" data-mode="work" @if( 0 === $u_v->work ) checked @endif />
                        </div>
                    </td>
                    <td>
                        <div class="checkbox checkbox-replace color-red">
                            <input class="mode" type="checkbox" data-mode="status" @if( 0 !== $u_v->status ) checked @endif>
                        </div>
                    </td>
                    <td class="center">
                        <a type="button" class="btn btn-info btn-xs" href="/user/user-info?id={{ $u_v->id }}"> <i class="entypo-eye"></i> </a>
                        <a class="btn btn-gold btn-xs" href="/user/user-modify?id={{ $u_v->id }}"> <i class="entypo-pencil"></i> </a>
                        <button type="button" class="btn btn-danger btn-xs delete-user"> <i class="entypo-cancel"></i> </button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $users->links() }}
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
      <div class="modal-body">
        <form role="form" class="form-horizontal form-groups-bordered">
            <div class="col-sm-12" style="padding:10px 0px 15px;"><div class="col-sm-3"></div><div class="col-sm-4">未选部门</div><div class="col-sm-5">已选部门</div></div>
            <div class="form-group">
                <label class="col-sm-3 control-label">请点选部门</label>
                <div class="col-sm-9">
                    <select id="user-role" multiple="multiple" name="roles[]" class="form-control multi-select">
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
                    </select>
                </div>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button class="btn btn-default" type="button" data-dismiss="modal">关闭</button>
        <button class="btn btn-primary" id="user-role-edit" type="button" data-dismiss="modal" data-url="/user/user-role-edit">保存</button>
      </div>
    </div>
  </div>
</div>
@stop
{{-- 弹出层 modal E --}}
{{-- 弹出层 E --}}